<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Smartphone;

class SmartphoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(database_path('data/db.json'));
        $data = json_decode($json, true)['smartphones'];

        foreach ($data as $smartphone) {
            Smartphone::create([
                'nom' => $smartphone['nom'],
                'marque' => $smartphone['marque'],
                'description' => $smartphone['description'],
                'prix' => $smartphone['prix'],
                'photo' => $smartphone['photo'],
                'ram' => $smartphone['ram'],
                'rom' => $smartphone['rom'],
                'ecran' => $smartphone['ecran'],
                'couleurs' => json_encode($smartphone['couleurs']),
            ]);
        }
    }
}
