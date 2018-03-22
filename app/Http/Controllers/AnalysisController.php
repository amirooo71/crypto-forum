<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Http\Request;

class AnalysisController extends Controller
{

    public function index()
    {
        return view('analysisChart.index');
    }
}


