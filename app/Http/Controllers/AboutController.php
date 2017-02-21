<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Excel;
class AboutController extends Controller
{
    public function index(){
        return view('about.index');
    }

    public function postAbout(Request $request){
        if($request->hasFile('file')){
            $path = $request->file('file')->getRealPath();
            $data=Excel::load($path, function($reader) {
//                $reader->select(1)->get();
//                $reader->each(function($sheet) {
//
//                    // Loop through all rows
//                    $sheet->each(function($row) {
//                    });
//
//                });
            })->get(array(1));

            dd($data);


        }
        return back();
    }
}
