<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            [
                'id'=> 1,

                'main'=> "Design your cake. Choose from our many flavors & decorative options. Agie's Cake will create the perfect custom cake for your special occasion.",
                
                'main_image'=> "storage/homepage/main.jpg",

                'about'=> "Agie's Cake shop officially had permit last May 4, 2020, however it began making cakes and sticky rice cakes in 2005. 
                           Agie’s cake are actually better known for 'sticky rice cake' Like puto, Kutsinta and Pichi-pichi. 
                           Year 2020 when there was a lockdown due to the pandemic, the owner decided to get permits and even 
                           Bureau of Internal Revenue (BIR) to expand and make the business legal. The name of the business 'Agie's cake' 
                           is from name of the owner of the shop Agie. She is the one who makes cakes and other products.",
                
                'about_image' => 'none',

                'owner' => 'Mariane Joy Peña',

                'contact_number' => '09487039430',

                'location' => 'Purok Marikina, Barangay Matuyatuya, Torrijos, Marinduque'
            ],
        ]);
    }
}
