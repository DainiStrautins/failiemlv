<?php

use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscriptions')->insert([
            ['id'=>1,'name'=>'Basic','price'=>'Free','body'=>'Free version, mailable and notification support'],
            ['id'=>2,'name'=>'Business','price'=>'$10','body'=>'Business version, mailable and notification support'],
            ['id'=>3,'name'=>'Pro','price'=>'$20','body'=>'Pro version, mailable and notification support and soon more...'],
            ['id'=>4,'name'=>'Premium','price'=>'$100','body'=>'Premium version, mailable and notification support and soon more...'],
            ['id'=>5,'name'=>'Enterprise','price'=>'$200','body'=>'Enterprise version, contact for more information'],
        ]);
    }
}
