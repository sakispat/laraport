<?php

namespace App\Models;

use App\Models\User;
use App\Models\TestCompain;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestCompainUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'test_compain_id',
    ];
}
