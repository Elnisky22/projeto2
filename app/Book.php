<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = ['title', 'author', 'user'];
    protected $guarded = [];

    protected $casts = [
        'created_at' => 'date',
        'updated_at' => 'date',
    ];
}
