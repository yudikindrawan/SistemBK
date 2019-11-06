<!DOCTYPE html>
<html>
<head>
  <title>Cetak Surat </title>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<table class="table table-bordered" style="border-bottom-color: black; border-bottom-style: solid;border-bottom-width: 3px;border-top-width: 0px;border-left-width: 0px;border-right-width: 0px;">
  <tr>
    <td width="14" align="left" style="border: none;"><img src="{{ asset ('assets/images/pgri.png')}}" width="380%"></td>
    <td style="border: none;">
      <center>
          <br><b style="font-size:10px;">YAYASAN PEMBINA LEMBAGA PENDIDIKAN DASAR DAN MENENGAH PERTAMA</b>
          <br><b style="font-size:10px;">REPUBLIK INDONESIA YPLP KOTA PGRI DENPASAR</b>
          <br><b style="font-size:16px;">SMP PGRI 3 DENPASAR</b>
      </center>
    </td>
      <td width="15" align="right" style="border: none;"><img src="{{ asset ('assets/images/pgri.png')}}" width="380%"></td>
  </tr>
</table>
<div class="container" style="width:80%;">
  <table class="table table-bordered" style="border:none;">
    <tr>
      <td style="border:none;"><p>Lampiran : 1 </p>
      Prihal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Surat Pengembalian
      <td style="border:none;">
        <center>
          Kepada
          <br>Yth : Bapak / Ibu
        </center>
      </td>
    </tr>
  </table>
  <table class="table table-bordered" style="border:none;">
    <tr>
      <td style="border:none;"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dengan Hormat,</p>
        <p class="text-justify">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dengan ini kami melampirkan bahwa siswa yang bersangkutan diberikan sanksi
          <b>Pemanggilan Orang Tua</b> karena telah melakukan pelanggaran berupa, diharapkan Bapak/Ibu berkenan hadir pada tanggal {{$data[0]->tanggal_pemanggilan}}
        </p>
      </td>
    </tr>
  </table>
  <table class="table table-bordered">
    <tr>
      <th>Periode</th>
      <th>Pelanggaran</th>
      <th>Siswa</th>
      <th>Total Poin</th>
    </tr>
    @foreach ($data as $value)
    <tr>
        <td>{{$value->tahun_akademik}}</td>
        <td>{{$value->nama_pelanggaran}}</td>
        <td>{{$value->nama_siswa}}</td>
        <td>{{$value->total_poin}}</td>
    </tr>
    @endforeach
  </table>
  <table class="table table-bordered" style="border:none;">
    <tr>
      <td style="border:none;">
        <p class="text-justify">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dimohon kehadiran Bapak / Ibu / Orang tua Wali siswa untuk membahas permasalahan ini. Demikian surat ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
        </p>
      </td>
    </tr>
  </table>
</div>
</body>
</html>
