<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = ['user_id', 'title', 'author', 'is_loaned', 'loaner_id', 'loan_date'];
    protected $guarded = [];

    protected $casts = [
        'created_at' => 'date',
        'updated_at' => 'date',
        'loan_date' => 'date',
        'is_loaned' => 'boolean',
    ];
}
