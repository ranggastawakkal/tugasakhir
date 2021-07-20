@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">Form Penilaian</h1>
<!-- Content Row -->

<div class="row">

    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Bobot Penilaian Kerja Praktek</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <table class="table table-striped table-hover text-center table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2" class=" align-middle">Course Learning Outcomes / CLO</th>
                            <th rowspan="2" class=" align-middle">Deskripsi</th>
                            <th colspan="2">Bobot Penilaian</th>
                        </tr>
                        <tr>
                            <th>Pembimbing Lapangan</th>
                            <th>Pembimbing Akademik</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>CLO 1</td>
                            <td>Mahasiswa mampu menunjukkan etos kerja yang
                                baik dan bersikap profesional dalam melaksanakan tugas-tugas atau pekerjaan selama KP</td>
                            <td>15%</td>
                            <td>10%</td>
                        </tr>
                        <tr>
                            <td>CLO 2</td>
                            <td>Mahasiswa mampu merencanakan penyelesaian
                                tugas atau pekerjaan, bekerja efektif, mandiri dan bekerja
                                sama di dalam tim organisasi/ perusahaan selama KP</td>
                            <td>5%</td>
                            <td>5%</td>
                        </tr>
                        <tr>
                            <td>CLO 3</td>
                            <td>Mahasiswa mampu mengkomunikasikan hasil
                                pelaksanaan tugas-tugas atau pekerjaan selama KP secara
                                lisan dan tulisan dalam bentuk laporan KP yang terstruktur</td>
                            <td>15%</td>
                            <td>35%</td>
                        </tr>
                        <tr>
                            <td>CLO 4</td>
                            <td>Mahasiswa mampu mengidentifikasikan dan
                                memformulasikan masalah dengan baik yang didukung oleh
                                data-data sebagai sebuah pengetahuan baru untuk mahasiswa
                                yang diperoleh selama KP</td>
                            <td>5%</td>
                            <td>10%</td>
                        </tr>
                        <tr class="font-weight-bold">
                            <td colspan="2">Total</td>
                            <td>40%</td>
                            <td>60%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection