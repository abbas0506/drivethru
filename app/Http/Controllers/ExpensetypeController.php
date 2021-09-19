<?php

namespace App\Http\Controllers;

use App\Models\Expensetype;
use Illuminate\Http\Request;
use Exception;

class ExpensetypeController extends Controller
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
        return view('admin.primary.expensetypes.index', compact('expensetypes'));
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

            $expensetype = Expensetype::create($request->all());
            $expensetype->save();

            return redirect()->back()->with('success', 'Successfully created');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expensetype  $expensetype
     * @return \Illuminate\Http\Response
     */
    public function show(Expensetype $expensetype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expensetype  $expensetype
     * @return \Illuminate\Http\Response
     */
    public function edit(Expensetype $expensetype)
    {
        //
        return view('admin.primary.expensetypes.edit', compact('expensetype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expensetype  $expensetype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expensetype $expensetype)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);

        try {

            $expensetype->update($request->all());
            return redirect()->route('expensetypes.index')->with('success', 'Successfully created');
        } catch (Exception $e) {
            return redirect()->route('expensetypes.index')->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expensetype  $expensetype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expensetype $expensetype)
    {
        //
        $expensetype->delete();
        return redirect()
            ->back()
            ->with('success', 'Successfully removed');
    }
}