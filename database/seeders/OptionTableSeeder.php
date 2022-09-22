<?php
namespace Database\Seeders;
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

class OptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      Options::create([
        'key'=>'theme_data',
        'value'=>'{"theme_color":"#9cc25d","socials":[{"icon":"fa fa-pinterest-p","url":"#"},{"icon":"fa fa-pinterest-p","url":"#"},{"icon":"fa fa-instagram","url":"#"},{"icon":"fa fa-twitter","url":"#"}],"back_to_top":"enable"}'
      ]);

      Options::create([
        'key'=>'seo',
        'value'=>'{"title":"LPress","description":null,"canonical":null,"tags":null,"twitterTitle":null}',
      ]);

      Options::create([
        'key'=>'langlist',
        'value'=>'{"English":"en","Malay":"bn"}',
      ]);

      Options::create([
        'key'=>'default_lat_long',
        'value'=>'{"latitude":"23.8103","longitude":"90.4125","zoom":"10"}',
      ]);


      Options::create([
        'key'=>'lp_filesystem',
        'value'=>'{"compress":5,"system_type":"local","system_url":null}',
      ]);
      
      Options::create([
        'key'=>'payment_settings',
        'value'=>'{"currency_name":"USD","currency_icon":"$","currency_position":"left"}',
      ]);

      $base_url=env('APP_URL').'/uploads';

      $options = array(
        array('id' => '7','key' => 'breadcrumb','value' => $base_url.'/21/01/11012116103582515ffc1deba3f0f.webp','created_at' => '2021-01-21 12:01:43','updated_at' => '2021-01-21 23:35:59'),
        array('id' => '8','key' => 'theme_color','value' => '#414cdc','created_at' => '2021-01-21 23:30:07','updated_at' => '2021-01-21 23:51:15'),
        array('id' => '9','key' => 'listing_page','value' => 'without_map','created_at' => '2021-01-23 10:46:37','updated_at' => '2021-01-23 10:51:44')
      );
      
      Options::insert($options);
      
      $categories = array(
        array('id' => '1','name' => 'Apartment','slug' => 'apartment','type' => 'category','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:07:41','updated_at' => '2020-12-31 08:10:27'),
        array('id' => '2','name' => 'Villa','slug' => 'villa','type' => 'category','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:08:00','updated_at' => '2020-12-31 08:10:18'),
        array('id' => '3','name' => 'House','slug' => 'house','type' => 'category','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:08:14','updated_at' => '2020-12-31 08:10:07'),
        array('id' => '4','name' => 'Condo','slug' => 'condo','type' => 'category','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:08:30','updated_at' => '2020-12-31 08:09:58'),
        array('id' => '5','name' => 'Land','slug' => 'land','type' => 'category','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:08:49','updated_at' => '2020-12-31 08:09:49'),
        array('id' => '6','name' => 'Commercial Property','slug' => 'commercial-property','type' => 'category','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:09:13','updated_at' => '2020-12-31 08:09:32'),
        array('id' => '14','name' => 'USD','slug' => '$','type' => 'currency','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:16:50','updated_at' => '2020-12-31 08:16:50'),
        array('id' => '15','name' => 'Number of Blocks','slug' => 'number','type' => 'option','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '0','created_at' => '2020-12-31 08:17:53','updated_at' => '2021-01-11 04:44:10'),
        array('id' => '16','name' => 'Bedrooms','slug' => 'number','type' => 'option','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '0','created_at' => '2020-12-31 08:19:37','updated_at' => '2020-12-31 08:19:37'),
        array('id' => '17','name' => 'Bathrooms','slug' => 'number','type' => 'option','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '0','created_at' => '2020-12-31 08:20:11','updated_at' => '2020-12-31 08:20:11'),
        array('id' => '18','name' => 'Floors','slug' => 'number','type' => 'option','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:21:03','updated_at' => '2021-01-10 18:23:13'),
        array('id' => '19','name' => 'Dhaka','slug' => 'dhaka','type' => 'states','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:24:25','updated_at' => '2020-12-31 08:24:25'),
        array('id' => '20','name' => 'Chattogram','slug' => 'chattogram','type' => 'states','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:25:23','updated_at' => '2020-12-31 08:25:23'),
        array('id' => '21','name' => 'Dhaka','slug' => 'dhaka','type' => 'cities','p_id' => '19','featured' => '0','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:27:36','updated_at' => '2020-12-31 08:27:36'),
        array('id' => '22','name' => 'Faridpur','slug' => 'faridpur','type' => 'cities','p_id' => '19','featured' => '0','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:28:31','updated_at' => '2020-12-31 08:28:31'),
        array('id' => '23','name' => 'Chattogram','slug' => 'chattogram','type' => 'cities','p_id' => '20','featured' => '0','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:29:17','updated_at' => '2020-12-31 08:29:17'),
        array('id' => '24','name' => 'Cox\'s Bazar','slug' => 'coxs-bazar','type' => 'cities','p_id' => '20','featured' => '1','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:30:51','updated_at' => '2020-12-31 08:30:51'),
        array('id' => '26','name' => 'Sale','slug' => 'sale','type' => 'status','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2021-01-10 08:46:34','updated_at' => '2021-01-10 08:46:34'),
        array('id' => '27','name' => 'Rent','slug' => 'rent','type' => 'status','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2021-01-10 08:46:39','updated_at' => '2021-01-10 08:46:39'),
        array('id' => '29','name' => 'Projects','slug' => 'projects','type' => 'status','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2021-01-10 13:26:59','updated_at' => '2021-01-10 13:26:59'),
        array('id' => '30','name' => 'Share','slug' => 'share','type' => 'status','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2021-01-10 13:28:37','updated_at' => '2021-01-10 13:28:37'),
        array('id' => '31','name' => 'Rajshahi','slug' => 'rajshahi','type' => 'states','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2021-01-10 14:56:28','updated_at' => '2021-01-10 14:56:28'),
        array('id' => '32','name' => 'Jessore','slug' => 'jessore','type' => 'states','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2021-01-10 14:57:58','updated_at' => '2021-01-10 14:57:58'),
        array('id' => '33','name' => 'Khulna','slug' => 'khulna','type' => 'states','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2021-01-10 14:59:05','updated_at' => '2021-01-10 14:59:05'),
        array('id' => '34','name' => 'Sylhet','slug' => 'sylhet','type' => 'states','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2021-01-10 15:02:50','updated_at' => '2021-01-10 15:02:50'),
        array('id' => '35','name' => 'Wifi','slug' => 'wifi','type' => 'feature','p_id' => NULL,'featured' => '1','user_id' => '1','status' => '1','created_at' => '2021-01-10 17:53:51','updated_at' => '2021-01-10 17:53:51'),
        array('id' => '36','name' => 'Swimming pool','slug' => 'swimming-pool','type' => 'feature','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 17:54:12','updated_at' => '2021-01-10 17:54:12'),
        array('id' => '37','name' => 'Parking','slug' => 'parking','type' => 'feature','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 17:54:37','updated_at' => '2021-01-10 17:54:37'),
        array('id' => '38','name' => 'Security','slug' => 'security','type' => 'feature','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 17:54:57','updated_at' => '2021-01-10 17:54:57'),
        array('id' => '39','name' => 'Fitness center','slug' => 'fitness-center','type' => 'feature','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 17:55:39','updated_at' => '2021-01-10 17:55:39'),
        array('id' => '40','name' => 'Balcony','slug' => 'balcony','type' => 'feature','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 17:56:00','updated_at' => '2021-01-10 17:56:00'),
        array('id' => '41','name' => 'Hospital','slug' => 'hospital','type' => 'facilities','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 18:01:58','updated_at' => '2021-01-10 18:01:58'),
        array('id' => '42','name' => 'Super Market','slug' => 'super-market','type' => 'facilities','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 18:02:45','updated_at' => '2021-01-10 18:02:45'),
        array('id' => '43','name' => 'School','slug' => 'school','type' => 'facilities','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 18:03:04','updated_at' => '2021-01-10 18:03:04'),
        array('id' => '44','name' => 'Entertainment','slug' => 'entertainment','type' => 'facilities','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 18:03:20','updated_at' => '2021-01-10 18:03:20'),
        array('id' => '45','name' => 'Pharmacy','slug' => 'pharmacy','type' => 'facilities','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 18:04:00','updated_at' => '2021-01-10 18:04:00'),
        array('id' => '46','name' => 'Airport','slug' => 'airport','type' => 'facilities','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 18:04:23','updated_at' => '2021-01-10 18:04:23'),
        array('id' => '47','name' => 'Railways','slug' => 'railways','type' => 'facilities','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 18:04:35','updated_at' => '2021-01-10 18:04:35'),
        array('id' => '48','name' => 'Bus Stop','slug' => 'bus-stop','type' => 'facilities','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 18:04:50','updated_at' => '2021-01-10 18:04:50'),
        array('id' => '49','name' => 'Beach','slug' => 'beach','type' => 'facilities','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 18:05:04','updated_at' => '2021-01-10 18:05:04'),
        array('id' => '50','name' => 'Mall','slug' => 'mall','type' => 'facilities','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 18:05:24','updated_at' => '2021-01-10 18:05:24'),
        array('id' => '51','name' => 'Bank','slug' => 'bank','type' => 'facilities','p_id' => NULL,'featured' => '0','user_id' => '1','status' => '1','created_at' => '2021-01-10 18:05:40','updated_at' => '2021-01-10 18:05:40'),
        array('id' => '52','name' => 'AMCoders','slug' => 'amcodersrzBcY','type' => 'agency','p_id' => NULL,'featured' => NULL,'user_id' => '1','status' => '1','created_at' => '2021-01-11 14:53:20','updated_at' => '2021-01-11 15:11:04'),
        array('id' => '53','name' => 'Fast Box','slug' => 'fast-box','type' => 'agency','p_id' => NULL,'featured' => NULL,'user_id' => '1','status' => '1','created_at' => '2021-01-11 15:23:26','updated_at' => '2021-01-11 15:28:08'),
        array('id' => '54','name' => 'Company Slogan','slug' => 'company-slogan','type' => 'agency','p_id' => NULL,'featured' => NULL,'user_id' => '1','status' => '1','created_at' => '2021-01-11 15:31:19','updated_at' => '2021-01-11 15:31:19'),
        array('id' => '61','name' => 'jomidar','slug' => 'en','type' => 'lang','p_id' => NULL,'featured' => NULL,'user_id' => '1','status' => '1','created_at' => '2021-01-18 09:22:05','updated_at' => '2021-01-18 09:22:32'),
        array('id' => '62','name' => 'jomidar','slug' => 'ar','type' => 'lang','p_id' => NULL,'featured' => NULL,'user_id' => '1','status' => '1','created_at' => '2021-01-18 09:22:14','updated_at' => '2021-01-18 09:22:32'),
        array('id' => '63','name' => 'BDT','slug' => 'TK','type' => 'currency','p_id' => NULL,'featured' => '84','user_id' => '1','status' => '1','created_at' => '2020-12-31 08:16:50','updated_at' => '2020-12-31 08:16:50'),
      );      

      Category::insert($categories);

      $categorymetas = array(
        array('id' => '1','category_id' => '1','type' => 'credit_charge','content' => '100','created_at' => '2020-12-31 08:07:41','updated_at' => '2020-12-31 08:07:41'),
        array('id' => '2','category_id' => '1','type' => 'excerpt','content' => 'apartment','created_at' => '2020-12-31 08:07:41','updated_at' => '2020-12-31 08:07:41'),
        array('id' => '3','category_id' => '2','type' => 'credit_charge','content' => '150','created_at' => '2020-12-31 08:08:00','updated_at' => '2020-12-31 08:08:00'),
        array('id' => '4','category_id' => '2','type' => 'excerpt','content' => 'villa','created_at' => '2020-12-31 08:08:00','updated_at' => '2020-12-31 08:08:00'),
        array('id' => '5','category_id' => '3','type' => 'credit_charge','content' => '120','created_at' => '2020-12-31 08:08:14','updated_at' => '2020-12-31 08:08:14'),
        array('id' => '6','category_id' => '3','type' => 'excerpt','content' => 'House','created_at' => '2020-12-31 08:08:14','updated_at' => '2020-12-31 08:08:14'),
        array('id' => '7','category_id' => '4','type' => 'credit_charge','content' => '120','created_at' => '2020-12-31 08:08:30','updated_at' => '2020-12-31 08:08:30'),
        array('id' => '8','category_id' => '4','type' => 'excerpt','content' => 'Condo','created_at' => '2020-12-31 08:08:30','updated_at' => '2020-12-31 08:08:30'),
        array('id' => '9','category_id' => '5','type' => 'credit_charge','content' => '100','created_at' => '2020-12-31 08:08:49','updated_at' => '2020-12-31 08:08:49'),
        array('id' => '10','category_id' => '5','type' => 'excerpt','content' => 'land','created_at' => '2020-12-31 08:08:49','updated_at' => '2020-12-31 08:08:49'),
        array('id' => '11','category_id' => '6','type' => 'credit_charge','content' => '120','created_at' => '2020-12-31 08:09:13','updated_at' => '2020-12-31 08:09:13'),
        array('id' => '12','category_id' => '6','type' => 'excerpt','content' => 'Commercial Property','created_at' => '2020-12-31 08:09:13','updated_at' => '2020-12-31 08:09:37'),
        array('id' => '13','category_id' => '14','type' => 'position','content' => 'left','created_at' => '2020-12-31 08:16:50','updated_at' => '2020-12-31 08:16:50'),
        array('id' => '14','category_id' => '19','type' => 'preview','content' => $base_url.'/21/01/10012116102894065ffb10fe25db5.webp','created_at' => '2020-12-31 08:24:25','updated_at' => '2021-01-10 14:37:13'),
        array('id' => '15','category_id' => '19','type' => 'mapinfo','content' => '{"latitude":"23.8103","longitude":"90.4125","zoom":"10"}','created_at' => '2020-12-31 08:24:25','updated_at' => '2020-12-31 08:24:25'),
        array('id' => '16','category_id' => '20','type' => 'preview','content' => $base_url.'/21/01/10012116102894135ffb11055db3b.webp','created_at' => '2020-12-31 08:25:23','updated_at' => '2021-01-10 14:36:58'),
        array('id' => '17','category_id' => '20','type' => 'mapinfo','content' => '{"latitude":"22.3569","longitude":"91.7832","zoom":"10"}','created_at' => '2020-12-31 08:25:23','updated_at' => '2020-12-31 08:25:23'),
        array('id' => '18','category_id' => '21','type' => 'preview','content' => '','created_at' => '2020-12-31 08:27:36','updated_at' => '2020-12-31 08:27:36'),
        array('id' => '19','category_id' => '21','type' => 'mapinfo','content' => '{"latitude":"23.8103","longitude":"90.4125","zoom":"10"}','created_at' => '2020-12-31 08:27:36','updated_at' => '2020-12-31 08:27:36'),
        array('id' => '20','category_id' => '22','type' => 'preview','content' => '','created_at' => '2020-12-31 08:28:31','updated_at' => '2020-12-31 08:28:31'),
        array('id' => '21','category_id' => '22','type' => 'mapinfo','content' => '{"latitude":"23.6019","longitude":"89.8333","zoom":"10"}','created_at' => '2020-12-31 08:28:31','updated_at' => '2020-12-31 08:28:31'),
        array('id' => '22','category_id' => '23','type' => 'preview','content' => '','created_at' => '2020-12-31 08:29:17','updated_at' => '2020-12-31 08:29:17'),
        array('id' => '23','category_id' => '23','type' => 'mapinfo','content' => '{"latitude":"22.3569","longitude":"91.7282","zoom":"10"}','created_at' => '2020-12-31 08:29:17','updated_at' => '2020-12-31 08:29:17'),
        array('id' => '24','category_id' => '24','type' => 'preview','content' => '','created_at' => '2020-12-31 08:30:51','updated_at' => '2020-12-31 08:30:51'),
        array('id' => '25','category_id' => '24','type' => 'mapinfo','content' => '{"latitude":"21.4272","longitude":"92.0058","zoom":"10"}','created_at' => '2020-12-31 08:30:51','updated_at' => '2020-12-31 08:30:51'),
        array('id' => '26','category_id' => '31','type' => 'preview','content' => $base_url.'/21/01/10012116102905585ffb157edfcf8.webp','created_at' => '2021-01-10 14:56:28','updated_at' => '2021-01-10 14:56:28'),
        array('id' => '27','category_id' => '31','type' => 'mapinfo','content' => '{"latitude":"24.3745","longitude":"88.6042","zoom":"10"}','created_at' => '2021-01-10 14:56:28','updated_at' => '2021-01-10 14:56:28'),
        array('id' => '28','category_id' => '32','type' => 'preview','content' => $base_url.'/21/01/10012116102905605ffb158005816.webp','created_at' => '2021-01-10 14:57:58','updated_at' => '2021-01-10 14:57:58'),
        array('id' => '29','category_id' => '32','type' => 'mapinfo','content' => '{"latitude":"23.1778","longitude":"89.1801","zoom":"10"}','created_at' => '2021-01-10 14:57:58','updated_at' => '2021-01-10 14:57:58'),
        array('id' => '30','category_id' => '33','type' => 'preview','content' => $base_url.'/21/01/10012116102905595ffb157f46dcc.webp','created_at' => '2021-01-10 14:59:05','updated_at' => '2021-01-10 14:59:05'),
        array('id' => '31','category_id' => '33','type' => 'mapinfo','content' => '{"latitude":"22.8456","longitude":"89.5403","zoom":"10"}','created_at' => '2021-01-10 14:59:05','updated_at' => '2021-01-10 14:59:05'),
        array('id' => '32','category_id' => '34','type' => 'preview','content' => $base_url.'/21/01/10012116102905595ffb157fa23a5.webp','created_at' => '2021-01-10 15:02:50','updated_at' => '2021-01-10 15:04:15'),
        array('id' => '33','category_id' => '34','type' => 'mapinfo','content' => '{"latitude":"24.8949","longitude":"91.8687","zoom":"10"}','created_at' => '2021-01-10 15:02:50','updated_at' => '2021-01-10 15:02:50'),
        array('id' => '34','category_id' => '35','type' => 'icon','content' => 'fas fa-wifi','created_at' => '2021-01-10 17:53:51','updated_at' => '2021-01-10 17:53:51'),
        array('id' => '35','category_id' => '36','type' => 'icon','content' => 'fas fa-swimmer','created_at' => '2021-01-10 17:54:12','updated_at' => '2021-01-10 17:54:12'),
        array('id' => '36','category_id' => '37','type' => 'icon','content' => 'fas fa-car-side','created_at' => '2021-01-10 17:54:37','updated_at' => '2021-01-10 17:54:37'),
        array('id' => '37','category_id' => '38','type' => 'icon','content' => 'fas fa-user-secret','created_at' => '2021-01-10 17:54:57','updated_at' => '2021-01-10 17:54:57'),
        array('id' => '38','category_id' => '39','type' => 'icon','content' => 'fas fa-hand-holding-heart','created_at' => '2021-01-10 17:55:39','updated_at' => '2021-01-10 17:55:39'),
        array('id' => '39','category_id' => '40','type' => 'icon','content' => 'fas fa-archway','created_at' => '2021-01-10 17:56:00','updated_at' => '2021-01-10 17:56:00'),
        array('id' => '40','category_id' => '41','type' => 'icon','content' => 'far fa-hospital','created_at' => '2021-01-10 18:01:58','updated_at' => '2021-01-10 18:01:58'),
        array('id' => '41','category_id' => '42','type' => 'icon','content' => 'fas fa-shopping-cart','created_at' => '2021-01-10 18:02:45','updated_at' => '2021-01-10 18:02:45'),
        array('id' => '42','category_id' => '43','type' => 'icon','content' => 'fas fa-school','created_at' => '2021-01-10 18:03:04','updated_at' => '2021-01-10 18:03:04'),
        array('id' => '43','category_id' => '44','type' => 'icon','content' => 'fas fa-align-center','created_at' => '2021-01-10 18:03:20','updated_at' => '2021-01-10 18:03:20'),
        array('id' => '44','category_id' => '45','type' => 'icon','content' => 'fas fa-hand-holding-heart','created_at' => '2021-01-10 18:04:00','updated_at' => '2021-01-10 18:04:00'),
        array('id' => '45','category_id' => '46','type' => 'icon','content' => 'fab fa-angrycreative','created_at' => '2021-01-10 18:04:23','updated_at' => '2021-01-10 18:04:23'),
        array('id' => '46','category_id' => '47','type' => 'icon','content' => 'fas fa-train','created_at' => '2021-01-10 18:04:35','updated_at' => '2021-01-10 18:04:35'),
        array('id' => '47','category_id' => '48','type' => 'icon','content' => 'fas fa-bus','created_at' => '2021-01-10 18:04:50','updated_at' => '2021-01-10 18:04:50'),
        array('id' => '48','category_id' => '49','type' => 'icon','content' => 'fas fa-umbrella-beach','created_at' => '2021-01-10 18:05:05','updated_at' => '2021-01-10 18:05:05'),
        array('id' => '49','category_id' => '50','type' => 'icon','content' => 'fas fa-luggage-cart','created_at' => '2021-01-10 18:05:24','updated_at' => '2021-01-10 18:05:24'),
        array('id' => '50','category_id' => '51','type' => 'icon','content' => 'fas fa-money-bill','created_at' => '2021-01-10 18:05:40','updated_at' => '2021-01-10 18:05:40'),
        array('id' => '51','category_id' => '17','type' => 'preview','content' => $base_url.'/21/01/11012116103399535ffbd67132cff.webp','created_at' => '2021-01-11 04:39:26','updated_at' => '2021-01-11 04:39:26'),
        array('id' => '52','category_id' => '16','type' => 'preview','content' => $base_url.'/21/01/11012116103399535ffbd671f06e5.webp','created_at' => '2021-01-11 04:39:50','updated_at' => '2021-01-11 04:39:50'),
        array('id' => '53','category_id' => '15','type' => 'preview','content' => $base_url.'/21/01/11012116103399535ffbd671f06e5.webp','created_at' => '2021-01-11 04:44:08','updated_at' => '2021-01-11 04:44:08'),
        array('id' => '54','category_id' => '52','type' => 'credit','content' => NULL,'created_at' => '2021-01-11 14:53:21','updated_at' => '2021-01-11 14:53:21'),
        array('id' => '55','category_id' => '52','type' => 'preview','content' => $base_url.'/21/01/11012116103778575ffc6a81e5911.webp','created_at' => '2021-01-11 14:53:21','updated_at' => '2021-01-11 15:11:04'),
        array('id' => '56','category_id' => '52','type' => 'content','content' => '{"address":"Dhaka, Savar","phone":"096545345345","description":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.","facebook":"#","twitter":"#","youtube":"#","pinterest":"#","linkedin":"#","instagram":"#","whatsapp":"2342342342342","service_area":"Dhaka, Khulna, Savar","tax_number":"35235325353","license":"32432523532532","email":"support@email.com"}','created_at' => '2021-01-11 14:53:21','updated_at' => '2021-01-11 14:53:21'),
        array('id' => '57','category_id' => '53','type' => 'credit','content' => NULL,'created_at' => '2021-01-11 15:23:26','updated_at' => '2021-01-11 15:23:26'),
        array('id' => '58','category_id' => '53','type' => 'preview','content' => $base_url.'/21/01/11012116103785955ffc6d635efd4.webp','created_at' => '2021-01-11 15:23:26','updated_at' => '2021-01-11 15:23:26'),
        array('id' => '59','category_id' => '53','type' => 'content','content' => '{"address":"Agrabad, Chittagong","phone":"045345345345345","description":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","facebook":"#","twitter":"#","youtube":"#","pinterest":"#","linkedin":"#","instagram":"#","whatsapp":"547457457457","service_area":"Naogaon, Dhaka, Kirtipur","tax_number":"43653463463463","license":"353456345353535","email":"support@morden.com"}','created_at' => '2021-01-11 15:23:26','updated_at' => '2021-01-11 15:23:26'),
        array('id' => '60','category_id' => '54','type' => 'credit','content' => NULL,'created_at' => '2021-01-11 15:31:19','updated_at' => '2021-01-11 15:31:19'),
        array('id' => '61','category_id' => '54','type' => 'preview','content' => $base_url.'/21/01/11012116103785945ffc6d62d6210.webp','created_at' => '2021-01-11 15:31:19','updated_at' => '2021-01-11 15:31:19'),
        array('id' => '62','category_id' => '54','type' => 'content','content' => '{"address":"Naogaon, Kirtipur","phone":"034324324324324","description":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.","facebook":"#","twitter":"#","youtube":"#","pinterest":"#","linkedin":"#","instagram":"#","whatsapp":"#","service_area":"Naogaon, Kirtipur, Mohadebpur","tax_number":"345435345325325","license":"3532532532532532523","email":"support@company.com"}','created_at' => '2021-01-11 15:31:19','updated_at' => '2021-01-11 15:31:19'),
        array('id' => '69','category_id' => '61','type' => 'lang','content' => '{"lang_name":"English","lang_position":"LTR"}','created_at' => '2021-01-18 09:22:05','updated_at' => '2021-01-18 09:22:05'),
        array('id' => '70','category_id' => '62','type' => 'lang','content' => '{"lang_name":"Arabic","lang_position":"RTL"}','created_at' => '2021-01-18 09:22:14','updated_at' => '2021-01-18 09:22:14'),
        array('id' => '71','category_id' => '63','type' => 'position','content' => 'right','created_at' => '2020-12-31 08:16:50','updated_at' => '2020-12-31 08:16:50'),
      );

     Categorymeta::insert($categorymetas); 

     $categoryusers = array(
      array('category_id' => '52','user_id' => '2'),
      array('category_id' => '52','user_id' => '3'),
      array('category_id' => '52','user_id' => '4'),
      array('category_id' => '53','user_id' => '2'),
      array('category_id' => '53','user_id' => '3'),
      array('category_id' => '53','user_id' => '4'),
      array('category_id' => '54','user_id' => '2'),
      array('category_id' => '54','user_id' => '3'),
      array('category_id' => '54','user_id' => '4')
    );

    Categoryuser::insert($categoryusers);

     $categoryrelations = array(
      array('parent_id' => '18','child_id' => '4'),
      array('parent_id' => '17','child_id' => '1'),
      array('parent_id' => '17','child_id' => '2'),
      array('parent_id' => '17','child_id' => '3'),
      array('parent_id' => '17','child_id' => '4'),
      array('parent_id' => '17','child_id' => '5'),
      array('parent_id' => '17','child_id' => '6'),
      array('parent_id' => '16','child_id' => '1'),
      array('parent_id' => '16','child_id' => '2'),
      array('parent_id' => '16','child_id' => '3'),
      array('parent_id' => '16','child_id' => '4'),
      array('parent_id' => '16','child_id' => '5'),
      array('parent_id' => '16','child_id' => '6'),
      array('parent_id' => '15','child_id' => '6')
    );
    
    

     Categoryrelation::insert($categoryrelations);


     $customizers = array(
      array('id' => '1','key' => 'property_agents','theme_name' => 'jomidar','value' => '{"settings":{"property_agent_title":{"old_value":null,"new_value":"Property Agents"},"property_agent_descrtiption":{"old_value":null,"new_value":"Proportioned interiors Club over 10,000 square feet"},"property_agent_btn_title":{"old_value":null,"new_value":"View All Agents"}}}','status' => '1','created_at' => '2020-11-20 09:09:16','updated_at' => '2020-11-20 09:11:06'),
      array('id' => '2','key' => 'hero','theme_name' => 'jomidar','value' => '{"settings":{"hero_big_title":{"old_value":null,"new_value":"Best Place To Find Dream Home."},"hero_des":{"old_value":null,"new_value":"From as low as $10 per day with limited time offer discounts."},"hero_address_placeholder":{"old_value":null,"new_value":"Enter keyword"},"hero_search_btn":{"old_value":null,"new_value":"Search"},"hero_background_img":{"old_value":null,"new_value":"uploads\\/2020-11-20-5fb7880d921db.jpg"}}}','status' => '1','created_at' => '2020-11-20 09:10:04','updated_at' => '2020-11-20 09:11:06'),
      array('id' => '3','key' => 'header','theme_name' => 'jomidar','value' => '{"settings":{"logo":{"old_value":null,"new_value":"uploads\\/2020-11-20-5fb78818a17c8.png"},"header_signin_title":{"old_value":null,"new_value":"Sign In"},"header_create_property_title":{"old_value":null,"new_value":"Create Property"},"header_phone_number":{"old_value":"+945253322","new_value":"+0433423242331"},"header_email_address":{"old_value":null,"new_value":"support@amcoders.com"}}}','status' => '1','created_at' => '2020-11-20 09:10:48','updated_at' => '2021-01-21 09:52:53'),
      array('id' => '4','key' => 'featured_properties','theme_name' => 'jomidar','value' => '{"settings":{"featured_properties_title":{"old_value":null,"new_value":"Featured Properties"},"featured_properties_des":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."},"featured_properties_btn_title":{"old_value":null,"new_value":"View All Properties"}}}','status' => '1','created_at' => '2020-11-20 09:17:55','updated_at' => '2020-11-20 09:18:28'),
      array('id' => '5','key' => 'find_city','theme_name' => 'jomidar','value' => '{"settings":{"find_city_bg_img":{"old_value":null,"new_value":"uploads\\/2020-11-20-5fb78ac53aa98.jpg"},"find_city_title":{"old_value":null,"new_value":"Find us in these cities"},"find_city_des":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."}}}','status' => '1','created_at' => '2020-11-20 09:22:13','updated_at' => '2020-11-20 09:22:32'),
      array('id' => '6','key' => 'blog_list','theme_name' => 'jomidar','value' => '{"settings":{"blog_list_title":{"old_value":"All Blogs","new_value":"All Blogs"},"blog_list_des":{"old_value":null,"new_value":"Proportioned interiors Club over 10,000 square feet"},"blog_list_btn_title":{"old_value":null,"new_value":"View All Blogs"}}}','status' => '1','created_at' => '2020-11-20 09:25:44','updated_at' => '2020-11-20 09:26:15'),
      array('id' => '7','key' => 'footer','theme_name' => 'jomidar','value' => '{"settings":{"footer_image":{"old_value":null,"new_value":"uploads\\/2020-11-20-5fb792e445c04.png"},"footer_des":{"old_value":"Maruf","new_value":"Lorem ipsum dolor sit amet, consect etur adi pisicing elit sed do eiusmod tempor incididunt ut labore."},"footer_copyright":{"old_value":null,"new_value":"Copyright \\u00a9 Website - 2020. Design By Amcoders"}},"content":{"footer_right":{"footer_right_title":{"old_value":null,"new_value":"Newsletter"},"footer_right_des":{"old_value":null,"new_value":"88 Broklyn Golden Street, New York. USA needhelp@ziston.com"},"footer_right_btn_title":{"old_value":null,"new_value":"Subscribe"}}}}','status' => '1','created_at' => '2020-11-20 09:56:52','updated_at' => '2021-02-07 09:51:12'),
      array('id' => '8','key' => 'blog_breadcrumb','theme_name' => 'jomidar','value' => '{"settings":{"bg_breadcrumb_img":{"old_value":"uploads\\/2021-01-12-5ffdd9e633477.jpg","new_value":"uploads\\/2021-01-12-5ffddab2e1121.jpg"},"breadcrumb_title":{"old_value":null,"new_value":"Blog Lists"},"breadcrumb_des":{"old_value":null,"new_value":"Blog Lists"},"bg_blog_breadcrumb_img":{"old_value":null,"new_value":"uploads\\/2021-01-12-5ffddada9c2c4.jpg"}}}','status' => '1','created_at' => '2021-01-12 17:18:30','updated_at' => '2021-01-12 17:22:36'),
      array('id' => '9','key' => 'agency_list_breadcrumb','theme_name' => 'jomidar','value' => '{"settings":{"bg_breadcrumb_img":{"old_value":null,"new_value":"uploads\\/2021-01-12-5ffdda0a49b41.jpg"},"breadcrumb_title":{"old_value":null,"new_value":"Agency Lists"},"breadcrumb_des":{"old_value":null,"new_value":"Agency Lists"},"breadcrumb_agency_title":{"old_value":null,"new_value":"All Agency"},"breadcrumb_agency_des":{"old_value":null,"new_value":"All Agency"}}}','status' => '1','created_at' => '2021-01-12 17:19:06','updated_at' => '2021-01-21 00:15:11'),
      array('id' => '10','key' => 'breadcrumb','theme_name' => 'jomidar','value' => '{"settings":{"bg_breadcrumb_img":{"old_value":null,"new_value":"uploads\\/2021-01-12-5ffdda1eb1adb.jpg"},"breadcrumb_title":{"old_value":null,"new_value":"Agent Lists"},"breadcrumb_des":{"old_value":null,"new_value":"Agent Lists"},"breadcrumb_agent_title":{"old_value":null,"new_value":"All Agents"},"breadcrumb_agent_des":{"old_value":null,"new_value":"All Agents"}}}','status' => '1','created_at' => '2021-01-12 17:19:26','updated_at' => '2021-01-21 00:14:49'),
      array('id' => '11','key' => 'header','theme_name' => 'zamindar','value' => '{"settings":{"header_phone_number":{"old_value":"4354354364443","new_value":"435435436444"},"header_email_address":{"old_value":null,"new_value":"support@amcoders.com"},"logo":{"old_value":null,"new_value":"uploads\\/2021-01-24-600d4506f0667.png"},"header_signin_title":{"old_value":null,"new_value":"Sign In"},"header_create_property_title":{"old_value":null,"new_value":"Create Property"}}}','status' => '1','created_at' => '2021-01-24 15:58:44','updated_at' => '2021-01-24 16:00:32'),
      array('id' => '12','key' => 'featured_properties','theme_name' => 'zamindar','value' => '{"settings":{"featured_properties_title":{"old_value":"Latest Property","new_value":"Latest Properties"},"featured_properties_des":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."},"featured_properties_btn_title":{"old_value":null,"new_value":"View All Properties"}}}','status' => '1','created_at' => '2021-01-24 16:00:57','updated_at' => '2021-01-24 16:01:25'),
      array('id' => '13','key' => 'blog_list','theme_name' => 'zamindar','value' => '{"settings":{"blog_list_title":{"old_value":null,"new_value":"Latest Blogs"},"blog_list_des":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."},"blog_list_btn_title":{"old_value":null,"new_value":"View All Blogs"}}}','status' => '1','created_at' => '2021-01-24 16:01:46','updated_at' => '2021-01-24 16:02:04'),
      array('id' => '14','key' => 'footer','theme_name' => 'zamindar','value' => '{"settings":{"footer_image":{"old_value":null,"new_value":"uploads\\/2021-01-24-600d45bb7e54d.png"},"footer_des":{"old_value":null,"new_value":"Lorem ipsum dolor sit amet, consect etur adi pisicing elit sed do eiusmod tempor incididunt ut labore."},"footer_copyright":{"old_value":null,"new_value":"Copyright \\u00a9 Jomidar - 2020. Design By Amcoders"}},"content":{"":{"social_facebook_link":{"old_value":null,"new_value":"#"},"social_twitter_link":{"old_value":null,"new_value":"#"},"social_google_link":{"old_value":null,"new_value":"#"},"social_instagram_link":{"old_value":null,"new_value":"#"},"social_pinterest_link":{"old_value":null,"new_value":"#"}},"footer_right":{"footer_right_title":{"old_value":null,"new_value":"Newsletter"},"footer_right_des":{"old_value":null,"new_value":"88 Broklyn Golden Street, New York. USA needhelp@ziston.com"},"footer_right_btn_title":{"old_value":null,"new_value":"Subscribe"}}}}','status' => '1','created_at' => '2021-01-24 16:02:35','updated_at' => '2021-01-24 16:03:48'),
      array('id' => '15','key' => 'hero','theme_name' => 'zamindar','value' => '{"settings":{"hero_background_img":{"old_value":null,"new_value":"uploads\\/2021-01-24-600da81638203.jpg"},"hero_big_title":{"old_value":null,"new_value":"Fast way to achieve your goals in business"},"hero_des":{"old_value":null,"new_value":"To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine occidental"},"hero_btn_title":{"old_value":null,"new_value":"Learn More"},"hero_btn_link":{"old_value":null,"new_value":"#"},"hero_address_placeholder":{"old_value":null,"new_value":"Enter Your Address"},"hero_search_btn":{"old_value":null,"new_value":"Search"}}}','status' => '1','created_at' => '2021-01-24 23:02:14','updated_at' => '2021-01-24 23:03:36'),
      array('id' => '16','key' => 'find_city','theme_name' => 'zamindar','value' => '{"settings":{"find_city_title":{"old_value":"Find us in your city","new_value":"Find us in your city"},"find_city_des":{"old_value":"Handpicked Exclusive Properties By Our Team.","new_value":"Handpicked Exclusive Properties By Our Team."},"city_btn_title":{"old_value":null,"new_value":"View All City"}}}','status' => '1','created_at' => '2021-01-24 23:23:20','updated_at' => '2021-01-24 23:24:44'),
      array('id' => '17','key' => 'property_agents','theme_name' => 'zamindar','value' => '{"settings":{"property_agent_title":{"old_value":null,"new_value":"Property Agents"},"property_agent_descrtiption":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."},"property_agent_btn_title":{"old_value":null,"new_value":"View All Agents"}}}','status' => '1','created_at' => '2021-01-24 23:37:51','updated_at' => '2021-01-24 23:38:15'),
      array('id' => '18','key' => 'counter','theme_name' => 'zamindar','value' => '{"content":{"counter_first_section":{"counter_first_section_title":{"old_value":"to","new_value":"Total Agents"},"counter_first_section_count":{"old_value":null,"new_value":"880"}},"counter_second_section":{"counter_second_section_title":{"old_value":null,"new_value":"Total Sales"},"counter_second_section_count":{"old_value":null,"new_value":"1798"}},"counter_third_section":{"counter_third_section_title":{"old_value":null,"new_value":"Total Projects"},"counter_third_section_count":{"old_value":null,"new_value":"582"}},"counter_four_section":{"counter_four_section_title":{"old_value":null,"new_value":"Total Customers"},"counter_four_section_count":{"old_value":null,"new_value":"3698"}}},"settings":{"counter_bg_img":{"old_value":"uploads\\/2021-01-25-600e4f6bf146a.png","new_value":"uploads\\/2021-01-25-600e4fa1d2490.jpg"}}}','status' => '1','created_at' => '2021-01-25 10:50:05','updated_at' => '2021-01-25 10:58:05'),
      array('id' => '19','key' => 'header','theme_name' => 'bari','value' => '{"settings":{"header_phone_number":{"old_value":"+97867855656","new_value":"4354354364443"},"header_email_address":{"old_value":"support@amcod","new_value":"support@amcoders.com"},"logo":{"old_value":"uploads\\/2021-01-27-601191c16b1fd.png","new_value":"uploads\\/2021-01-27-601191c5582e8.png"},"header_create_property_title":{"old_value":"Create Property","new_value":"Create Property"}}}','status' => '1','created_at' => '2021-01-27 22:11:34','updated_at' => '2021-01-27 22:16:39'),
      array('id' => '20','key' => 'hero','theme_name' => 'bari','value' => '{"settings":{"hero_background_img":{"old_value":null,"new_value":"uploads\\/2021-01-27-60119119268d7.jpg"},"hero_big_title":{"old_value":null,"new_value":"Discover Your Best Place to Live"},"hero_des":{"old_value":null,"new_value":"To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine occidental"},"hero_first_btn_title":{"old_value":null,"new_value":"Learn More"},"hero_second_btn_title":{"old_value":null,"new_value":"View Details"},"hero_first_btn_link":{"old_value":null,"new_value":"#"},"hero_second_btn_link":{"old_value":null,"new_value":"#"}}}','status' => '1','created_at' => '2021-01-27 22:13:13','updated_at' => '2021-01-27 22:14:06'),
      array('id' => '21','key' => 'featured_properties','theme_name' => 'bari','value' => '{"settings":{"featured_properties_title":{"old_value":null,"new_value":"Latest Properties"},"featured_properties_des":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."},"featured_properties_btn_title":{"old_value":null,"new_value":"View All Properties"}}}','status' => '1','created_at' => '2021-01-27 22:16:52','updated_at' => '2021-01-27 22:17:17'),
      array('id' => '22','key' => 'property_agents','theme_name' => 'bari','value' => '{"settings":{"property_agent_title":{"old_value":null,"new_value":"Property Agents"},"property_agent_descrtiption":{"old_value":null,"new_value":"Proportioned interiors Club over 10,000 square feet"},"property_agent_btn_title":{"old_value":null,"new_value":"View All Agents"}}}','status' => '1','created_at' => '2021-01-27 22:17:55','updated_at' => '2021-01-27 22:18:21'),
      array('id' => '23','key' => 'find_city','theme_name' => 'bari','value' => '{"settings":{"find_city_title":{"old_value":null,"new_value":"Find us in your city"},"find_city_des":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."}}}','status' => '1','created_at' => '2021-01-27 22:18:27','updated_at' => '2021-01-27 22:18:47'),
      array('id' => '24','key' => 'blog_list','theme_name' => 'bari','value' => '{"settings":{"blog_list_title":{"old_value":null,"new_value":"Latest Blogs"},"blog_list_des":{"old_value":null,"new_value":"Proportioned interiors Club over 10,000 square feet"},"blog_list_btn_title":{"old_value":null,"new_value":"View All Blogs"}}}','status' => '1','created_at' => '2021-01-27 22:19:00','updated_at' => '2021-01-27 22:19:12'),
      array('id' => '25','key' => 'footer','theme_name' => 'bari','value' => '{"settings":{"footer_image":{"old_value":null,"new_value":"uploads\\/2021-01-27-6011928987ddb.png"},"footer_des":{"old_value":null,"new_value":"Lorem ipsum dolor sit amet, consect etur adi pisicing elit sed do eiusmod tempor incididunt ut labore."},"footer_copyright":{"old_value":null,"new_value":"Copyright \\u00a9 Website - 2020. Design By Amcoders"}},"content":{"":{"social_facebook_link":{"old_value":null,"new_value":"#"},"social_twitter_link":{"old_value":null,"new_value":"#"},"social_google_link":{"old_value":null,"new_value":"#"},"social_instagram_link":{"old_value":null,"new_value":"#"},"social_pinterest_link":{"old_value":null,"new_value":"#"}},"footer_right":{"footer_right_title":{"old_value":null,"new_value":"Newsletter"},"footer_right_des":{"old_value":null,"new_value":"88 Broklyn Golden Street, New York. USA needhelp@ziston.com"},"footer_right_btn_title":{"old_value":null,"new_value":"Subscribe"}}}}','status' => '1','created_at' => '2021-01-27 22:19:21','updated_at' => '2021-01-27 22:20:15'),
      array('id' => '26','key' => 'hero','theme_name' => 'hazibari','value' => '{"settings":{"hero_background_img":{"old_value":null,"new_value":"uploads\\/2021-01-29-601412e0f0233.jpg"},"hero_big_title":{"old_value":null,"new_value":"Find Your Future Home"}}}','status' => '1','created_at' => '2021-01-29 19:51:29','updated_at' => '2021-01-29 19:51:39'),
      array('id' => '27','key' => 'find_city','theme_name' => 'hazibari','value' => '{"settings":{"find_city_title":{"old_value":null,"new_value":"Find us in your city"},"find_city_des":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."}}}','status' => '1','created_at' => '2021-01-29 19:56:22','updated_at' => '2021-01-29 19:56:34'),
      array('id' => '28','key' => 'blog_list','theme_name' => 'hazibari','value' => '{"settings":{"blog_list_title":{"old_value":null,"new_value":"Latest Blogs"},"blog_list_des":{"old_value":null,"new_value":"Proportioned interiors Club over 10,000 square feet"},"blog_list_btn_title":{"old_value":null,"new_value":"View All Blogs"}}}','status' => '1','created_at' => '2021-01-29 20:05:25','updated_at' => '2021-01-29 20:07:49'),
      array('id' => '29','key' => 'footer','theme_name' => 'hazibari','value' => '{"settings":{"footer_image":{"old_value":null,"new_value":"uploads\\/2021-01-29-6014164031f32.png"},"footer_des":{"old_value":null,"new_value":"Lorem ipsum dolor sit amet, consect etur adi pisicing elit sed do eiusmod tempor incididunt ut labore."},"footer_copyright":{"old_value":null,"new_value":"Copyright \\u00a9 Website - 2020. Design By Amcoders"}},"content":{"":{"social_facebook_link":{"old_value":"#ede","new_value":"fgfg"},"social_twitter_link":{"old_value":"#","new_value":"dfdfdsf"},"social_google_link":{"old_value":null,"new_value":"#"},"social_instagram_link":{"old_value":null,"new_value":"#"},"social_pinterest_link":{"old_value":null,"new_value":"#"}},"footer_right":{"footer_right_title":{"old_value":null,"new_value":"Newsletter"},"footer_right_des":{"old_value":null,"new_value":"88 Broklyn Golden Street, New York. USA needhelp@ziston.com"},"footer_right_btn_title":{"old_value":null,"new_value":"Subscribe"}}}}','status' => '1','created_at' => '2021-01-29 20:05:52','updated_at' => '2021-01-29 20:09:07'),
      array('id' => '30','key' => 'featured_properties','theme_name' => 'hazibari','value' => '{"settings":{"featured_properties_title":{"old_value":null,"new_value":"Latest Properties"},"featured_properties_des":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."},"featured_properties_btn_title":{"old_value":null,"new_value":"View All Properties"}}}','status' => '1','created_at' => '2021-01-29 20:14:56','updated_at' => '2021-01-29 20:15:15'),
      array('id' => '31','key' => 'review','theme_name' => 'hazibari','value' => '{"settings":{"review_bg_img":{"old_value":null,"new_value":"uploads\\/2021-01-29-601419b6c2696.png"},"review_title":{"old_value":null,"new_value":"Good Reviews By Clients"},"review_des":{"old_value":null,"new_value":"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam."}}}','status' => '1','created_at' => '2021-01-29 20:20:38','updated_at' => '2021-01-29 20:21:17'),
      array('id' => '32','key' => 'header','theme_name' => 'thakorbari','value' => '{"settings":{"header_phone_number":{"old_value":null,"new_value":"4354354364443"},"header_email_address":{"old_value":null,"new_value":"support@amcoders.com"},"logo":{"old_value":"uploads\\/2021-01-30-6015670368313.png","new_value":"uploads\\/2021-01-30-60156786463dc.png"},"header_signin_title":{"old_value":null,"new_value":"Sign In"},"header_create_property_title":{"old_value":null,"new_value":"Create Property"}}}','status' => '1','created_at' => '2021-01-30 20:02:09','updated_at' => '2021-01-30 20:05:00'),
      array('id' => '33','key' => 'hero','theme_name' => 'thakorbari','value' => '{"settings":{"hero_background_img":{"old_value":null,"new_value":"uploads\\/2021-01-30-60156797f0bab.png"},"hero_big_title":{"old_value":null,"new_value":"GET A PROPERTY NOW @ AFFORDABLE PRICE"},"hero_des":{"old_value":null,"new_value":"Making Real Estate Simple & Easier for your Business or your Family"},"hero_address_placeholder":{"old_value":null,"new_value":"Location"},"hero_search_btn":{"old_value":null,"new_value":"Search"}}}','status' => '1','created_at' => '2021-01-30 20:05:12','updated_at' => '2021-01-30 20:05:49'),
      array('id' => '34','key' => 'featured_properties','theme_name' => 'thakorbari','value' => '{"settings":{"featured_properties_title":{"old_value":null,"new_value":"Latest Properties"},"featured_properties_des":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."},"featured_properties_btn_title":{"old_value":null,"new_value":"View All Properties"}}}','status' => '1','created_at' => '2021-01-30 20:10:31','updated_at' => '2021-01-30 20:13:11'),
      array('id' => '35','key' => 'counter','theme_name' => 'thakorbari','value' => '{"settings":{"counter_bg_img":{"old_value":null,"new_value":"uploads\\/2021-01-30-601568fe127bc.jpg"}},"content":{"counter_first_section":{"counter_first_section_title":{"old_value":null,"new_value":"Total Agents"},"counter_first_section_count":{"old_value":null,"new_value":"880"}},"counter_second_section":{"counter_second_section_title":{"old_value":null,"new_value":"Total Sales"},"counter_second_section_count":{"old_value":null,"new_value":"1798"}},"counter_third_section":{"counter_third_section_title":{"old_value":null,"new_value":"Total Projects"},"counter_third_section_count":{"old_value":null,"new_value":"582"}},"counter_four_section":{"counter_four_section_title":{"old_value":null,"new_value":"Total Customers"},"counter_four_section_count":{"old_value":null,"new_value":"3698"}}}}','status' => '1','created_at' => '2021-01-30 20:11:10','updated_at' => '2021-01-30 20:13:11'),
      array('id' => '36','key' => 'blog_list','theme_name' => 'thakorbari','value' => '{"settings":{"blog_list_title":{"old_value":null,"new_value":"Latest Blogs"},"blog_list_des":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."},"blog_list_btn_title":{"old_value":null,"new_value":"View All Blogs"}}}','status' => '1','created_at' => '2021-01-30 20:11:52','updated_at' => '2021-01-30 20:13:11'),
      array('id' => '37','key' => 'footer','theme_name' => 'thakorbari','value' => '{"settings":{"footer_image":{"old_value":null,"new_value":"uploads\\/2021-01-30-60156938d54e6.png"},"footer_des":{"old_value":null,"new_value":"Lorem ipsum dolor sit amet, consect etur adi pisicing elit sed do eiusmod tempor incididunt ut labore."},"footer_copyright":{"old_value":null,"new_value":"Copyright \\u00a9 Website - 2020. Design By Amcoders"}},"content":{"footer_right":{"footer_right_title":{"old_value":null,"new_value":"Newsletter"},"footer_right_des":{"old_value":null,"new_value":"88 Broklyn Golden Street, New York. USA needhelp@ziston.com"},"footer_right_btn_title":{"old_value":null,"new_value":"Subscribe"}}}}','status' => '1','created_at' => '2021-01-30 20:12:08','updated_at' => '2021-01-30 20:13:12'),
      array('id' => '38','key' => 'property_agents','theme_name' => 'thakorbari','value' => '{"settings":{"property_agent_title":{"old_value":null,"new_value":"Property Agents"},"property_agent_descrtiption":{"old_value":null,"new_value":"Proportioned interiors Club over 10,000 square feet"},"property_agent_btn_title":{"old_value":null,"new_value":"View All Agents"}}}','status' => '1','created_at' => '2021-01-30 20:20:34','updated_at' => '2021-01-30 20:21:04'),
      array('id' => '39','key' => 'header','theme_name' => 'amarbari','value' => '{"settings":{"header_phone_number":{"old_value":"4354354364443","new_value":"4354354364443"},"header_email_address":{"old_value":"support@amcoders.com","new_value":"support@amcoders.com"},"logo":{"old_value":"uploads\\/2021-01-30-60156ed56440f.png","new_value":"uploads\\/2021-01-30-60156ee761243.png"},"header_create_property_title":{"old_value":"Create Property","new_value":"Create Property"}}}','status' => '1','created_at' => '2021-01-30 20:35:55','updated_at' => '2021-01-30 20:36:27'),
      array('id' => '40','key' => 'hero','theme_name' => 'amarbari','value' => '{"settings":{"hero_background_img":{"old_value":null,"new_value":"uploads\\/2021-01-30-60156f299d0ba.jpg"},"hero_big_title":{"old_value":null,"new_value":"Best Place To Live"},"hero_des":{"old_value":null,"new_value":"In the heart of Brooklyn, in a vibrant neighborhood just east of Prospect Park, stands an eight-story, full-service, strikingly beautiful apartment building"},"hero_first_btn_title":{"old_value":null,"new_value":"Learn More"},"hero_first_btn_link":{"old_value":null,"new_value":"#"}}}','status' => '1','created_at' => '2021-01-30 20:37:29','updated_at' => '2021-01-30 20:38:00'),
      array('id' => '41','key' => 'featured_properties','theme_name' => 'amarbari','value' => '{"settings":{"featured_properties_title":{"old_value":null,"new_value":"Latest Properties"},"featured_properties_des":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."},"featured_properties_btn_title":{"old_value":null,"new_value":"View All Properties"}}}','status' => '1','created_at' => '2021-01-30 20:38:05','updated_at' => '2021-01-30 20:39:43'),
      array('id' => '42','key' => 'find_city','theme_name' => 'amarbari','value' => '{"settings":{"find_city_title":{"old_value":null,"new_value":"Find us in your city"},"find_city_des":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."}}}','status' => '1','created_at' => '2021-01-30 20:38:30','updated_at' => '2021-01-30 20:39:43'),
      array('id' => '43','key' => 'property_agents','theme_name' => 'amarbari','value' => '{"settings":{"property_agent_title":{"old_value":null,"new_value":"Property Agents"},"property_agent_descrtiption":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."},"property_agent_btn_title":{"old_value":null,"new_value":"View All Agents"}}}','status' => '1','created_at' => '2021-01-30 20:38:39','updated_at' => '2021-01-30 20:39:43'),
      array('id' => '44','key' => 'blog_list','theme_name' => 'amarbari','value' => '{"settings":{"blog_list_title":{"old_value":null,"new_value":"Latest Blogs"},"blog_list_des":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."},"blog_list_btn_title":{"old_value":null,"new_value":"View All Blogs"}}}','status' => '1','created_at' => '2021-01-30 20:38:50','updated_at' => '2021-01-30 20:39:43'),
      array('id' => '45','key' => 'footer','theme_name' => 'amarbari','value' => '{"settings":{"footer_image":{"old_value":null,"new_value":"uploads\\/2021-01-30-60156f85e77bb.png"},"footer_des":{"old_value":null,"new_value":"Lorem ipsum dolor sit amet, consect etur adi pisicing elit sed do eiusmod tempor incididunt ut labore."}},"content":{"footer_right":{"footer_right_title":{"old_value":null,"new_value":"Newsletter"},"footer_right_des":{"old_value":null,"new_value":"88 Broklyn Golden Street, New York. USA needhelp@ziston.com"},"footer_right_btn_title":{"old_value":null,"new_value":"Subscribe"}}}}','status' => '1','created_at' => '2021-01-30 20:39:02','updated_at' => '2021-01-30 20:39:43'),
      array('id' => '46','key' => 'header','theme_name' => 'marufbari','value' => '{"settings":{"header_phone_number":{"old_value":null,"new_value":"4354354364443"},"header_email_address":{"old_value":null,"new_value":"support@amcoders.com"},"logo":{"old_value":null,"new_value":"uploads\\/2021-01-31-6016435bf23c8.png"},"header_signin_title":{"old_value":null,"new_value":"Sign In"},"header_create_property_title":{"old_value":null,"new_value":"Create Property"}}}','status' => '1','created_at' => '2021-01-31 11:42:46','updated_at' => '2021-01-31 11:45:07'),
      array('id' => '47','key' => 'hero','theme_name' => 'marufbari','value' => '{"settings":{"hero_big_title":{"old_value":"GET A PROPERTY NOW @ AFFORDABLE PRICE","new_value":"Find the good out there."},"hero_search_btn":{"old_value":null,"new_value":"Search"}}}','status' => '1','created_at' => '2021-01-31 11:43:00','updated_at' => '2021-01-31 11:45:07'),
      array('id' => '48','key' => 'featured_properties','theme_name' => 'marufbari','value' => '{"settings":{"featured_properties_title":{"old_value":null,"new_value":"Latest Properties"},"featured_properties_des":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."},"featured_properties_btn_title":{"old_value":null,"new_value":"View All Properties"}}}','status' => '1','created_at' => '2021-01-31 11:43:21','updated_at' => '2021-01-31 11:45:07'),
      array('id' => '49','key' => 'counter','theme_name' => 'marufbari','value' => '{"content":{"counter_first_section":{"counter_first_section_title":{"old_value":null,"new_value":"Total Agents"},"counter_first_section_count":{"old_value":null,"new_value":"880"}},"counter_second_section":{"counter_second_section_title":{"old_value":null,"new_value":"Total Sales"},"counter_second_section_count":{"old_value":null,"new_value":"1798"}},"counter_third_section":{"counter_third_section_title":{"old_value":null,"new_value":"Total Projects"},"counter_third_section_count":{"old_value":null,"new_value":"582"}},"counter_four_section":{"counter_four_section_title":{"old_value":null,"new_value":"Total Customers"},"counter_four_section_count":{"old_value":null,"new_value":"3698"}}},"settings":{"counter_bg_img":{"old_value":null,"new_value":"uploads\\/2021-01-31-6016439283281.jpg"}}}','status' => '1','created_at' => '2021-01-31 11:43:46','updated_at' => '2021-01-31 11:45:07'),
      array('id' => '50','key' => 'find_city','theme_name' => 'marufbari','value' => '{"settings":{"find_city_title":{"old_value":null,"new_value":"Find us in your city"},"find_city_des":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."}}}','status' => '1','created_at' => '2021-01-31 11:44:03','updated_at' => '2021-01-31 11:45:07'),
      array('id' => '51','key' => 'blog_list','theme_name' => 'marufbari','value' => '{"settings":{"blog_list_title":{"old_value":null,"new_value":"Latest Blogs"},"blog_list_des":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."},"blog_list_btn_title":{"old_value":null,"new_value":"View All Blogs"}}}','status' => '1','created_at' => '2021-01-31 11:44:14','updated_at' => '2021-01-31 11:45:07'),
      array('id' => '52','key' => 'footer','theme_name' => 'marufbari','value' => '{"settings":{"footer_image":{"old_value":null,"new_value":"uploads\\/2021-01-31-601643ba73deb.png"},"footer_des":{"old_value":null,"new_value":"Lorem ipsum dolor sit amet, consect etur adi pisicing elit sed do eiusmod tempor incididunt ut labore."},"footer_copyright":{"old_value":null,"new_value":"Copyright \\u00a9 Website - 2020. Design By Amcoders"}},"content":{"footer_right":{"footer_right_title":{"old_value":null,"new_value":"Newsletter"},"footer_right_des":{"old_value":null,"new_value":"88 Broklyn Golden Street, New York. USA needhelp@ziston.com"},"footer_right_btn_title":{"old_value":null,"new_value":"Subscribe"}}}}','status' => '1','created_at' => '2021-01-31 11:44:26','updated_at' => '2021-01-31 11:45:07'),
      array('id' => '53','key' => 'hero','theme_name' => 'arafatbari','value' => '{"settings":{"hero_background_img":{"old_value":null,"new_value":"uploads\\/2021-01-31-60168e1be3e26.jpg"},"hero_big_title":{"old_value":null,"new_value":"Find Your Dream Property"},"hero_des":{"old_value":null,"new_value":"We have lots of properties in various locations available for purchase."},"hero_address_placeholder":{"old_value":null,"new_value":"Location"},"hero_search_btn":{"old_value":null,"new_value":"Search"}}}','status' => '1','created_at' => '2021-01-31 17:01:48','updated_at' => '2021-01-31 17:02:59'),
      array('id' => '54','key' => 'header','theme_name' => 'arafatbari','value' => '{"settings":{"header_phone_number":{"old_value":null,"new_value":"4354354364443"},"header_email_address":{"old_value":null,"new_value":"support@amcoders.com"},"logo":{"old_value":null,"new_value":"uploads\\/2021-01-31-60168e4ade2a3.png"},"header_signin_title":{"old_value":null,"new_value":"Sign In"},"header_create_property_title":{"old_value":null,"new_value":"Create Property"}}}','status' => '1','created_at' => '2021-01-31 17:02:25','updated_at' => '2021-01-31 17:02:59'),
      array('id' => '55','key' => 'featured_properties','theme_name' => 'arafatbari','value' => '{"settings":{"featured_properties_title":{"old_value":null,"new_value":"Latest Properties"},"featured_properties_btn_title":{"old_value":null,"new_value":"View All Properties"},"featured_properties_des":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."}}}','status' => '1','created_at' => '2021-01-31 17:02:44','updated_at' => '2021-01-31 17:02:59'),
      array('id' => '56','key' => 'find_city','theme_name' => 'arafatbari','value' => '{"settings":{"find_city_title":{"old_value":null,"new_value":"Find us in your city"},"find_city_des":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."}}}','status' => '1','created_at' => '2021-01-31 17:03:09','updated_at' => '2021-01-31 17:03:14'),
      array('id' => '57','key' => 'review','theme_name' => 'arafatbari','value' => '{"settings":{"review_bg_img":{"old_value":null,"new_value":"uploads\\/2021-01-31-60168e7d04c0e.png"},"review_title":{"old_value":null,"new_value":"Good Reviews By Clients"},"review_des":{"old_value":null,"new_value":"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam."}}}','status' => '1','created_at' => '2021-01-31 17:03:25','updated_at' => '2021-01-31 17:04:55'),
      array('id' => '58','key' => 'blog_list','theme_name' => 'arafatbari','value' => '{"settings":{"blog_list_title":{"old_value":null,"new_value":"Latest Blogs"},"blog_list_des":{"old_value":null,"new_value":"Proportioned interiors Club over 10,000 square feet"},"blog_list_btn_title":{"old_value":null,"new_value":"View All Blogs"}}}','status' => '1','created_at' => '2021-01-31 17:03:54','updated_at' => '2021-01-31 17:04:55'),
      array('id' => '59','key' => 'footer','theme_name' => 'arafatbari','value' => '{"settings":{"footer_image":{"old_value":null,"new_value":"uploads\\/2021-01-31-60168eafa6db7.png"},"footer_des":{"old_value":null,"new_value":"Lorem ipsum dolor sit amet, consect etur adi pisicing elit sed do eiusmod tempor incididunt ut labore."},"footer_copyright":{"old_value":null,"new_value":"Copyright \\u00a9 Website - 2020. Design By Amcoders"}},"content":{"footer_right":{"footer_right_title":{"old_value":null,"new_value":"Newsletter"},"footer_right_des":{"old_value":null,"new_value":"88 Broklyn Golden Street, New York. USA needhelp@ziston.com"},"footer_right_btn_title":{"old_value":null,"new_value":"Subscribe"}}}}','status' => '1','created_at' => '2021-01-31 17:04:15','updated_at' => '2021-01-31 17:04:55'),
      array('id' => '60','key' => 'header','theme_name' => 'hellobari','value' => '{"settings":{"header_phone_number":{"old_value":null,"new_value":"4354354364443"},"header_email_address":{"old_value":null,"new_value":"support@amcoders.com"},"logo":{"old_value":null,"new_value":"uploads\\/2021-02-06-601d8afbf1ff1.png"},"header_signin_title":{"old_value":null,"new_value":"Sign In"},"header_create_property_title":{"old_value":null,"new_value":"Create Property"}}}','status' => '1','created_at' => '2021-02-06 00:14:07','updated_at' => '2021-02-06 00:14:26'),
      array('id' => '61','key' => 'hero','theme_name' => 'hellobari','value' => '{"settings":{"hero_bg_img":{"old_value":null,"new_value":"uploads\\/2021-02-22-6033df3a185af.jpg"}}}','status' => '1','created_at' => '2021-02-22 22:43:38','updated_at' => '2021-02-22 22:46:23'),
      array('id' => '62','key' => 'featured_properties','theme_name' => 'hellobari','value' => '{"settings":{"featured_properties_title":{"old_value":null,"new_value":"Latest Properties"},"featured_properties_des":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."},"featured_properties_btn_title":{"old_value":null,"new_value":"View All Properties"}}}','status' => '1','created_at' => '2021-02-22 22:43:49','updated_at' => '2021-02-22 22:46:23'),
      array('id' => '63','key' => 'counter','theme_name' => 'hellobari','value' => '{"settings":{"counter_bg_img":{"old_value":null,"new_value":"uploads\\/2021-02-22-6033df6368137.jpg"}},"content":{"counter_first_section":{"counter_first_section_title":{"old_value":null,"new_value":"Total Agents"},"counter_first_section_count":{"old_value":null,"new_value":"880"}},"counter_second_section":{"counter_second_section_title":{"old_value":null,"new_value":"Total Sales"},"counter_second_section_count":{"old_value":null,"new_value":"1798"}},"counter_third_section":{"counter_third_section_title":{"old_value":null,"new_value":"Total Projects"},"counter_third_section_count":{"old_value":null,"new_value":"582"}},"counter_four_section":{"counter_four_section_title":{"old_value":null,"new_value":"Total Customers"},"counter_four_section_count":{"old_value":null,"new_value":"3698"}}}}','status' => '1','created_at' => '2021-02-22 22:44:19','updated_at' => '2021-02-22 22:46:23'),
      array('id' => '64','key' => 'property_agents','theme_name' => 'hellobari','value' => '{"settings":{"property_agent_title":{"old_value":null,"new_value":"Property Agents"},"property_agent_descrtiption":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."},"property_agent_btn_title":{"old_value":null,"new_value":"View All Agents"}}}','status' => '1','created_at' => '2021-02-22 22:44:38','updated_at' => '2021-02-22 22:46:23'),
      array('id' => '65','key' => 'find_city','theme_name' => 'hellobari','value' => '{"settings":{"find_city_title":{"old_value":null,"new_value":"Find us in your city"},"find_city_des":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."}}}','status' => '1','created_at' => '2021-02-22 22:44:46','updated_at' => '2021-02-22 22:46:23'),
      array('id' => '66','key' => 'blog_list','theme_name' => 'hellobari','value' => '{"settings":{"blog_list_title":{"old_value":null,"new_value":"Latest Blogs"},"blog_list_des":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."},"blog_list_btn_title":{"old_value":null,"new_value":"View All Blogs"}}}','status' => '1','created_at' => '2021-02-22 22:44:53','updated_at' => '2021-02-22 22:46:23'),
      array('id' => '67','key' => 'footer','theme_name' => 'hellobari','value' => '{"settings":{"footer_image":{"old_value":null,"new_value":"uploads\\/2021-02-22-6033df938d691.png"},"footer_des":{"old_value":null,"new_value":"Lorem ipsum dolor sit amet, consect etur adi pisicing elit sed do eiusmod tempor incididunt ut labore."},"footer_copyright":{"old_value":null,"new_value":"Copyright \\u00a9 Website - 2021. Design By Amcoders"}},"content":{"":{"social_facebook_link":{"old_value":null,"new_value":"#"},"social_twitter_link":{"old_value":null,"new_value":"#"},"social_google_link":{"old_value":null,"new_value":"#"},"social_instagram_link":{"old_value":null,"new_value":"#"},"social_pinterest_link":{"old_value":null,"new_value":"#"}},"footer_right":{"footer_right_title":{"old_value":null,"new_value":"Newsletter"},"footer_right_des":{"old_value":null,"new_value":"88 Broklyn Golden Street, New York. USA needhelp@ziston.com"},"footer_right_btn_title":{"old_value":null,"new_value":"Subscribe"}}}}','status' => '1','created_at' => '2021-02-22 22:45:07','updated_at' => '2021-02-22 22:46:23'),
      array('id' => '68','key' => 'header','theme_name' => 'mamabari','value' => '{"settings":{"header_phone_number":{"old_value":"4354354364443","new_value":"4354354364443"},"header_email_address":{"old_value":"support@amcoders.com","new_value":"support@amcoders.com"},"logo":{"old_value":"uploads\\/2021-02-24-6035d10068988.png","new_value":"uploads\\/2021-02-24-6035d17d6913b.png"},"header_signin_title":{"old_value":"Sign In","new_value":"Sign In"},"header_create_property_title":{"old_value":"Create Property","new_value":"Create Property"}}}','status' => '1','created_at' => '2021-02-24 10:07:21','updated_at' => '2021-02-24 10:09:39'),
      array('id' => '69','key' => 'hero','theme_name' => 'mamabari','value' => '{"settings":{"hero_bg_img":{"old_value":null,"new_value":"uploads\\/2021-02-24-6035d1a278a47.jpg"},"hero_title":{"old_value":null,"new_value":"Do More With Jomidar"}}}','status' => '1','created_at' => '2021-02-24 10:10:10','updated_at' => '2021-02-24 10:10:35'),
      array('id' => '70','key' => 'property_agents','theme_name' => 'mamabari','value' => '{"settings":{"property_agent_title":{"old_value":null,"new_value":"Property Agents"},"property_agent_descrtiption":{"old_value":null,"new_value":"Proportioned interiors Club over 10,000 square feet"},"property_agent_btn_title":{"old_value":null,"new_value":"View All Agents"}}}','status' => '1','created_at' => '2021-02-24 10:11:28','updated_at' => '2021-02-24 10:11:42'),
      array('id' => '71','key' => 'featured_properties','theme_name' => 'mamabari','value' => '{"settings":{"featured_properties_title":{"old_value":null,"new_value":"Latest Properties"},"featured_properties_des":{"old_value":null,"new_value":"Proportioned interiors Club over 10,000 square feet"},"featured_properties_btn_title":{"old_value":null,"new_value":"View All Properties"}}}','status' => '1','created_at' => '2021-02-24 10:12:03','updated_at' => '2021-02-24 10:12:10'),
      array('id' => '72','key' => 'find_city','theme_name' => 'mamabari','value' => '{"settings":{"find_city_bg_img":{"old_value":null,"new_value":"uploads\\/2021-02-24-6035d2227c1c2.jpg"},"find_city_title":{"old_value":null,"new_value":"Find us in your city"},"find_city_des":{"old_value":null,"new_value":"Proportioned interiors Club over 10,000 square feet"}}}','status' => '1','created_at' => '2021-02-24 10:12:18','updated_at' => '2021-02-24 10:12:26'),
      array('id' => '73','key' => 'blog_list','theme_name' => 'mamabari','value' => '{"settings":{"blog_list_title":{"old_value":null,"new_value":"Latest Blogs"},"blog_list_des":{"old_value":null,"new_value":"Proportioned interiors Club over 10,000 square feet"},"blog_list_btn_title":{"old_value":null,"new_value":"View All Blogs"}}}','status' => '1','created_at' => '2021-02-24 10:12:42','updated_at' => '2021-02-24 10:12:49'),
      array('id' => '74','key' => 'footer','theme_name' => 'mamabari','value' => '{"settings":{"footer_image":{"old_value":null,"new_value":"uploads\\/2021-02-24-6035d24c0e1bd.png"},"footer_des":{"old_value":null,"new_value":"Lorem ipsum dolor sit amet, consect etur adi pisicing elit sed do eiusmod tempor incididunt ut labore."},"footer_copyright":{"old_value":null,"new_value":"Copyright \\u00a9 Website - 2021. Design By Amcoders"}},"content":{"footer_right":{"footer_right_title":{"old_value":null,"new_value":"Newsletter"},"footer_right_des":{"old_value":null,"new_value":"88 Broklyn Golden Street, New York. USA needhelp@ziston.com"},"footer_right_btn_title":{"old_value":null,"new_value":"Subscribe"}}}}','status' => '1','created_at' => '2021-02-24 10:13:00','updated_at' => '2021-02-24 10:13:29'),
      array('id' => '75','key' => 'header','theme_name' => 'nanabari','value' => '{"settings":{"header_phone_number":{"old_value":null,"new_value":"4354354364443"},"header_email_address":{"old_value":null,"new_value":"support@amcoders.com"},"logo":{"old_value":null,"new_value":"uploads\\/2021-02-24-60367a3f9b2d1.png"},"header_signin_title":{"old_value":null,"new_value":"Sign In"},"header_create_property_title":{"old_value":null,"new_value":"Create Property"}}}','status' => '1','created_at' => '2021-02-24 22:09:05','updated_at' => '2021-02-24 22:09:42'),
      array('id' => '76','key' => 'property_agents','theme_name' => 'nanabari','value' => '{"settings":{"property_agent_title":{"old_value":null,"new_value":"Property Agents"},"property_agent_descrtiption":{"old_value":null,"new_value":"Proportioned interiors Club over 10,000 square feet"},"property_agent_btn_title":{"old_value":null,"new_value":"View All Agents"}}}','status' => '1','created_at' => '2021-02-24 22:09:49','updated_at' => '2021-02-24 22:10:39'),
      array('id' => '77','key' => 'featured_properties','theme_name' => 'nanabari','value' => '{"settings":{"featured_properties_title":{"old_value":null,"new_value":"Latest Properties"},"featured_properties_des":{"old_value":null,"new_value":"Proportioned interiors Club over 10,000 square feet"},"featured_properties_btn_title":{"old_value":null,"new_value":"View All Properties"}}}','status' => '1','created_at' => '2021-02-24 22:10:12','updated_at' => '2021-02-24 22:10:39'),
      array('id' => '78','key' => 'find_city','theme_name' => 'nanabari','value' => '{"settings":{"find_city_bg_img":{"old_value":null,"new_value":"uploads\\/2021-02-24-60367a71f15ca.jpg"},"find_city_title":{"old_value":null,"new_value":"Find us in your city"},"find_city_des":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."}}}','status' => '1','created_at' => '2021-02-24 22:10:26','updated_at' => '2021-02-24 22:10:39'),
      array('id' => '79','key' => 'blog_list','theme_name' => 'nanabari','value' => '{"settings":{"blog_list_title":{"old_value":null,"new_value":"Latest Blogs"},"blog_list_des":{"old_value":null,"new_value":"Handpicked Exclusive Properties By Our Team."},"blog_list_btn_title":{"old_value":null,"new_value":"View All Blogs"}}}','status' => '1','created_at' => '2021-02-24 22:10:44','updated_at' => '2021-02-24 22:10:50'),
      array('id' => '80','key' => 'footer','theme_name' => 'nanabari','value' => '{"settings":{"footer_image":{"old_value":null,"new_value":"uploads\\/2021-02-24-60367a95a935c.png"},"footer_des":{"old_value":null,"new_value":"Lorem ipsum dolor sit amet, consect etur adi pisicing elit sed do eiusmod tempor incididunt ut labore."},"footer_copyright":{"old_value":null,"new_value":"Copyright \\u00a9 Website - 2021. Design By Amcoders"}},"content":{"footer_right":{"footer_right_title":{"old_value":null,"new_value":"Newsletter"},"footer_right_des":{"old_value":null,"new_value":"88 Broklyn Golden Street, New York. USA needhelp@ziston.com"},"footer_right_btn_title":{"old_value":null,"new_value":"Subscribe"}}}}','status' => '1','created_at' => '2021-02-24 22:11:01','updated_at' => '2021-02-24 22:11:23'),
      array('id' => '81','key' => 'header','theme_name' => 'tomarbari','value' => '{"settings":{"header_phone_number":{"old_value":null,"new_value":"+880-258-5874"},"header_email_address":{"old_value":null,"new_value":"support@amcoders.com"},"logo":{"old_value":null,"new_value":"uploads\\/2021-02-28-603ba542585db.png"},"header_signin_title":{"old_value":null,"new_value":"Sign In"},"header_create_property_title":{"old_value":null,"new_value":"Create Property"}}}','status' => '1','created_at' => '2021-02-28 20:13:59','updated_at' => '2021-02-28 20:14:59'),
      array('id' => '82','key' => 'footer','theme_name' => 'tomarbari','value' => '{"settings":{"footer_image":{"old_value":null,"new_value":"uploads\\/2021-02-28-603ba56bb156d.png"},"footer_des":{"old_value":null,"new_value":"Lorem ipsum dolor sit amet, consect etur adi pisicing elit sed do eiusmod tempor incididunt ut labore."},"footer_copyright":{"old_value":null,"new_value":"Copyright \\u00a9 Website - 2021. Design By Amcoders"}},"content":{"footer_right":{"footer_right_title":{"old_value":null,"new_value":"Newsletter"},"footer_right_des":{"old_value":null,"new_value":"88 Broklyn Golden Street, New York. USA needhelp@ziston.com"},"footer_right_btn_title":{"old_value":null,"new_value":"Subscribe"}}}}','status' => '1','created_at' => '2021-02-28 20:15:07','updated_at' => '2021-02-28 20:16:06')
    );
        
    
    Customizer::insert($customizers);

    $medias = array(
      array('id' => '1','name' => 'uploads/21/01/10012116103007215ffb3d3126706.webp','type' => 'jpg','url' => $base_url.'/21/01/10012116103007215ffb3d3126706.webp','size' => '32184kib','path' => 'uploads/21/01/','user_id' => '4','created_at' => '2021-01-10 17:45:21','updated_at' => '2021-01-10 17:45:21'),
      array('id' => '2','name' => 'uploads/21/01/10012116103007215ffb3d3125675.webp','type' => 'jpg','url' => $base_url.'/21/01/10012116103007215ffb3d3125675.webp','size' => '51716kib','path' => 'uploads/21/01/','user_id' => '4','created_at' => '2021-01-10 17:45:21','updated_at' => '2021-01-10 17:45:21'),
      array('id' => '3','name' => 'uploads/21/01/10012116103007225ffb3d323297d.webp','type' => 'jpg','url' => $base_url.'/21/01/10012116103007225ffb3d323297d.webp','size' => '22288kib','path' => 'uploads/21/01/','user_id' => '4','created_at' => '2021-01-10 17:45:22','updated_at' => '2021-01-10 17:45:22'),
      array('id' => '4','name' => 'uploads/21/01/10012116103007225ffb3d322e80e.webp','type' => 'jpg','url' => $base_url.'/21/01/10012116103007225ffb3d322e80e.webp','size' => '43584kib','path' => 'uploads/21/01/','user_id' => '4','created_at' => '2021-01-10 17:45:22','updated_at' => '2021-01-10 17:45:22'),
      array('id' => '5','name' => 'uploads/21/01/10012116103007225ffb3d32f1e81.webp','type' => 'jpg','url' => $base_url.'/21/01/10012116103007225ffb3d32f1e81.webp','size' => '34844kib','path' => 'uploads/21/01/','user_id' => '4','created_at' => '2021-01-10 17:45:23','updated_at' => '2021-01-10 17:45:23'),
      array('id' => '6','name' => 'uploads/21/01/10012116103007225ffb3d32e8548.webp','type' => 'jpg','url' => $base_url.'/21/01/10012116103007225ffb3d32e8548.webp','size' => '39370kib','path' => 'uploads/21/01/','user_id' => '4','created_at' => '2021-01-10 17:45:23','updated_at' => '2021-01-10 17:45:23'),
      array('id' => '7','name' => 'uploads/21/01/11012116103399535ffbd67132cff.webp','type' => 'png','url' => $base_url.'/21/01/11012116103399535ffbd67132cff.webp','size' => '326kib','path' => 'uploads/21/01/','user_id' => '1','created_at' => '2021-01-11 04:39:13','updated_at' => '2021-01-11 04:39:13'),
      array('id' => '8','name' => 'uploads/21/01/11012116103399535ffbd671f06e5.webp','type' => 'png','url' => $base_url.'/21/01/11012116103399535ffbd671f06e5.webp','size' => '364kib','path' => 'uploads/21/01/','user_id' => '1','created_at' => '2021-01-11 04:39:14','updated_at' => '2021-01-11 04:39:14'),
      array('id' => '9','name' => 'uploads/21/01/11012116103399545ffbd672163c9.webp','type' => 'png','url' => $base_url.'/21/01/11012116103399545ffbd672163c9.webp','size' => '282kib','path' => 'uploads/21/01/','user_id' => '1','created_at' => '2021-01-11 04:39:14','updated_at' => '2021-01-11 04:39:14'),
      array('id' => '10','name' => 'uploads/21/01/11012116103578055ffc1c2dee004.webp','type' => 'jpg','url' => $base_url.'/21/01/11012116103578055ffc1c2dee004.webp','size' => '34844kib','path' => 'uploads/21/01/','user_id' => '3','created_at' => '2021-01-11 09:36:47','updated_at' => '2021-01-11 09:36:47'),
      array('id' => '11','name' => 'uploads/21/01/11012116103578055ffc1c2dee356.webp','type' => 'jpg','url' => $base_url.'/21/01/11012116103578055ffc1c2dee356.webp','size' => '39370kib','path' => 'uploads/21/01/','user_id' => '3','created_at' => '2021-01-11 09:36:47','updated_at' => '2021-01-11 09:36:47'),
      array('id' => '12','name' => 'uploads/21/01/11012116103578085ffc1c30c8af4.webp','type' => 'jpg','url' => $base_url.'/21/01/11012116103578085ffc1c30c8af4.webp','size' => '10636kib','path' => 'uploads/21/01/','user_id' => '3','created_at' => '2021-01-11 09:36:49','updated_at' => '2021-01-11 09:36:49'),
      array('id' => '13','name' => 'uploads/21/01/11012116103578085ffc1c30cc21f.webp','type' => 'jpg','url' => $base_url.'/21/01/11012116103578085ffc1c30cc21f.webp','size' => '56598kib','path' => 'uploads/21/01/','user_id' => '3','created_at' => '2021-01-11 09:36:49','updated_at' => '2021-01-11 09:36:49'),
      array('id' => '14','name' => 'uploads/21/01/11012116103582515ffc1deba3f0f.webp','type' => 'jpg','url' => $base_url.'/21/01/11012116103582515ffc1deba3f0f.webp','size' => '36756kib','path' => 'uploads/21/01/','user_id' => '2','created_at' => '2021-01-11 09:44:12','updated_at' => '2021-01-11 09:44:12'),
      array('id' => '15','name' => 'uploads/21/01/11012116103582575ffc1df1cce75.webp','type' => 'jpg','url' => $base_url.'/21/01/11012116103582575ffc1df1cce75.webp','size' => '24038kib','path' => 'uploads/21/01/','user_id' => '2','created_at' => '2021-01-11 09:44:18','updated_at' => '2021-01-11 09:44:18'),
      array('id' => '16','name' => 'uploads/21/01/11012116103582645ffc1df8df1eb.webp','type' => 'jpg','url' => $base_url.'/21/01/11012116103582645ffc1df8df1eb.webp','size' => '56598kib','path' => 'uploads/21/01/','user_id' => '2','created_at' => '2021-01-11 09:44:25','updated_at' => '2021-01-11 09:44:25'),
      array('id' => '17','name' => 'uploads/21/01/11012116103582715ffc1dff3d930.webp','type' => 'jpg','url' => $base_url.'/21/01/11012116103582715ffc1dff3d930.webp','size' => '51716kib','path' => 'uploads/21/01/','user_id' => '2','created_at' => '2021-01-11 09:44:31','updated_at' => '2021-01-11 09:44:31')
    );

    Media::insert($medias);

    

    $terms = array(
      array('id' => '1','title' => 'Basic','slug' => 'basic','user_id' => '1','status' => '1','type' => 'package','count' => '5','featured' => '23','created_at' => '2021-01-10 17:35:03','updated_at' => '2021-01-10 17:35:03'),
      array('id' => '2','title' => 'Premium','slug' => 'premium','user_id' => '1','status' => '1','type' => 'package','count' => '20','featured' => '50','created_at' => '2021-01-10 17:35:28','updated_at' => '2021-01-10 17:35:28'),
      array('id' => '3','title' => 'Enterprise','slug' => 'enterprise','user_id' => '1','status' => '1','type' => 'package','count' => '70','featured' => '100','created_at' => '2021-01-10 17:36:08','updated_at' => '2021-01-10 17:36:08'),
      array('id' => '4','title' => 'Enterprise Pro','slug' => 'enterprise-pro','user_id' => '1','status' => '1','type' => 'package','count' => '150','featured' => '150','created_at' => '2021-01-10 17:37:09','updated_at' => '2021-01-10 17:37:09'),
      array('id' => '5','title' => 'Dignissimos ut earum','slug' => 'dignissimos-ut-earum','user_id' => '4','status' => '1','type' => 'property','count' => '0','featured' => '0','created_at' => '2021-01-10 17:42:02','updated_at' => '2021-01-10 17:49:16'),
      array('id' => '6','title' => 'Quibusdam sed quos a','slug' => 'quibusdam-sed-quos-a','user_id' => '3','status' => '1','type' => 'property','count' => '0','featured' => '0','created_at' => '2021-01-11 09:32:15','updated_at' => '2021-01-11 09:38:35'),
      array('id' => '7','title' => 'Laudantium sint au','slug' => 'laudantium-sint-au','user_id' => '2','status' => '1','type' => 'property','count' => '0','featured' => '0','created_at' => '2021-01-11 09:41:48','updated_at' => '2021-01-11 09:47:18'),
      array('id' => '8','title' => 'Directory Will Be A Thing Of The Past.','slug' => 'macy-baker','user_id' => '1','status' => '1','type' => 'blog','count' => '0','featured' => '0','created_at' => '2021-01-11 10:54:21','updated_at' => '2021-01-11 10:55:31'),
      array('id' => '9','title' => 'The Most Inspiring Interior Design Of 2021','slug' => 'the-most-inspiring-interior-design-of-2021','user_id' => '1','status' => '1','type' => 'blog','count' => '0','featured' => '0','created_at' => '2021-01-11 11:00:21','updated_at' => '2021-01-11 11:00:21'),
      array('id' => '10','title' => '7 Instagram accounts for interior design enthusiasts','slug' => '7-instagram-accounts-for-interior-design-enthusiasts','user_id' => '1','status' => '1','type' => 'blog','count' => '0','featured' => '0','created_at' => '2021-01-11 11:01:25','updated_at' => '2021-01-11 11:01:25')
    );
    

    Terms::insert($terms);

    $mediaposts = array(
      array('term_id' => '5','media_id' => '1'),
      array('term_id' => '5','media_id' => '2'),
      array('term_id' => '5','media_id' => '3'),
      array('term_id' => '5','media_id' => '4'),
      array('term_id' => '5','media_id' => '6'),
      array('term_id' => '5','media_id' => '5'),
      array('term_id' => '6','media_id' => '11'),
      array('term_id' => '6','media_id' => '10'),
      array('term_id' => '6','media_id' => '12'),
      array('term_id' => '6','media_id' => '13'),
      array('term_id' => '7','media_id' => '14'),
      array('term_id' => '7','media_id' => '15'),
      array('term_id' => '7','media_id' => '16'),
      array('term_id' => '7','media_id' => '17')
    );
    
    Mediapost::insert($mediaposts);

    $meta = array(
      array('id' => '1','term_id' => '5','type' => 'excerpt','content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
      array('id' => '2','term_id' => '5','type' => 'content','content' => '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>'),
      array('id' => '3','term_id' => '5','type' => 'contact_type','content' => '{"contact_type":"mail","email":"mahi@mailinator.com"}'),
      array('id' => '4','term_id' => '5','type' => 'youtube_url','content' => 'wv7_0DtIQps'),
      array('id' => '5','term_id' => '5','type' => 'virtual_tour','content' => 'https://my.matterport.com/show/?m=CrZgGg34uFa'),
      array('id' => '6','term_id' => '5','type' => 'floor_plan','content' => '{"file_name":"uploads\\/21\\/01\\/16103007701610300770.jpg","name":"First Floor","square_ft":"25"}'),
      array('id' => '7','term_id' => '5','type' => 'floor_plan','content' => '{"file_name":"uploads\\/21\\/01\\/16103008831610300883.jpg","name":"Second Floor","square_ft":"65"}'),
      array('id' => '8','term_id' => '5','type' => 'floor_plan','content' => '{"file_name":"uploads\\/21\\/01\\/16103009011610300901.jpg","name":"Third Floor","square_ft":"87"}'),
      array('id' => '9','term_id' => '6','type' => 'excerpt','content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
      array('id' => '10','term_id' => '6','type' => 'content','content' => '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>'),
      array('id' => '11','term_id' => '6','type' => 'contact_type','content' => '{"contact_type":"mail","email":"gaqoq@mailinator.com"}'),
      array('id' => '12','term_id' => '6','type' => 'youtube_url','content' => 'wv7_0DtIQps'),
      array('id' => '13','term_id' => '6','type' => 'virtual_tour','content' => 'https://my.matterport.com/show/?m=CrZgGg34uFa'),
      array('id' => '14','term_id' => '6','type' => 'floor_plan','content' => '{"file_name":"uploads\\/21\\/01\\/16103578331610357833.jpg","name":"First Floor","square_ft":"23"}'),
      array('id' => '15','term_id' => '6','type' => 'floor_plan','content' => '{"file_name":"uploads\\/21\\/01\\/16103578471610357847.jpg","name":"Second Floor","square_ft":"54"}'),
      array('id' => '16','term_id' => '7','type' => 'excerpt','content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
      array('id' => '17','term_id' => '7','type' => 'content','content' => '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        
        <p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>'),
      array('id' => '18','term_id' => '7','type' => 'contact_type','content' => '{"contact_type":"mail","email":"sicequb@mailinator.com"}'),
      array('id' => '19','term_id' => '7','type' => 'youtube_url','content' => 'wv7_0DtIQps'),
      array('id' => '20','term_id' => '7','type' => 'virtual_tour','content' => 'https://my.matterport.com/show/?m=CrZgGg34uFa'),
      array('id' => '21','term_id' => '7','type' => 'floor_plan','content' => '{"file_name":"uploads\\/21\\/01\\/16103582891610358289.jpg","name":"First Floor","square_ft":"43"}'),
      array('id' => '22','term_id' => '7','type' => 'floor_plan','content' => '{"file_name":"uploads\\/21\\/01\\/16103584251610358425.jpg","name":"Second Floor","square_ft":"67"}'),
      array('id' => '23','term_id' => '8','type' => 'excerpt','content' => 'Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete'),
      array('id' => '24','term_id' => '8','type' => 'preview','content' => $base_url.'/21/01/11012116103624465ffc2e4ed8262.webp'),
      array('id' => '25','term_id' => '8','type' => 'content','content' => '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    
    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>'),
      array('id' => '26','term_id' => '9','type' => 'excerpt','content' => 'Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete'),
      array('id' => '27','term_id' => '9','type' => 'preview','content' => $base_url.'/21/01/11012116103624555ffc2e5734666.webp'),
      array('id' => '28','term_id' => '9','type' => 'content','content' => '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    
    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>'),
      array('id' => '29','term_id' => '10','type' => 'excerpt','content' => 'Real estate festival is one of the famous feval for explain to you how all this mistaolt deand praising pain wasnad I will give complete'),
      array('id' => '30','term_id' => '10','type' => 'preview','content' => $base_url.'/21/01/11012116103624545ffc2e56c0aa5.webp'),
      array('id' => '31','term_id' => '10','type' => 'content','content' => '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    
    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>')
    );
    
  
    Meta::insert($meta);

    $postcategoryoptions = array(
      array('id' => '1','category_id' => '21','term_id' => '5','type' => 'city','value' => 'Dhaka, Bangladesh'),
      array('id' => '2','category_id' => '21','term_id' => '5','type' => 'latitude','value' => '23.810332'),
      array('id' => '3','category_id' => '21','term_id' => '5','type' => 'longitude','value' => '90.4125181'),
      array('id' => '31','category_id' => '24','term_id' => '6','type' => 'city','value' => 'Cox\'s Bazar, Bangladesh'),
      array('id' => '32','category_id' => '24','term_id' => '6','type' => 'latitude','value' => '21.4272283'),
      array('id' => '33','category_id' => '24','term_id' => '6','type' => 'longitude','value' => '92.0058074'),
      array('id' => '58','category_id' => '22','term_id' => '7','type' => 'city','value' => 'Faridpur, Bangladesh'),
      array('id' => '59','category_id' => '22','term_id' => '7','type' => 'latitude','value' => '23.6018691'),
      array('id' => '60','category_id' => '22','term_id' => '7','type' => 'longitude','value' => '89.8333382'),
      array('id' => '99','category_id' => '17','term_id' => '7','type' => 'options','value' => '12'),
      array('id' => '100','category_id' => '16','term_id' => '7','type' => 'options','value' => '32'),
      array('id' => '101','category_id' => '41','term_id' => '7','type' => 'facilities','value' => '10'),
      array('id' => '102','category_id' => '42','term_id' => '7','type' => 'facilities','value' => '12'),
      array('id' => '103','category_id' => '43','term_id' => '7','type' => 'facilities','value' => '5'),
      array('id' => '104','category_id' => '44','term_id' => '7','type' => 'facilities','value' => '13'),
      array('id' => '105','category_id' => '45','term_id' => '7','type' => 'facilities','value' => '12'),
      array('id' => '106','category_id' => '46','term_id' => '7','type' => 'facilities','value' => '10'),
      array('id' => '107','category_id' => '47','term_id' => '7','type' => 'facilities','value' => '8'),
      array('id' => '108','category_id' => '48','term_id' => '7','type' => 'facilities','value' => '23'),
      array('id' => '109','category_id' => '49','term_id' => '7','type' => 'facilities','value' => '10'),
      array('id' => '110','category_id' => '50','term_id' => '7','type' => 'facilities','value' => '5'),
      array('id' => '111','category_id' => '51','term_id' => '7','type' => 'facilities','value' => '23'),
      array('id' => '124','category_id' => '17','term_id' => '6','type' => 'options','value' => '12'),
      array('id' => '125','category_id' => '16','term_id' => '6','type' => 'options','value' => '10'),
      array('id' => '126','category_id' => '41','term_id' => '6','type' => 'facilities','value' => '12'),
      array('id' => '127','category_id' => '42','term_id' => '6','type' => 'facilities','value' => '31'),
      array('id' => '128','category_id' => '43','term_id' => '6','type' => 'facilities','value' => '23'),
      array('id' => '129','category_id' => '44','term_id' => '6','type' => 'facilities','value' => '34'),
      array('id' => '130','category_id' => '45','term_id' => '6','type' => 'facilities','value' => '12'),
      array('id' => '131','category_id' => '46','term_id' => '6','type' => 'facilities','value' => '10'),
      array('id' => '132','category_id' => '47','term_id' => '6','type' => 'facilities','value' => '8'),
      array('id' => '133','category_id' => '48','term_id' => '6','type' => 'facilities','value' => '10'),
      array('id' => '134','category_id' => '49','term_id' => '6','type' => 'facilities','value' => '9'),
      array('id' => '135','category_id' => '50','term_id' => '6','type' => 'facilities','value' => '10'),
      array('id' => '136','category_id' => '51','term_id' => '6','type' => 'facilities','value' => '23'),
      array('id' => '137','category_id' => '17','term_id' => '5','type' => 'options','value' => '2'),
      array('id' => '138','category_id' => '16','term_id' => '5','type' => 'options','value' => '4'),
      array('id' => '139','category_id' => '41','term_id' => '5','type' => 'facilities','value' => '12'),
      array('id' => '140','category_id' => '42','term_id' => '5','type' => 'facilities','value' => '14'),
      array('id' => '141','category_id' => '43','term_id' => '5','type' => 'facilities','value' => '23'),
      array('id' => '142','category_id' => '44','term_id' => '5','type' => 'facilities','value' => '13'),
      array('id' => '143','category_id' => '45','term_id' => '5','type' => 'facilities','value' => '16'),
      array('id' => '144','category_id' => '45','term_id' => '5','type' => 'facilities','value' => '18'),
      array('id' => '145','category_id' => '46','term_id' => '5','type' => 'facilities','value' => '10'),
      array('id' => '146','category_id' => '47','term_id' => '5','type' => 'facilities','value' => '12'),
      array('id' => '147','category_id' => '48','term_id' => '5','type' => 'facilities','value' => '8'),
      array('id' => '148','category_id' => '49','term_id' => '5','type' => 'facilities','value' => '15'),
      array('id' => '149','category_id' => '50','term_id' => '5','type' => 'facilities','value' => '10'),
      array('id' => '150','category_id' => '51','term_id' => '5','type' => 'facilities','value' => '13')
    );

    Postcategoryoption::insert($postcategoryoptions);

    $post_category = array(
      array('term_id' => '5','category_id' => '5','type' => 'category'),
      array('term_id' => '6','category_id' => '1','type' => 'category'),
      array('term_id' => '7','category_id' => '2','type' => 'category'),
      array('term_id' => '7','category_id' => '35','type' => 'features'),
      array('term_id' => '7','category_id' => '36','type' => 'features'),
      array('term_id' => '7','category_id' => '37','type' => 'features'),
      array('term_id' => '7','category_id' => '38','type' => 'features'),
      array('term_id' => '7','category_id' => '39','type' => 'features'),
      array('term_id' => '7','category_id' => '40','type' => 'features'),
      array('term_id' => '7','category_id' => '29','type' => 'status'),
      array('term_id' => '7','category_id' => '19','type' => 'state'),
      array('term_id' => '6','category_id' => '35','type' => 'features'),
      array('term_id' => '6','category_id' => '36','type' => 'features'),
      array('term_id' => '6','category_id' => '37','type' => 'features'),
      array('term_id' => '6','category_id' => '38','type' => 'features'),
      array('term_id' => '6','category_id' => '39','type' => 'features'),
      array('term_id' => '6','category_id' => '40','type' => 'features'),
      array('term_id' => '6','category_id' => '27','type' => 'status'),
      array('term_id' => '6','category_id' => '20','type' => 'state'),
      array('term_id' => '5','category_id' => '35','type' => 'features'),
      array('term_id' => '5','category_id' => '36','type' => 'features'),
      array('term_id' => '5','category_id' => '37','type' => 'features'),
      array('term_id' => '5','category_id' => '38','type' => 'features'),
      array('term_id' => '5','category_id' => '39','type' => 'features'),
      array('term_id' => '5','category_id' => '40','type' => 'features'),
      array('term_id' => '5','category_id' => '26','type' => 'status'),
      array('term_id' => '5','category_id' => '19','type' => 'state')
    );
    
    PostCategory::insert($post_category);

    $prices = array(
      array('id' => '1','term_id' => '5','price' => '55232','type' => 'min_price'),
      array('id' => '2','term_id' => '5','price' => '99789','type' => 'max_price'),
      array('id' => '3','term_id' => '6','price' => '79432','type' => 'min_price'),
      array('id' => '4','term_id' => '6','price' => '123456','type' => 'max_price'),
      array('id' => '5','term_id' => '7','price' => '55043','type' => 'min_price'),
      array('id' => '6','term_id' => '7','price' => '82134','type' => 'max_price')
    );

    Price::insert($prices);

    $terms_user = array(
      array('id' => '1','terms_id' => '5','user_id' => '4','created_at' => '2021-01-10 18:26:55','updated_at' => '2021-01-10 18:26:55')
    );

    DB::table('terms_user')->insert($terms_user);

   


    $getway=new Category();
    $getway->name="Paypal";
    $getway->slug="uploads/paypal.png";
    $getway->type="getway";
    $getway->featured=0;
    $getway->user_id=1;
    $getway->status=1;
    $getway->save();

    $cat_meta=new Categorymeta();
    $cat_meta->category_id=$getway->id;
    $cat_meta->type="credentials";
    $cat_meta->content='{"client_id":"","client_secret":"","currency":"USD"}';
    $cat_meta->save();


    $getway=new Category();
    $getway->name="stripe";
    $getway->slug="uploads/stripe.png";
    $getway->type="getway";
    $getway->featured=0;
    $getway->user_id=1;
    $getway->status=1;
    $getway->save();

    $cat_meta=new Categorymeta();
    $cat_meta->category_id=$getway->id;
    $cat_meta->type="credentials";
    $cat_meta->content='{"publishable_key":"","secret_key":"","currency":"USD"}';
    $cat_meta->save();

    $getway=new Category();
    $getway->name="toyyibpay";
    $getway->slug="uploads/toyyibpay.png";
    $getway->type="getway";
    $getway->featured=0;
    $getway->user_id=1;
    $getway->status=1;
    $getway->save();

    $cat_meta=new Categorymeta();
    $cat_meta->category_id=$getway->id;
    $cat_meta->type="credentials";
    $cat_meta->content='{"userSecretKey":"","categoryCode":""}';
    $cat_meta->save();



    $getway=new Category();
    $getway->name="Razorpay";
    $getway->slug="uploads/razorpay.png";
    $getway->type="getway";
    $getway->featured=0;
    $getway->user_id=1;
    $getway->status=1;
    $getway->save();

    $cat_meta=new Categorymeta();
    $cat_meta->category_id=$getway->id;
    $cat_meta->type="credentials";
    $cat_meta->content='{"key_id":"","key_secret":"","currency":"USD"}';
    $cat_meta->save();

    $getway=new Category();
    $getway->name="Instamojo";
    $getway->slug="uploads/instamojo.png";
    $getway->type="getway";
    $getway->featured=0;
    $getway->user_id=1;
    $getway->status=1;
    $getway->save();

    $cat_meta=new Categorymeta();
    $cat_meta->category_id=$getway->id;
    $cat_meta->type="credentials";
    $cat_meta->content='{"x_api_Key":"","x_api_token":""}';
    $cat_meta->save();


    $getway=new Category();
    $getway->name="Mollie";
    $getway->slug="uploads/mollie.png";
    $getway->type="getway";
    $getway->featured=0;
    $getway->user_id=1;
    $getway->status=1;
    $getway->save();

    $cat_meta=new Categorymeta();
    $cat_meta->category_id=$getway->id;
    $cat_meta->type="credentials";
    $cat_meta->content='{"api_key":"","currency":"USD"}';
    $cat_meta->save();




  }
}
