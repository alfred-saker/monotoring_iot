<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Module;

class ChartDataController extends Controller
{

    public function index(Request $request){

        $modules = Module::all()->toArray();
        $historyData = History::all()->toArray();

        return response()->json([
            'modules' => $modules,
            'history_data' => $historyData,
        ]);
    }


}