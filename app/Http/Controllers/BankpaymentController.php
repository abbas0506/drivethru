<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Bankpayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class BankpaymentController extends Controller
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
        $user = session('user');
        return view('student.payments.bank.create');
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
            'application_id' => 'required',
            'dateon' => 'required',
            'bank' => 'required',
            'branch' => 'required',
            'challan' => 'required',
            'scancopy' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $bankpayment = Bankpayment::create($request->all());
            if ($request->hasFile('scancopy')) {
                //dont remove default.png
                // if (!$bankpayment->scancopy == 'default.png') {
                //     $file_path = public_path('images/vouchers/') . $bankpayment->scancopy;
                //     if (file_exists($file_path)) {
                //         unlink($file_path);
                //     }
                // }
                //construct image name
                $file_name = $request->application_id . '.' . $request->scancopy->extension();
                $request->file('scancopy')->move(public_path('images/vouchers/'), $file_name);
                $bankpayment->scancopy = $file_name;
            }

            $bankpayment->save();
            $application = Application::find($request->application_id);
            $application->method = 0;
            $application->update();

            DB::commit();
            return redirect()->back()->with('success', 'Successfully created');
        } catch (Exception $ex) {
            echo $ex->getMessage();
            DB::rollBack();
            // something went wrong
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bankpayment  $bankpayment
     * @return \Illuminate\Http\Response
     */
    public function show(Bankpayment $bankpayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bankpayment  $bankpayment
     * @return \Illuminate\Http\Response
     */
    public function edit(Bankpayment $bankpayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bankpayment  $bankpayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bankpayment $bankpayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bankpayment  $bankpayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bankpayment $bankpayment)
    {
        //
    }
}