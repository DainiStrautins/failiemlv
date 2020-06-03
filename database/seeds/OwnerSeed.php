<?php

use Illuminate\Database\Seeder;

class OwnerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id'=>1,
                'name'=>'Dainis',
                'email'=>'strautinsdainis@gmail.com',
                'email_verified_at'=>now(),
                'password' => '$2y$10$kynSybdqrJiOAuIw9hQnGu5jIEo0NN5vzFHNt8Vg/wA9rWpK9LHTu', // password
                'remember_token' => Str::random(10),
            ]
        ]);
        DB::table('role_user')->insert([
            [
                'id'=>1,
                'user_id'=>1,
                'role_id'=>1,
            ]
        ]);
    }
}
