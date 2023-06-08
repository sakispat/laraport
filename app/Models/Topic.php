<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
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
        'comment_status',
        'title',
        'short_title',
        'subtitle',
        'header',
        'summary',
        'body',
        'author_id',
        'creator_id',
        'email_template',
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
        'comment_status' => 'integer',
    ];
}
