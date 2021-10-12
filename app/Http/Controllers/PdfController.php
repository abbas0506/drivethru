<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;


class PdfController extends Controller
{
    //
    public function preview_appliedforunicourses(Request $request)
    {
        echo "application" . $request->id;
    }
}