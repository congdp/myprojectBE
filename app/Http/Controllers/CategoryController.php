<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Get all blogs in the db
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * Get blog by id
     * @param string $id
     * @return Category[$id]
     */
    public function show($id)
    {
        return Category::find($id);
    }

    /**
     * Get blogs by title
     * @param string $title
     */
    public function search(Request $request)
    {
        // $query = Blog::select('*');
        // if(isset($request->title)) {
        //     $query->where('title','like','%'. $request->title .'%');
        // }
        // return $query->get();
        return Category::where('name', 'LIKE', '%'  . $request->name . '%')->get();
    }

    /**
     * Add a blog to db
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $category = Category::create($data);
        return response()->json($category, 201);
    }

    /**
     * Update blog by id
     * @param Request $request
     * @param string $id
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return $category;
    }

    /**
     * Delete blog by id
     * @param string $id
     * @return JsonResponse
     */
    public function delete(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return 204;
    }
}
