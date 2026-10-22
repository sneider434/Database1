<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Attendee;
use App\Models\Event;
use App\Models\Registration;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory()->create([
          //  'name' => 'Test User',
           // 'email' => 'test@example.com',
       // ]);
        Attendee::factory(20)->create();
        Event::factory(20)->create();
        Registration::factory(200)->create();
    }
}
