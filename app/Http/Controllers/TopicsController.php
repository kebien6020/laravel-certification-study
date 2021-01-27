<?php

namespace App\Http\Controllers;

class TopicsController extends Controller
{
    public function architecture() { return view('topics.architecture'); }
    public function controllers() { return view('topics.controllers'); }
}
