<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    //direct category list 
    public function categoryList(){
        $categories=Category::when(request('key'),function($query){
            $query->where('name','like','%'.request('key').'%');  // filter 'name','like','%'.request('key').'%'
        })->orderBy('id','DESC')->paginate(5);
        $categories->appends(request()->all());
        return view('admin.category.list',compact('categories'));
    }

    // direct home page
    public function home(){
        return view('admin.index');
    }

    //direct create category page
    public function categoryPage(){
        return view('admin.category.create');
    }

    public function create(CategoryRequest $request){
        $categories=Category::create($request->all());
        $categories->save();
        return redirect()->route('admin#categoryPage');
    }

    //delete category

    public function destory(string $id){
        $category=Category::find($id);
        $category->delete();
        return redirect()->route('admin#categoryPage')->with(['deleteSuccess'=>'Delete Success']);
    }

    //edit category
    public function editCategory(string $id){
        $category=Category::find($id);
        return view('admin.category.edit',compact('category'));
    }
   
    public function updateCategory(CategoryUpdateRequest $request,string $id){
        Category::find($id)->update($request->all());
        return redirect()->route('admin#categoryPage');
    }
}
