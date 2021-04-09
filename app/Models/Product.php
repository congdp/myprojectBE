<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'des',
        'category_id',
        'qty',
        'price',
        'discount',
        'thumb'


    ];
    /**
     *  get category insert to data Product
     * @return Array category
     */
    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
