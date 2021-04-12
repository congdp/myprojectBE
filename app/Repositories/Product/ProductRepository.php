<?php
namespace App\Repositories\Product;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\BaseRepository;
// use App\Repositories\Product\ProductRepositoryInterface;

class ProductRepository extends BaseRepository 
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Product::class;
    }

    public function getProduct()
    {
        // dd($this->getModel()::all());
        return $this->getModel()::with(['Category'])->get()->toArray();
    }
    
    public function getProductByCategory($id){
        return $this->getModel()::where('category_id' , $id)->get();
    }
}