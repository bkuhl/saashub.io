<?php namespace SaaSHub\Http\Controllers\Admin;

use DB;
use SaaSHub\Category;
use SaaSHub\CategoryLabel;
use SaaSHub\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ValidatesRequests;

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        DB::beginTransaction();
        $category = Category::create($request->only(['name']));
        foreach ($request->get('label') as $label) {
            if (!empty($label)) {
                CategoryLabel::create([
                    'category_id'   => $category->id,
                    'name'          => $label
                ]);
            }
        }
        DB::commit();

        return redirect('/admin/dashboard');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        return view('admin.category.edit')
            ->withCategory(Category::findOrFail($id));
    }

    /**
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Category::findOrFail($id)->update($request->only(['name']));

        return redirect('/admin/dashboard');
    }

    public function destroy(Request $request)
    {
        DB::beginTransaction();

        $category = Category::findOrFail($request->get('id'));
        foreach ($category->services as $service) {
            $service->destroy();
        }
        $category->destroy();

        DB::commit();

        return redirect('/admin/dashboard');
    }
}
