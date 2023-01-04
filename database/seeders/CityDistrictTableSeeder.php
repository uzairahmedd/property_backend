<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CityDistrictTableSeeder extends Seeder
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
            ],
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
        
    }
}
