 <!DOCTYPE html>
<html>
<head>
  <title>Cetak Laporan Produk</title>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<table class="table table-bordered" style="border-bottom-color: black; border-bottom-style: solid;border-bottom-width: 3px;border-top-width: 0px;border-left-width: 0px;border-right-width: 0px;">
  <tr>
    <td width="14" align="left" style="border: none;"><img src="./assets/images/pgri.png" width="500%"></td>
    <td style="border: none;">
    <center>
        <b style="font-size:18px;">SMK PGRI 3 DENPASAR</b>
        <br><b style="font-size:12px;">Jl. Drupadi XVII Gg. Dewi Uma No.7, Sumerta Kelod, Kec. Denpasar Tim., Kota Denpasar, Bali 80235</b>
        <br><b style="font-size:12px;">Tlp : (0361) 264322</b>
      </center>
      </td>
      <td width="15" align="right" style="border: none;"><img src="./assets/images/pgri.png" width="500%"></td>
  </tr>
</table>
<table class="table table-bordered" style="border:none;">
  <tr>
    <td style="border: none;">
      <center>
        <b style="font-size:16px;">LAPORAN PELANGGARAN SISWA</b>
        <br><b style="font-size:16px;">Periode : {{$awal}}/{{$akhir}}</b>
      </center>
    </td>
  </tr>
</table>
<div class="box-body table-responsive">
  <table id="example" class="table table-bordered">
    <thead>
      <tr>
        <th>Periode</th>
        <th>Pelanggaran</th>
        <th>Siswa</th>
        <th>Total Poin</th>
      </tr>
    </thead>
    <tbody>
      @foreach($kons as $konseling)
        <tr>
          <td>{{$konseling->tahun_akademik}}</td>
          <td>{{$konseling->nama_pelanggaran}}</td>
          <td>{{$konseling->nama_siswa}}</td>
          <td>{{$konseling->total_poin}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
</body>
</html>
