<?php

namespace Amcoders\Theme\jomidar\http\controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyResource;
use App\Models\User;
use App\Terms;
use App\Category;
use Analytics;
use Spatie\Analytics\Period;
use Carbon\Carbon;

class DataController extends controller
{

    protected $state;
    protected $status;
    public $options;
    public $category;
    public $badroom;
    public $bathroom;
    public $floor;
    public $block;
    public $min_price;
    public $max_price;

    public function agents()
    {
        $agents = User::whereHas('usermeta')->whereHas('terms')->with('usermeta')->where([
            ['role_id', 2],
            ['status', 1]
        ])->inRandomOrder()->take(3)->get();

        return response()->json(['agents' => $agents]);
    }

    public function page_analytics(Request $request)
    {

        $analyticsData = Analytics::performQuery(
            Period::days(14),
            'ga:pageviews',
            [
                'metrics' => 'ga:pageviews',
                'dimensions' => 'ga:date',
                'filters' => 'ga:pagePath==/' . $request->path
            ]

        );

        return $result = collect($analyticsData['rows'] ?? [])->map(function (array $dateRow) {
            return [
                'date' => Carbon::createFromFormat('Ymd', $dateRow[0])->format('m-d-Y'),
                'views' => (int) $dateRow[1],
            ];
        });
    }

    public function city_data()
    {
        $cities = Category::with('preview')->withCount('posts')->where([
            ['type', 'states'],
            ['status', 1]
        ])->latest()->take(6)->get();

        return response()->json(['cities' => $cities]);
    }

    public function blog_data()
    {
        $blogs = Terms::with('excerpt', 'preview', 'user')->where([
            ['type', 'blog'],
            ['status', 1]
        ])->latest()->take(3)->get()->map(function ($q) {
            $data['title'] = $q->title;
            $data['slug'] = $q->slug;
            $data['image'] = $q->preview->content;
            $data['content'] = $q->excerpt->content;
            $data['created_at'] = $q->created_at->diffForHumans();
            $data['name'] = $q->user->name;
            $data['avatar'] = $q->user->avatar;
            return $data;
        });

        return response()->json(['blogs' => $blogs]);
    }

    public function get_latest_property(Request $request)
    {
        $limit = $request->limit ?? 3;
        return  $posts = Terms::where('type', 'property')->where('status', 1)->whereHas('min_price')->whereHas('max_price')->whereHas('post_city')->with('post_preview', 'min_price', 'max_price', 'post_city', 'post_state', 'user', 'featured_option', 'latitude', 'longitude')->latest()->paginate($limit);
    }
    public function get_random_property(Request $request)
    {
        $limit = $request->limit ?? 40;
        return  $posts = Terms::where('type', 'property')->where('status', 1)->whereHas('min_price')->whereHas('max_price')->whereHas('post_city')->with('post_preview', 'min_price', 'max_price', 'post_city', 'post_state', 'user', 'featured_option', 'latitude', 'longitude')->inRandomOrder()->paginate($limit);
    }

    public function recent_property()
    {
        $posts = Terms::where([['type', 'property'], ['status', 1]])->whereHas('min_price')->whereHas('max_price')->whereHas('post_city')->with('post_preview', 'min_price', 'max_price', 'post_city', 'property_status_type')->latest()->take(6)->get();
        return response()->json($posts);
    }

    public function review()
    {
        $reviews = Category::with('excerpt')->where([
            ['status', 1],
            ['type', 'testimonial']
        ])->latest()->take(3)->get();

        return $reviews;
    }


