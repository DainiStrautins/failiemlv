<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Upload;

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
        //console this to run it -> php artisan command:DeleteRecord
        $users = Upload::all();
        foreach($users as $user)
        {
            $oldest = Upload::oldest('created_at')->pluck('created_at')->first();
            $user_id = Upload::oldest('created_at')->pluck('user_id')->first();
            $users_upload_id = Upload::oldest('created_at')->pluck('id')->first();
            $filename = Upload::oldest('created_at')->pluck('file')->first();


            if (now()->diffInDays($oldest) > 7)
            {
                Upload::where('created_at',$oldest)->first()->delete();
                dd($oldest,'User id:'.$user_id,'User upload id: '.$users_upload_id,' Deleted old record'.$filename.' This many days old:'.now()->diffInDays($oldest));
            }else {
                dd('Nothing done');
            }

        }

    }
}
