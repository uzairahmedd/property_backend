<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            "status" => $this->status,
            "description" => $this->content ? $this->content->content : '',
            "featured" => $this->featured,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "media" => $this->post_preview['media'],
            "price" => $this->price,
            // "max_price" => $this->price_max,
            "address" => [
                "city" => $this->post_new_city ? $this->post_new_city->city->name : '',
                "state" => $this->post_district ? $this->post_district->district->name : '',
            ],
            "user" => [
                "name" => $this->user["name"],
                "email" => $this->user["email"],
                "info" => isset($this->user->usermeta) && isset($this->user->usermeta->content) ? $this->user->usermeta->content : '',
                "avatar" => $this->user["avatar"],
            ],
            "coordinates" => $this->post_district->district->value ?? '',
            "features" => $this->features,
            "bedrooms" => $this->option_data->where('category.name', 'Bedrooms')->last()->value ?? 0,
            "bathrooms" => $this->option_data->where('category.name', 'Bathrooms')->last()->value ?? 0,
            "photos" => $this->photos,
            "facilities" => $this->facilities,
            "youtube_id" => isset($this->youtube_url) ? $this->youtube_url->content : '',
            "floor_plans" => isset($this->floor_plans) ? $this->floor_plans->pluck('content') : '',
            "virtual_tour" => isset($this->virtual_tour) ? $this->virtual_tour->content : ''
        ];
    }
}
