<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Note as Note;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */

        // Create 50 notes
        Note::factory(50)->create();
        // Create 50 notes
        $this->call(NoteSeeder::class);
    }
}
