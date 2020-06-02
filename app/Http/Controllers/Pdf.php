<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PdfModel;

class Pdf extends Controller
{

    public function show () {
        return view('pdf_upload');
    }

    public function showUploadPdf(Request $request) {
        $file = $request->file('pdf_file');

        if ($file->getClientOriginalExtension() != 'pdf') {
            return response()->json(['error' => 'This is not a PDF.'], 422);
        }

        if (strripos($file->getClientOriginalName(), 'Proposal') === FALSE) {
            return 'Ignore';
        }

        $pdf = PdfModel::firstOrCreate([
            'name' => $file->getClientOriginalName(),
            'size' => $file->getSize()
            ]);


        //Display File Name
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';

        //Display File Extension
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';

        //Display File Real Path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';

        //Display File Size
        echo 'File Size: '.$file->getSize();
        echo '<br>';

        //Display File Mime Type
        echo 'File Mime Type: '.$file->getMimeType();
    }
}
