<?php
namespace App\Repositories\Category;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository 
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Category::class;
    }
}