<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QueueProcess;
use DB;

class QueueProcessController extends Controller
{
    public function index()
    {
       return view('backend.queue.index');
    }
}
