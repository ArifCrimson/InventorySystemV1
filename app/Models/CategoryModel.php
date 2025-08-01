<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{

    protected $table = 'categories';
    
    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->hasMany(ProductModel::class, 'category_id');
    }
}
