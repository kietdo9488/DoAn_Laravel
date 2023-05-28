<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'Category';
    public $timestamp = true;
    protected $primaryKey = 'id';
    public $incrementing = true;
}
