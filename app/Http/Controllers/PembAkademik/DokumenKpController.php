<?php

namespace App\Http\Controllers\PembAkademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DokumenKp;
use Illuminate\Support\Facades\Storage;

class DokumenKpController extends Controller
{
    public function index()
    {
        $dokumen_kp = DokumenKp::where('aktor', 'Pembimbing Akademik')->get();
        return view('pembimbing-akademik/dokumen-kp', compact('dokumen_kp'));
    }

    public function getFile(Request $request)
    {
        if (Storage::disk('public')->exists("dokumen-kp/$request->file")) {
            $path = Storage::disk('public')->path("dokumen-kp/$request->file");
            $content = file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type' => mime_content_type($path)
            ]);
        }
        return redirect()->route('pembimbing-akademik.dokumen-kp')->with('errors', 'Gagal mengunduh file.');
    }
}