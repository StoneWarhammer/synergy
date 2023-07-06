<?php

namespace App\Console\Commands;

use App\Models\Event;
use Illuminate\Console\Command;

class DeleteEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Event::where('end_time','<=', now()->toDateTimeString())->update([
            'visible' => 'no',
        ]);
    }
}
