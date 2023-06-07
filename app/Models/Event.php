<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\EventTopicLessonInstructor;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'priority',
        'status',
        'published',
        'release_date_files',
        'expiration',
        'title',
        'htmlTitle',
        'subtitle',
        'header',
        'summary',
        'body',
        'hours',
        'absences_limit',
        'enroll',
        'index',
        'feed',
        'certificate_title',
        'fb_group',
        'evaluate_topics',
        'evaluate_instructors',
        'fb_testimonial',
        'author_id',
        'creator_id',
        'view_tpl',
        'view_counter',
        'published_at',
        'created_at',
        'updated_at',
        'launch_date',
        'xml_title',
        'xml_description',
        'xml_short_description',
    ];

//     public function event()
//     {
//         return $this->hasOne(EventTopicLessonInstructor::class);
//     }

//     public function events()
//     {
//         return $this->belongsTo(EventUser::class);
//     }
// }
