<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     */
    protected $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function index()
    {
       $products = $this->productRepo->getProduct();
        // $products = $this->productRepo->with(['Category'])->get()->toArray();

        // return view('home.products', ['products' => $products]);
        return $products;
    }

    public function show($id)
    {
        $product = $this->productRepo->find($id);

        return $product;
    }

    public function store(Request $request)
    {
        $data = $request->all();

        //... Validation here

        $product = $this->productRepo->create($data);

    
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        //... Validation here

        $product = $this->productRepo->update($id, $data);

    }

    public function destroy($id)
    {
        $this->productRepo->delete($id);
    }
}