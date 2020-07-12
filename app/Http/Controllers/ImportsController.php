<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RiderImport;
use Illuminate\Http\File;
use Illuminate\Support\Str;


class ImportsController extends Controller
{
    public function riderImport(Request $request)
    {

        $file = $request->file('filename');
        $ext = $file->getClientOriginalExtension();
        $originalName = $file->getClientOriginalName();
        $newName = Str::random(40) . '.' . $ext;
        $file->storeAs('imports', $newName);
        Excel::import(new RiderImport, 'imports/' . $newName);
        return redirect()->back()->with('message', 'Success!');
    }
}
