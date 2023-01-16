@extends('layouts.base_admin.base_dashboard')
@section('judul', 'List Toko')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Toko</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Toko</a></li>
            <li class="breadcrumb-item active">List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
      <form action="" method="get">
          <div class="row">
              <div class="col-md-2">
                  <div class="form-group">
                    <label>Toko  : </label>
                    <br>
                    @foreach ( $namatoko as $data )
                     {{$data->nama_toko}}</label>
                    @endforeach
                  
                  </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                    <label> Tanggal Start  :
                      <br>
                       {{ \Carbon\Carbon::parse($tglawal)->format('d F Y')}}</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label> Tanggal Akhir  : 
                      <br>
                      {{ \Carbon\Carbon::parse($tglakhir)->format('d F Y')}}</label>
                </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <a href="/dashboard/admin/report" class="btn btn-primary col start">
                  <i class="fas fa-back"></i>
                  <span>Kembali</span>
              </a>
              </div>
          </div>
          </div>


      </form>

      <!-- Main row -->
      <div class="row">
          <!-- Left col -->
          <div class="col-md-12">
              @if (session()->has('message'))
              <p id="hideMe" class="alert alert-success">{{ session('message') }}</p>
              @endif
              <!-- TABLE: LATEST ORDERS -->
              <div class="card">
                  <div class="card-header border-transparent">
                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                          </button>
                          {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button> --}}
                      </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>Tanggal Terinput</th>
                                    <th>Tanggal Validasi</th>
                                    <th>No_invoice</th>
                                    <th>Voucher </th>
                                    <th>Toko</th>
                                    <th>Cabang</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                  @forelse ($listcust as $custs)
                                  <tr>
                                    <td>{{$custs->created_at->format('d-M-Y')}}</td>
                                    <td>{{$custs->updated_at->format('d-M-Y')}}</td>
                                    <td>{{ $custs->noinvoice }}</td>
                                    <td>{{ $custs->feevoucher}}</td>
                                    <td>{{ $custs->toko->nama_toko  }}</td>
                                </tr>
                                  @php
                                  $total += $custs->feevoucher
                                  @endphp
                                  @empty
                                  <tr>
                                      <td colspan="5">No Record Found</td>
                                  </tr>

                                  
                                  @endforelse
                              </tbody>
                        </table>
                        {{-- {{$listcust->links()}} --}}
                    </div>
                    <!-- /.table-responsive -->
                </div>
                  <!-- /.card-body -->
                 
              </div>
              <!-- /.card -->
              <h4>    
                Total Fee Toko sebesar Rp {{ number_format( $total, 0, ',', '.')}}
            </h4>
          </div>
          <!-- /.col -->

          <!-- /.col -->
      </div>
      <!-- /.row -->
  </div>
  <!--/. container-fluid -->
</section>


@endsection

@section('script_footer')
<script>
  window.addEventListener('close-modal', event => {
      $('#modal-lg').modal('hide');
      $('#modaledit').modal('hide');
      $('#modalhapus').modal('hide');
  })
</script>
@endsection