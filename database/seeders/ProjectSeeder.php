<?php

namespace Database\Seeders;

use App\Models\Project;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

      

        $projectsData= [
            ["title"=>"Spotify Web",
            "content"=>"Un progetto di replica di Spotify con HTML e CSS ho riprodotto l'aspetto della popolare piattaforma di streaming musicale.",
            "url"=>"https://github.com/danieleinnamorato93/html-css-spotifyweb",
            
            ],
            ["title"=>"Boolando",
            "content"=>"Un progetto di replica del sito di Zalando, con l'uso di HTML/CSS.",
            "url"=>"https://github.com/danieleinnamorato93/html-css-boolando",
            
            ],
            ["title"=>"Vue-Boolzapp",
            "content"=>"Un progetto di replica dell'applicazione di whatsapp, mediante l'uso del framework Vue.Js",
            "url"=>"https://github.com/danieleinnamorato93/vue-boolzapp",
            
            ],
            ["title"=>"Js-Campominato-Dom",
            "content"=>"Mi sono divertito a ricreare il gioco del Campominato attraverso ll'utilizzo di Javascript.",
            "url"=>"https://github.com/danieleinnamorato93/js-campominato-dom",
            
            ],
            ["title"=>"Php-Badwords",
            "content"=>"Simulazione di un applicativo che permette di censurare qualsiasi parola si desideri, eseguito con PHP.",
            "url"=>"https://github.com/danieleinnamorato93/php-badwords",            
            ],

        ];
        $types= Type::all()->pluck("id");
        foreach ($projectsData as $project) {
            $newProject= new Project();
            $newProject->type_id = $faker->randomElement($types);
            $newProject->title = $project['title'];
            $newProject->content = $project['content'];
            $newProject->url = $project['url'];
            $newProject->save();

        }
       
    }
}
