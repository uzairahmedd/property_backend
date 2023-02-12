<?php

namespace Database\Seeders;

use App\Category;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array(
            array('id'=>'1','name' => 'Apartment', 'ar_name' => 'شقة', 'slug' => 'apartment','type' => 'category','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','land_area' => '0','buildup_area' => '1', 'property_Age' => '1', 'faatures_section' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('id'=>'2',"name"=>"Villa","ar_name"=>"فيلا","slug"=>"villa","type"=>"category","p_id"=>null,"featured"=>"1","user_id"=>"1","status"=>"1","land_area"=>"1","buildup_area"=>"1","property_age"=>"1","faatures_section"=>"1",'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array("id"=>"3","name"=>"Duplex","ar_name"=>"دوبلكس","slug"=>"duplex","type"=>"category","p_id"=>null,"featured"=>"1","user_id"=>"1","status"=>"1","land_area"=>"1","buildup_area"=>"1","property_age"=>"1","faatures_section"=>"1",'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array("id"=>"4","name"=>"land","ar_name"=>"أرض","slug"=>"land","type"=>"category","p_id"=>null,"featured"=>"1","user_id"=>"1","status"=>"1","land_area"=>"1","buildup_area"=>"0","property_age"=>"0","faatures_section"=>"0",'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array("id"=>"5","name"=>"Chalet","ar_name"=>"شاليه","slug"=>"chalet","type"=>"category","p_id"=>null,"featured"=>"1","user_id"=>"1","status"=>"1","land_area"=>"1","buildup_area"=>"1","property_age"=>"1","faatures_section"=>"1",'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array("id"=>"6","name"=>"Commercial building","ar_name"=>"عمارة تجارية","slug"=>"commercial-building","type"=>"category","p_id"=>null,"featured"=>"1","user_id"=>"1","status"=>"1","land_area"=>"0","buildup_area"=>"1","property_age"=>"1","faatures_section"=>"1",'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array("id"=>"7","name"=>"Bedrooms","ar_name"=>"غرف النوم","slug"=>"number","type"=>"option","p_id"=>null,"featured"=>"1","user_id"=>"1","status"=>"0","land_area"=>null,"buildup_area"=>null,"property_age"=>null,"faatures_section"=>null,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array("id"=>"8","name"=>"Bathrooms","ar_name"=>"دورات المياه","slug"=>"number","type"=>"option","p_id"=>null,"featured"=>"1","user_id"=>"1","status"=>"0","land_area"=>null,"buildup_area"=>null,"property_age"=>null,"faatures_section"=>null,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array("id"=>"9","name"=>"lounges","ar_name"=>"صالات","slug"=>"number","type"=>"option","p_id"=>null,"featured"=>"1","user_id"=>"1","status"=>"0","land_area"=>null,"buildup_area"=>null,"property_age"=>null,"faatures_section"=>null,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('id'=>'10','name'=>'Sale','ar_name'=>'للبيع','slug'=>'sale','type'=>'status','p_id'=>null,'featured'=>'1','user_id'=>'1','status'=>'1','land_area'=>null,'buildup_area'=>null,'property_age'=>null,'faatures_section'=>null,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('id'=>'11','name'=>'Rent','ar_name'=>'ايجار','slug'=>'rent','type'=>'status','p_id'=>null,'featured'=>'1','user_id'=>'1','status'=>'1','land_area'=>null,'buildup_area'=>null,'property_age'=>null,'faatures_section'=>null,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('id'=>'12','name'=>'Swimming pool','ar_name'=>'حمام السباحة','slug'=>'swimming-pool','type'=>'feature','p_id'=>null,'featured'=>'1','user_id'=>'1','status'=>'1','land_area'=>null,'buildup_area'=>null,'property_age'=>null,'faatures_section'=>null,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('id'=>'13','name'=>'Parking','ar_name'=>'موقف سيارات','slug'=>'parking','type'=>'feature','p_id'=>null,'featured'=>'1','user_id'=>'1','status'=>'1','land_area'=>null,'buildup_area'=>null,'property_age'=>null,'faatures_section'=>null,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('id'=>'14','name'=>'Security','ar_name'=>'حماية','slug'=>'security','type'=>'feature','p_id'=>null,'featured'=>'1','user_id'=>'1','status'=>'1','land_area'=>null,'buildup_area'=>null,'property_age'=>null,'faatures_section'=>null,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('id'=>'15','name'=>'Fitness center','ar_name'=>'مركز اللياقة البدنية','slug'=>'fitness-center','type'=>'feature','p_id'=>null,'featured'=>'1','user_id'=>'1','status'=>'1','land_area'=>null,'buildup_area'=>null,'property_age'=>null,'faatures_section'=>null,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('id'=>'16','name'=>'Balcony','ar_name'=>'شرفة','slug'=>'balcony','type'=>'feature','p_id'=>null,'featured'=>'1','user_id'=>'1','status'=>'1','land_area'=>null,'buildup_area'=>null,'property_age'=>null,'faatures_section'=>null,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('id'=>'17','name'=>'Commercial','ar_name'=>'تجاري','slug'=>'commercial','type'=>'parent_category','p_id'=>null,'featured'=>'1','user_id'=>'1','status'=>'1','land_area'=>null,'buildup_area'=>null,'property_age'=>null,'faatures_section'=>null,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('id'=>'18','name'=>'Residential','ar_name'=>'سكني','slug'=>'residential','type'=>'parent_category','p_id'=>null,'featured'=>'1','user_id'=>'1','status'=>'1','land_area'=>null,'buildup_area'=>null,'property_age'=>null,'faatures_section'=>null,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('id'=>'19','name'=>'Rest House','ar_name'=>'استراحة','slug'=>'rest-house','type'=>'category','p_id'=>null,'featured'=>'1','user_id'=>'1','status'=>'1','land_area'=>'1','buildup_area'=>'1','property_age'=>'1','faatures_section'=>'1','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('id'=>'20','name'=>'Parking','ar_name'=>'موقف سيارات','slug'=>'number','type'=>'option','p_id'=>null,'featured'=>'1','user_id'=>'1','status'=>'0','land_area'=>null,'buildup_area'=>null,'property_age'=>null,'faatures_section'=>null,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('id'=>'21','name'=>'Board','ar_name'=>'مجالس','slug'=>'number','type'=>'option','p_id'=>null,'featured'=>'1','user_id'=>'1','status'=>'0','land_area'=>null,'buildup_area'=>null,'property_age'=>null,'faatures_section'=>null,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('id'=>'22','name'=>'Auction','ar_name'=>'المزادات','slug'=>'auction','type'=>'status','p_id'=>null,'featured'=>'0','user_id'=>'1','status'=>'1','land_area'=>null,'buildup_area'=>null,'property_age'=>null,'faatures_section'=>null,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('id'=>'23','name'=>'Farm','ar_name'=>'مزرعة','slug'=>'farm','type'=>'category','p_id'=>null,'featured'=>'1','user_id'=>'1','status'=>'1','land_area'=>'1','buildup_area'=>'0','property_age'=>'0','faatures_section'=>'0','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('id'=>'24','name'=>'Studio','ar_name'=>'استديو','slug'=>'studio','type'=>'category','p_id'=>null,'featured'=>'1','user_id'=>'1','status'=>'1','land_area'=>'0','buildup_area'=>'1','property_age'=>'1','faatures_section'=>'1','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('id'=>'25','name'=>'Floor','ar_name'=>'دور','slug'=>'floor','type'=>'category','p_id'=>null,'featured'=>'1','user_id'=>'1','status'=>'1','land_area'=>'0','buildup_area'=>'1','property_age'=>'1','faatures_section'=>'1','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('id'=>'26','name'=>'Appartment block','ar_name'=>'عمارة سكنية','slug'=>'appartment-block','type'=>'category','p_id'=>null,'featured'=>'1','user_id'=>'1','status'=>'1','land_area'=>'0','buildup_area'=>'1','property_age'=>'1','faatures_section'=>'1','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('id'=>'27','name'=>'Showroom','ar_name'=>'معرض','slug'=>'showroom','type'=>'category','p_id'=>null,'featured'=>'1','user_id'=>'1','status'=>'1','land_area'=>'0','buildup_area'=>'1','property_age'=>'1','faatures_section'=>'1','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('id'=>'28','name'=>'Shop','ar_name'=>'محل','slug'=>'shop','type'=>'category','p_id'=>null,'featured'=>'1','user_id'=>'1','status'=>'1','land_area'=>'0','buildup_area'=>'1','property_age'=>'1','faatures_section'=>'1','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('id'=>'29','name'=>'Office','ar_name'=>'مكتب','slug'=>'office','type'=>'category','p_id'=>null,'featured'=>'1','user_id'=>'1','status'=>'1','land_area'=>'0','buildup_area'=>'1','property_age'=>'1','faatures_section'=>'1','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('id'=>'30','name'=>'Warehouse','ar_name'=>'مستودع','slug'=>'warehouse','type'=>'category','p_id'=>null,'featured'=>'1','user_id'=>'1','status'=>'1','land_area'=>'0','buildup_area'=>'1','property_age'=>'1','faatures_section'=>'1','created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('id'=>'31','name'=>'Kitchen','ar_name'=>'مطبخ','slug'=>'kitchen','type'=>'feature','p_id'=>null,'featured'=>'1','user_id'=>'1','status'=>'1','land_area'=>null,'buildup_area'=>null,'property_age'=>null,'faatures_section'=>null,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('id'=>'32','name'=>'Air conditioned','ar_name'=>'مكيف','slug'=>'air-conditioned','type'=>'feature','p_id'=>null,'featured'=>'1','user_id'=>'1','status'=>'1','land_area'=>null,'buildup_area'=>null,'property_age'=>null,'faatures_section'=>null,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            array('id'=>'33','name'=>'Elevator','ar_name'=>'مصاعد','slug'=>'elevator','type'=>'feature','p_id'=>null,'featured'=>'1','user_id'=>'1','status'=>'1','land_area'=>null,'buildup_area'=>null,'property_age'=>null,'faatures_section'=>null,'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')),
            );
        Category::insert($categories);



//        $categories = array(
//            array('id' => '1','name' => 'Apartment','slug' => 'apartment','type' => 'category','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:07:41','updated_at' => '2020-12-31 08:10:27'),
//            array('id' => '2','name' => 'Villa','slug' => 'villa','type' => 'category','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:08:00','updated_at' => '2020-12-31 08:10:18'),
//            array('id' => '3','name' => 'Duplex','slug' => 'duplex','type' => 'category','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:08:14','updated_at' => '2020-12-31 08:10:07'),
//            array('id' => '4','name' => 'Residential land','slug' => 'residential-land','type' => 'category','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:08:30','updated_at' => '2020-12-31 08:09:58'),
//            array('id' => '5','name' => 'Chalet','slug' => 'chalet','type' => 'category','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:08:49','updated_at' => '2020-12-31 08:09:49'),
//            array('id' => '6','name' => 'Building','slug' => 'building','type' => 'category','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:09:13','updated_at' => '2020-12-31 08:09:32'),
//            array('id' => '14','name' => 'USD','slug' => '$','type' => 'currency','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:16:50','updated_at' => '2020-12-31 08:16:50'),
//            // array('id' => '15','name' => 'Number of Blocks','slug' => 'number','type' => 'option','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '0','created_at' => '2020-12-31 08:17:53','updated_at' => '2021-01-11 04:44:10'),
//            array('id' => '16','name' => 'Bedrooms','slug' => 'number','type' => 'option','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '0','created_at' => '2020-12-31 08:19:37','updated_at' => '2020-12-31 08:19:37'),
//            array('id' => '17','name' => 'Bathrooms','slug' => 'number','type' => 'option','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '0','created_at' => '2020-12-31 08:20:11','updated_at' => '2020-12-31 08:20:11'),
//            array('id' => '18','name' => 'lounges','slug' => 'number','type' => 'option','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:21:03','updated_at' => '2021-01-10 18:23:13'),
//            array('id' => '19','name' => 'Riyadh','slug' => 'riyadh','type' => 'states','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:24:25','updated_at' => '2020-12-31 08:24:25'),
//            array('id' => '20','name' => 'Madina','slug' => 'madina','type' => 'states','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:25:23','updated_at' => '2020-12-31 08:25:23'),
//            array('id' => '21','name' => 'Dhaka','slug' => 'dhaka','type' => 'neighborhood','p_id' => '19','featured' => '0','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:27:36','updated_at' => '2020-12-31 08:27:36'),
//            array('id' => '22','name' => 'Faridpur','slug' => 'faridpur','type' => 'neighborhood','p_id' => '19','featured' => '0','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:28:31','updated_at' => '2020-12-31 08:28:31'),
//            array('id' => '23','name' => 'Chattogram','slug' => 'chattogram','type' => 'neighborhood','p_id' => '20','featured' => '0','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:29:17','updated_at' => '2020-12-31 08:29:17'),
//            array('id' => '24','name' => 'Cox\'s Bazar','slug' => 'coxs-bazar','type' => 'neighborhood','p_id' => '20','featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:30:51','updated_at' => '2020-12-31 08:30:51'),
//            array('id' => '26','name' => 'Sale','slug' => 'sale','type' => 'status','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2021-01-10 08:46:34','updated_at' => '2021-01-10 08:46:34'),
//            array('id' => '27','name' => 'Rent','slug' => 'rent','type' => 'status','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2021-01-10 08:46:39','updated_at' => '2021-01-10 08:46:39'),
//            array('id' => '29','name' => 'Projects','slug' => 'projects','type' => 'status','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2021-01-10 13:26:59','updated_at' => '2021-01-10 13:26:59'),
//            array('id' => '30','name' => 'Share','slug' => 'share','type' => 'status','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2021-01-10 13:28:37','updated_at' => '2021-01-10 13:28:37'),
//            array('id' => '31','name' => 'Hail','slug' => 'hail','type' => 'states','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2021-01-10 14:56:28','updated_at' => '2021-01-10 14:56:28'),
//            array('id' => '32','name' => 'Dammam','slug' => 'dammam','type' => 'states','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2021-01-10 14:57:58','updated_at' => '2021-01-10 14:57:58'),
//            array('id' => '33','name' => 'Jeddah','slug' => 'jeddah','type' => 'states','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2021-01-10 14:59:05','updated_at' => '2021-01-10 14:59:05'),
//            array('id' => '34','name' => 'Taif','slug' => 'taif','type' => 'states','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2021-01-10 15:02:50','updated_at' => '2021-01-10 15:02:50'),
//            array('id' => '35','name' => 'Wifi','slug' => 'wifi','type' => 'feature','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2021-01-10 17:53:51','updated_at' => '2021-01-10 17:53:51'),
//            array('id' => '36','name' => 'Swimming pool','slug' => 'swimming-pool','type' => 'feature','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 17:54:12','updated_at' => '2021-01-10 17:54:12'),
//            array('id' => '37','name' => 'Parking','slug' => 'parking','type' => 'feature','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 17:54:37','updated_at' => '2021-01-10 17:54:37'),
//            array('id' => '38','name' => 'Security','slug' => 'security','type' => 'feature','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 17:54:57','updated_at' => '2021-01-10 17:54:57'),
//            array('id' => '39','name' => 'Fitness center','slug' => 'fitness-center','type' => 'feature','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 17:55:39','updated_at' => '2021-01-10 17:55:39'),
//            array('id' => '40','name' => 'Balcony','slug' => 'balcony','type' => 'feature','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 17:56:00','updated_at' => '2021-01-10 17:56:00'),
//            array('id' => '41','name' => 'Hospital','slug' => 'hospital','type' => 'facilities','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 18:01:58','updated_at' => '2021-01-10 18:01:58'),
//            array('id' => '42','name' => 'Super Market','slug' => 'super-market','type' => 'facilities','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 18:02:45','updated_at' => '2021-01-10 18:02:45'),
//            array('id' => '43','name' => 'School','slug' => 'school','type' => 'facilities','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 18:03:04','updated_at' => '2021-01-10 18:03:04'),
//            array('id' => '44','name' => 'Entertainment','slug' => 'entertainment','type' => 'facilities','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 18:03:20','updated_at' => '2021-01-10 18:03:20'),
//            array('id' => '45','name' => 'Pharmacy','slug' => 'pharmacy','type' => 'facilities','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 18:04:00','updated_at' => '2021-01-10 18:04:00'),
//            array('id' => '46','name' => 'Airport','slug' => 'airport','type' => 'facilities','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 18:04:23','updated_at' => '2021-01-10 18:04:23'),
//            array('id' => '47','name' => 'Railways','slug' => 'railways','type' => 'facilities','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 18:04:35','updated_at' => '2021-01-10 18:04:35'),
//            array('id' => '48','name' => 'Bus Stop','slug' => 'bus-stop','type' => 'facilities','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 18:04:50','updated_at' => '2021-01-10 18:04:50'),
//            array('id' => '49','name' => 'Beach','slug' => 'beach','type' => 'facilities','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 18:05:04','updated_at' => '2021-01-10 18:05:04'),
//            array('id' => '50','name' => 'Mall','slug' => 'mall','type' => 'facilities','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 18:05:24','updated_at' => '2021-01-10 18:05:24'),
//            array('id' => '51','name' => 'Bank','slug' => 'bank','type' => 'facilities','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 18:05:40','updated_at' => '2021-01-10 18:05:40'),
//            array('id' => '52','name' => 'AMCoders','slug' => 'amcodersrzBcY','type' => 'agency','p_id' => NULL,'featured' => NULL,'user_id' => '1','status' => '1','created_at' => '2021-01-11 14:53:20','updated_at' => '2021-01-11 15:11:04'),
//            array('id' => '53','name' => 'Fast Box','slug' => 'fast-box','type' => 'agency','p_id' => NULL,'featured' => NULL,'user_id' => '1','status' => '1','created_at' => '2021-01-11 15:23:26','updated_at' => '2021-01-11 15:28:08'),
//            array('id' => '54','name' => 'Company Slogan','slug' => 'company-slogan','type' => 'agency','p_id' => NULL,'featured' => NULL,'user_id' => '1','status' => '1','created_at' => '2021-01-11 15:31:19','updated_at' => '2021-01-11 15:31:19'),
//            array('id' => '61','name' => 'jomidar','slug' => 'en','type' => 'lang','p_id' => NULL,'featured' => NULL,'user_id' => '1','status' => '1','created_at' => '2021-01-18 09:22:05','updated_at' => '2021-01-18 09:22:32'),
//            array('id' => '62','name' => 'jomidar','slug' => 'ar','type' => 'lang','p_id' => NULL,'featured' => NULL,'user_id' => '1','status' => '1','created_at' => '2021-01-18 09:22:14','updated_at' => '2021-01-18 09:22:32'),
//            array('id' => '63','name' => 'BDT','slug' => 'TK','type' => 'currency','p_id' => NULL,'featured' => '84','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:16:50','updated_at' => '2020-12-31 08:16:50'),
//            array('id' => '64','name' => 'Commercial','slug' => 'commercial','type' => 'parent_category','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:08:41','updated_at' => '2020-12-31 08:10:26'),
//            array('id' => '65','name' => 'Residential','slug' => 'residential','type' => 'parent_category','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:01:41','updated_at' => '2020-12-31 08:10:17'),
//            array('id' => '66','name' => 'Rest House','slug' => 'rest-house','type' => 'category','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:08:20','updated_at' => '2020-12-31 08:09:18'),
//            array('id' => '67','name' => 'Parking','slug' => 'number','type' => 'option','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 09:21:03','updated_at' => '2021-01-10 18:24:13'),
//            array('id' => '68','name' => 'Board','slug' => 'number','type' => 'option','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:26:03','updated_at' => '2021-01-10 18:22:13'),
//            array('id' => '69','name' => 'Auctions','slug' => 'auction','type' => 'status','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2021-01-10 08:46:34','updated_at' => '2021-01-10 08:46:34'),
//        );

//        Category::insert($categories);

//      $categorymetas = array(
//        array('id' => '1','category_id' => '1','type' => 'credit_charge','content' => '100','created_at' => '2020-12-31 08:07:41','updated_at' => '2020-12-31 08:07:41'),
//        array('id' => '2','category_id' => '1','type' => 'excerpt','content' => 'apartment','created_at' => '2020-12-31 08:07:41','updated_at' => '2020-12-31 08:07:41'),
//        array('id' => '3','category_id' => '2','type' => 'credit_charge','content' => '150','created_at' => '2020-12-31 08:08:00','updated_at' => '2020-12-31 08:08:00'),
//        array('id' => '4','category_id' => '2','type' => 'excerpt','content' => 'villa','created_at' => '2020-12-31 08:08:00','updated_at' => '2020-12-31 08:08:00'),
//        array('id' => '5','category_id' => '3','type' => 'credit_charge','content' => '120','created_at' => '2020-12-31 08:08:14','updated_at' => '2020-12-31 08:08:14'),
//        array('id' => '6','category_id' => '3','type' => 'excerpt','content' => 'House','created_at' => '2020-12-31 08:08:14','updated_at' => '2020-12-31 08:08:14'),
//        array('id' => '7','category_id' => '4','type' => 'credit_charge','content' => '120','created_at' => '2020-12-31 08:08:30','updated_at' => '2020-12-31 08:08:30'),
//        array('id' => '8','category_id' => '4','type' => 'excerpt','content' => 'Condo','created_at' => '2020-12-31 08:08:30','updated_at' => '2020-12-31 08:08:30'),
//        array('id' => '9','category_id' => '5','type' => 'credit_charge','content' => '100','created_at' => '2020-12-31 08:08:49','updated_at' => '2020-12-31 08:08:49'),
//        array('id' => '10','category_id' => '5','type' => 'excerpt','content' => 'land','created_at' => '2020-12-31 08:08:49','updated_at' => '2020-12-31 08:08:49'),
//        array('id' => '11','category_id' => '6','type' => 'credit_charge','content' => '120','created_at' => '2020-12-31 08:09:13','updated_at' => '2020-12-31 08:09:13'),
//        array('id' => '12','category_id' => '6','type' => 'excerpt','content' => 'Commercial Property','created_at' => '2020-12-31 08:09:13','updated_at' => '2020-12-31 08:09:37'),
//        array('id' => '13','category_id' => '14','type' => 'position','content' => 'left','created_at' => '2020-12-31 08:16:50','updated_at' => '2020-12-31 08:16:50'),
//        array('id' => '14','category_id' => '19','type' => 'preview','content' => $base_url.'/21/01/10012116102894065ffb10fe25db5.webp','created_at' => '2020-12-31 08:24:25','updated_at' => '2021-01-10 14:37:13'),
//        array('id' => '15','category_id' => '19','type' => 'mapinfo','content' => '{"latitude":"23.8103","longitude":"90.4125","zoom":"10"}','created_at' => '2020-12-31 08:24:25','updated_at' => '2020-12-31 08:24:25'),
//        array('id' => '16','category_id' => '20','type' => 'preview','content' => $base_url.'/21/01/10012116102894135ffb11055db3b.webp','created_at' => '2020-12-31 08:25:23','updated_at' => '2021-01-10 14:36:58'),
//        array('id' => '17','category_id' => '20','type' => 'mapinfo','content' => '{"latitude":"22.3569","longitude":"91.7832","zoom":"10"}','created_at' => '2020-12-31 08:25:23','updated_at' => '2020-12-31 08:25:23'),
//        array('id' => '18','category_id' => '21','type' => 'preview','content' => '','created_at' => '2020-12-31 08:27:36','updated_at' => '2020-12-31 08:27:36'),
//        array('id' => '19','category_id' => '21','type' => 'mapinfo','content' => '{"latitude":"23.8103","longitude":"90.4125","zoom":"10"}','created_at' => '2020-12-31 08:27:36','updated_at' => '2020-12-31 08:27:36'),
//        array('id' => '20','category_id' => '22','type' => 'preview','content' => '','created_at' => '2020-12-31 08:28:31','updated_at' => '2020-12-31 08:28:31'),
//        array('id' => '21','category_id' => '22','type' => 'mapinfo','content' => '{"latitude":"23.6019","longitude":"89.8333","zoom":"10"}','created_at' => '2020-12-31 08:28:31','updated_at' => '2020-12-31 08:28:31'),
//        array('id' => '22','category_id' => '23','type' => 'preview','content' => '','created_at' => '2020-12-31 08:29:17','updated_at' => '2020-12-31 08:29:17'),
//        array('id' => '23','category_id' => '23','type' => 'mapinfo','content' => '{"latitude":"22.3569","longitude":"91.7282","zoom":"10"}','created_at' => '2020-12-31 08:29:17','updated_at' => '2020-12-31 08:29:17'),
//        array('id' => '24','category_id' => '24','type' => 'preview','content' => '','created_at' => '2020-12-31 08:30:51','updated_at' => '2020-12-31 08:30:51'),
//        array('id' => '25','category_id' => '24','type' => 'mapinfo','content' => '{"latitude":"21.4272","longitude":"92.0058","zoom":"10"}','created_at' => '2020-12-31 08:30:51','updated_at' => '2020-12-31 08:30:51'),
//        array('id' => '26','category_id' => '31','type' => 'preview','content' => $base_url.'/21/01/10012116102905585ffb157edfcf8.webp','created_at' => '2021-01-10 14:56:28','updated_at' => '2021-01-10 14:56:28'),
//        array('id' => '27','category_id' => '31','type' => 'mapinfo','content' => '{"latitude":"24.3745","longitude":"88.6042","zoom":"10"}','created_at' => '2021-01-10 14:56:28','updated_at' => '2021-01-10 14:56:28'),
//        array('id' => '28','category_id' => '32','type' => 'preview','content' => $base_url.'/21/01/10012116102905605ffb158005816.webp','created_at' => '2021-01-10 14:57:58','updated_at' => '2021-01-10 14:57:58'),
//        array('id' => '29','category_id' => '32','type' => 'mapinfo','content' => '{"latitude":"23.1778","longitude":"89.1801","zoom":"10"}','created_at' => '2021-01-10 14:57:58','updated_at' => '2021-01-10 14:57:58'),
//        array('id' => '30','category_id' => '33','type' => 'preview','content' => $base_url.'/21/01/10012116102905595ffb157f46dcc.webp','created_at' => '2021-01-10 14:59:05','updated_at' => '2021-01-10 14:59:05'),
//        array('id' => '31','category_id' => '33','type' => 'mapinfo','content' => '{"latitude":"22.8456","longitude":"89.5403","zoom":"10"}','created_at' => '2021-01-10 14:59:05','updated_at' => '2021-01-10 14:59:05'),
//        array('id' => '32','category_id' => '34','type' => 'preview','content' => $base_url.'/21/01/10012116102905595ffb157fa23a5.webp','created_at' => '2021-01-10 15:02:50','updated_at' => '2021-01-10 15:04:15'),
//        array('id' => '33','category_id' => '34','type' => 'mapinfo','content' => '{"latitude":"24.8949","longitude":"91.8687","zoom":"10"}','created_at' => '2021-01-10 15:02:50','updated_at' => '2021-01-10 15:02:50'),
//        array('id' => '34','category_id' => '35','type' => 'icon','content' => 'fas fa-wifi','created_at' => '2021-01-10 17:53:51','updated_at' => '2021-01-10 17:53:51'),
//        array('id' => '35','category_id' => '36','type' => 'icon','content' => 'fas fa-swimmer','created_at' => '2021-01-10 17:54:12','updated_at' => '2021-01-10 17:54:12'),
//        array('id' => '36','category_id' => '37','type' => 'icon','content' => 'fas fa-car-side','created_at' => '2021-01-10 17:54:37','updated_at' => '2021-01-10 17:54:37'),
//        array('id' => '37','category_id' => '38','type' => 'icon','content' => 'fas fa-user-secret','created_at' => '2021-01-10 17:54:57','updated_at' => '2021-01-10 17:54:57'),
//        array('id' => '38','category_id' => '39','type' => 'icon','content' => 'fas fa-hand-holding-heart','created_at' => '2021-01-10 17:55:39','updated_at' => '2021-01-10 17:55:39'),
//        array('id' => '39','category_id' => '40','type' => 'icon','content' => 'fas fa-archway','created_at' => '2021-01-10 17:56:00','updated_at' => '2021-01-10 17:56:00'),
//        array('id' => '40','category_id' => '41','type' => 'icon','content' => 'far fa-hospital','created_at' => '2021-01-10 18:01:58','updated_at' => '2021-01-10 18:01:58'),
//        array('id' => '41','category_id' => '42','type' => 'icon','content' => 'fas fa-shopping-cart','created_at' => '2021-01-10 18:02:45','updated_at' => '2021-01-10 18:02:45'),
//        array('id' => '42','category_id' => '43','type' => 'icon','content' => 'fas fa-school','created_at' => '2021-01-10 18:03:04','updated_at' => '2021-01-10 18:03:04'),
//        array('id' => '43','category_id' => '44','type' => 'icon','content' => 'fas fa-align-center','created_at' => '2021-01-10 18:03:20','updated_at' => '2021-01-10 18:03:20'),
//        array('id' => '44','category_id' => '45','type' => 'icon','content' => 'fas fa-hand-holding-heart','created_at' => '2021-01-10 18:04:00','updated_at' => '2021-01-10 18:04:00'),
//        array('id' => '45','category_id' => '46','type' => 'icon','content' => 'fab fa-angrycreative','created_at' => '2021-01-10 18:04:23','updated_at' => '2021-01-10 18:04:23'),
//        array('id' => '46','category_id' => '47','type' => 'icon','content' => 'fas fa-train','created_at' => '2021-01-10 18:04:35','updated_at' => '2021-01-10 18:04:35'),
//        array('id' => '47','category_id' => '48','type' => 'icon','content' => 'fas fa-bus','created_at' => '2021-01-10 18:04:50','updated_at' => '2021-01-10 18:04:50'),
//        array('id' => '48','category_id' => '49','type' => 'icon','content' => 'fas fa-umbrella-beach','created_at' => '2021-01-10 18:05:05','updated_at' => '2021-01-10 18:05:05'),
//        array('id' => '49','category_id' => '50','type' => 'icon','content' => 'fas fa-luggage-cart','created_at' => '2021-01-10 18:05:24','updated_at' => '2021-01-10 18:05:24'),
//        array('id' => '50','category_id' => '51','type' => 'icon','content' => 'fas fa-money-bill','created_at' => '2021-01-10 18:05:40','updated_at' => '2021-01-10 18:05:40'),
//        array('id' => '51','category_id' => '17','type' => 'preview','content' => $base_url.'/21/01/11012116103399535ffbd67132cff.webp','created_at' => '2021-01-11 04:39:26','updated_at' => '2021-01-11 04:39:26'),
//        array('id' => '52','category_id' => '16','type' => 'preview','content' => $base_url.'/21/01/11012116103399535ffbd671f06e5.webp','created_at' => '2021-01-11 04:39:50','updated_at' => '2021-01-11 04:39:50'),
//        array('id' => '53','category_id' => '15','type' => 'preview','content' => $base_url.'/21/01/11012116103399535ffbd671f06e5.webp','created_at' => '2021-01-11 04:44:08','updated_at' => '2021-01-11 04:44:08'),
//        array('id' => '54','category_id' => '52','type' => 'credit','content' => NULL,'created_at' => '2021-01-11 14:53:21','updated_at' => '2021-01-11 14:53:21'),
//        array('id' => '55','category_id' => '52','type' => 'preview','content' => $base_url.'/21/01/11012116103778575ffc6a81e5911.webp','created_at' => '2021-01-11 14:53:21','updated_at' => '2021-01-11 15:11:04'),
//        array('id' => '56','category_id' => '52','type' => 'content','content' => '{"address":"Dhaka, Savar","phone":"096545345345","description":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.","facebook":"#","twitter":"#","youtube":"#","pinterest":"#","linkedin":"#","instagram":"#","whatsapp":"2342342342342","service_area":"Dhaka, Khulna, Savar","tax_number":"35235325353","license":"32432523532532","email":"support@email.com"}','created_at' => '2021-01-11 14:53:21','updated_at' => '2021-01-11 14:53:21'),
//        array('id' => '57','category_id' => '53','type' => 'credit','content' => NULL,'created_at' => '2021-01-11 15:23:26','updated_at' => '2021-01-11 15:23:26'),
//        array('id' => '58','category_id' => '53','type' => 'preview','content' => $base_url.'/21/01/11012116103785955ffc6d635efd4.webp','created_at' => '2021-01-11 15:23:26','updated_at' => '2021-01-11 15:23:26'),
//        array('id' => '59','category_id' => '53','type' => 'content','content' => '{"address":"Agrabad, Chittagong","phone":"045345345345345","description":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","facebook":"#","twitter":"#","youtube":"#","pinterest":"#","linkedin":"#","instagram":"#","whatsapp":"547457457457","service_area":"Naogaon, Dhaka, Kirtipur","tax_number":"43653463463463","license":"353456345353535","email":"support@morden.com"}','created_at' => '2021-01-11 15:23:26','updated_at' => '2021-01-11 15:23:26'),
//        array('id' => '60','category_id' => '54','type' => 'credit','content' => NULL,'created_at' => '2021-01-11 15:31:19','updated_at' => '2021-01-11 15:31:19'),
//        array('id' => '61','category_id' => '54','type' => 'preview','content' => $base_url.'/21/01/11012116103785945ffc6d62d6210.webp','created_at' => '2021-01-11 15:31:19','updated_at' => '2021-01-11 15:31:19'),
//        array('id' => '62','category_id' => '54','type' => 'content','content' => '{"address":"Naogaon, Kirtipur","phone":"034324324324324","description":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.","facebook":"#","twitter":"#","youtube":"#","pinterest":"#","linkedin":"#","instagram":"#","whatsapp":"#","service_area":"Naogaon, Kirtipur, Mohadebpur","tax_number":"345435345325325","license":"3532532532532532523","email":"support@company.com"}','created_at' => '2021-01-11 15:31:19','updated_at' => '2021-01-11 15:31:19'),
//        array('id' => '69','category_id' => '61','type' => 'lang','content' => '{"lang_name":"English","lang_position":"LTR"}','created_at' => '2021-01-18 09:22:05','updated_at' => '2021-01-18 09:22:05'),
//        array('id' => '70','category_id' => '62','type' => 'lang','content' => '{"lang_name":"Arabic","lang_position":"RTL"}','created_at' => '2021-01-18 09:22:14','updated_at' => '2021-01-18 09:22:14'),
//        array('id' => '71','category_id' => '63','type' => 'position','content' => 'right','created_at' => '2020-12-31 08:16:50','updated_at' => '2020-12-31 08:16:50'),
//      );
//
//     Categorymeta::insert($categorymetas);

//     $categoryusers = array(
//      array('category_id' => '52','user_id' => '2'),
//      array('category_id' => '52','user_id' => '3'),
//      array('category_id' => '52','user_id' => '4'),
//      array('category_id' => '53','user_id' => '2'),
//      array('category_id' => '53','user_id' => '3'),
//      array('category_id' => '53','user_id' => '4'),
//      array('category_id' => '54','user_id' => '2'),
//      array('category_id' => '54','user_id' => '3'),
//      array('category_id' => '54','user_id' => '4')
//    );
//
//    Categoryuser::insert($categoryusers);

//     $categoryrelations = array(
//      array('parent_id' => '18','child_id' => '4'),
//      array('parent_id' => '17','child_id' => '1'),
//      array('parent_id' => '17','child_id' => '2'),
//      array('parent_id' => '17','child_id' => '3'),
//      array('parent_id' => '17','child_id' => '4'),
//      array('parent_id' => '17','child_id' => '5'),
//      array('parent_id' => '17','child_id' => '6'),
//      array('parent_id' => '16','child_id' => '1'),
//      array('parent_id' => '16','child_id' => '2'),
//      array('parent_id' => '16','child_id' => '3'),
//      array('parent_id' => '16','child_id' => '4'),
//      array('parent_id' => '16','child_id' => '5'),
//      array('parent_id' => '16','child_id' => '6'),
//      array('parent_id' => '15','child_id' => '6')
//    );
//
//
//
//     Categoryrelation::insert($categoryrelations);
    }
}
