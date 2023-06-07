<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'priority' => $this->priority,
            'status' => $this->status,
            'published' => $this->published,
            'release_date_files' => $this->release_date_files,
            'expiration' => $this->expiration,
            'title' => $this->title,
            'htmlTitle' => $this->htmlTitle,
            'subtitle' => $this->subtitle,
            'header' => $this->header,
            'summary' => $this->summary,
            'body' => $this->body,
            'hours' => $this->hours,
            'absences_limit' => $this->absences_limit,
            'enroll' => $this->enroll,
            'index' => $this->index,
            'feed' => $this->feed,
            'certificate_title' => $this->certificate_title,
            'fb_group' => $this->fb_group,
            'evaluate_topics' => $this->evaluate_topics,
            'evaluate_instructors' => $this->evaluate_instructors,
            'fb_testimonial' => $this->fb_testimonial,
            'author_id' => $this->author_id,
            'creator_id' => $this->creator_id,
            'view_tpl' => $this->view_tpl,
            'view_counter' => $this->view_counter,
            'published_at' => $this->published_at,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'launch_date' => $this->launch_date,
            'xml_title' => $this->xml_title,
            'xml_description' => $this->xml_description,
            'xml_short_description' => $this->xml_short_description
        ];
    }
}
