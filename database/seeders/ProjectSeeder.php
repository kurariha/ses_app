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
                'project_name' => 'Goエンジニア（Go）',
                'email_sender' => '株式会社ACWEB / 清水 健斗',
                'email_received_at' => Carbon::create(2025, 1, 29, 15, 21, 0),
                'days_until_deadline' => 5,
                'project_deadline' => Carbon::create(2025, 2, 5, 15, 21, 0),
                'job_description' => 'モバイルオーダーシステムのバックエンド開発を担当。既存システムの機能追加を中心に開発を行う。営業・企画・デザイン部門との連携を意識しながら、能動的に開発を進める。',

                // 必須スキル
                'required_tech_stack_1' => 'バックエンド開発',
                'required_skills_detail_1' => '言語不問でのバックエンド開発経験（5年以上）',
                'required_tech_stack_2' => 'Go',
                'required_skills_detail_2' => 'Goでの開発経験（2年以上）',
                'required_tech_stack_3' => null,
                'required_skills_detail_3' => null,
                'required_tech_stack_4' => null,
                'required_skills_detail_4' => null,
                'required_tech_stack_5' => null,
                'required_skills_detail_5' => null,

                // 歓迎スキル
                'preferred_tech_stack_1' => 'AWS',
                'preferred_skills_detail_1' => 'AWS環境下での開発経験',
                'preferred_tech_stack_2' => 'アーキテクチャ設計',
                'preferred_skills_detail_2' => 'アーキテクトの知見',
                'preferred_tech_stack_3' => null,
                'preferred_skills_detail_3' => null,
                'preferred_tech_stack_4' => null,
                'preferred_skills_detail_4' => null,
                'preferred_tech_stack_5' => null,
                'preferred_skills_detail_5' => null,

                // 勤務条件
                'work_location' => 'フルリモート（地方からの参画も可能）',
                'employment_type' => 'リモート可',
                'working_hours' => '9:00～18:00',
                'start_date' => '2月 or 3月～長期',

                // 条件
                'age' => '28～35歳',
                'foreign_nationality' => null,
                'salary' => '～78万円',
                'adjusted_salary' => '～68万円',
                'time_adjustment' => '140h～180h',
                'payment_terms' => '35日',
                'dress_code' => null,
                'number_of_positions' => '1名',
                'contract' => '業務委託',
                'business_flow' => 'エンド → 弊社',
                'interview_count' => 1,
                'interview_method' => null,
                'pc_provided' => null,

                // 主な開発環境
                'main_development_environment' =>
                "言語: Go \n
                    クラウド: AWS \n
                    開発手法: NULL",

                'notes' => '現在、弊社から15名が参画中。貴社が1社先の場合、支援費にて対応。',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
                'project_name' => 'Rubyエンジニア（Ruby on Rails / React）',
                'email_sender' => '株式会社ACWEB / 千田 夢カリシ',
                'email_received_at' => Carbon::create(2025, 1, 29, 12, 5, 0),
                'days_until_deadline' => 5,
                'project_deadline' => Carbon::create(2025, 2, 5, 12, 5, 0),
                'job_description' => '物流向けSaaSプロダクトのバックエンド開発。Ruby on Railsで構築しているAPIサーバーの機能追加・改善。Reactで構築しているSPAアプリの機能追加・改善。DB設計、チューニング。希望に応じてAWSを使用したインフラ構築業務やCI/CDの構築も担当。',

                // 必須スキル
                'required_tech_stack_1' => 'Ruby on Rails',
                'required_skills_detail_1' => 'Ruby on Railsを用いた開発経験10年以上',
                'required_tech_stack_2' => null,
                'required_skills_detail_2' => null,
                'required_tech_stack_3' => null,
                'required_skills_detail_3' => null,
                'required_tech_stack_4' => null,
                'required_skills_detail_4' => null,
                'required_tech_stack_5' => null,
                'required_skills_detail_5' => null,

                // 歓迎スキル
                'preferred_tech_stack_1' => 'React',
                'preferred_skills_detail_1' => 'Reactを用いた開発経験5年以上',
                'preferred_tech_stack_2' => null,
                'preferred_skills_detail_2' => null,
                'preferred_tech_stack_3' => null,
                'preferred_skills_detail_3' => null,
                'preferred_tech_stack_4' => null,
                'preferred_skills_detail_4' => null,
                'preferred_tech_stack_5' => null,
                'preferred_skills_detail_5' => null,

                // 勤務条件
                'work_location' => 'フルリモート（初日から）',
                'employment_type' => 'リモート可',
                'working_hours' => '10:00～19:00（フレックス対応可能）',
                'start_date' => '11月～',

                // 条件
                'age' => '不問',
                'foreign_nationality' => null,
                'salary' => '90万円',
                'adjusted_salary' => '80万円',
                'time_adjustment' => '140h～180h',
                'payment_terms' => 'NULL',
                'dress_code' => '私服',
                'number_of_positions' => '1名',
                'contract' => '業務委託',
                'business_flow' => 'エンド → 弊社',
                'interview_count' => 1,
                'interview_method' => null,
                'pc_provided' => null,

                // 主な開発環境
                'main_development_environment' =>
                "言語: Ruby on Rails、React \n
                データベース: NULL \n
                インフラ: AWS \n
                その他: NULL",

                'notes' => '物流向けSaaSを展開するスタートアップでの開発案件。フルリモート可。',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'project_name' => 'UI/UXデザイナー',
                'email_sender' => '株式会社ACWEB / 松田 広志',
                'email_received_at' => Carbon::create(2025, 1, 29, 12, 10, 0),
                'days_until_deadline' => 5,
                'project_deadline' => Carbon::create(2025, 2, 5, 12, 10, 0),
                'job_description' => 'タレントマネジメントシステムを提供する事業会社で、UI/UXデザイナーを募集。UIデザインの作成、ユーザー調査・設計、PO方針や社内意見を反映したデザイン企画を担当。より使いやすいサービスへと磨き上げる業務に携わる。',

                // 必須スキル
                'required_tech_stack_1' => 'UI/UXデザイン',
                'required_skills_detail_1' => 'UI/UXデザインの経験3年以上',
                'required_tech_stack_2' => 'WEBデザイン',
                'required_skills_detail_2' => 'WEBデザインの経験6年以上',
                'required_tech_stack_3' => 'Web標準規格/仕様',
                'required_skills_detail_3' => 'Web標準規格/仕様に関する知見',
                'required_tech_stack_4' => null,
                'required_skills_detail_4' => null,
                'required_tech_stack_5' => null,
                'required_skills_detail_5' => null,

                // 歓迎スキル
                'preferred_tech_stack_1' => 'デザインシステム運用',
                'preferred_skills_detail_1' => 'デザインシステムを取り入れたデザイン運用経験',
                'preferred_tech_stack_2' => null,
                'preferred_skills_detail_2' => null,
                'preferred_tech_stack_3' => null,
                'preferred_skills_detail_3' => null,
                'preferred_tech_stack_4' => null,
                'preferred_skills_detail_4' => null,
                'preferred_tech_stack_5' => null,
                'preferred_skills_detail_5' => null,

                // 勤務条件
                'work_location' => 'フルリモート（渋谷）※地方OK',
                'employment_type' => 'リモート可',
                'working_hours' => '9:30～18:30',
                'start_date' => '2月～',

                // 条件
                'age' => '不問',
                'foreign_nationality' => false,
                'salary' => '75万～85万',
                'adjusted_salary' => '65万～75万',
                'time_adjustment' => '140h～180h',
                'payment_terms' => 'NULL',
                'dress_code' => '自由',
                'number_of_positions' => '1名',
                'contract' => '業務委託',
                'business_flow' => 'エンド → 弊社',
                'interview_count' => 1,
                'interview_method' => null,
                'pc_provided' => null,

                // 主な開発環境
                'main_development_environment' =>
                "デザインツール: NULL \n
                フレームワーク: NULL \n
                その他: NULL",

                'notes' => '月の残業時間が2時間未満と超安定稼働の案件。弊社から3名参画中（別PJ含む）。',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'project_name' => 'C#エンジニア（運用保守）',
                'email_sender' => '株式会社D-Standing / 追川 健・池田 一晟',
                'email_received_at' => Carbon::create(2025, 1, 29, 15, 30, 0),
                'days_until_deadline' => 3,
                'project_deadline' => Carbon::create(2025, 2, 3, 15, 30, 0),
                'job_description' => 'ECサイト運営企業のシステム運用保守におけるトラブルシューティング業務を担当。ECサイトの運用/保守、障害対応、外部ベンダーとのディレクションを実施。',

                // 必須スキル
                'required_tech_stack_1' => 'システム開発',
                'required_skills_detail_1' => 'システム開発の経験5年以上（言語問わず）',
                'required_tech_stack_2' => 'C#',
                'required_skills_detail_2' => 'C#での開発経験',
                'required_tech_stack_3' => null,
                'required_skills_detail_3' => null,
                'required_tech_stack_4' => null,
                'required_skills_detail_4' => null,
                'required_tech_stack_5' => null,
                'required_skills_detail_5' => null,

                // 歓迎スキル（なし）
                'preferred_tech_stack_1' => null,
                'preferred_skills_detail_1' => null,
                'preferred_tech_stack_2' => null,
                'preferred_skills_detail_2' => null,
                'preferred_tech_stack_3' => null,
                'preferred_skills_detail_3' => null,
                'preferred_tech_stack_4' => null,
                'preferred_skills_detail_4' => null,
                'preferred_tech_stack_5' => null,
                'preferred_skills_detail_5' => null,

                // 勤務条件
                'work_location' => 'リモート併用（週3出社【新宿駅】・週2リモート）',
                'employment_type' => 'リモート可',
                'working_hours' => '9:45～18:45',
                'start_date' => '即日',

                // 条件
                'age' => '50代まで',
                'foreign_nationality' => false,
                'salary' => '90万円以上',
                'adjusted_salary' => '80万円以上',
                'time_adjustment' => '140h～180h',
                'payment_terms' => '30日',
                'dress_code' => 'オフィスカジュアル（ジャケットあり）',
                'number_of_positions' => '1名',
                'contract' => '業務委託',
                'business_flow' => '貴社まで',
                'interview_count' => 2,
                'interview_method' => 'オンライン（弊社）、対面（企業様）',
                'pc_provided' => '有',

                // 主な開発環境
                'main_development_environment' =>
                "言語: VB.NET、C#、HTML \n
                フレームワーク: PowerShell \n
                その他: WSH、WordPress、Google Analytics、Google Search Console、Google Cloud Platform、Google Apps Script",

                'notes' => 'エラー削減を目的とした体制強化のための募集。利用者の反応をダイレクトに感じられる案件。',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'project_name' => 'Webエンジニア（Java）',
                'email_sender' => '株式会社D-Standing / 廣茂 大地',
                'email_received_at' => Carbon::create(2025, 1, 29, 15, 00, 0),
                'days_until_deadline' => 3,
                'project_deadline' => Carbon::create(2025, 2, 3, 15, 00, 0),
                'job_description' => '大手動画配信サービス運営企業の通販事業部にて、リプレイスプロジェクトの開発を担当。Java、C#、TypeScript、Goなどを活用し、フルスタックエンジニアとして機能追加・改善を行う。',

                // 必須スキル
                'required_tech_stack_1' => 'Java',
                'required_skills_detail_1' => 'Java、C#、TypeScript、Goのいずれかを用いた開発経験3年以上',
                'required_tech_stack_2' => '対応力',
                'required_skills_detail_2' => 'アダルトコンテンツに対応できる方',
                'required_tech_stack_3' => null,
                'required_skills_detail_3' => null,
                'required_tech_stack_4' => null,
                'required_skills_detail_4' => null,
                'required_tech_stack_5' => null,
                'required_skills_detail_5' => null,

                // 歓迎スキル
                'preferred_tech_stack_1' => 'Next.js',
                'preferred_skills_detail_1' => 'Next.jsを用いた開発経験',
                'preferred_tech_stack_2' => 'Redis',
                'preferred_skills_detail_2' => 'Redisの利用経験',
                'preferred_tech_stack_3' => 'CI/CD',
                'preferred_skills_detail_3' => 'Github Actionsの利用経験',
                'preferred_tech_stack_4' => null,
                'preferred_skills_detail_4' => null,
                'preferred_tech_stack_5' => null,
                'preferred_skills_detail_5' => null,

                // 勤務条件
                'work_location' => 'フルリモート',
                'employment_type' => 'リモート可',
                'working_hours' => '10:00～19:00（休憩1時間）',
                'start_date' => '2月～／3月～',

                // 条件
                'age' => '20代中盤～40歳まで',
                'foreign_nationality' => false,
                'salary' => '100万円以下',
                'adjusted_salary' => '90万円以下',
                'time_adjustment' => '140h～180h',
                'payment_terms' => '30日',
                'dress_code' => 'NULL',
                'number_of_positions' => '1名',
                'contract' => '業務委託',
                'business_flow' => '貴社まで（プロパー及びフリーランス可）',
                'interview_count' => 1,
                'interview_method' => null,
                'pc_provided' => '有',

                // 主な開発環境
                'main_development_environment' =>
                "言語: Next.js、Go \n
                インフラ: AWS（Aurora/MySQL、Redis、BigQuery） \n
                ツール: DataDog、New Relic",

                'notes' => '国内最大規模の動画配信サービスでの開発経験を積むことができ、大規模リプレイスプロジェクトの立ち上げに関わることができる。',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'project_name' => 'SFA・CRMシステム開発エンジニア（PHP/Laravel, Vue.js, React.js）',
                'email_sender' => '株式会社テクノヴァース / 高橋 和也',
                'email_received_at' => Carbon::create(2025, 1, 29, 19, 00, 0),
                'days_until_deadline' => 5,
                'project_deadline' => Carbon::create(2025, 2, 5, 19, 00, 0),
                'job_description' => '人材サービス企業の社内向けSFA・CRMシステムの開発業務を担当。基本設計、機能改修、新規機能開発、テスト工程、外部システム連携などを行う。大規模システムのリプレイスおよび機能拡張プロジェクト。',

                // 必須スキル
                'required_tech_stack_1' => 'PHP（Laravel）',
                'required_skills_detail_1' => 'PHP（Laravel）を使用した開発経験3年以上',
                'required_tech_stack_2' => 'フロントエンド開発',
                'required_skills_detail_2' => 'Vue.jsやReact.jsなどモダンなフレームワークでの開発経験',
                'required_tech_stack_3' => 'システム開発',
                'required_skills_detail_3' => '基本設計からテストまでの実務経験',
                'required_tech_stack_4' => 'リーダー経験',
                'required_skills_detail_4' => '3名以上のチームでのリーダー経験（1年以上）',
                'required_tech_stack_5' => '事業会社での開発経験',
                'required_skills_detail_5' => '同現場で1年以上の就業経験',

                // 歓迎スキル
                'preferred_tech_stack_1' => '要件定義',
                'preferred_skills_detail_1' => '要件定義の実務経験',
                'preferred_tech_stack_2' => '外部システム連携',
                'preferred_skills_detail_2' => '外部システム連携の開発経験',
                'preferred_tech_stack_3' => 'SFA/CRMシステム',
                'preferred_skills_detail_3' => 'SFAやCRMなど、同種のシステム開発経験',
                'preferred_tech_stack_4' => null,
                'preferred_skills_detail_4' => null,
                'preferred_tech_stack_5' => null,
                'preferred_skills_detail_5' => null,

                // 勤務条件
                'work_location' => '東京都赤坂（週3日出社、週2日リモートワーク）',
                'employment_type' => 'リモート併用',
                'working_hours' => '10:00～19:00（フレックスタイム制：コアタイム11:00～16:00）',
                'start_date' => '即日または2025年2月～（長期予定）',

                // 条件
                'age' => '45歳以下',
                'foreign_nationality' => true,
                'salary' => '～60万円',
                'adjusted_salary' => '～50万円',
                'time_adjustment' => '140h～180h',
                'payment_terms' => '35日',
                'dress_code' => null,
                'number_of_positions' => '1名',
                'contract' => '業務委託（準委任）',
                'business_flow' => '貴社まで',
                'interview_count' => 2,
                'interview_method' => null,
                'pc_provided' => null,

                // 主な開発環境
                'main_development_environment' =>
                "言語: PHP（Laravel）, JavaScript \n
                フレームワーク: Vue.js, React.js \n
                データベース: MySQL \n
                インフラ: AWS \n
                その他: Git, Slack, Jira \n
                開発手法: アジャイル開発",

                'notes' => 'SFA・CRMシステムの開発に携われる長期案件。出社とリモートワークの併用が可能。開発チームのリーダー経験を活かせる環境。',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'project_name' => '小売業向けシステムリプレイスエンジニア（Java）',
                'email_sender' => '株式会社テクノヴァース / 高橋 和也',
                'email_received_at' => Carbon::create(2025, 1, 29, 18, 00, 0),
                'days_until_deadline' => 5,
                'project_deadline' => Carbon::create(2025, 2, 5, 18, 00, 0),
                'job_description' => '小売業のシステムリプレイスプロジェクトにおいて、現行システムをSpring Bootへ移管する開発業務を担当。複雑なソースコードの理解と新アーキテクチャ（SPA+API）への適応、非機能要件（性能、セキュリティ）を考慮したコード作成。',

                // 必須スキル
                'required_tech_stack_1' => 'Java',
                'required_skills_detail_1' => 'Javaを用いた開発経験',
                'required_tech_stack_2' => 'ITアーキテクト',
                'required_skills_detail_2' => 'ITアーキテクトとしての経験',
                'required_tech_stack_3' => 'コードレビュー',
                'required_skills_detail_3' => 'ソースコードレビューの経験',
                'required_tech_stack_4' => null,
                'required_skills_detail_4' => null,
                'required_tech_stack_5' => null,
                'required_skills_detail_5' => null,

                // 歓迎スキル
                'preferred_tech_stack_1' => '小売業の知見',
                'preferred_skills_detail_1' => '小売業、特にスーパーマーケットの業務知識',
                'preferred_tech_stack_2' => null,
                'preferred_skills_detail_2' => null,
                'preferred_tech_stack_3' => null,
                'preferred_skills_detail_3' => null,
                'preferred_tech_stack_4' => null,
                'preferred_skills_detail_4' => null,
                'preferred_tech_stack_5' => null,
                'preferred_skills_detail_5' => null,

                // 勤務条件
                'work_location' => '東京都茅場町（週2回出社、週3日リモートワーク）',
                'employment_type' => 'リモート併用',
                'working_hours' => '10:00～19:00',
                'start_date' => '即日～2025年12月31日（延長可能性あり）',

                // 条件
                'age' => '45歳以下',
                'foreign_nationality' => false,
                'salary' => '50万円～60万円',
                'adjusted_salary' => '40万円～50万円',
                'time_adjustment' => '140h～180h',
                'payment_terms' => '35日',
                'dress_code' => null,
                'number_of_positions' => '2名',
                'contract' => '業務委託（準委任）',
                'business_flow' => '貴社まで',
                'interview_count' => 2,
                'interview_method' => null,
                'pc_provided' => null,

                // 主な開発環境
                'main_development_environment' =>
                "言語: Java \n
                フレームワーク: Spring Boot \n
                アーキテクチャ: SPA+API \n
                その他: Git, AWS, CI/CD環境 \n
                開発手法: アジャイル開発",

                'notes' => '小売業の業務知識を活かせる案件。システムリプレイスの経験を積みたい方におすすめ。',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'project_name' => 'Salesforceエンジニア（Apex）',
                'email_sender' => 'フォアフロント株式会社 / 麻生達也',
                'email_received_at' => Carbon::create(2025, 1, 29, 17, 30, 0),
                'days_until_deadline' => 5,
                'project_deadline' => Carbon::create(2025, 2, 5, 17, 30, 0),
                'job_description' => 'Salesforce Apex開発支援業務。標準機能のカスタマイズおよび追加機能の設計・開発を担当。HTML/CSS/Javascriptを用いた画面開発。顧客との折衝・説明業務も含む。',

                // 必須スキル
                'required_tech_stack_1' => 'Salesforce Apex',
                'required_skills_detail_1' => 'Salesforce Apex設計・開発が1人称でできる（経験2年以上）',
                'required_tech_stack_2' => 'Salesforceカスタマイズ',
                'required_skills_detail_2' => '標準機能だけでなく追加機能の設計・開発経験',
                'required_tech_stack_3' => 'HTML/CSS/JavaScript',
                'required_skills_detail_3' => '画面開発経験',
                'required_tech_stack_4' => '顧客折衝',
                'required_skills_detail_4' => '顧客と直接会話・説明ができる能力',
                'required_tech_stack_5' => null,
                'required_skills_detail_5' => null,

                // 歓迎スキル
                'preferred_tech_stack_1' => 'リーダー経験',
                'preferred_skills_detail_1' => '開発プロジェクトでのリーダー経験',
                'preferred_tech_stack_2' => null,
                'preferred_skills_detail_2' => null,
                'preferred_tech_stack_3' => null,
                'preferred_skills_detail_3' => null,
                'preferred_tech_stack_4' => null,
                'preferred_skills_detail_4' => null,
                'preferred_tech_stack_5' => null,
                'preferred_skills_detail_5' => null,

                // 勤務条件
                'work_location' => 'フルリモート',
                'employment_type' => 'リモート可',
                'working_hours' => null,
                'start_date' => '2025年3月開始',

                // 条件
                'age' => null,
                'foreign_nationality' => false,
                'salary' => '75万円（税別）',
                'adjusted_salary' => '65万円（税別）',
                'time_adjustment' => null,
                'payment_terms' => null,
                'dress_code' => null,
                'number_of_positions' => '1名',
                'contract' => '業務委託（準委任）',
                'business_flow' => '貴社まで（個人可）',
                'interview_count' => 1,
                'interview_method' => null,
                'pc_provided' => null,

                // 主な開発環境
                'main_development_environment' =>
                "言語: Salesforce Apex, HTML, CSS, JavaScript \n
                その他: Salesforce標準機能、カスタム機能開発",

                'notes' => 'フルリモート案件。スキルによっては単価上振れの相談可能。',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'project_name' => 'SAPエンジニア（S/4HANA MMモジュール）',
                'email_sender' => '株式会社テクノヴァース / 高橋和也',
                'email_received_at' => Carbon::create(2025, 1, 29, 17, 20, 0),
                'days_until_deadline' => 5,
                'project_deadline' => Carbon::create(2025, 2, 5, 17, 20, 0),
                'job_description' => '官公庁向けSAP S/4HANA刷新プロジェクトにおけるMMモジュールの開発業務。設計から実装、IForExitのアドオン開発、基本設計書作成、テスト評価を担当。',

                // 必須スキル
                'required_tech_stack_1' => 'SAP MMモジュール',
                'required_skills_detail_1' => 'SAP MMモジュール開発経験',
                'required_tech_stack_2' => '基本設計',
                'required_skills_detail_2' => '基本設計の主担当経験',
                'required_tech_stack_3' => 'ABAP',
                'required_skills_detail_3' => 'ABAP開発の実装経験',
                'required_tech_stack_4' => null,
                'required_skills_detail_4' => null,
                'required_tech_stack_5' => null,
                'required_skills_detail_5' => null,

                // 歓迎スキル
                'preferred_tech_stack_1' => '要件定義',
                'preferred_skills_detail_1' => '要件定義経験',
                'preferred_tech_stack_2' => 'S/4HANA移行',
                'preferred_skills_detail_2' => 'S/4HANA移行経験',
                'preferred_tech_stack_3' => null,
                'preferred_skills_detail_3' => null,
                'preferred_tech_stack_4' => null,
                'preferred_skills_detail_4' => null,
                'preferred_tech_stack_5' => null,
                'preferred_skills_detail_5' => null,

                // 勤務条件
                'work_location' => '神奈川県川崎市（川崎駅周辺）',
                'employment_type' => '常駐（フル出社）',
                'working_hours' => '9:00～18:00',
                'start_date' => '即日～長期',

                // 条件
                'age' => '不問',
                'foreign_nationality' => false,
                'salary' => '80万円～85万円',
                'adjusted_salary' => '70万円～75万円',
                'time_adjustment' => '140h～180h',
                'payment_terms' => '35日',
                'dress_code' => null,
                'number_of_positions' => '1名',
                'contract' => '業務委託（準委任）',
                'business_flow' => '貴社まで',
                'interview_count' => 2,
                'interview_method' => null,
                'pc_provided' => null,

                // 主な開発環境
                'main_development_environment' =>
                "言語: SAP ABAP \n
                フレームワーク: SAP S/4HANA \n
                モジュール: MM, PM, TM \n
                その他: IForExit, アドオン開発",

                'notes' => '官公庁向けの長期プロジェクト。2026年カットオーバー予定。',
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ];

        DB::table('projects')->insert($mail);
    }
}
