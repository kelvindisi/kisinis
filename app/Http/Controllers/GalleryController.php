<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Gallery::paginate(8);
        return view("admins.gallery.index", ["images" => $images]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admins.gallery.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "picture" => "required|image",
            "description" => "required"
        ]);
        $file = str_replace("public/", "", $request->picture->store("public"));

        Gallery::create([
            "file" => $file,
            "description" => $request->description
        ]);

        return redirect()->to(route("gallery.index"))
            ->with("message", "Image added to gallery");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Gallery::find($id);

        if (!$image)
            return redirect()->to(route("gallery.index"))
                ->with("error", "Gallery image does not exist");

        if (Storage::delete("public/".$image->file))
        {
            $image->delete();
            return  redirect()->to(route("gallery.index"))
                ->with("message", "Gallery image deleted successfully");
        }

        redirect()->to(route("gallery.index"))
            ->with("error", "Error occured trying to delete the image");
    }
}
