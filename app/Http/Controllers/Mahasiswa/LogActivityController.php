<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\LogAktivitas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LogActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $logs = LogAktivitas::where(['id_mahasiswa' => $user->id])->get();
        return view('mahasiswa.log-activity.index', compact('logs'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'tanggal' => ['required'],
                'jamdatang' => ['required'],
                'jampulang' => ['required'],
                'aktivitas' => ['required'],
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('mahasiswa.log-activity.index')->withInput()->withErrors($validator);
        }

        $user = Auth::user();

        $log = new LogAktivitas();
        $log->id_mahasiswa = $user->id;
        $log->id_pemb_akd = $user->kerjaPraktek->pembimbingAkademik->id;
        $log->id_pemb_lap = $user->kerjaPraktek->pembimbingLapangan->id;
        $log->tanggal = $request->tanggal;
        $log->jam_datang = $request->jamdatang;
        $log->jam_pulang = $request->jampulang;
        $log->aktivitas = $request->aktivitas;
        $log->save();

        return redirect()->route('mahasiswa.log-activity.index');
    }

    public function update(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'tanggal' => ['required', 'date', 'before:tomorrow'],
                'jamdatang' => ['required'],
                'jampulang' => ['required'],
                'aktivitas' => ['required'],
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('mahasiswa.log-activity.index')->withInput()->withErrors($validator);
        }

        $log = LogAktivitas::find($request->id);
        $log->tanggal = $request->tanggal;
        $log->jam_datang = $request->jamdatang;
        $log->jam_pulang = $request->jampulang;
        $log->aktivitas = $request->aktivitas;
        $log->save();

        return redirect()->route('mahasiswa.log-activity.index');
    }

    public function delete(Request $request)
    {
        $log = LogAktivitas::find($request->id);
        $log->delete();

        return redirect()->route('mahasiswa.log-activity.index');
    }
}
