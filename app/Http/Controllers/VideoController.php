<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Exception;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $video = Video::first();
        return view('representative.videos.index', compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'mp4' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm|max:20000'
        ]);

        try {
            if ($request->hasFile('mp4')) {
                //save new pic after renaming
                $file_name = "intro" . '.' . $request->mp4->extension();
                $destination_path = public_path('videos/');
                $video = Video::first();
                if ($video) {
                    //unlink existing banner
                    $file_path = $destination_path . $video->name;
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                    $video->name = $file_name;
                    $video->save();
                } else {
                    $video = Video::create();   //create new instance
                    $video->name = $file_name;
                    $video->save();
                }
                $request->file('mp4')->move(public_path('videos/'), $file_name);
            }

            return redirect()->back()->with('success', 'Video uploaded successfully');
        } catch (Exception $ex) {
            return redirect()->back()
                ->withErrors($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }
}