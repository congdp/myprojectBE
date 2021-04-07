<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

      /**
     *  get project insert to data Task
     * @return Array project
     */
    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
