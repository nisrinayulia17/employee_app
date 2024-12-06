@extends('layouts.layout')

@section('content')
<div class="container card shadow-sm">
    <h4 class="title-form">Tambah Data Karyawan</h4>
    <form action="{{ url('/add_form') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="nama">Gender</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender1" value="Pria">
            <label class="form-check-label" for="gender1">
              Pria
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender2" value="Wanita" >
            <label class="form-check-label" for="gender2">
              Wanita
            </label>
          </div>
        </div>
        <div class="form-group">
          <label for="nama">No Telp</label>
          <input type="text" name="telp" id="telp" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="nama">Email</label>
          <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="nama">Alamat</label>
          <input type="text" name="alamat" id="alamat" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="divisi">Divisi</label>
          <select name="divisi" id="divisi" class="form-select" required>
              <option value="HRD">HRD</option>
              <option value="Keuangan">Keuangan</option>
              <option value="Pemasaran">Pemasaran</option>
              <option value="Penjualan">Penjualan</option>
              <option value="Produksi">Produksi</option>
              <option value="IT">IT</option>
              <option value="Operasional">Operasional</option>
              <option value="Legal">Legal</option>
          </select>
        </div>
        <div class="form-group">
          <label for="tgl_mulai">Mulai Kerja</label>
          <input type="text" name="tgl_mulai" id="tgl_mulai" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="nama">Status</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="aktif-kerja" value="1">
            <label class="form-check-label" for="flexRadioDefault1">
              Aktif
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="nonaktif-kerja" value="0">
            <label class="form-check-label" for="flexRadioDefault1">
              Non-Aktif
            </label>
          </div>
        </div>
        <div class="form-group">
          <label for="tgl_mulai">Selesai Kerja</label>
          <input type="text" name="tgl_akhir" id="tgl_akhir" class="form-control">
        </div>
        <div class="form-group">
          <label for="fileUpload">Pilih Foto</label>
          <input type="file" id="fileUpload" name="foto" accept="image/*" class="file">
        </div>
        <button type="submit" class="btn btn-danger mt-3 w-100">Simpan</button>
    </form>
</div>

<script>
  $(document).ready(function() {
    // datepicker
    $('#tgl_akhir, #tgl_mulai').datepicker({
      dateFormat: 'dd-mm-yy' 
    });

    // Select2
    $('#divisi').select2();

    // CSS Select2
    $('#divisi').next('.select2-container').find('.select2-selection--single').css({
      'height': '40px',
      'flex': '1',
      'width': '100%',
      'padding': '3px 0'
    });

    
    const activeKerja = document.getElementById('aktif-kerja');
    const nonActiveKerja = document.getElementById('nonaktif-kerja');
    const endDate = document.getElementById('tgl_akhir');

    activeKerja.addEventListener('change', () => {
      endDate.disabled = activeKerja.checked;  
    });

    nonActiveKerja.addEventListener('change', () => {
      endDate.disabled = !nonActiveKerja.checked; 
    });

    // ubah format tanggal
    function convertDateFormat(dateStr) {
      var parts = dateStr.split('-');
      return parts[2] + '-' + parts[1] + '-' + parts[0];  
    }


    $('form').submit(function(e) {
      var tglMulai = $('#tgl_mulai').val();
      var tglAkhir = $('#tgl_akhir').val();

      
      $('#tgl_mulai').val(convertDateFormat(tglMulai));
      $('#tgl_akhir').val(convertDateFormat(tglAkhir));
    });
  });

  // fileinput
  $("#fileUpload").fileinput({
      showPreview: true,  
      showUpload: false,  
      showRemove: false,
      showClose: false,  
      browseClass: 'btn btn-danger',  
      browseLabel: 'Pilih File',   
      allowedFileExtensions: ['jpg', 'jpeg', 'png'], 
      maxFileSize: 2048  
    });
</script>

@endsection
