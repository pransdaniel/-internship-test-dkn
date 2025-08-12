<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TabunganController extends Controller
{
    
    private $defaultFile = 'data/daftar_tabungan.txt';


    public function uploadForm()
    {
        return view('upload');
    }


    public function uploadFile(Request $request)
    {
        $request->validate([
            'txtfile' => 'required|mimes:txt'
        ]);

        $path = $request->file('txtfile')->storeAs(
            'uploads',
            $request->file('txtfile')->getClientOriginalName()
        );

        session(['selected_file' => $path]);

        return redirect()->route('read');
    }


    public function read()
    {
        $file = session('selected_file', $this->defaultFile);
        $lines = explode("\n", trim(Storage::get($file)));
        $rows = array_map(fn($line) => explode('|', $line), $lines);

        return view('read', [
            'rows' => $rows,
            'file' => $file
        ]);
    }


    public function edit()
    {
        $file = session('selected_file', $this->defaultFile);
        $lines = explode("\n", trim(Storage::get($file)));
        $rows = array_map(fn($line) => explode('|', $line), $lines);

        return view('edit', [
            'rows' => $rows,
            'file' => $file
        ]);
    }


    public function update(Request $request)
    {
        $file = session('selected_file', $this->defaultFile);

        $header = $request->header;
        $data = $request->data;


        $content = implode('|', $header) . "\n";
        foreach ($data as $row) {
            $content .= implode('|', $row) . "\n";
        }

        Storage::put($file, trim($content));

        return redirect()->route('read')->with('success', 'Data berhasil disimpan!');
    }

    public function resetFile()
{
    session()->forget('selected_file'); // hapus file yang dipilih
    return redirect()->route('read');
}
}
