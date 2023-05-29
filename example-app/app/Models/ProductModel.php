<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    public $timestamps = false;
    protected $primaryKey = 'id';
    public $incrementing = true;


    public static function getProductsBySearchKeyword($keyword){
        $result = self::where('product_name', 'like', '%'.$keyword.'%' )->get();

        return $result;
    }
}
