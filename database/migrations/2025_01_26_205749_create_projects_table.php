<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
        $table->id();
        $table->string('project_name'); // 案件名
        $table->string('email_sender'); // メール送信元
        $table->datetime('email_received_at'); // メール受信日時
        $table->integer('days_until_deadline'); // 案件期限までの日数
        $table->datetime('project_deadline'); // 案件期限
        $table->text('job_description'); // 業務内容

        // 必須スキル
        for ($i = 1; $i <= 5; $i++) {
            $table->string("required_tech_stack_$i")->nullable();
            $table->string("required_skills_detail_$i")->nullable();
        }

        // 歓迎スキル
        for ($i = 1; $i <= 5; $i++) {
            $table->string("preferred_tech_stack_$i")->nullable();
            $table->string("preferred_skills_detail_$i")->nullable();
        }

        // 勤務条件
        $table->string('work_location')->nullable(); // 就業場所
        $table->string('employment_type')->nullable(); // 就業形態
        $table->string('working_hours')->nullable(); // 就業時間
        $table->string('start_date')->nullable(); // 就業開始時期

        //条件
        $table->string('age')->nullable(); // 年齢
        $table->boolean('foreign_nationality')->nullable()->default(false); // 外国籍
        $table->string('salary'); // 金額
        $table->string('adjusted_salary'); // 調整後の金額
        $table->string('time_adjustment')->nullable(); // 精算幅
        $table->string('payment_terms')->nullable(); // 支払サイト
        $table->string('dress_code')->nullable(); // 服装
        $table->string('number_of_positions')->nullable(); // 募集人数
        $table->string('contract')->nullable(); // 契約
        $table->string('business_flow')->nullable(); // 商流
        $table->string('interview_count')->nullable(); // 面談回数
        $table->string('interview_method')->nullable(); // 面談方法
        $table->string('pc_provided')->nullable(); // PC貸与の有無
        $table->text('main_development_environment')->nullable(); // 主な開発環境
        $table->text('notes')->nullable(); // 補足
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
