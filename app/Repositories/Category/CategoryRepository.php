<?php
namespace App\Repositories\Category;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class CategoryRepository extends BaseRepository 
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Category::class;
    }

    // public function searchCate(Request $request)
    // {
    //     return Category::where('name', 'LIKE', '%'  . $request->name . '%')->get();
        
    // }

}