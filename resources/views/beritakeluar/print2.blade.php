<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
        /* .kop-surat
        {
            display: grid;
            grid-template-columns: 10% auto ;
        } */
        
        h3
        {
            line-height:0.5;
            font-family: "12px Times New Roman", Times, serif;
            font-size: 14px;
        }
        h4
        {
            line-height:1.2;
            font-family: "12px Times New Roman", Times, serif;
            font-size: 12px;
        }
        h5
        {
            line-height:1;
            font-family: "12px Times New Roman", Times, serif;
            font-size: 12px;

        }
        .sumbar
        {
            width:60px;
            float:left;
            position:absolute;
            margin-left:60px;
            margin-top:20px;
        }
        .table-barang, .th-barang, .td-barang {
            border: 1px solid black;
            text-align:center;
        }

        table, th, td {
            /* border: 1px solid black; */
            /* text-align:center; */
        }

        .table-ttd,.tr-ttd,.td-ttd {
            text-align:center;
        }

    </style>
</head>
<body>
@foreach($beritakeluar as $c)
<!-- <div class="container" style="border:1px solid"> -->
<!-- <div class="kop-surat"> -->
    <!-- Logo -->
    <div>
        <img src="{{ asset('argon') }}/img/brand/sumbar.png" class="sumbar" alt="...">
    </div>
    <!-- Kop -->
    <div><br>
        <center>
        <h3><b>PEMERINTAH PROVINSI SUMATERA BARAT</b></h3>
        <h3><b>BADAN PENANGGULANGAN BENCANA DAERAH</b></h3>
        <h4>Jl. Jend. Sudirman No. 47, Padang Pasir, Kec. Padang Barat, Kota Padang, Sumatera Barat 25129</h4>
        <h4>Email : <i>pusdalopssumbar@gmail.com</i></h4>
        </center>
    </div>
    <hr>
    <center>
    <h3><b><u>BERITA ACARA SERAH TERIMA BARANG</u></b></h3>
    <h4>Nomor : 360/....../BAST/KL-BPBD/LOG-PAL/2021</h4>
    </center>
<!-- </div> -->

<div class="container" style="padding-left:70px;padding-right:30px">

<div style="padding-left:0px">
<?php 

    setlocale(LC_ALL, 'id-ID', 'id_ID');
    // echo strftime("%A, %d %B %Y",);
    // Hasil: Selasa, 04 April 2020
    // echo strftime("%A, %d %B %Y", strtotime($c->tanggal)) . "\n";
    // Hasil: Senin, 05 Oktober 2020


    $tanggal = strtotime($c->tanggal);
    $hari = strftime("%A", strtotime($c->tanggal));
    // $hari = strftime("%D", $tanggal);
    // $hari = date('a',$tanggal);
     $tgl = date('d',$tanggal);
    // $bulan = date('m',$tanggal);
    $bulan = strftime("%B", strtotime($c->tanggal));
    // $tahun = date('y',$tanggal);
    $tahun = strftime("%Y", strtotime($c->tanggal));
?>
<h4 style="text-indent:30px;">Pada hari ini <b>{{$hari}}</b> Tanggal <b>{{$tgl}}</b> Bulan <b>{{$bulan}}</b> Tahun <b>Dua Ribu Dua Puluh Satu</b> yang bertanda tangan dibawah ini :</h4>
    <table>
        <tr>
            <td  style="width:15px;"><h4>Nama             </h4></td>
            <td  style="width:5px;"><h4>:             </h4></td>      
            <td  style="width:5px;"><h4> {{ $c->pihak_pertama->nama }}</h4></td>
        </tr>
        <tr>
            <td  style="width:15px;"><h4 >Pangkat/Gol Ruang </h4></td>
            <td  style="width:5px;"><h4>:             </h4></td>
            <td  style="width:5px;"><h4>{{$c->pihak_pertama->pangkat}}</h4></td>
        </tr>
        <tr>
            <td  style="width:15px;"><h4>Jabatan           </h4></td>
            <td  style="width:5px;"><h4>:             </h4></td>
            <td  style="width:5px;"><h4>{{$c->pihak_pertama->jabatan}}</h4></td>
        </tr>
        <tr>
            <td  style="width:15px;"><h4>Alamat           </h4></td>
            <td  style="width:5px;"><h4>:             </h4></td>
            <td  style="width:5px;"><h4>{{$c->pihak_pertama->instansi}}</h4></td>
        </tr>
    </table>
        <h4 style="padding-bottom:6px">Selanjutnya disebut <b>PIHAK PERTAMA</b></h4>
        
    <table>
        <tr>
        <td  style="width:103px;"><h4>Nama             </h4></td>
            <td  style="width:5px;"><h4>:             </h4></td>
            <td  style="width:5px;"><h4>{{$c->pihak_kedua->nama}}</h4></td>
        </tr>
        <tr>
            <td  style="width:103px;"><h4>Jabatan           </h4></td>
            <td  style="width:5px;"><h4>:             </h4></td>
            <td  style="width:5px;"><h4>{{$c->pihak_kedua->jabatan}}</h4></td>
        </tr>
        <tr>
            <td  style="width:103px;"><h4>Alamat             </h4></td>
            <td  style="width:5px;"><h4>:             </h4></td>
            <td  style="width:5px;"><h4>{{$c->pihak_kedua->instansi}}</h4></td>
        </tr>
    </table>
        <h4>Selanjutnya disebut <b>PIHAK KEDUA</b></h4>
        <h4 style="text-indent:30px;">Dengan ini <b><i>PIHAK PERTAMA<i></b> menyerahkan kepada <b><i>PIHAK KEDUA</i></b> dan <b><i>PIHAK KEDUA</i></b> menerima penyerahan dari <b><i>PIHAK PERTAMA</i></b>, dengan rincian sebagai berikut :</h4>
