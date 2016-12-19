<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Lens;

class LensUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users =[
            'ryan' => [1,2,3,],
            'jamal' => [1,2,3],
            'jill' => [3]
        ];

        foreach($users as $name => $lenses) {

            # First get the user
            $user = User::where('name','=',$name)->first();

            # Now loop through each lens for this user, adding the pivot
            foreach($lenses as $lensID) {
                $lens = Lens::where('id','=',$lensID)->first();

                # Connect this lens to this user
                $user->lenses()->save($lens);
            }

        }
    }
}
