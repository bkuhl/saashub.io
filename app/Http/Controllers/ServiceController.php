<?php namespace SaaSHub\Http\Controllers;

use SaaSHub\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Redirect a service to their final URL
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->recordVisit($request->getClientIp());

        return redirect($service->landing_url);
    }
}
