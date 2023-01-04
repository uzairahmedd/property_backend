<?php
namespace Database\Seeders;
use App\Models\City;
use Illuminate\Database\Seeder;
use App\Menu;
class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            
            [
                "id" => "2",
                "name" => "Ad Dilam",
                "ar_name" => "الدلم",
                "slug" => "Ad-Dilam",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "3",
                "name" => "Ad Dir'iyah",
                "ar_name" => "الدرعية",
                "slug" => "Ad-Diriyah",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "4",
                "name" => "Al Hafuf",
                "ar_name" => "الهفوف",
                "slug" => "Al-Hafuf",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "5",
                "name" => "Al Jafr",
                "ar_name" => "الجفر",
                "slug" => "Al-Jafr",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "6",
                "name" => "Al Jubail",
                "ar_name" => "الجبيل",
                "slug" => "Al-Jubail",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "7",
                "name" => "Al Khafji",
                "ar_name" => "الخفجي",
                "slug" => "Al-Khafji",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "8",
                "name" => "Al Kharj",
                "ar_name" => "الخرج",
                "slug" => "Al-Kharj",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "9",
                "name" => "Al Khobar",
                "ar_name" => "الخبر",
                "slug" => "Al-Khobar",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "10",
                "name" => "Al Majma'ah",
                "ar_name" => "المجمعة",
                "slug" => "Al-Majmaah",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "11",
                "name" => "Al Mubarraz",
                "ar_name" => "المبرز",
                "slug" => "Al-Mubarraz",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "12",
                "name" => "Al Qatif",
                "ar_name" => "القطيف",
                "slug" => "Al-Qatif",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "13",
                "name" => "Al Qurayyat",
                "ar_name" => "القريات",
                "slug" => "Al-Qurayyat",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "14",
                "name" => "Al Ula",
                "ar_name" => "العلا",
                "slug" => "Al-Ula",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "15",
                "name" => "Al Uyainah",
                "ar_name" => "العيينة",
                "slug" => "Al-Uyainah",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "16",
                "name" => "Ar Rass",
                "ar_name" => "الرس",
                "slug" => "Ar-Rass",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "17",
                "name" => "Arar",
                "ar_name" => "عرعر",
                "slug" => "Arar",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "18",
                "name" => "At Taif",
                "ar_name" => "الطائف",
                "slug" => "At-Taif",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "19",
                "name" => "Az Zulfi",
                "ar_name" => "الزلفي",
                "slug" => "Az-Zulfi",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "20",
                "name" => "Bahah",
                "ar_name" => "الباحة",
                "slug" => "Bahah",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "21",
                "name" => "Buqayq",
                "ar_name" => "بقيق",
                "slug" => "Buqayq",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "22",
                "name" => "Buraidah",
                "ar_name" => "بريدة",
                "slug" => "Buraidah",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "23",
                "name" => "Dammam",
                "ar_name" => "الدمام",
                "slug" => "Dammam",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "24",
                "name" => "Dhahran",
                "ar_name" => "الظهران",
                "slug" => "Dhahran",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "25",
                "name" => "Hafar Al Batin",
                "ar_name" => "حفر الباطن",
                "slug" => "Hafar-Al-Batin",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "26",
                "name" => "Hail",
                "ar_name" => "حائل",
                "slug" => "Hail",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "27",
                "name" => "Jazan",
                "ar_name" => "جازان",
                "slug" => "Jazan",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "28",
                "name" => "Jeddah",
                "ar_name" => "جدة",
                "slug" => "Jeddah",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "29",
                "name" => "Khamis Mushayt",
                "ar_name" => "خميس مشيط",
                "slug" => "Khamis-Mushayt",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "30",
                "name" => "King Abdullah Economic City",
                "ar_name" => "الملك عبدالله الاقتصادية",
                "slug" => "King-Abdullah-Economic-City",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "31",
                "name" => "Madinah",
                "ar_name" => "المدينة المنورة",
                "slug" => "Madinah",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "32",
                "name" => "Makkah",
                "ar_name" => "مكه",
                "slug" => "Makkah",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "33",
                "name" => "Najran",
                "ar_name" => "نجران",
                "slug" => "Najran",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "34",
                "name" => "Rabigh",
                "ar_name" => "رابغ",
                "slug" => "Rabigh",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "35",
                "name" => "Riyadh",
                "ar_name" => "الرياض",
                "slug" => "Riyadh",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "36",
                "name" => "Sakaka",
                "ar_name" => "سكاكا",
                "slug" => "Sakaka",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "37",
                "name" => "Sayhat",
                "ar_name" => "سيهات",
                "slug" => "Sayhat",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "38",
                "name" => "Tabuk",
                "ar_name" => "تبوك",
                "slug" => "Tabuk",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "39",
                "name" => "Tarut",
                "ar_name" => "تاروت",
                "slug" => "Tarut",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "40",
                "name" => "Umluj",
                "ar_name" => "أملج",
                "slug" => "Umluj",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "41",
                "name" => "Unayzah",
                "ar_name" => "عنيزة",
                "slug" => "Unayzah",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "42",
                "name" => "Wadi Ad Dawasir",
                "ar_name" => "وادي الدواسر",
                "slug" => "Wadi-Ad-Dawasir",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "43",
                "name" => "Yanbu",
                "ar_name" => "ينبع",
                "slug" => "Yanbu",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ],
            [
                "id" => "44",
                "name" => "Yanbu Al Sinaiyah",
                "ar_name" => "ينبع الصناعية",
                "slug" => "Yanbu-Al-Sinaiyah",
                "type" => "city",
                "featured" => "1",
                "user_id" => "1",
                "status" => "1",
                "created_at" => "2023-01-03 18:27:38",
                "updated_at" => "2023-01-03 18:27:38"
            ]

        ];


        City::insert($cities);
