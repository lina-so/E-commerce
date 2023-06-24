<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->delete();

        $bgs = ['Small', 'Medium', 'Large', 'Extra_large', 'XXL', 'XXXL'];

        foreach($bgs as  $bg){
            Size::create(['size' => $bg]);
        }
    }
}
