<?php namespace FreeTier\Http\Controllers;

use FreeTier\Service;

class ServiceController extends Controller
{
    /**
     * Redirect a service to their final URL
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect($id)
    {
        $service = Service::findOrFail($id);

        return redirect($service->landing_url);
    }
}
