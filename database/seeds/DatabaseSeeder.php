<?php

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->create([
            'name'          => 'John Doe',
            'email'         => 'john@hey.com',
            'affiliate_tag' => 'john',
        ]);

        $team = Team::create([
            'user_id' => $user->id,
            'name'    => 'Personal',
        ]);

        $team->addMember($user, 'owner');

        $user->update(['current_team_id' => $team->id]);

        $team->createAsStripeCustomer();
    }
}
