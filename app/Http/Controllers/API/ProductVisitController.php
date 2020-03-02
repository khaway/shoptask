<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class ProductVisitController
 *
 * @package App\Http\Controllers\API
 */
class ProductVisitController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return Product::findOrFail($request->id)
            ->visits()
            ->increment();
    }
}
