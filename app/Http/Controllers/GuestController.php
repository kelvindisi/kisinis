<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GuestController extends Controller
{
    public function index()
    {
        return view("guest.index");
    }

    public function gallery()
    {
        $images = Gallery::paginate(9);

        return view("guest.gallery", ["images" => $images]);
    }
}
