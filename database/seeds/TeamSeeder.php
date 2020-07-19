<?php

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();

        $team = Team::create([
            'user_id' => $user->id,
            'name'    => 'Personal',
        ]);

        $team->addMember($user, 'owner');

        $user->update(['current_team_id' => $team->id]);

        $team->createAsStripeCustomer();

        $this->seedActivity($team);
    }

    private function seedActivity(Team $team): void
    {
        for ($i = 0; $i < 10; $i++) {
            activity()
                ->causedBy($team->owner)
                ->performedOn($team)
                ->log('Added tailwindui to the faustbrian/sazzy repository');
        }
    }
}
