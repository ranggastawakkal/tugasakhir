<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuratPengantar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AdminSuratPengantarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat_pengantar = SuratPengantar::all();

        return view('admin/surat-pengantar', compact('surat_pengantar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SuratPengantar  $suratPengantar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $surat_pengantar = SuratPengantar::whereId($id)->first();
        if (File::exists('storage/' . $surat_pengantar->file)) {
            File::delete('storage/' . $surat_pengantar->file);
        }
        if ($request->file != null) {
            $fileName = $request->file->getClientOriginalName();
            $request->file('file')->storeAs('public', $fileName);
        } else {
            $fileName = "-";
        }
        $surat_pengantar->update([
            'status' => $request->status,
            'file' => $fileName,
        ]);

        return redirect()->route('admin.surat-pengantar')->with('success', 'Surat pengantar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuratPengantar  $suratPengantar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('surat_pengantar')->where('id', $id)->delete();

        return redirect()->route('admin.surat-pengantar')->with('success', 'Data berhasil dihapus.');
    }
}
