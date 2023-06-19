<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('testimonials')->insert([
            [
                'id'=>1,
                'name' => "John Joseph Regalado",
                'message' => "excellent service, highly recommended! 👍👍👍",
                'rating' => 'Great!',
                'isApproved' => 'Yes'
            ],
            [
                'id'=>2,
                'name' => "Alma Manalo",
                'message' => "Satisfied customer sobra napasaya tatay ko,, highly recomended lalo na sa mga malalayo sa inyong mhal sa buhay.",
                'rating' => 'Great!',
                'isApproved' => 'Yes'
            ],
            [
                'id'=>3,
                'name' => "Rv Lhyn",
                'message' => "Satisfied customer here. Highly recommended❣️",
                'rating' => 'Great!',
                'isApproved' => 'Yes'
            ],
            [
                'id'=>4,
                'name' => "Julie Ampeloquio",
                'message' => "Very accommodating. Bilis magreply at mura lang. Bilis din mag upload ng pictures and videos. Galing galing ni Ms. Marianne mag host. Highly recommended sa mga gustong magpasurprise sa mga mahal nila sa buhay.",
                'rating' => 'Great!',
                'isApproved' => 'Yes'
            ],
            [
                'id'=>5,
                'name' => "Mj Hummingbird",
                'message' => "birthday surprises..
                dami nio po napapasaya..",
                'rating' => 'Great!',
                'isApproved' => 'Yes'
            ],
            [
                'id'=>6,
                'name' => "Zeth Dalde",
                'message' => "Ang saya Ng byenan ko. talagang wish granted.. kitang Kita sa kanya na sobrang sya nya. salamat po sa tulong nyo. Kudos po.",
                'rating' => 'Great!',
                'isApproved' => 'Yes'
            ],
        ]);
    }
}
