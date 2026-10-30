<?php

namespace Database\Seeders;

use App\Models\Vaccination;
use Illuminate\Database\Seeder;

class VaccinationSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'patient_name' => 'Baby Ana Lim',
                'purok' => 'Purok 2',
                'vaccine' => 'BCG',
                'dose' => '1st dose',
                'scheduled_at' => '2026-09-15',
                'status' => 'Done',
            ],

            [
                'patient_name' => 'Baby Miguel Santos',
                'purok' => 'Purok 4',
                'vaccine' => 'Pentavalent',
                'dose' => '2nd dose',
                'scheduled_at' => '2026-10-12',
                'status' => 'Overdue',
            ],

            [
                'patient_name' => 'Baby Kyla Ramos',
                'purok' => 'Purok 1',
                'vaccine' => 'OPV',
                'dose' => '3rd dose',
                'scheduled_at' => '2026-11-05',
                'status' => 'Scheduled',
            ],

            [
                'patient_name' => 'Jomar Villanueva',
                'purok' => 'Purok 5',
                'vaccine' => 'MMR',
                'dose' => '1st dose',
                'scheduled_at' => '2026-11-18',
                'status' => 'Scheduled',
            ],

            [
                'patient_name' => 'Lolo Ben Garcia',
                'purok' => 'Purok 3',
                'vaccine' => 'Anti-Flu',
                'dose' => 'Annual',
                'scheduled_at' => '2026-10-02',
                'status' => 'Done',
            ],

            // my chosen vaccine
            [
                'patient_name' => 'Baby Rhea Torres',
                'purok' => 'Purok 2',
                'vaccine' => 'Hepatitis B',
                'dose' => 'Booster',
                'scheduled_at' => '2026-10-25',
                'status' => 'Overdue',
            ],

            // birthday row: change MM-DD to your birthday
            [
                'patient_name' => 'Carlo Mendoza',
                'purok' => 'Purok 4',
                'vaccine' => 'Pentavalent',
                'dose' => '3rd dose',
                'scheduled_at' => '2026-07-15',
                'status' => 'Scheduled',
            ],
        ];

        foreach ($rows as $row) {
            Vaccination::create($row);
        }
    }
}
