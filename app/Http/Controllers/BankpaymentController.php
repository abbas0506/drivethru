<?php

namespace App\Http\Controllers;

use App\Models\Bankpayment;
use Illuminate\Http\Request;

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
        return view('user.payments.bank.create');
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