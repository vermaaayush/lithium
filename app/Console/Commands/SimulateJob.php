<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
class SimulateJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:simulate-job';

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
        $response = Http::get('http://127.0.0.1:8000/run_botx');
        
        if ($response->successful()) {
            \Log::info('Simulated job executed successfully at ' . now());
        } else {
            \Log::error('Failed to execute simulated job');
        }

        sleep(3);
        $this->call('simulate:job');
    }
}
