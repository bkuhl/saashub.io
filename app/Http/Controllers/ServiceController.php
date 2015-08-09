<?php namespace SaaSHub\Http\Controllers;

use Response;
use SaaSHub\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    const POSTIIVE = 'positive_ratings';
    const NEGATIVE = 'negative_ratings';

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

    public function positive(Request $request, $serviceId)
    {
        $service = Service::findOrFail($serviceId);
        $service->ratePositive($request->getClientIp());

        return Response::json();
    }

    public function negative(Request $request, $serviceId)
    {
        $service = Service::findOrFail($serviceId);
        $service->rateNegative($request->getClientIp());

        return Response::json();
    }
}
