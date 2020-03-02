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

            $latest = Upload::latest('created_at')->pluck('created_at')->first();
            $oldest = Upload::oldest('created_at')->pluck('created_at')->first();
            $filename = Upload::oldest('created_at')->pluck('file')->first();
            if (now()->diffInMonths($latest) > 3) {
                $Upload = Upload::where('user_id',$user->user_id)->delete();
                dd($latest,'Deleted all records because of:',$filename);
            }

            if (now()->diffInDays($oldest) > 7) {
                $Upload = Upload::where('created_at',$oldest)->first()->delete();
                dd($oldest,'Deleted old record, this many days old:',now()->diffInDays($oldest),$filename);
            }else {
                dd('Nothing done');
                var_dump($Upload);
            }

        }

    }
}
