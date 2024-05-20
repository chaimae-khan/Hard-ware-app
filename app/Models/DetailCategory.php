<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCategory extends Model
{
    use HasFactory;
    protected $table ='detailcategory';
    protected $fillable =
    [
       'name', 'idcategory','title'
    ];
}
