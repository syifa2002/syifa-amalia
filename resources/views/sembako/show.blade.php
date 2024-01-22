@extends('template.master')

<!-- isi bagian judul halaman -->
@section('judul_halaman', 'DETAIL DATA BANTUAN SEMBAKO')

<!-- isi bagian konten -->
@section('konten')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-success">
          <h3 class="card-title"> </h3>
        </div>
        <div class="card-body">
          <form action="{{ route('sembako.store') }}" method="POST">
            @csrf
            <div class="form-group row">
              <label class="form-label col-sm-2">NIK PENERIMA</label>
              <div class="col-sm-4">
                <div class="input-group">
                  <input type="text" name="nik" class="form-control" value="{{ $data->nik_kk }}" readonly>
                </div>
              </div>

              <label class="form-label col-sm-2">JENIS BANTUAN</label>
              <div class="col-sm-4">
                <div class="input-group">
                  <input type="text" name="jenis" class="form-control" value="{{ $data->jenis_bantuan }}" readonly>
                </div>
              </div>

              <label class="form-label col-sm-2">TANGGAL TERIMA</label>
              <div class="col-sm-4">
                <div class="input-group">
                  <input type="text" name="tanggal" class="form-control" value="{{ $data->tgl_bantuan }}" readonly>
                </div>
              </div>

              <label class="form-label col-sm-2">KETERANGAN</label>
              <div class="col-sm-4">
                <div class="input-group">
                  <input type="text" name="keterangan" class="form-control" value="{{ $data->keterangan }}" readonly>
                </div>
              </div>

              <div class="card-footer text-center">
                <a href="{{ route('sembako.index') }}" class="btn btn-secondary">KEMBALI</a>
              </div>


            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
