<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mail = [
            [
                'project_name' => 'Rubyエンジニア（Ruby on Rails）',
                'email_sender' => '株式会社D-Standing / 本多 晏理',
                'email_received_at' => Carbon::create(2025, 1, 29, 13, 30, 0),
                'days_until_deadline' => 3,
                'project_deadline' => Carbon::create(2025, 2, 3, 13, 30, 0),
                'job_description' => '福祉向けSaaSサービスの開発において、Rubyエンジニアとして参画。要件定義、設計、実装、テストの各工程に携わる。基幹システムの業務生産性向上に向けた開発にも関与。',

                // 必須スキル
                'required_tech_stack_1' => 'Webアプリケーション開発',
                'required_skills_detail_1' => 'Webアプリ開発経験10年以上',
                'required_tech_stack_2' => 'Ruby on Rails',
                'required_skills_detail_2' => 'Railsを用いた開発経験3年以上',
                'required_tech_stack_3' => 'システム設計',
                'required_skills_detail_3' => '要件定義、設計、実装、テストの経験',
                'required_tech_stack_4' => null,
                'required_skills_detail_4' => null,
                'required_tech_stack_5' => null,
                'required_skills_detail_5' => null,

                // 歓迎スキル
                'preferred_tech_stack_1' => 'リーダー経験',
                'preferred_skills_detail_1' => 'チームのリーダー経験',
                'preferred_tech_stack_2' => 'フロントエンド開発',
                'preferred_skills_detail_2' => 'React.js/TypeScriptを用いた開発経験',
                'preferred_tech_stack_3' => null,
                'preferred_skills_detail_3' => null,
                'preferred_tech_stack_4' => null,
                'preferred_skills_detail_4' => null,
                'preferred_tech_stack_5' => null,
                'preferred_skills_detail_5' => null,

                // 勤務条件
                'work_location' => 'フルリモート',
                'employment_type' => 'リモート可',
                'working_hours' => '9:30～18:30',
                'start_date' => '即日～、2月～、3月～（3月31日までに参画可能な方）',

                // 条件
                'age' => '50代まで',
                'foreign_nationality' => false,
                'salary' => '95万円以上',
                'adjusted_salary' => '85万円以上',
                'time_adjustment' => '140h～180h',
                'payment_terms' => '30日',
                'dress_code' => '自由',
                'number_of_positions' => '複数名', // 複数名
                'contract' => '業務委託',
                'business_flow' => '貴社1社下まで',
                'interview_count' => 1,
                'interview_method' => null,
                'pc_provided' => '有（PC郵送発送可）',

                // 主な開発環境
                'main_development_environment' => json_encode([
                    '言語' => ['Ruby', 'TypeScript'],
                    'フレームワーク' => ['Ruby on Rails'],
                    'データベース' => ['MySQL'],
                    'インフラ' => ['AWS（ALB、Fargate、Aurora、S3、Lambda、CloudFront、ElastiCache、WAF）'],
                    'その他' => ['Slack', 'Google Meet', 'GitHub'],
                    '開発手法' => ['アジャイル開発']
                ]),

                'notes' => 'フルリモートでの勤務が可能。顧客課題に向き合える開発環境で、サービスを通じた支援が可能。',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'project_name' => 'エンジニア（C#/React）',
                'email_sender' => 'デアリップ株式会社 / 大谷 風',
                'email_received_at' => Carbon::create(2025, 1, 29, 17, 14, 0),
                'days_until_deadline' => 5,
                'project_deadline' => Carbon::create(2025, 2, 5, 17, 14, 0),
                'job_description' => 'C#およびReactを用いた製造業向け共通マスタ管理システムの基本設計を担当。主な業務は基本設計書の作成およびアーキテクチャ設計。Azure環境下でのシステム開発に携わる。',

                // 必須スキル
                'required_tech_stack_1' => '基本設計',
                'required_skills_detail_1' => json_encode(['基本設計書の作成経験']),
                'required_tech_stack_2' => 'C#',
                'required_skills_detail_2' => json_encode(['C#を用いたシステム開発経験']),
                'required_tech_stack_3' => 'React.js',
                'required_skills_detail_3' => json_encode(['シングルページアーキテクチャでの開発経験']),
                'required_tech_stack_4' => 'Azure',
                'required_skills_detail_4' => json_encode(['Azure環境での開発経験']),
                'required_tech_stack_5' => '日本語',
                'required_skills_detail_5' => json_encode(['ネイティブレベル（打ち合わせ・ドキュメント作成のため）']),

                // 歓迎スキル
                'preferred_tech_stack_1' => '製造業の知見',
                'preferred_skills_detail_1' => json_encode(['製造業向けシステムの知識・経験']),
                'preferred_tech_stack_2' => 'ウォーターフォール開発',
                'preferred_skills_detail_2' => json_encode(['ウォーターフォール開発経験']),
                'preferred_tech_stack_3' => '英語',
                'preferred_skills_detail_3' => json_encode(['ビジネスレベルの英語（オフショア開発とのやり取りが可能な方）']),
                'preferred_tech_stack_4' => null,
                'preferred_skills_detail_4' => null,
                'preferred_tech_stack_5' => null,
                'preferred_skills_detail_5' => null,

                // 勤務条件
                'work_location' => '基本リモート（PC受け取り・返却時は六本木一丁目のオフィス出社）',
                'employment_type' => 'リモート可',
                'working_hours' => null,
                'start_date' => '即日～2025年3月31日（延長の可能性あり）',

                // 条件
                'age' => '不問',
                'foreign_nationality' => true,
                'salary' => '～130万円',
                'adjusted_salary' => '～120万円',
                'time_adjustment' => '160h±30h',
                'payment_terms' => null,
                'dress_code' => null,
                'number_of_positions' => '1名',
                'contract' => '業務委託',
                'business_flow' => '貴社社員まで（個人事業主は上位会社と直接契約可能な場合のみ可）',
                'interview_count' => 1,
                'interview_method' => 'オンライン',
                'pc_provided' => '有',

                // 主な開発環境
                'main_development_environment' => json_encode([
                    '言語' => ['C#', 'React.js'],
                    'クラウド' => ['Azure'],
                    'アーキテクチャ' => ['シングルページアーキテクチャ']
                ]),

                'notes' => '業務量に応じた精算制度あり（160h±30h）。貸与PCの受け取り・返却時にオフィスへの出社が必要。オフショア開発との連携があるため、英語スキルがある方は歓迎。',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];

        DB::table('projects')->insert($mail);
    }
}
