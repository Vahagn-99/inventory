<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            "Համակարգիչ"
            , "Մոնիտոր"
            , "Բազմաֆ․ սարք"
            , "Թվ․ տեսաձ-գրիչ"
            , "Սվիչ-16"
            , "Web տեսախցիկ"
            , "TV-հեռուստաց․"
            , "Դյուրակիր համակարգիչ"
            , "Սվիչ-8"
            , "WiFi սարք /ռաութեր անլար"
            , "Տպիչ սարք"
            , "կախիչ հեռուստաց․"
            , "Մոնիտոր XVR-ի"
            , "Ինտերն.մուտքի սարք /2 սարք"
            , "Տպիչ /color"
            , "Սկաներ"
            , "Անվտ․ տեսախցիկ"
            , "UCOM -ստենդ,կահույք"
            , "UCOM ինտ․"
            , "Էկրան"
            , "Smart-գրատախտակ"
        ];

        foreach ($categories as $category) {
            Category::query()->create([
                'name' => $category
            ]);
        }
    }
}
