<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Project;
use Carbon\Carbon;

class DeleteExpiredProjects extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-expired-projects';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '期限切れのプロジェクトを削除する';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // 現在の日付
        $today = Carbon::today();

        // 期限を過ぎたプロジェクトを削除
        $deleted = Project::where('project_deadline', '<', $today)->delete();

        // 結果を出力
        $this->info("$deleted 件の期限切れプロジェクトを削除しました。");
    }
}
