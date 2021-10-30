<?php

namespace App\Http\Controllers;

use App\Models\Expensetype;
use App\Models\Livingcost;
use Illuminate\Http\Request;
use Exception;

class LivingcostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $expensetypes = Expensetype::all();
        $country = session('country');
        $livingcosts = Livingcost::where('country_id', $country->id)->get();
        return view('admin.countries.livingcosts.index', compact('livingcosts', 'expensetypes', 'country'));
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
            'country_id' => 'required',
            'expensetype_id' => 'required',
            'minexp' => 'required',
            'maxexp' => 'required',
        ]);

        try {
            $livingcost = Livingcost::create($request->all());
            $livingcost->save();
            return redirect()->back()->with('success', 'Successfully created');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\livingcost  $livingcost
     * @return \Illuminate\Http\Response
     */
    public function show(Livingcost $livingcost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\livingcost  $livingcost
     * @return \Illuminate\Http\Response
     */
    public function edit(Livingcost $livingcost)
    {
        //
        $country = session('country');
        return view('admin.countries.livingcosts.edit', compact('livingcost', 'country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\livingcost  $livingcost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Livingcost $livingcost)
    {
        //
        $request->validate([
            'minexp' => 'required',
            'maxexp' => 'required',
        ]);

        try {

            $livingcost->update($request->all());
            return redirect()->route('livingcosts.index')->with('success', 'Successfully created');
        } catch (Exception $e) {
            return redirect()->route('livingcosts.index')->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\livingcost  $livingcost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livingcost $livingcost)
    {
        //
        try {
            $livingcost->delete();
            return redirect()->back()->with('success', 'Successfully deleted');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }
}