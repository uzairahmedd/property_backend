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
            "min_price" => $this->price_min,
            "max_price" => $this->price_max,
            "address" => [
                "city" => $this->post_city["value"],
                "state" => $this->post_state["value"],
            ],
            "user" => [
                "name" => $this->user["name"],
                "email" => $this->user["email"],
                "info" => $this->user->usermeta->content,
                "avatar" => $this->user["avatar"],
            ],
            "coordinates" => $this->lat_long,
            "features" => $this->features,
            "bedrooms" => $this->option_data->where('category.name', 'Bedrooms')->last()->value ?? 0,
            "bathrooms" => $this->option_data->where('category.name', 'Bathrooms')->last()->value ?? 0,
            "photos" => $this->photos,
            "facilities" => $this->facilities,
            "youtube_id" => $this->youtube_url->content,
            "floor_plans" => $this->floor_plans->pluck('content'),
            "virtual_tour" => $this->virtual_tour->content
        ];
    }
}
