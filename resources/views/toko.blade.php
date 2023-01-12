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



<livewire:toko.index />

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