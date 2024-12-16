<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    //
    use HasFactory;
    protected $fillable = [ 'title', 'author', 'genre', 'publication_year', 'available' ]; //array de los atributos de la tabla

}
