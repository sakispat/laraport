<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'status' => $this->status,
            'title' => $this->title,
            'htmlTitle' => $this->htmlTitle,
            'subtitle' => $this->subtitle,
            'header' => $this->header,
            'summary' => $this->summary,
            'body' => $this->body,
            'vimeo_video' => $this->vimeo_video,
            'vimeo_duration' => $this->vimeo_duration,
            'links' => $this->links,
            'bold' => $this->bold,
            'author_id' => $this->author_id,
            'creator_id' => $this->creator_id,
            'published_at' => $this->published_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at->format('d/m/Y')
        ];
    }
}
