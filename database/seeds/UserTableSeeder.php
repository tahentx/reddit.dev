<?php 

use Illuminate\Database\Seeder;

Class UserTableSeeder extends Seeder
{
	public function run() 
    {
        $this->fakeUsers();
    }
    
    protected function fakeUsers()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 10; $i++) {
            $user = new \App\User();
            $user->name = $faker->userName;
            $user->password = \Hash::make('vagrant');    
            $user->email = $faker->safeEmail;
            $user->save();
        }
    }
}


 ?>