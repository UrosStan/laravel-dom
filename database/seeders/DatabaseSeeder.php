<?php

namespace Database\Seeders;

use App\Models\Skije;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;

use function PHPSTORM_META\type;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Type::truncate();
        Skije::truncate();
        User::truncate();

        $user1=User::factory()->create();
        $user2=User::factory()->create();
        

        $type1=Type::create(['name'=>"Race"]);
        $type2=Type::create(['name'=>"Freestyle"]);
        $type3=Type::create(['name'=>"Allround"]);


        $skije1=Skije::create([
            'name'=>'Fischer RC4',
            'description'=>'Skija koja svoje najbolje performanse pruza na tvrdim uredjenim stazama',
            'price'=>650,
            'user_id'=>$user1->id,
            'type_id'=>$type1->id
        ]);

        $skije2=Skije::create([
            'name'=>'Elan Amphibio',
            'description'=>'Skija za sve vremenske uslove',
            'price'=>520,
            'user_id'=>$user2->id,
            'type_id'=>$type3->id
        ]);

        $skije3=Skije::create([
            'name'=>'Atomic Redster',
            'description'=>'Skija za dubok sneg i freestyle skijanje',
            'price'=>560,
            'user_id'=>$user1->id,
            'type_id'=>$type2->id
        ]);

        $skije4=Skije::create([
            'name'=>'Rossignol Cobra',
            'description'=>'Skija za pocetnike',
            'price'=>210,
            'user_id'=>$user2->id,
            'type_id'=>$type3->id
        ]);

        $skije4=Skije::create([
            'name'=>'Elan SLX',
            'description'=>'Skija za profesionalce',
            'price'=>620,
            'user_id'=>$user2->id,
            'type_id'=>$type1->id
        ]);
    }
}