    public function get_properties(Request $request, $collection = false)
    {
        $this->state = $request->state;
        $this->status = $request->status;
        $this->category = $request->category;
        $this->min_price = $request->min_price;
        $this->max_price = $request->max_price;

        $this->badroom = $request->badroom[16] ?? null;
        $this->bathroom = $request->bathroom[17] ?? null;
        $this->floor = $request->floor[18] ?? null;
        $this->block = $request->block[15] ?? null;

        $posts = Terms::where('type', 'property')->where('status', 1)->whereHas('min_price')
            ->whereHas('max_price')->whereHas('post_city')
            ->with('floor_plans', 'post_preview', 'min_price', 'max_price', 'post_city', 'post_state', 'user', 'featured_option', 'latitude', 'longitude', 'property_status_type')->whereHas('post_state', function ($q) {
                if (!empty($this->state)) {
                    return $q->where('category_id', $this->state);
                }
                return $q;
            })->whereHas('property_status_type', function ($q) {
                if (!empty($this->status)) {
                    return $q->where('category_id', $this->status);
                }
                return $q;
            });

        if (!empty($request->category)) {
            $posts = $posts->whereHas('category', function ($q) {
                return $q->where('category_id', $this->category);
            });
        }

        if (!empty($request->min_price)) {
            $posts = $posts->whereHas('min_price', function ($q) {
                return $q->where('price', '<=', $this->min_price);
            });
        }
        if (!empty($request->max_price)) {
            $posts = $posts->whereHas('max_price', function ($q) {
                return $q->where('price', '<=', $this->max_price);
            });
        }

        if (!empty($request->src)) {
            $posts = $posts->where('title', 'LIKE', '%' . $request->src . '%');
        }


        if (!empty($this->block) && !empty($this->badroom) && !empty($this->bathroom) && !empty($this->floor)) {

            $data = $posts->whereHas('option_data', function ($q) {
                $data = $q->where('category_id', 16);
                return $data->where('value', '>=', $this->badroom);
            })
                ->whereHas('option_data', function ($q) {
                    $data = $q->where('category_id', 17);
                    return $data->where('value', '>=', $this->bathroom);
                })
                ->whereHas('option_data', function ($q) {
                    $data = $q->where('category_id', 18);
                    return $data->where('value', '>=', $this->floor);
                })
                ->whereHas('option_data', function ($q) {
                    $data = $q->where('category_id', 15);
                    return $data->where('value', '>=', $this->block);
                })
                ->latest()->paginate(30);

            return response()->json($data);
        }
        if (!empty($this->badroom) && !empty($this->bathroom) && !empty($this->floor)) {

            $data = $posts->whereHas('option_data', function ($q) {
                $data = $q->where('category_id', 16);
                return $data->where('value', '>=', $this->badroom);
            })
                ->whereHas('option_data', function ($q) {
                    $data = $q->where('category_id', 17);
                    return $data->where('value', '>=', $this->bathroom);
                })
                ->whereHas('option_data', function ($q) {
                    $data = $q->where('category_id', 18);
                    return $data->where('value', '>=', $this->floor);
                })

                ->latest()->paginate(30);


            return response()->json($data);
        }
        if (!empty($this->bathroom) && !empty($this->floor)) {

            $data = $posts->whereHas('option_data', function ($q) {
                $data = $q->where('category_id', 17);
                return $data->where('value', '>=', $this->bathroom);
            })
                ->whereHas('option_data', function ($q) {
                    $data = $q->where('category_id', 18);
                    return $data->where('value', '>=', $this->floor);
                })
                ->latest()->paginate(30);
            return response()->json($data);
        }
        if (!empty($bathroom)) {

            $data = $posts->whereHas('option_data', function ($q) {
                $data = $q->where('category_id', 17);
                return $data->where('value', '>=', $this->bathroom);
            })
                ->latest()->paginate(30);


            return response()->json($data);
        }

        if (!empty($this->floor)) {

            $data = $posts->whereHas('option_data', function ($q) {
                $data = $q->where('category_id', 18);
                return $data->where('value', '>=', $this->floor);
            })
                ->latest()->paginate(30);

            return response()->json($data);
        }

        if (!empty($this->block)) {
            $data = $posts->whereHas('option_data', function ($q) {
                $data = $q->where('category_id', 15);
                return $data->where('value', '>=', $this->block);
            })
                ->latest()->paginate(30);

            return response()->json($data);
        }

        if ($collection) {
            return PropertyResource::collection($posts->get());
        }
        $posts = $posts->latest()->paginate(12);
        return response()->json($posts);
    }


    public function get_properties_data(Request $request, $collection = false)
    {
        
        $this->state = $request->state;
        $this->status = $request->status;
        $this->category = $request->category;
        $this->parent_category = $request->parent_category;
        $this->price = $request->price;
        $this->room = $request->room;
        $this->min_price = $request->min_price ?? 0;
        $this->max_price = $request->max_price ?? 0;
        $posts = Terms::where('type', 'property')->where('status', 1)->with('parentcategory', 'category', 'landarea', 'post_preview', 'price', 'post_district', 'user', 'property_status_type', 'option_data','post_new_city')->whereHas('post_new_city', function ($q) {
            if (!empty($this->state)) {
                return $q->where('city_id', $this->state);
            }
            return $q;
        })->whereHas('property_status_type', function ($q) {
            if (!empty($this->status)) {
                return $q->where('category_id', $this->status);
            }
            return $q;
        })
            ->whereHas('option_data', function ($q) {
                if (!empty($this->room)) {
                    $my_options = explode(',', $this->room);
                    return $q->whereIn('value', $my_options);
                }
                return $q;
            });
        if (!empty($this->parent_category)) {
            $posts = $posts->whereHas('parentcategory', function ($q) {
                return $q->where('category_id', $this->parent_category);
            });
        }
        if (!empty($this->category)) {
            $posts = $posts->whereHas('category', function ($q) {
                $my_categories = explode(',', $this->category);
                return $q->where('category_id', $my_categories);
            });
        }

       if (!empty($this->min_price) || !empty($this->max_price)) {
           $posts = $posts->whereHas('price', function ($q) {

               return $q->whereBetween('price', [$this->min_price, $this->max_price]);
           });
       }

        if ($collection) {
            return PropertyResource::collection($posts->get());
        }
        $posts = $posts->latest()->paginate(30);
        return response()->json($posts);
    }



    public function get_projects(Request $request)
    {

        $this->state = $request->state;
        $this->status = $request->status;
        $this->category = $request->category;




        $posts = Terms::where('type', 'project')->where('status', 1)->whereHas('post_city')->with('post_preview', 'post_city', 'post_state', 'featured_option', 'property_status_type')->whereHas('post_state', function ($q) {
            if (!empty($this->state)) {
                return $q->where('category_id', $this->state);
            }
            return $q;
        })->whereHas('property_status_type', function ($q) {
            if (!empty($this->status)) {
                return $q->where('category_id', $this->status);
            }
            return $q;
        });

        if (!empty($request->category)) {
            $posts = $posts->whereHas('category', function ($q) {
                return $q->where('category_id', $this->category);
            });
        }


        if (!empty($request->src)) {
            $posts = $posts->where('title', 'LIKE', '%' . $request->src . '%');
        }
        $posts = $posts->latest()->paginate(30);
        return response()->json($posts);
    }
}
