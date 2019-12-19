<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Form Upload Document</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
  </head>
  <body>
    <div class="container">
      <h2 style="text-align:left">Tambah Dokumen</h2><br/>
      <form method="post" action="{{url('documents')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-1"></div>
          <div class="form-group col-md-4">
            <label for="Judul">Judul Dokumen:</label>
            <input type="text" class="form-control" name="judul_dokumen">
          </div>
        </div>
        <div class="row">
          <div class="col-md-1"></div>
          <div class="form-group col-md-4">
            <label for="No_Surat1">Nomor Surat Pihak 1:</label>
            <input type="text" class="form-control" name="no_surat_satu">
          </div>
        </div>
        <div class="row">
          <div class="col-md-1"></div>
          <div class="form-group col-md-4">
            <label for="No_Surat2">Nomor Surat Pihak 2:</label>
            <input type="text" class="form-control" name="no_surat_dua">
          </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="form-group col-md-4">
              <label for="Tanggal">Hari/Tanggal:</label>
              <input type="date" class="form-control" name="hari_tanggal">
            </div>
        </div>
        <div class="row">
          <div class="col-md-1"></div>
          <div class="form-group col-md-4">
            <label for="pic1">PIC Pihak 1:</label>
            <input type="text" class="form-control" name="pic_satu">
          </div>
        </div>
        <div class="row">
          <div class="col-md-1"></div>
          <div class="form-group col-md-4">
            <label for="pic2">PIC Pihak 2:</label>
            <input type="text" class="form-control" name="pic_dua">
          </div>
        </div>
        <div class="row">
          <div class="col-md-1"></div>
          <div class="form-group col-md-4">
            <label for="waktu">Jangka Waktu:</label>
            <input type="text" class="form-control" name="jangka_waktu">
          </div>
        </div>

        <div class="row">
          <div class="col-md-1"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>