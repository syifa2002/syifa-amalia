@extends('template.master')

<!-- isi bagian judul halaman -->
@section('judul_halaman', 'UBAH DATA BANTUAN TUNAI LANGSUNG')

<!-- isi bagian konten -->
@section('konten')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-success">
          <h3 class="card-title"> </h3>
        </div>
        <div class="card-body">

          @foreach ($view_rumah as $rumah)
            <form action="{{ route('rumah.update', $rumah->id) }}" method="POST">
              @csrf
              @method('PUT')

              <div class="form-group row">
                <label class="form-label col-sm-2">PENERIMA</label>
                <div class="col-sm-4">
                  <select name="nik" id="nik" class="form-control">
                    <option value="{{ $rumah->nik_kk }}">{{ $rumah->nik_kk }} |
                      {{ $rumah->nama_kk }}</option>
                    @foreach ($penduduks as $penduduk)
                      <option value="{{ $penduduk->nik_kk }}">{{ $penduduk->nik_kk }} |
                        {{ $penduduk->nama_kk }}</option>
                    @endforeach
                  </select>
                </div>

                <label class="form-label col-sm-2">JUMLAH BANTUAN</label>
                <div class="col-sm-4">
                  <div class="input-group">
                    <input type="text" name="dana" placeholder="JUMLAH BANTUAN" class="form-control"
                      value="{{ $rumah->jumlah_dana }}" required>
                  </div>
                </div>

                <label class="form-label col-sm-2">TANGGAL TERIMA</label>
                <div class="col-sm-4">
                  <div class="input-group">
                    <input type="date" name="tanggal" class="form-control" value="{{ $rumah->tgl_bantuan }}" required>
                  </div>
                </div>

                <label class="form-label col-sm-2">KETERANGAN</label>
                <div class="col-sm-4">
                  <div class="input-group">
                    <input type="text" name="keterangan" class="form-control" value="{{ $rumah->keterangan }}"
                      required>
                  </div>
                </div>

                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-info">SIMPAN</button>
                  <a href="{{ route('rumah.index') }}" class="btn btn-danger">BATAL</a>
                </div>


              </div>
            </form>
          @endforeach
        </div>
      </div>
    </div>
  </div>

@endsection
