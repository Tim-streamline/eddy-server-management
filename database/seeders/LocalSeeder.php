<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class LocalSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $newUser = User::create([
            'name' => 'Tim',
            'email' => 'eversdijk@streamlineitsolutions.nl',
            'password' => bcrypt('server'),
        ]);

        $newTeam = new Team([
            'name' => 'Default Team',
            'personal_team' => true,
        ]);
        $newTeam->owner()->associate($newUser);
        $newTeam->save();

        $newUser->email_verified_at = now();
        $newUser->currentTeam()->associate($newTeam);
        $newUser->save();
    }
}
