<?php

namespace App\Http\Controllers\Admin;
use App\Models\Chart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function AllOnChart(){
        $result=Chart::all();
        return $result;
    }
}
