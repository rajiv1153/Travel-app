<?php

use App\Contact;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        User::create(
            [
                'username' => 'traveladmin',
                'password' => Hash::make('travel123'),
            ]);

        Contact::create(

            [
                'name'    => 'Your name',
                'email'   => 'youremail@email.com',
                'phone'   => '9811111111,980111111',
                'address' => 'myaddress,city,whatever',
            ]
        );
    }
}
