<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Contact;
use Illuminate\Support\Facades\Session;
use Gemini\Laravel\Facades\Gemini;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 🔍 キーワードを取得
        $keyword = $request->input('keyword');
        $query = Project::query();
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('project_name', 'LIKE', "%{$keyword}%")
                    ->orWhere('job_description', 'LIKE', "%{$keyword}%")
                    ->orWhere('required_tech_stack_1', 'LIKE', "%{$keyword}%")
                    ->orWhere('required_tech_stack_2', 'LIKE', "%{$keyword}%")
                    ->orWhere('work_location', 'LIKE', "%{$keyword}%");
            });
        }
        $projects = $query->paginate(8);

        return view('projects.index', ['projects' => $projects, 'keyword' => $keyword]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'email_content' => 'required|string',
        ]);

        $toGeminiCommand =  <<<EOT
        "# やってほしいこと\n
        メール本文をプロジェクトテンプレートに変換してください。\n
        元の内容は変更せず、独自性を出す表現にしてください。\n
        空欄部分はnull(文字列ではない)と記載し、以下のJSON形式で出力してください。\n
        (i = 1; i <= 5; i++)とする。\n
        {
        "project_name": "xxx" タイトル[ポジション名]エンジニア（[主要言語/技術]）,
        "email_sender": "xxx" ※メール送信元[会社名、担当者名],
        "email_received_at":年/月/日 00:00(メール受信日時),
        "days_until_deadline": (デフォルトは'5'。案件の期限までの営業日数（int）,
        "project_deadline":年/月/日 00:00 (email_received_atにdays_until_deadlineの営業日を加算した日時。営業日は日本のカレンダーで土曜・日曜を抜いたものである。),
        "job_description": "xxx"[使用する技術/言語]を用いた[具体的なタスク][使用するフレームワーク]を活用したフロントエンドまたはバックエンド開発[関連タスク例: テスト、設計、運用保守],
        "required_tech_stack_i": "xxx"[技術名]5件。5件に満たない場合はnullとして表示。,
        "required_skills_detail_i": "xxx"[詳細]5件。5件に満たない場合はnullとして表示。,
        "preferred_tech_stack_i": "xxx"[技術名]5件。5件に満たない場合はnullとして表示。,
        "preferred_skills_detail_i": "xxx"[詳細]5件。5件に満たない場合はnullとして表示。,
        "work_location": "xxx"[場所],
        "employment_type": "xxx" [リモートの可否],
        "working_hours": "xxx"[時間帯],
        "start_date": "xxx"[開始時期と期間],
        "age": "xxx"[年代][nullの場合は「不問」とする],
        "foreign_nationality": true/false(外国籍の可否),
        "salary": "xxx"[報酬レンジ]（スキル・経験による）以上、以下は「～」で表現,
        "adjusted_salary": "xxx" [salary-10万円],
        "time_adjustment": "xxx"精算幅[時間幅],
        "payment_terms": "xxx"支払サイト[日数],
        "dress_code": "xxx"服装[自由/ビジネスカジュアル/スーツなど],
        "number_of_positions": "xxx"募集人数[人数],
        "contract": "xxx"契約形態,
        "business_flow": "xxx"商流[直/一次/二次],
        "interview_count": 面談回数[int],
        "interview_method": "xxx"面談方法[オンライン/対面],
        "pc_provided": "xxx"PC貸与の有無[有/無],
        "main_development_environment": "xxx"主な開発環境,
        "notes": "xxx"補足[上記項目に含まれなかった内容][応募期限は記載不要]
        }

    対象のメール本文：
    $request->email_content
    EOT;

        try {

            $geminiResponse = Gemini::geminiPro()->generateContent($toGeminiCommand)->text();
            // $parsedData = $geminiResponse['candidates'][0]['content']['parts'][0]['text'] ?? '[]';
            $parsedData = preg_replace('/^```json|```$/m', '', trim($geminiResponse));
            // $parsedData = preg_replace('/^"""|"""$/m', '', trim($geminiResponse));
            // $json = json_encode($parsedData, true);
            $Data = json_decode($parsedData, true);

            // if (!$parsedData || !is_array($parsedData)) {
            //     return back()->with('error', 'Geminiのレスポンスが不正です: ' . $geminiResponse);
            // }

            // // 必要な項目をnullで初期化
            // $defaultValues = [
            //     'project_name' => null, 'email_sender' => null, 'email_received_at' => null,
            //     'days_until_deadline' => 5, 'project_deadline' => null, 'job_description' => null,
            //     'required_tech_stack_1' => null, 'required_skills_detail_1' => null,
            //     'preferred_tech_stack_1' => null, 'preferred_skills_detail_1' => null,
            //     'work_location' => null, 'employment_type' => null, 'working_hours' => null,
            //     'start_date' => null, 'age' => null, 'foreign_nationality' => null,
            //     'salary' => null, 'adjusted_salary' => null, 'time_adjustment' => null,
            //     'payment_terms' => null, 'dress_code' => null, 'number_of_positions' => null,
            //     'contract' => null, 'business_flow' => null, 'interview_count' => null,
            //     'interview_method' => null, 'pc_provided' => null, 'main_development_environment' => null,
            //     'notes' => null
            // ];

            Project::create($Data);

            return redirect()->route('projects.create')->with('success', 'プロジェクトが正常に保存されました！');
        } catch (\Exception $e) {
            return back()->with('error', 'エラーが発生しました: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $project = Project::find($id);
        return view('projects.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
