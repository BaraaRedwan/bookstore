<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    //lest all categries
    public function index($id=null){
        //return __METHOD__;
        if ($id) {
            // If there's a category ID we will fetch all its children!
            $category = Category::findOrFail($id);
            //$categories = Category::where('parent_id', '=', $id)->get();
            $categories = $category->children()->with('parent')->get();
        } else {
            // Get all root categories (no parent)
            // Where parent_id IS NULL
            $categories = Category::whereNull('parent_id')->with('parent')->get();
            $category = null;
        }
        return view('admin.categories.index', [
            'categories' => $categories,
            'parent' => $category,
        ]);
    }
    //show creat form
    public function create(){
        return view('admin.categories.create');
    }

    //creat category on form submit
    public function store(Request $request){

        $request->validate([

        ]);

        $category= new Category;
        $category->name = $request->post('name');
        $category->description = $request->post('description');
        $category->parent_id = $request->post('parent_id');
        $category->save();

        return redirect()->route('categories.index');

    }
    //edit category on form submit
    public function edit($id){
        $category = Category::find($id);
        if(!$category){
            abort(404);
        }
        return view('admin.categories.edit',[
            'category' => $category,
        ]);
    }
    //update category on form submit
    public function update(Request $request,$id){
        $category = Category::findOrFail($id);
        $category->name = $request->post('name');
        $category->description = $request->post('description');
        $category->parent_id = $request->post('parent_id');
        $category->save();

        return redirect()->route('categories.index');


    }
    //delete category on form submit
    public function destroy($id){
          
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index');
    }
}
