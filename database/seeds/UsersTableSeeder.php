<?php

use App\Post;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->create([
            'name'  =>  'Nelson Rodriguez',
            'email' =>  'nelsonrod10@gmail.com',
            'password' => Hash::make('admin'),
        ]);

        Bouncer::assign('Admin')->to($user->id);
        
        factory(User::class,10)->create()->each(function($newUser){
            factory(Post::class,rand(5,20))->create([
                'user_id'   => $newUser->id
            ]);
        });
    }
}
