<?php namespace FreeTier\Http\Controllers\Admin;

use DB;
use FreeTier\Category;
use FreeTier\Http\Controllers\Controller;
use FreeTier\Service;
use FreeTier\ServiceMeta;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    use ValidatesRequests;

    /**
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $category = Category::findOrFail($request->get('categoryId'));

        return view('admin.service.create')
            ->withCategory($category);
    }

    /**
     * @return mixed
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required',
            'landing_url'   => 'required',
            'logo'          => 'required'
        ]);

        DB::beginTransaction();
        $category = Category::findOrFail($request->get('categoryId'));
        $postData = $request->only(['name', 'landing_url']);
        $postData['category_id'] = $category->id;
        $service = Service::create($postData);
        $service->setLogo($request->file('logo'));

        $category->update([
            'service_count' => $category->service_count+1
        ]);

        $labels = $request->get('label');
        if (count($labels) > 0) {
            foreach ($labels as $labelId => $value) {
                if (!empty($label)) {
                    ServiceMeta::create([
                        'service_id'   => $service->id,
                        'label_id'     => $labelId,
                        'value'        => $value
                    ]);
                }
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
        return view('admin.service.edit')
            ->withService(Service::findOrFail($id));
    }

    /**
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Service::findOrFail($id)->update($request->only(['name']));

        return redirect('/admin/dashboard');
    }

    public function destroy(Request $request)
    {
        Service::destroy($request->get('id'));

        return redirect('/admin/dashboard');
    }
}
