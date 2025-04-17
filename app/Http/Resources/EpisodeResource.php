<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EpisodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "podcastId"=>$this->podcast_id,
            "title"=>$this->title,
            "audioUrl"=>$this->audio_url,
            "duration"=>$this->duration
        ];
    }
}
