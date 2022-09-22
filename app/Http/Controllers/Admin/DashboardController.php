<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Order;
use App\Models\User;
use App\Models\Transaction;
use App\Options;
use App\Terms;
use Carbon\Carbon;
use DB;
use Analytics;
use Spatie\Analytics\Period;
class DashboardController extends Controller
{
	/*
	return admin dashboard view
	*/
	public function dashboard()
	{
		if(Auth::User()->role_id == 1 && Auth()->user()->can('dashboard'))
		{
			return view('admin.dashboard');
		}else{
			abort(401);
		}
	}

	public function static_data(){
		$total_listing=Terms::where('type','property')->count();
		
		$total_pending=Terms::where([
			['type','property'],
			['status',3]
		])->count();

		$total_active=Terms::where([
			['type','property'],
			['status',1]
			])->count();

		$total_rejected=Terms::where([
			['type','property'],
			['status',4]
		])->count();

		$total_earnings_amount=Transaction::whereYear('created_at', '=',date('Y'))->sum('amount');
		$total_transection_count=Transaction::whereYear('created_at', '=',date('Y'))->count();

		$sales=Transaction::whereYear('created_at', '=',date('Y'))->orderBy('id', 'asc')->selectRaw('year(created_at) year, monthname(created_at) month, count(*) sales')
                ->groupBy('year', 'month')
                ->get();

        $amount=Transaction::whereYear('created_at', '=',date('Y'))->orderBy('id', 'asc')->selectRaw('year(created_at) year, monthname(created_at) month, sum(amount) amount')
                ->groupBy('year', 'month')
                ->get();

        $post_count=Terms::where('type','property')->whereYear('created_at', '=',date('Y'))->orderBy('id', 'asc')->selectRaw('year(created_at) year, monthname(created_at) month, count(*) post')
                ->groupBy('year', 'month')
                ->get();
                        
		$data['total_posts']=number_format($total_listing);
		$data['total_active']=number_format($total_active);
		$data['total_rejected']=number_format($total_rejected);
		$data['total_pending']=number_format($total_pending);
		$data['total_earnings_amount']=format_currency($total_earnings_amount);
		$data['total_transection_count']=number_format($total_transection_count);
		$data['sales']=$sales;
		$data['amount']=$amount;
		$data['post_count']=$post_count;
		return $data;
	}


	public function dashboardData($period)
	{
		$data['TotalVisitorsAndPageViews']=$this->fetchTotalVisitorsAndPageViews($period);
		$data['MostVisitedPages']=$this->fetchMostVisitedPages($period);
		$data['Referrers']=$this->fetchTopReferrers($period);
		$data['fetchUserTypes']=$this->fetchUserTypes($period);
		$data['TopBrowsers']=$this->fetchTopBrowsers($period);
		
		return response()->json($data);
	}


	public function getCountries($period)
	{
		return $country = \Analytics::performQuery(Period::days($period),'ga:sessions',['dimensions'=>'ga:country','dimension'=>'ga:latitude','dimension'=>'ga:longitude','sort'=>'-ga:sessions']);
		
		$result= collect($country['rows'] ?? [])->map(function (array $dateRow) {
			return [
				'country' =>  $dateRow[0],
				'sessions' => (int) $dateRow[1],
			];
		});
		
		return $result;
	}

	

	public function fetchTotalVisitorsAndPageViews($period)
	{
	   return \Analytics::fetchTotalVisitorsAndPageViews(Period::days($period));
		
	}
	public function fetchMostVisitedPages($period)
	{
	   return \Analytics::fetchMostVisitedPages(Period::days($period));
		
	}

	public function fetchTopReferrers($period)
	{
	   return \Analytics::fetchTopReferrers(Period::days($period));
		
	}

	public function fetchUserTypes($period)
	{
	   return \Analytics::fetchUserTypes(Period::days($period));
		
	}

	public function fetchTopBrowsers($period)
	{
	   return \Analytics::fetchTopBrowsers(Period::days($period));
		
	}


	
	
}
