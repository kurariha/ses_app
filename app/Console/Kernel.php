<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Artisan コマンドを定義
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }

    /**
     * スケジュールタスクの登録
     */
    protected function schedule(Schedule $schedule)
    {
        // 毎日深夜にプロジェクトの期限切れデータを削除
        $schedule->command('projects:delete-expired')->daily();
    }
}
