<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller {

    public function htmlPdf() {

        return view('rank.htmlpdf');
    }

    public function generatePdf() {
        
        $data = ['title' => 'First laravel doc'];
        $pdf = PDF::loadView('rank.htmlPdf', $data);
        return $pdf->download('firstpdf.pdf');
    }

}
