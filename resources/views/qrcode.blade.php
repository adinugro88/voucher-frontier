@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Halaman Dashboard')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Toko Detail</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Toko </a></li>
            <li class="breadcrumb-item active">detail</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                {{ QrCode::size(300)->generate('autofrontier.co.id/'.$show->kodetoko) }}
                                <p>Nama Toko </p>
                                <b>{{$show->nama_toko}}</b>
                            </div>
                            <div class="col-md-6">
                                <table class="table">
                                    <tr>
                                        <th>Nama Toko </th>
                                        <td>{{$show->nama_toko}}</td>
                                    </tr>
                                    <tr>
                                        <th>Notelpon Toko</th>
                                        <td>{{$show->notelpon}}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{$show->alamat}}</td>
                                    </tr>
                                    <tr>
                                        <th>Penangung Jawab toko </th>
                                        <td>{{$show->Pic}}</td>
                                    </tr>
                                    <tr>
                                        <th>notelpon PIC</th>
                                        <td>{{$show->notelponpic}}</td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                        
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection