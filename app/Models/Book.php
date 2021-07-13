<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable =[
        'isbn_no',
        'title',
        'author',
        'detail',
        'book_image',
        'published_year',
        'price'
    ];
}
