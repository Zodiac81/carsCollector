<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    protected $table = 'series';
    protected $guarded =  ['categories'];
    public $timestamps = false;

    const VALIDATION_RULES = [

    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_series', 'series_id', 'category_id');
    }


}
