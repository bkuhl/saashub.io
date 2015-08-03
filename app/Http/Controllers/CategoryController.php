<?php namespace FreeTier\Http\Controllers;

use FreeTier\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories');
    }

    public function view($slug)
    {
        $category = Category::where('slug', $slug)->first();

        if (is_null($category)) {
            throw new ModelNotFoundException();
        }

        return view('category')
            ->withCategory($category)
            ->withServices($category->services()->with('metas')->get());
    }
}
