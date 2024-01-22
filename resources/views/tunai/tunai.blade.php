<!-- Menghubungkan dengan view template master -->
@extends('template.master')
<!-- isi bagian judul halaman -->
@section('judul_halaman', 'HALAMAN BANTUAN LANGSUNG TUNAI')

<!-- isi bagian konten -->
@section('konten')
  <a href="{{ route('tunai.create') }}" type="button" class="btn btn-success">Tambah Data</a>
  <a href="{{ route('cetak_tunai') }}" target="_blank" type="button" class="btn btn-info">Cetak Laporan</a>
  <hr>

  @if (Session::has('pesan'))
    <div class="alert alert-success" role="alert">
      {{ Session::get('pesan') }}
    </div>
  @endif

  <div class="table-responsive margin">
    <table id="table-tunai" class="table table-bordered">
      <thead class="table-success">
        <tr>
          <th style="width: 10px">#</th>
          <th style="width: 100px">NIK</th>
          <th style="width: 100px">NAMA KEPALA KELUARGA</th>
          <th style="width: 100px">JENIS KELAMIN</th>
          <th style="width: 100px">PEKERJAAN</th>
          <th style="width: 100px">TANGGAL BANTUAN</th>
          <th style="width: 100px">JUMLAH DANA</th>
          <th style="width: 100px">KETERANGAN</th>
          <th style="width: 50px"></th>
        </tr>
      </thead>
      <tbody>
        @if ($view_tunai->count() > 0)
          @foreach ($view_tunai as $data)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $data->nik_kk }}</td>
              <td>{{ $data->nama_kk }}</td>
              <td>{{ $data->jeniskelamin_kk }}</td>
              <td>{{ $data->pekerjaan_kk }}</td>
              <td>{{ $data->tgl_bantuan }}</td>
              <td>{{ $data->jumlah_dana }}</td>
              <td>{{ $data->keterangan }}</td>
              <td>
                <div class="btn-group" role="group" aria-label="basic-example">
                  <a href="{{ route('tunai.show', $data->id) }}" class="btn btn-small btn-secondry">Detail</a>
                  <a href="{{ route('tunai.edit', $data->id) }}" class="btn btn-small btn-warning">Edit</a>
                  <form action="{{ route('tunai.destroy', $data->id) }}" method="POST"
                    onsubmit="return confirm('Apakah yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-small btn-danger">Hapus</button>
                  </form>
                </div>
              </td>
            </tr>
          @endforeach
        @else
          <tr>
            <td class="text-center" colspan="10">DATA NOT FOUND</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>

@endsection
