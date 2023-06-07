<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TopicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'priority' => $this->priority,
            'status' => $this->status,
            'comment_status' => $this->comment_status,
            'title' => $this->title,
            'short_title' => $this->short_title,
            'subtitle' => $this->subtitle,
            'header' => $this->header,
            'summary' => $this->summary,
            'body' => $this->body,
            'author_id' => $this->author_id,
            'creator_id' => $this->creator_id,
            'email_template' => $this->email_template,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y')
        ];
    }
}
