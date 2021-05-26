<?php

namespace App\Http\Middleware;

use Inertia\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        $data = array();
        if (auth()->check()) {
            $data['isAdmin'] = $request->user()->isAdmin();
            $data['isTeacher'] = $request->user()->isTeacher();
            $data['isStudent'] = $request->user()->isStudent();
        }
        $data['message'] = Session::get('message');
        $data['error'] = Session::get('error');
        
        return array_merge(parent::share($request), $data);
    }
}
