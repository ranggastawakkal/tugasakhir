@extends('layouts/main')
@section('title','Dashboard')

@section('main-content')
    <!-- h1 class="h3 mb-4 text-gray-800">Form Penilaian</h1> -->
     <!-- Content Row -->

<div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Form Penilaian</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
            <table class="table table-striped table-hover">
            <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Course Learning Outcomes / CLO</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>CLO 1 - Mahasiswa mampu menunjukkan etos kerja yang baik dan bersikap profesional dalam melaksanakan tugastugas atau pekerjaan selama KP </td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection