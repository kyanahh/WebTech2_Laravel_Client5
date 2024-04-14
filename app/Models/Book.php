<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    protected $table = 'book';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'author', 'yearbook'];

    use HasFactory;
}
