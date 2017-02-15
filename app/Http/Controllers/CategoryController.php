<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;
use App\http\Requests\CreateCategoryRequest;
use App\http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware('category');
    }


    public function index(Request $request)
    {

        $categories = Category::name($request->get('name'))->paginate(10);
        
        return view('backend.categories.index')->withCategories($categories);
    }

    public function create()
    {

        return view('backend.categories.create');
    }

    public function store(CreateCategoryRequest $request)
    {

        $category = new Category;
        $category->name = $request->input('name');
        $category->save();

        if($category->save()){

            return redirect()->route('backend.categories.index')->with('status', "Categoria $category->name creada");
        } else {
            return redirect()->back()->with('status', 'No se ha podido crear la Categoria');
        }
    }



     public function edit($id)
    {

        $category = Category::findOrFail($id);
        return view('backend.categories.edit')->withCategory($category);
    }



    public function update(UpdateCategoryRequest $request, $id)
    {

    	
        $category = Category::findOrFail($id);

        $category->name = $request->input('name');
        $category->save();

        if($category->save()){
            
            return redirect()->route('backend.categories.index')->with('status', "Categoria $category->name actualizada");
        } else {
            return redirect()->back()->with('status', 'No se ha podido actualizar la Categoria');
        }

    }




    public function destroy($id)
    {

    	$category = Category::findOrFail($id);
        Category::destroy($id);

        return redirect()->route('backend.categories.index')->with('status', "Categoria Borrada");
    }
}
