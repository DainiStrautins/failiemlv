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
     */
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

        $users = Upload::all();
        foreach($users as $user)
        {
            $latest = Upload::latest('created_at')->pluck('created_at')->first();
            $oldest = Upload::oldest('created_at')->pluck('created_at')->first();
            if (now()->diffInDays($latest) > 14) {
                $Upload = Upload::where('user_id',$user->user_id)->delete();
                dd($Upload);
            }


            // needs to be fixed, šeit dzēš arā visus ierakstus vajag izdarīt tā lai tikai vienu !!
            if (now()->diffInDays($oldest) > 7) {
                $Upload = Upload::where('user_id',$user->user_id)->delete();
                dd('Deleted 7 days old record');
            }else {
                dd('Nothing done');
                var_dump($Upload);
            }

        }

    }
}
