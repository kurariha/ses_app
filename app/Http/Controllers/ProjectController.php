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
        $projects = $query->latest()->paginate(8);

        return view('projects.index', ['projects' => $projects, 'keyword' => $keyword]);
    }

    /**
     * Show the form for creating a new resource.
     */

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
        "project_name": "タイトル、ポジション名、エンジニア（[主要言語/技術]）",
        "email_sender": "メール送信元[会社名、担当者名]",
        "email_received_at":"年/月/日 00:00" ※メール受信日時、notnull,
        "days_until_deadline": (デフォルトは'3'。案件の期限までの営業日数（int）notnull,
        "project_deadline":"年/月/日 00:00" (email_received_atにdays_until_deadlineを加算した日時。)notnull,
        "job_description": "[使用する技術/言語]を用いた[具体的なタスク][使用するフレームワーク]を活用したフロントエンドまたはバックエンド開発[関連タスク例: テスト、設計、運用保守]",
        "required_tech_stack_i": "[技術名を単語で]5件。5件に満たない場合はnullとして表示",
        "required_skills_detail_i": "[詳細]5件。5件に満たない場合はnullとして表示",
        "preferred_tech_stack_i": "[技術名を単語で]5件。5件に満たない場合はnullとして表示",
        "preferred_skills_detail_i": "[詳細]5件。5件に満たない場合はnullとして表示",
        "work_location": "場所",
        "employment_type": "勤務形態、リモートの可否",
        "working_hours": "時間帯",
        "start_date": "開始時期と期間",
        "age": "年代"[nullの場合は「不問」とする],
        "foreign_nationality": true/false(外国籍の可否),
        "salary": "報酬レンジ"（スキル・経験による）以上、以下は「～」で表現,
        "adjusted_salary": "salary-10万円"notnull,
        "time_adjustment": "精算幅[時間幅]",
        "payment_terms": "支払サイト[日数]",
        "dress_code": "服装[自由/ビジネスカジュアル/スーツなど]",
        "number_of_positions": "募集人数[人数]",
        "contract": "契約形態[業務委託他]",
        "business_flow": "商流[直/一次/二次]",
        "interview_count": "面談回数[int]",
        "interview_method": "面談方法[オンライン/対面]",
        "pc_provided": "PC貸与の有無[有/無]",
        "main_development_environment": "主な開発環境",
        "notes": "補足[上記項目に含まれなかった内容][応募期限は記載不要]"
        }

    対象のメール本文：
    $request->email_content
    EOT;

        try {

            $geminiResponse = Gemini::geminiPro()->generateContent($toGeminiCommand)->text();
            $parsedData = preg_replace('/^```json|```$/m', '', trim($geminiResponse));
            $Data = json_decode($parsedData, true);

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
