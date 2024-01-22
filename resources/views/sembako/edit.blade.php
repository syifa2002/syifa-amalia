@extends('template.master')

<!-- isi bagian judul halaman -->
@section('judul_halaman', 'UBAH DATA BANTUAN SEMBAKO')

<!-- isi bagian konten -->
@section('konten')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-success">
          <h3 class="card-title"> </h3>
        </div>
        <div class="card-body">

          @foreach ($viewsembakos as $viewsembako)
            <form action="{{ route('sembako.update', ['sembako' => $viewsembako->id]) }}" method="POST">
              @csrf
              @method('PUT')

              <div class="form-group row">
                <label class="form-label col-sm-2">PENERIMA</label>
                <div class="col-sm-4">
                  <input type="hidden" name="id" value="{{ $viewsembako->id }}">
                  <select name="nik" id="nik" class="form-control">
                    <option value="{{ $viewsembako->nik_kk }}">{{ $viewsembako->nik_kk }} |
                      {{ $viewsembako->nama_kk }}</option>
                    @foreach ($penduduks as $penduduk)
                      <option value="{{ $penduduk->nik_kk }}">{{ $penduduk->nik_kk }} |
                        {{ $penduduk->nama_kk }}</option>
                    @endforeach
                  </select>
                </div>

                <label class="form-label col-sm-2">JENIS BANTUAN</label>
                <div class="col-sm-4">
                  <div class="input-group">
                    <input type="text" name="jenis" placeholder="JENIS BANTUAN" class="form-control"
                      value="{{ $viewsembako->jenis_bantuan }}" required>
                  </div>
                </div>

                <label class="form-label col-sm-2">TANGGAL TERIMA</label>
                <div class="col-sm-4">
                  <div class="input-group">
                    <input type="date" name="tanggal" class="form-control" value="{{ $viewsembako->tgl_bantuan }}"
                      required>
                  </div>
                </div>

                <label class="form-label col-sm-2">KETERANGAN</label>
                <div class="col-sm-4">
                  <div class="input-group">
                    <input type="text" name="keterangan" class="form-control" value="{{ $viewsembako->keterangan }}"
                      required>
                  </div>
                </div>

                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-info">SIMPAN</button>
                  <a href="{{ route('sembako.index') }}" class="btn btn-danger">BATAL</a>
                </div>


              </div>
            </form>
          @endforeach
        </div>
      </div>
    </div>
  </div>

@endsection
