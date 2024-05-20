<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BodyCategory extends Model
{
    use HasFactory;

    protected $table ='bodycategory';
    protected $fillable =
    [
       'name', 'idHeaderCategory'
    ];
}
