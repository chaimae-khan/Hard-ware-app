<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterProduct extends Model
{
    use HasFactory;
    protected $table ='filterproduct';
    protected $fillable =
    [
       'idproduct', 'bodyCategory', // bodycategory rah id nesiit ma dartch id
    ];
}
