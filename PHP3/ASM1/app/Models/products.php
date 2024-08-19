<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'img',
        'price',
        'category_id',
        'description'
    ];
    public function ct_all() {
        return Category::all();
    }
    public function get_all($limit=null) {
        return products::where('sold','>','1')->take($limit) -> get();
    }
    public function getTopViewed($limit=null) {
        return products::orderBy('view','desc')->take($limit) -> get();
    }
    public static function getLatestProducts($limit = 6)
    {
        return self::orderBy('created_at', 'desc')->take($limit)->get();
    }
    
}
