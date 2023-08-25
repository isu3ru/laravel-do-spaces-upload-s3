<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    function index()
    {
        return view('index');
    }

    function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file'
        ], $request->all());

        $file = $request->file('file');
        $path = $file->store('attachments');
        dump($path);

        $url = Storage::url($path);
        dump($url);

        echo "<img src='$url' />";
    }
}
