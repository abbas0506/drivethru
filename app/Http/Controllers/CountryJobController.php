<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception;

use App\Models\CountryJob;
use App\Models\Jobdeptt;
use App\Models\Level;

class CountryJobController extends Controller
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
        $jobdeptts = Jobdeptt::all();
        $levels = Level::all();
        return view('admin.countries.jobs', compact(['country', 'jobdeptts', 'levels']));
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
            'maxhrs' => 'required',
            'hourlyrate' => 'required',
            'jobdeptt_id' => 'required',
            'level_id' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $countryjob = CountryJob::updateOrCreate($request->all());
            $countryjob->save();

            $country = session('country');
            $country->finishedstep = 4;
            $country->save();

            Db::commit();
            return redirect()->route('countryjobs.index')
                ->with('success', 'Job created successfully.');
        } catch (Exception $e) {
            Db::rollBack();
            return redirect()->route('countryjobs.index')
                ->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CountryJob  $countryJob
     * @return \Illuminate\Http\Response
     */
    public function show(CountryJob $countryJob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CountryJob  $countryJob
     * @return \Illuminate\Http\Response
     */
    public function edit(CountryJob $countryJob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CountryJob  $countryJob
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CountryJob $countryJob)
    {
        //
        $request->validate([
            'name' => 'required',
            'maxhrs' => 'required',
            'hourlyrate' => 'required',
            'jobdeptt_id' => 'required',
            'level_id' => 'required',
        ]);

        try {
            $countryJob->update($request->all());
            return redirect()->route('countryjobs.index');
        } catch (Exception $e) {
            return redirect()->route('countryjobs.index')
                ->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CountryJob  $countryJob
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryJob $countryjob)
    {
        //
        $countryjob->delete();
        return redirect()->route('countryjobs.index')
            ->with('success', 'Job created successfully.');
    }
}