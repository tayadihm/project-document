<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Data document</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
  </head>
  <body>
    <div class="container">
    <br />
    <a href="{{route('documents.create')}}" class="btn btn-primary">Tambah</a><br><br>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>No.</th>
        <th>Judul Dokumen</th>
        <th>Nomor Surat Pihak 1</th>
        <th>Nomor Surat Pihak 2</th>
        <th>Hari/Tanggal</th>
        <th>PIC Pihak 1</th>
        <th>PIC Pihak 2</th>
        <th>Jangka Waktu</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($documents as $document)
      <tr>
        <td>{{$document['id']}}</td>
        <td>{{$document['judul_dokumen']}}</td>
        <td>{{$document['no_surat_satu']}}</td>
        <td>{{$document['no_surat_dua']}}</td>
        <td>{{$document['hari_tanggal']}}</td>
        <td>{{$document['pic_satu']}}</td>
        <td>{{$document['pic_dua']}}</td>
        <td>{{$document['jangka_waktu']}}</td>

        <td><a href="{{action('dokumenController@edit', $document['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('dokumenController@destroy', $document['id'])}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button class="btn btn_danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>