<?php

namespace App\Http\Controllers;

use App\Models\Admdoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class AdmdocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                    Admdoc::create(['country_id' => $country->id, 'doc_id' => $doc_id]);
                }
                $country->step3 = 1;
                $country->update();
            }
            DB::commit();
            //all good
            return redirect()->back()->with('success', 'Scuccesful');
        } catch (Exception $ex) {
            return redirect()->back()->withErrors('error', $ex->getMessage());
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admdoc  $admdoc
     * @return \Illuminate\Http\Response
     */
    public function show(Admdoc $admdoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admdoc  $admdoc
     * @return \Illuminate\Http\Response
     */
    public function edit(Admdoc $admdoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admdoc  $admdoc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admdoc $admdoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admdoc  $admdoc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admdoc $admdoc)
    {
        //
        $admdoc->delete();
        return redirect()
            ->back()
            ->with('success', 'Successfully removed');
    }
}