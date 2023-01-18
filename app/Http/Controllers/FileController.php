<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\File;
use Carbon\Carbon;
use Storage;

class FileController extends Controller
{
    //show all files
    public function index() {
        $files = File::all();

        return view('files.index', [
            'files' => $files
        ]);
    }

    //show upload file page
    public function create() {
        if(Gate::allows('is-supervisor') || Gate::alllows('is-admin')) {
            return view('files.create');
        }
    }

    //upload file
    public function store(Request $request) {
        $request->validate([
            'quantity' => 'required',
            'file' => 'required|file|mimes:doc,docx,xlx,csv,pdf'
        ]);

        $name = $request->file('file')->getClientOriginalName();
        
        $path = Storage::putFileAs('files', $request->file('file'), $name);
        
        $uploaded_at = Carbon::now();
        
        $file = File::create([
            'name' => $name,
            'path' => $path,
            'quantity' => $request->quantity,
            'uploaded_at' => $uploaded_at
        ]);

        $file->save();
        
        return redirect('/files')->with('success', 'Upload File Success');
    }

    //download file
    public function download(File $file) {
        if(Gate::allows('is-supervisor') || Gate::allows('is-vendor')) {
            return response()->download(storage_path('/app/files/'. $file->name));
        }
    }
} 
