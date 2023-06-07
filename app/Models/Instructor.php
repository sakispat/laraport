<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = [
        'priority',
        'status',
        'comment_status',
        'title',
        'short_title',
        'subtitle',
        'header',
        'company',
        'summary',
        'body',
        'ext_url',
        'social_media',
        'author_id',
        'creator_id',
        'created_at',
        'updated_at'
    ];
}
