<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
        'launch_date',
        'xml_title',
        'xml_description',
        'xml_short_description',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'priority' => 'integer',
        'status' => 'integer',
        'published' => 'integer',
        'release_date_files' => 'datetime',
        'enroll' => 'integer',
        'index' => 'integer',
        'feed' => 'integer',
    ];
}
