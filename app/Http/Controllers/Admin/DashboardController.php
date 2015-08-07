<?php namespace SaaSHub\Http\Controllers\Admin;

use SaaSHub\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.dashboard');
    }
}
