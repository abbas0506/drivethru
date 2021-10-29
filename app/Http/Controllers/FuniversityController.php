<?php

namespace App\Http\Controllers;

use App\Models\Funiversity;
use Illuminate\Http\Request;
use Exception;

class FuniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $country = session('country');
        // $funiversities = Funiversity::where('country_id', $country->id)->get();
        return view('admin.countries.universities.index', compact('country'));
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
            'name' => 'required',
        ]);

        try {
            $country = session('country');
            $favuniversity = Funiversity::create([
                'name' => $request->name,
                'country_id' => $country->id,

            ]);

            $favuniversity->save();

            return redirect()->back()->with('success', 'Successfully created');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Funiversity  $funiversity
     * @return \Illuminate\Http\Response
     */
    public function show(Funiversity $funiversity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Funiversity  $funiversity
     * @return \Illuminate\Http\Response
     */
    public function edit(Funiversity $funiversity)
    {
        //
        $country = session('country');
        return view('admin.countries.universities.edit', compact('funiversity', 'country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Funiversity  $funiversity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funiversity $funiversity)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $funiversity->update($request->all());
            return redirect()->route('funiversities.index')->with('success', 'Successfully updated');
        } catch (Exception $e) {
            return redirect()->route('funiversities.index')->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Funiversity  $funiversity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funiversity $funiversity)
    {
        //
        $funiversity->delete();
        return redirect()
            ->back()
            ->with('success', 'Successfully removed');
    }
}