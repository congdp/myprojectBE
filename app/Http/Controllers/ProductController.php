<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductResource::collection($this->productRepo->getProduct());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ProductResource($this->productRepo->find($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('thumb')) {
            $file = $request->thumb;
            $name = time() . $file->getClientOriginalName();
            $file_path = $request->file('thumb')->move('uploads/', $name);
            $path_name = $file_path->getPathname();
            // dd($path_name);
        }
         
        $data = [
            'name' => $request->name,
            'des' => $request->des,
            'price' => $request->price,
            'discount' => $request->discount,
            'qty' => $request->qty,
            'category_id' => $request->category_id,
            'thumb' => $path_name ?? ''
        ];
        return $this->productRepo->create($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $path_name = '';
        if ($request->hasFile('thumb')) {
            $file = $request->thumb;
            $name = time() . $file->getClientOriginalName();
            $file_path = $request->file('thumb')->move('uploads/', $name);
            $path_name = $file_path->getPathname();
        }
        $data = [
            'name' => $request->name,
            'des' => $request->des,
            'price' => $request->price,
            'discount' => $request->discount,
            'qty' => $request->qty,
            'category_id' => $request->category_id,
            'thumb' => $path_name ?? ''
        ];
        return $this->productRepo->update($id, $data);
    }
    

   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->productRepo->delete($id);
    }
}
