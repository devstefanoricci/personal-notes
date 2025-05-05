<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Note as Note;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed TaskSeeder
     */
    public function run(): void
    {
        Note::factory(50)->create();
    }
}
