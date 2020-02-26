<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Upload;
use Carbon\Carbon;

class DeleteRecord extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:deleterecord';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $Upload = Upload::whereDate('created_at', '<', Carbon::now()->subWeek())->delete();
        dd($Upload);
    }
}
