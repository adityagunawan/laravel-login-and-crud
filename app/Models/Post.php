<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'slug', 'status'
    ];

    /** yang tidak boleh di isi, atau kebalikan dari $fillable */
    // protected $guarded = ['id'];

}