//        $menu = array(
//          array('id' => '1','name' => 'Main Menu','position' => 'Header','data' => '[{"text":"Home","icon":"","href":"/","target":"_self","title":""},{"text":"Property","icon":"empty","href":"#","target":"_self","title":"","children":[{"text":"Property List","icon":"empty","href":"/list","target":"_self","title":""},{"text":"Property Map","icon":"empty","href":"/map","target":"_self","title":""},{"text":"Property Details","icon":"empty","href":"/list","target":"_self","title":""}]},{"text":"Project","icon":"empty","href":"#","target":"_self","title":"","children":[{"text":"Projects","icon":"empty","href":"/project","target":"_self","title":""},{"text":"Project detail","icon":"empty","href":"/project","target":"_self","title":""}]},{"text":"Agent","icon":"empty","href":"#","target":"_self","title":"","children":[{"text":"Agents","icon":"empty","href":"/agent/list","target":"_self","title":""},{"text":"Agent Details","icon":"empty","href":"/agent/list","target":"_self","title":""}]},{"text":"Agency","icon":"empty","href":"#","target":"_self","title":"","children":[{"text":"Agencies","icon":"empty","href":"/agency/list","target":"_self","title":""},{"text":"Agency Detail","icon":"empty","href":"/agency/list","target":"_self","title":""}]},{"text":"Blog","icon":"empty","href":"#","target":"_self","title":"","children":[{"text":"Blogs","icon":"empty","href":"/blogs","target":"_self","title":""},{"text":"Blog Details","icon":"empty","href":"/blogs","target":"_self","title":""}]},{"text":"Contact","icon":"empty","href":"/contact","target":"_self","title":""}]','lang' => 'en','status' => '1','created_at' => '2021-01-18 20:39:58','updated_at' => '2021-01-19 12:30:20'),
//          array('id' => '5','name' => 'Main Menu','position' => 'Header','data' => '[{"text":"الصفحة الرئيسية","href":"/","icon":"empty","target":"_self","title":""},{"text":"خاصية","href":"#","icon":"empty","target":"_self","title":"","children":[{"text":"قائمة الممتلكات","href":"/list","icon":"empty","target":"_self","title":""},{"text":"خريطة الملكية","href":"/map","icon":"empty","target":"_self","title":""},{"text":"تفاصيل اوضح","href":"/list","icon":"empty","target":"_self","title":""}]},{"text":"مشروع","href":"#","icon":"empty","target":"_self","title":"","children":[{"text":"المشاريع","href":"/project","icon":"empty","target":"_self","title":""},{"text":"تفاصيل المشروع","href":"/project","icon":"empty","target":"_self","title":""}]},{"text":"وكيل","href":"#","icon":"empty","target":"_self","title":"","children":[{"text":"عملاء","href":"/agent/list","icon":"empty","target":"_self","title":""},{"text":"تفاصيل الوكيل","href":"/agent/list","icon":"empty","target":"_self","title":""}]},{"text":"وكالة","href":"#","icon":"empty","target":"_self","title":"","children":[{"text":"وكالات","href":"/agency/list","icon":"empty","target":"_self","title":""},{"text":"تفاصيل الوكالة","href":"/agency/list","icon":"empty","target":"_self","title":""}]},{"text":"مدونة","href":"#","icon":"empty","target":"_self","title":"","children":[{"text":"المدونات","href":"/blogs","icon":"empty","target":"_self","title":""},{"text":"تفاصيل المدونة","href":"/blogs","icon":"empty","target":"_self","title":""}]},{"text":"اتصل","href":"/contact","icon":"empty","target":"_self","title":""}]','lang' => 'ar','status' => '1','created_at' => '2021-01-18 20:39:58','updated_at' => '2021-01-19 12:50:26'),
//          array('id' => '6','name' => 'Explore','position' => 'Footer_left','data' => '[{"text":"About Us","icon":"","href":"/page/about-us","target":"_self","title":""},{"text":"My Account","icon":"empty","href":"/agent/dashboard","target":"_self","title":""},{"text":"My Listings","icon":"empty","href":"/agent/property","target":"_self","title":""},{"text":"Pricing Packages","icon":"empty","href":"/agent/package","target":"_self","title":""},{"text":"User Dashboard","icon":"empty","href":"/agent/dashboard","target":"_self","title":""},{"text":"Bookmarks","icon":"empty","href":"/agent/favourites","target":"_self","title":""}]','lang' => 'en','status' => '1','created_at' => '2021-01-20 19:59:56','updated_at' => '2021-01-20 20:06:22'),
//          array('id' => '7','name' => 'About','position' => 'Footer_right','data' => '[{"text":"Sitemap","href":"/sitemap.xml","icon":"empty","target":"_self","title":""},{"text":"Contact Us","href":"/contact","icon":"empty","target":"_self","title":""},{"text":"Terms And Condition","href":"/page/terms-and-condition","icon":"empty","target":"_self","title":""},{"text":"Privacy Policy","href":"/page/privacy-policy","icon":"empty","target":"_self","title":""},{"text":"Latest News","href":"/blog","icon":"empty","target":"_self","title":""},{"text":"Support","href":"/contact","icon":"empty","target":"_self","title":""}]','lang' => 'en','status' => '1','created_at' => '2021-01-20 20:23:41','updated_at' => '2021-01-20 22:53:06'),
//          array('id' => '8','name' => 'حول','position' => 'Footer_right','data' => '[{"text":"خريطة الموقع","href":"/sitemap.xml","icon":"empty","target":"_self","title":""},{"text":"اتصل بنا","href":"/contact","icon":"empty","target":"_self","title":""},{"text":"أحكام وشروط","href":"/page/terms-and-condition","icon":"empty","target":"_self","title":""},{"text":"سياسة الخصوصية","href":"/page/privacy-policy","icon":"empty","target":"_self","title":""},{"text":"أحدث الأخبار","href":"/blog","icon":"empty","target":"_self","title":""},{"text":"الدعم","href":"/contact","icon":"empty","target":"_self","title":""}]','lang' => 'ar','status' => '1','created_at' => '2021-01-20 20:23:41','updated_at' => '2021-01-20 23:04:23'),
//          array('id' => '9','name' => 'يكتشف','position' => 'Footer_left','data' => '[{"text":"معلومات عنا","href":"/page/about-us","icon":"empty","target":"_self","title":""},{"text":"حسابي","href":"/agent/dashboard","icon":"empty","target":"_self","title":""},{"text":"القوائم الخاصة بي","href":"/agent/property","icon":"empty","target":"_self","title":""},{"text":"حزم التسعير","href":"/agent/package","icon":"empty","target":"_self","title":""},{"text":"لوحة تحكم المستخدم","href":"/agent/dashboard","icon":"empty","target":"_self","title":""},{"text":"إشارات مرجعية","href":"/agent/favourites","icon":"empty","target":"_self","title":""}]','lang' => 'ar','status' => '1','created_at' => '2021-01-20 19:59:56','updated_at' => '2021-01-20 23:12:31')
//      );

//      Menu::insert($menu);
}
}
