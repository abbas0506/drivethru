<?php

namespace App\Http\Controllers;

use App\Models\Visadoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;


class VisadocController extends Controller
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
        return view('admin.countries.visadocs.index', compact('country'));
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
        $country = session('country');
        DB::beginTransaction();
        try {
            if ($request->doc_ids) {
                $doc_ids = explode(',', $request->doc_ids);
                foreach ($doc_ids as $doc_id) {
                    Visadoc::create(['country_id' => $country->id, 'doc_id' => $doc_id]);
                }
            }
            DB::commit();
            //all good
            return redirect()->route('visadocs.index', $country)->with('success', 'Scuccesful');
        } catch (Exception $ex) {
            return redirect()->back()->withErrors('error', $ex->getMessage());
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visadoc  $visadoc
     * @return \Illuminate\Http\Response
     */
    public function show(Visadoc $visadoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visadoc  $visadoc
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $country = session('country');
        return view('admin.countries.visadocs.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visadoc  $visadoc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visadoc $visadoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visadoc  $visadoc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visadoc $visadoc)
    {
        //
        $visadoc->delete();
        return redirect()->back()->with('success', 'Successfully removed');
    }
}