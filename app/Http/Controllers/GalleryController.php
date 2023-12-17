<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gallery = Gallery::paginate(4);
        return Inertia::render('Gallery/Index', [
            'gallery' => $gallery
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gallery = Gallery::paginate(4);
        return Inertia::render('Gallery/Create', [
            'gallery' => $gallery
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'title' => 'required|string',
            'about' => 'required|string',
            'video_id' => 'required|string',
            'image_logo' => 'required|image'
        ]);

        $image_logo = $request->file('image_logo');
        $filepath_image_logo = $image_logo->store('public/image');
        $filepath_image_logo = str_replace('public/', '', $filepath_image_logo); // Remove 'public/' from the path
        $image_1 = $request->file('image1');
        $filepath_image_1 = $image_1->store('public/image');
        $filepath_image_1 = str_replace('public/', '', $filepath_image_1); // Remove 'public/' from the path
        $image_2 = $request->file('image2');
        $filepath_image_2 = $image_2->store('public/image');
        $filepath_image_2 = str_replace('public/', '', $filepath_image_2); // Remove 'public/' from the path
        $image_3 = $request->file('image3');
        $filepath_image_3 = $image_3->store('public/image');
        $filepath_image_3 = str_replace('public/', '', $filepath_image_3); // Remove 'public/' from the path
        $gallery = new Gallery([
            'title' => $request->title,
            'about' => $request->about,
            'descripton' => $request->descripton,
            'video_id' => $request->video_id,
            'image_logo' => $filepath_image_logo,
            'image1' => $filepath_image_1,
            'image2' => $filepath_image_2,
            'image3' => $filepath_image_3,

        ]);
        $gallery->save();
        return redirect()->route('gallery.create')->with('message', 'Media Uploaded Successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        // dd($gallery);

        return Inertia::render('Gallery/Show', [
            'gallery' => $gallery
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        dd($gallery);
    }
}
