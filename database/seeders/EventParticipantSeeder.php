<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventParticipant;
use App\Models\HeadOfFamily;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $headOfFamilies = HeadOfFamily::all();
        $events = Event::all();

        foreach ($headOfFamilies as $headOfFamily) {
            foreach ($events as $event) {
                EventParticipant::factory()->create([
                    'head_of_family_id' => $headOfFamily->id,
                    'event_id' => $event->id
                ]);
            }
        }
    }
}
