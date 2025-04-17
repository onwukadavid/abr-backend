<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PodcastResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $response_array = [
            'id'=>$this->id,
            'title'=>$this->title,
            'categoryId'=>$this->category_id,
            'description'=>$this->description,
            'image'=>$this->image,
            'isFeatured'=>$this->is_featured,
        ];

        // If the category slug is provided, add the episodes of the podcast to the response
        if ($request->category){
            $response_array['episodes'] = EpisodeResource::collection($this->episodes);
        }

        return $response_array;
    }
}
