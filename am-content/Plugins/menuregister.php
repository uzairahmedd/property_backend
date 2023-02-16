<?php
function RegisterAdminMenuBar()
{

	if (Auth::User()->role_id != 2) {
		if (Auth()->user()->can('dashboard')) {
			$data[] = array(
				'name' =>  __('labels.dashboard') ,
				'active' => Request::is('admin/dashboard'),
				'icon' => 'fas fa-tachometer-alt',
				'url' => url('admin/dashboard')
			);
		}


		// if (Auth()->user()->can('media.upload')) {
		// 	$media['Add New'] = route('admin.media.upload');
		// }
		// if (Auth()->user()->can('media.list')) {
		// 	$media['Manage Media'] =  route('admin.media.index');
		// }

		// if (count($media ?? []) > 0) {


		// 	$data[] = array(
		// 		'name' => 'Media',
		// 		'active' => Request::is('admin/media*'),
		// 		'icon' => 'far fa-images',
		// 		'child' => $media
		// 	);
		// }

$cities = __('labels.cities');
$district = __('labels.district');
		if (Amcoders\Plugin\Plugin::is_active('Post')) {

			if (Auth()->user()->can('cities.list')) {
				$location[$cities] =  route('admin.cities.index');
			}
			if (Auth()->user()->can('district.list')) {
				$location[$district] =  route('admin.district.index');
			}
			if (count($location ?? []) > 0) {
				$data['admin_locations'] = array(
					'name' => __('labels.locations'),
					'active' => Request::is('admin/location*'),
					'icon' => 'fas fa-map-marker-alt',
					'child' => $location
				);
			}
		}

        $properties = __('labels.properties');
        $download_csv = __('labels.download_csv');
        $features = __('labels.features');
        $categories = __('labels.categories');
        $input_options = __('labels.input_options');

		if (Amcoders\Plugin\Plugin::is_active('Post')) {
			if (Auth()->user()->can('Properties.list')) {
				$property[$properties] = route('admin.property.index');
			}
			if (Auth()->user()->can('csv.list')) {
				$property[$download_csv] = route('admin.property.csv_page');
			}
			// if (Auth()->user()->can('project.list')) {
			// 	$property['Projects'] = route('admin.project.index');
			// }
			if (Auth()->user()->can('feature.list')) {
				$property[$features] = route('admin.feature.index');
			}
			// if (Auth()->user()->can('facilities.list')) {
			// 	$property['Facilities'] = route('admin.facilities.index');
			// }
			if (Auth()->user()->can('category.list')) {
				$property[$categories] = route('admin.category.index');
			}
			// if (Auth()->user()->can('investor.list')) {
			// 	$property['Investors'] = route('admin.investor.index');
			// }
			// if (Auth()->user()->can('status.list')) {
			// 	$property['Status'] = route('admin.status.index');
			// }
			// if (Auth()->user()->can('currency.list')) {
			// 	$property['Currency'] = route('admin.currency.index');
			// }
			if (Auth()->user()->can('input.list')) {
				$property[$input_options] = route('admin.input.index');
			}
			if (count($property ?? []) > 0) {
				$data['admin_rs'] = array(
					'name' => __('labels.real_state'),
					'active' => Request::is('admin/real-state*'),
					'icon' => 'fas fa-landmark',
					'child' => $property
				);
			}
		}



		// if(Amcoders\Plugin\Plugin::is_active('plan'))
		// {
		// 	if (Auth()->user()->can('package.create')) {
		// 		$plan['Create Package'] = route('admin.plan.create');

		// 	}
		// 	if (Auth()->user()->can('package.list')) {

		// 		$plan['Package List'] = route('admin.plan.index');
		// 	}
		// 	if (count($plan ?? []) > 0) {

		// 	$data['admin_']=array(
		// 		'name' => 'Packages',
		// 		'active' => Request::is('admin/plan*'),
		// 		'icon' => 'fas fa-tags',
		// 		'child'=>$plan
		// 	);

		//    }

		//    if (Auth()->user()->can('agency_package.create')) {
		// 		$agency_package['Create Agency Package'] = route('admin.agency-package.create');

		// 	}
		// 	if (Auth()->user()->can('agency_package.list')) {

		// 		$agency_package['Agency Package List'] = route('admin.agency-package.index');
		// 	}
		// 	if (count($agency_package ?? []) > 0) {

		// 	$data['admin_package']=array(
		// 		'name' => 'Agency Packages',
		// 		'active' => Request::is('admin/agency-package*'),
		// 		'icon' => 'fas fa-user-tag',
		// 		'child'=>$agency_package
		// 	);

		//    }
		// }
        $users = __('labels.users');

		if (Amcoders\Plugin\Plugin::is_active('Post')) {
			// if (Auth()->user()->can('user.create')) {
			// 	$admin_ag['Add new'] = route('admin.agent.create');
			// }
			if (Auth()->user()->can('user.list')) {
				$admin_ag[$users] =  route('admin.agent.index');
			}

			if (count($admin_ag ?? []) > 0) {
				$data['admin_ag'] = array(
					'name' => __('labels.agent_users'),
					'active' => Request::is('admin/agent*'),
					'icon' => 'fas fa-users',
					'child' => $admin_ag
				);
			}
		}


		// if(Amcoders\Plugin\Plugin::is_active('Post'))
		// {
		// 	if (Auth()->user()->can('user.create')) {
		// 		$admin_agency['Add New'] = route('admin.agent.create');
		// 	}
		// 	if (Auth()->user()->can('user.list')) {
		// 		$admin_agency['Manage Agency'] =  route('admin.agency.index');
		// 	}
		// 	if (count($admin_agency ?? []) > 0) {
		// 	$data['admin_agency']=array(
		// 		'name' => 'Manage Agency',
		// 		'active' => Request::is('admin/agency*'),
		// 		'icon' => 'fas fa-users-cog',
		// 		'child'=> $admin_agency
		// 	);
		//     }

		//     if (Auth()->user()->can('testimonial.create')) {
		// 		$testimonials['Create Testimonial'] = route('admin.testimonial.create');

		// 	}
		// 	if (Auth()->user()->can('testimonial.list')) {

		// 		$testimonials['Testimonial List'] = route('admin.testimonial.index');
		// 	}
		// 	if (count($testimonials ?? []) > 0) {

		// 	$data['admin_testimonial']=array(
		// 		'name' => 'Testimonial',
		// 		'active' => Request::is('admin/testimonial*'),
		// 		'icon' => 'fas fa-tags',
		// 		'child'=>$testimonials
		// 	);

		//    }
		// }

		// if(Amcoders\Plugin\Plugin::is_active('Paymentgetway')){

		// 	if (Auth()->user()->can('api_and_getway')) {
		// 		$admin_payment_api['API & Getways'] = route('admin.payment.index');
		// 	}
		// 	if (Auth()->user()->can('api_and_getway')) {
		// 		$admin_payment_api['Transactions'] =  route('admin.payment.show','transaction');
		// 	}
		// 	if (Auth()->user()->can('payment.settings')) {
		// 		$admin_payment_api['Payment Settings'] =  route('admin.payment.show','currency');
		// 	}

		// 	if (count($admin_payment_api ?? []) > 0) {
		// 	$data['admin_payment_api']=array(
		// 		'name' => 'Payment Methods',
		// 		'active' => Request::is('admin/payment*'),
		// 		'icon' => 'fas fa-credit-card',
		// 		'child'=> $admin_payment_api
		// 	);
		//    }
		// }



        $roles = __('labels.roles');
        $admin = __('labels.admins');

		if (Auth()->user()->can('role.list')) {
			$admins[$roles] = route('admin.role.index');
		}
		if (Auth()->user()->can('admin.list')) {
			$admins[$admin] = route('admin.users.index');
		}

		if (count($admins ?? []) > 0) {
			$data[] = array(
				'name' => __('labels.admin_roles'),
				'active' => Request::is('admin/role*') || Request::is('admin/users*'),
				'icon' => 'fas fa-user-shield',
				'child' => $admins
			);
		}




		//    if (Auth()->user()->can('language_edit')) {
		// 	$data[] = array(
		// 		'name' => 'Language Customize',
		// 		'active' => Request::is('admin/language*'),
		// 		'icon' => 'fas fa-language',
		// 		'child'=> array(
		// 			'Create Language' => route('admin.language.create'),
		// 			'Language Settings' => route('admin.language.index')
		// 		)
		// 	);
		//   }

		//   if (Auth()->user()->can('review.list')) {
		//   	$data[] = array(
		// 		'name' => 'Reviews And Rettings',
		// 		'active' => Request::is('admin/review*'),
		// 		'icon' => 'far fa-star',
		// 		'url' => route('admin.review.index')
		// 	);
		//   }


		// 	if (Auth()->user()->can('page.list')) {
		// 	$data[] = array(
		// 		'name' => 'Pages',
		// 		'active' => Request::is('admin/page*'),
		// 		'icon' => 'far fa-copy',
		// 		'url' => route('admin.page.index')
		// 	);
		//    }
		//    if (Auth()->user()->can('blog.list')) {
		// 	$data[] = array(
		// 		'name' => 'Blogs',
		// 		'active' => Request::is('admin/blog*'),
		// 		'icon' => 'fab fa-blogger-b',
		// 		'url' => route('admin.post.index')
		// 	);
		//    }

		//     if (Auth()->user()->can('theme')) {
		// 		$appearance['Theme'] = route('admin.theme.index');

		// 	}
		// 	if (Auth()->user()->can('theme.option')) {
		// 		$appearance['Theme'] = route('admin.theme.index');
		// 		$appearance['Theme Options'] = route('admin.theme.option');
		// 	}
		// 	if (Auth()->user()->can('theme.option')) {
		// 		$appearance['Menu'] = route('admin.menu.index');
		// 	}

		// 	if (count($appearance ?? []) > 0) {
		// 	$data[] = array(
		// 		'name' => 'Appearance',
		// 		'active' => Request::is('admin/appearance*'),
		// 		'icon' => 'fas fa-palette',
		// 		'child' => $appearance
		// 	);

		//    }


		// $data[] = array(
		// 	'name' => 'Plugin',
		// 	'active' => Request::is('admin/plugin*'),
		// 	'icon' => 'fas fa-download',
		// 	'url' => route('admin.plugin.index')
		// );



		// if (Auth()->user()->can('seo')) {
		// 	$set['Seo'] = route('admin.seo.index');
		// }
		// if (Auth()->user()->can('system.settings')) {
		// 	$set['System Settings'] = route('admin.env.index');
		// }
		// if (Auth()->user()->can('filesystem')) {
		// 	$set['Filesystem'] = route('admin.filesystem.index');
		// }
		// if (Auth()->user()->can('google.analytics')) {
		// 	$set['Google analytics'] = route('admin.google_analytics');
		// }

		// if (count($set ?? []) > 0) {
		// 	$data[] = array(
		// 		'name' => 'Settings',
		// 		'active' => Request::is('admin/setting*'),
		// 		'icon' => 'fas fa-cogs',
		// 		'child' => $set
		// 	);
		// }


		// if (Auth()->user()->can('backup')) {
		// 	$data[] = array(
		// 		'name' => 'Backup',
		// 		'active' => Request::is('admin/backup*'),
		// 		'icon' => 'fas fa-download',
		// 		'url' => route('admin.backup.index')
		// 	);
		// }



	}







	return $data ?? [];
}
