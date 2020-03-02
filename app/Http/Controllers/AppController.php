<?php

namespace App\Http\Controllers;

/**
 * Class AppController
 *
 * @package App\Http\Controllers
 */
class AppController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        return view('app');
    }
}
