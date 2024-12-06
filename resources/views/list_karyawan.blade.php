@extends('layouts.layout')

@section('content')
    <h2 class="text-center mb-4">Daftar Karyawan Stark Industries</h2>
    <div class="box-table">
      <table class="table" id="tabel-pegawai">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Gender</th>
                <th>Alamat</th>
                <th>Telp</th>
                <th>Email</th>
                <th>Divisi</th>
                <th>Status</th>
                <th>Mulai Kerja</th>
                <th>Akhir Kerja</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($data as $pegawai)
            <tr>
                <td><img src="{{ asset('storage/' . $pegawai->foto) }}" alt="Foto Karyawan" width="50"></td>
                <td>{{$pegawai->nama}}</td>
                <td>{{$pegawai->gender}}</td>
                <td>{{$pegawai->alamat}}</td>
                <td>{{$pegawai->telp}}</td>
                <td>{{$pegawai->email}}</td>
                <td>{{$pegawai->divisi}}</td>
                <td>{{$pegawai->status_aktif == 1 ? 'Aktif' : 'Non-Aktif'}}</td>
                <td>{{$pegawai->tgl_mulai}}</td>
                <td>{{$pegawai->tgl_akhir == null ? '-' : $pegawai->tgl_akhir}}</td>
                
            </tr>
          @endforeach
        </tbody>
    </table>
    </div>
    <script>
      $(document).ready(function() {
        $('#tabel-pegawai').DataTable({
            "paging": true, 
            "lengthChange": true, 
            "searching": true, 
            "ordering": true, 
            "info": true, 
            "autoWidth": false, 
            "responsive": true, 
            "language": {
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Data tidak ditemukan",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search": "Cari:",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                }}
        });
      });
    </script>
    
@endsection
