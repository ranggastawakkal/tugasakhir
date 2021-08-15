<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\SuratPengantar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DaftarPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $suratPengantar = SuratPengantar::where('id_mahasiswa', $id);

        return view('mahasiswa.surat-pengantar.daftar-pengajuan.index', compact('suratPengantar'));
    }

    public function getFile(Request $request)
    {
        if (Storage::disk('public')->exists("surat-pengantar/$request->file")) {
            $path = Storage::disk('public')->path("surat-pengantar/$request->file");
            $content = file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type' => mime_content_type($path)
            ]);
        }
        return redirect()->route('mahasiswa.daftar-pengajuan.index')->with('errors', 'Gagal mengunduh file.');
    }
}