</div>
        <table class="tabel-barang" style="width:520px; border:1px solid black">
            <tr class="tr-barang">
                <th class="td-barang"><h4><b>No</b></h4></th>
                <td class="td-barang"><h4><b>Jenis Barang Bantuan</b></h4></td>
                <td colspan='2' class="td-barang"><h4><b>Jumlah</b></h4></td>
                <td class="td-barang"><h4><b>Kondisi</b></h4></td>
                <td class="td-barang"><h4><b>Ket</b></h4></td>
            </tr>
            @foreach($barang as $d)
          
            <tr>
                <td class="td-barang"><h4>{{$loop->iteration}}.</h4></td>
                <td class="td-barang"><h4>{{$d->nama_barang}}</h4></td>
                <td class="td-barang"><h4>{{$d->jumlah}}</h4></td>
                <td class="td-barang"><h4>{{$d->satuan}}</h4></td>
                <td class="td-barang"><h4>{{$d->keterangan}}</h4></td>  
                <td class="td-barang"><h4>{{$d->deskripsi}}</h4></td>               
            </tr>
            @endforeach
        </table>
        
        <h4 style="text-indent:30px;">Demikian Berita Acara ini dibuat dengan sebenarnya dalam rangkap dua dapat dipergunakan sebagaimana mestinya.</h4>
        
        <br><br>
        <table class="table-ttd">
            <tr class="tr-ttd">
                <td class="td-ttd"><h4><b>PIHAK KEDUA</b></h4></td>
                <td class="td-ttd"><h4><b>PIHAK PERTAMA</b></h4></td>
            </tr>
            <tr class="tr-ttd">
                <td class="td-ttd"><h4>Yang Menerima</h4></td>
                <td class="td-ttd"><h4>Yang Menyerahkan</h4></td>
            </tr>
            <tr class="tr-ttd">
                <td class="td-ttd" style="width:260px;height:40px;"></td>
                <td class="td-ttd" style="width:300px;height:40px;"></td>
            </tr>
            <tr class="tr-ttd">
                <td class="td-ttd"><h4><b><u>{{$c->pihak_kedua->nama}}</u></b></h4></td>
                <td class="td-ttd"><h4><b><u>{{$c->pihak_pertama->nama}}</u></b></h4></td>
            </tr>
        </table>

        <center>
        <h4><b>Diketahui Oleh</b></h4>
        <h4>Kabid Kedaruratan dan Logistik</h4>
        <h4>BPBD Provinsi Sumatera Barat</h4>
        <br><br><br>
        <h4><b><u>Rumainur, SE</u></b></h4>
        <h4>NIP. 19670723 199803 1 002</h4>
        <!-- <table>
            <tr><h4><b>Diketahui Oleh</b></h4></tr>
            <tr><h4>Koordinator Logistik</h4></tr>
            <tr><h4>BPBD Provinsi Sumatera Barat</h4></tr>
            <tr class="ttd"><br><br></tr>
            <tr><h4><b><u>Drs. ANTORIZON, M,Hum</u></b></h4></tr>
            <tr><h4>NIP. 19640903 198503 1 005</h4></tr>
        </table> -->
        </center>
<!-- end container -->
@endforeach
<!-- </div> -->


</body>
</html>