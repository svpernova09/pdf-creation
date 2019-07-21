<?php

namespace App\Http\Controllers;

use Fpdf\Fpdf;
use Illuminate\Support\Facades\Response;

class FpdfCreate extends Controller
{
    public function createPdf()
    {
        $pdf = new FPDF('P','in','Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial','',14);
        $pdf->Image(
            storage_path() . '/app/public/world2019.png',
            null,
            null,
            '6'

        );
        $pdf->Cell(
            4, // width
            .5, //height
            'We made a PDF!', // text
            'LTRB', // border
            2, // where the current position should go after the call
            'C'
        );
        $pdf->AddPage();
        $pdf->Cell(
            4, // width
            .5, //height
            'Welcome to the Second Page!', // text
            'LTRB', // border
            0, // where the current position should go after the call
            'C'
        );


        return Response::make($pdf->Output(), 200, [
            'Content-Type' => 'application/pdf',
        ]);
    }
}
