<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
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
        'status',
        'title',
        'htmlTitle',
        'subtitle',
        'header',
        'summary',
        'body',
        'vimeo_video',
        'vimeo_duration',
        'links',
        'bold',
        'author_id',
        'creator_id',
        'published_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status' => 'integer',
        'bold' => 'integer',
    ];
}
