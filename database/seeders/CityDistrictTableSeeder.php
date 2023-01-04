<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use App\Options;
use App\Category;
use App\Categorymeta;
use App\Models\Categoryrelation;
use App\Customizer;
use App\Media;
use App\Models\Mediapost;
use App\Meta;
use App\PostCategory;
use App\Models\Postcategoryoption;
use App\Models\Price;
use App\Models\Transaction;
use DB;
use App\Terms;
use App\Models\Categoryuser;

class CityDistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = array(
            array(
                "id" => "1",
                "name" => "Abha",
                "ar_name" => "أبها",
                "slug" => "Abha",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 14:15:38",
                "updated_at" => "2023-01-04 02:29:05"
        ));


        City::insert($cities);

    }
}
