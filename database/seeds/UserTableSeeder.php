<?php 

Class UserTableSeeder extends Seeder
{
	public function run()
	{
		foreach ($user as $user => $feature) {
			
			$user->save();
		}
	}
}


 ?>