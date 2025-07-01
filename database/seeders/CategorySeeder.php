<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'ATMEŽOŠANA',
            'CELMU IZŅEMŠANA, UTILIZĀCIJA',
            'KOKSNES UN APAUGUMA IZZĀĢĒŠANA',
            'ARBORISTU PAKALPOJUMI',
            'MĒRNIEKU PAKALPOJUMI',
            'MEŽA IEAUDZĒŠANA, STĀDI',
            'ZEMES RAKŠANAS DARBI',
            'SMILTS, GRANTS, MELNZEME',
            'RĪKSTNIEKS, FEN ŠUI, CITI PAKALPOJUMI',
            'KOMPLEKSAIS PAKALPOJUMS',
        ];

        // foreach ($categories as $name) {
        //     Category::create([
        //         'name' => $name,
        //         'description' => null,
        //     ]);
        // }

        foreach ($categories as $name) {
            Category::firstOrCreate(['name' => $name], ['description' => null]);
        }
    }
}
