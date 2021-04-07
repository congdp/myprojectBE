<?php
namespace App\Repositories\Product;

use App\Models\Category;
use App\Models\Product;

interface ProductRepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getProduct();
}