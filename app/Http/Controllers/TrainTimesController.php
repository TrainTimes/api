<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Route;
use App\Models\Station;
use Illuminate\Http\Request;

class TrainTimesController extends Controller
{
    /**
     * station
     *
     * Return stations on specified route
     *
     * @param $route_id
     * @return Bin|Json
     */
    public function station($route_id)
    {
        $stations = Station::with('route')->where('route_id', $route_id)->get();
        return $stations;
    }

    /**
     * route
     *
     * Return routes of specified province
     *
     * @param $province_id
     * @return Bin|Json
     */
    public function route($province_id)
    {
        $routes = Route::with('province')->where('province_id', $province_id)->get();
        return $routes;
    }
}
