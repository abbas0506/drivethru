<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Exception;
use Faker\Core\File as CoreFile;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $advertisement = Advertisement::first();
        // echo $advertisement->banner;
        return view('representative.advertisement.banner', compact('advertisement'));
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
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);

        try {
            if ($request->hasFile('banner')) {
                //save new pic after renaming
                $file_name = "banner" . '.' . $request->banner->extension();
                $destination_path = public_path('images/advertisement/');
                $advertisement = Advertisement::first();
                if ($advertisement) {
                    //unlink existing banner
                    $file_path = $destination_path . $advertisement->banner;
                    if (file_exists($file_path)) {
                        // File::delete($file_path);
                        unlink($file_path);
                    }
                    $advertisement->banner = $file_name;
                    $advertisement->save();
                } else {
                    $advertisement = Advertisement::create();   //create new instance
                    $advertisement->banner = $file_name;
                    $advertisement->save();
                }
                $request->file('banner')->move(public_path('images/advertisement'), $file_name);
            }

            return redirect()->back()->with('success', 'Image uploaded successfully');
        } catch (Exception $ex) {
            return redirect()->back()
                ->withErrors($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        //
    }
}