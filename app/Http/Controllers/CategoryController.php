<?php namespace SaaSHub\Http\Controllers;

use Illuminate\Http\Request;
use SaaSHub\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use SaaSHub\ServiceRatings;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories');
    }

    public function view(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->first();

        if (is_null($category)) {
            throw new ModelNotFoundException();
        }

        $ratingsCache = [];
        $ratings = ServiceRatings::where('ip', $request->getClientIp())
            ->byCategory($category)
            ->get();
        foreach ($ratings as $rating) {
            $ratingsCache[$rating->service_id] = $rating->rating;
        }

        return view('category')
            ->withRatings($ratingsCache)
            ->withCategory($category)
            ->withServices($category->services()->with('metas')->get());
    }
}
