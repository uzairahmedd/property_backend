<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Usermeta;
use App\Category;
use App\Categorymeta;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super = User::create([
            'role_id' => 1,
            'name' => 'Admin',
            'slug' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('rootadmin'),
            'avatar' => 'https://ui-avatars.com/api/?size=50&background=random&name=Admin'
        ]);
        $base_url=env('APP_URL').'/';
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        //create permission
        $permissions = [
            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard'
                ]
            ],

            [
                'group_name' => 'admin',
                'permissions' => [
                    'admin.create',
                    'admin.edit',
                    'admin.update',
                    'admin.delete',
                    'admin.list',

                ]
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    'role.create',
                    'role.edit',
                    'role.update',
                    'role.delete',
                    'role.list',

                ]
            ],
            
            
             [
                'group_name' => 'media',
                'permissions' => [
                    'media.list',
                    'media.upload',
                    'media.delete',
                ]
            ],
            [
                'group_name' => 'Pages',
                'permissions' => [
                    'page.create',
                    'page.edit',
                    'page.delete',
                    'page.list',
                    
                ]
            ],
             [
                'group_name' => 'Blogs',
                'permissions' => [
                    'blog.create',
                    'blog.edit',
                    'blog.delete',
                    'blog.list',
                    
                ]
            ],
             [
                'group_name' => 'Developer',
                'permissions' => [
                    'system.settings',
                    
                                        
                ]
            ],
            
            [
                'group_name' => 'Appearance',
                'permissions' => [
                    'theme.option',                                        
                    'theme',                                        
                    'menu',                                        
                ]
            ],
            [
                'group_name' => 'settings',
                'permissions' => [
                    'seo',                                        
                    'filesystem',                                        
                    'backup',                                        
                                                            
                ]
            ],
             [
                'group_name' => 'language',
                'permissions' => [
                    'language_edit',
                ]
            ],

             [
                'group_name' => 'Location',
                'permissions' => [
                    'states.list',
                    'states.create',
                    'states.edit',
                    'cities.list',
                    'cities.create',
                    'cities.edit',
                    
                ]
            ],
             [
                'group_name' => 'Testimonials',
                'permissions' => [
                    'testimonial.list',
                    'testimonial.create',
                    'testimonial.edit',
                    'testimonial.delete',
                                       
                ]
            ],
            [
                'group_name' => 'Package',
                'permissions' => [
                    'package.list',
                    'package.create',
                    'package.edit',
                    'package.delete',
                                       
                ]
            ],
            [
                'group_name' => 'Agency Package',
                'permissions' => [
                    'agency_package.list',
                    'agency_package.create',
                    'agency_package.edit',
                    'agency_package.delete',
                                       
                ]
            ],
            [
                'group_name' => 'Agent & User',
                'permissions' => [
                    'user.list',
                    'user.create',
                    'user.edit',
                    'user.delete',
                                       
                ]
            ],
            [
                'group_name' => 'Agency',
                'permissions' => [
                    'agency.list',
                    'agency.create',
                    'agency.edit',
                    'agency.delete',
                                       
                ]
            ],
            [
                'group_name' => 'Payment Method',
                'permissions' => [
                    'api_and_getway',
                    'transactions',
                    'payment.settings',
                                       
                ]
            ],
            [
                'group_name' => 'Review & Rattings',
                'permissions' => [
                    'review.list',
                    'review.delete',
                                       
                ]
            ],


             [
                'group_name' => 'Real state',
                'permissions' => [
                    'Properties.list',
                    'Properties.create',
                    'Properties.edit',
                    'Properties.delete',
                    'project.list',
                    'project.create',
                    'project.edit',
                    'project.delete',
                    'feature.list',
                    'feature.edit',
                    'feature.create',
                    'facilities.list',
                    'facilities.create',
                    'facilities.edit',
                    'category.list',
                    'category.create',
                    'category.edit',
                    'investor.list',
                    'investor.create',
                    'investor.edit',
                    'currency.list',
                    'currency.create',
                    'currency.edit',
                    'status.create',
                    'status.edit',
                    'status.delete',
                    'status.list',
                    'input.list',
                    'input.create',
                    'input.edit',
                    'input.delete',
                ]
            ]

        ];

        //assign permission

        foreach ($permissions as $key => $row) {


            foreach ($row['permissions'] as $per) {
                $permission = Permission::create(['name' => $per, 'group_name' => $row['group_name']]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
                $super->assignRole($roleSuperAdmin);
            }
        }

        $users = array(
            array('id' => '2','role_id' => '2','avatar' => $base_url.'uploads/21/01/10012116102993185ffb37b69d617.webp','credits' => '0','status' => '1','name' => 'Dane Reese','slug' => 'dane-reese','email' => 'sicequb@mailinator.com','email_verified_at' => NULL,'password' => '$2y$10$JJTnkLXAbvjksd5ZnEO5N.8FEYKxQg81rP7v5k/QWWr/3jEzcvMBG','two_factor_secret' => NULL,'two_factor_recovery_codes' => NULL,'remember_token' => NULL,'created_at' => '2021-01-10 16:49:27','updated_at' => '2021-01-10 17:22:03'),
            array('id' => '3','role_id' => '2','avatar' => $base_url.'uploads/21/01/10012116102975505ffb30ce8a3aa.webp','credits' => '0','status' => '1','name' => 'Blythe Dorsey','slug' => 'blythe-dorsey','email' => 'gaqoq@mailinator.com','email_verified_at' => NULL,'password' => '$2y$10$rw9l8G6oKZRFGzBt0FwBN..P1JYNTda0ElNy0c7PfYXxvhN55nZc.','two_factor_secret' => NULL,'two_factor_recovery_codes' => NULL,'remember_token' => NULL,'created_at' => '2021-01-10 17:20:24','updated_at' => '2021-01-10 17:21:19'),
            array('id' => '4','role_id' => '2','avatar' => $base_url.'uploads/21/01/10012116102994195ffb381b1b55c.webp','credits' => '0','status' => '1','name' => 'Orlando Whitf','slug' => 'orlando-whitfield','email' => 'mahi@mailinator.com','email_verified_at' => NULL,'password' => '$2y$10$08PwkxcrxxyNk6gl5VtruewBHiBOmaPtJw8cUNrQOBABmU9Ercsuq','two_factor_secret' => NULL,'two_factor_recovery_codes' => NULL,'remember_token' => NULL,'created_at' => '2021-01-10 17:23:44','updated_at' => '2021-01-10 17:23:44')
        );

        User::insert($users);

        $user_meta = array(
            array('id' => '1','user_id' => '2','type' => 'credit','content' => '30','created_at' => '2021-01-10 16:49:27','updated_at' => '2021-01-10 17:18:05'),
            array('id' => '2','user_id' => '2','type' => 'content','content' => '{"address":"Kirtipur, Naogaon","phone":"01334324343","description":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.","facebook":"#","twitter":"#","youtube":"#","pinterest":"#","linkedin":"#","instagram":"#","whatsapp":"179108-4467","service_area":"Savar, Bonani, uttara","tax_number":"49345345345","license":"983423423423423"}','created_at' => '2021-01-10 16:49:27','updated_at' => '2021-01-10 17:18:05'),
            array('id' => '3','user_id' => '3','type' => 'credit','content' => '0','created_at' => '2021-01-10 17:20:24','updated_at' => '2021-01-10 17:21:20'),
            array('id' => '4','user_id' => '3','type' => 'content','content' => '{"address":"Dhaka Savar","phone":"018723434234","description":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.","facebook":"#","twitter":"#","youtube":"#","pinterest":"#","linkedin":"#","instagram":"#","whatsapp":"1317183-6343","service_area":"Dhaka, Rajshahi, Khulna","tax_number":"139324324234","license":"243324324246786"}','created_at' => '2021-01-10 17:20:24','updated_at' => '2021-01-10 17:20:24'),
            array('id' => '5','user_id' => '4','type' => 'credit','content' => NULL,'created_at' => '2021-01-10 17:23:44','updated_at' => '2021-01-10 17:23:44'),
            array('id' => '6','user_id' => '4','type' => 'content','content' => '{"address":"Agrabad, Chittagong","phone":"63134323423","description":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.","facebook":"#","twitter":"#","youtube":"#","pinterest":"#","linkedin":"#","instagram":"#","whatsapp":"173918-9181","service_area":"Dhaka, Agrabad, Naogaon","tax_number":"404343248979","license":"144354367687684"}','created_at' => '2021-01-10 17:23:44','updated_at' => '2021-01-10 17:23:44')
        );
          
        Usermeta::insert($user_meta);

       
    }
}
