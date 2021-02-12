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
        h
        {
            
        }
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
            text-align:center;
        }

        


    </style>
</head>
<body>
@foreach($beritamasuk as $b)
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
        <h3><b>BADAN PENENGGULANGAN BENCANA DAERAH</b></h3>
        <h4>Jl. Jend. Sudirman No. 47, Padang Pasir, Kec. Padang Bar., Kota Padang, Sumatera Barat 25129</h4>
        <h4>Email : <i>pusdalopssumbar@gmail.com</i></h4>
        </center>
    </div>
    <hr>
    <center>
    <h3><b><u>BERITA ACARA SERAH TERIMA BARANG</u></b></h3>
    <h4>Nomor : BA/....../Logpal/Pusdalops PB SBR/   2021</h4>
    </center>
<!-- </div> -->

<div class="container" style="padding-left:70px;padding-right:30px">

<div style="padding-left:0px">
<?php 

    setlocale(LC_ALL, 'id-ID', 'id_ID');
    // echo strftime("%A, %d %B %Y",);
    // Hasil: Selasa, 04 April 2020
    // echo strftime("%A, %d %B %Y", strtotime($b->tanggal)) . "\n";
    // Hasil: Senin, 05 Oktober 2020


    $tanggal = strtotime($b->tanggal);
    $hari = strftime("%A", strtotime($b->tanggal));
    // $hari = strftime("%D", $tanggal);
    // $hari = date('a',$tanggal);
     $tgl = date('d',$tanggal);
    // $bulan = date('m',$tanggal);
    $bulan = strftime("%B", strtotime($b->tanggal));
    // $tahun = date('y',$tanggal);
    $tahun = strftime("%Y", strtotime($b->tanggal));
?>
<h4 style="text-indent:30px;">Pada hari ini <b>{{$hari}}</b> Tanggal <b>{{$tgl}}</b> Bulan <b>{{$bulan}}</b> Tahun <b>Dua Ribu Dua Puluh Satu</b> yang bertanda tangan dibawah ini :</h4>
    <table>
        <tr>
            <td><h4>Nama            : </h4></td>
            <td><h4> {{ $b->donatur->nama }}</h4></td>
        </tr>
        <tr>
            <td><h4>Jabatan         :  </h4></td>
            <td><h4>{{$b->donatur->jabatan}}</h4></td>
        </tr>
        <tr>
            <td><h4>Instansi        :  </h4></td>
            <td><h4>{{$b->donatur->instansi}}</h4></td>
        </tr>
    </table>
        <h4 style="padding-bottom:6px">Selanjutnya disebut <b>PIHAK PERTAMA</b></h4>
        
    <table>
        <tr>
            <td><h4> Nama                : </h4></td>
            <td><h4>{{$b->penerima->nama}}</h4></td>
        </tr>
        <tr>
            <td><h4>Jabatan         :  </h4></td>
            <td><h4>{{$b->penerima->jabatan}}</h4></td>
        </tr>
        <tr>
            <td><h4>Instansi         :  </h4></td>
            <td><h4>{{$b->penerima->instansi}}</h4></td>
        </tr>
    </table>
        <h4>Selanjutnya disebut <b>PIHAK KEDUA</b></h4>
        <h4 style="text-indent:30px;">Dengan ini <b>PIHAK PERTAMA</b> menyatakan berupa bantuan kepada <b>PIHAK KEDUA</b> dan <b>PIHAK KEDUA</b> telah menerima barang bantuan dari <b>PIHAK PERTAMA</b>, dengan rincian sebagai berikut :</h4>
</div>
        <table class="tabel-barang" style="width:520px; border:1px solid black">
            <tr class="tr-barang">
                <th class="td-barang"><h4><b>No</b></h4></th>
                <td class="td-barang"><h4><b>Nama Barang</b></h4></td>
                <td class="td-barang"><h4><b>Sumber Barang</b></h4></td>
                <td class="td-barang"><h4><b>Jumlah Barang</b></h4></td>
                <td class="td-barang"><h4><b>Harga Satuan</b></h4></td>
                <td class="td-barang"><h4><b>Total Harga</b></h4></td>
            </tr>
            @foreach($b->detail_masuk as $d)
            <?php
                $jml = $d->jumlah;
                $hrg = $d->harga;
                $total = $jml*$hrg;
            ?>
            <tr>
                <td class="td-barang"><h4>{{$loop->iteration}}.</h4></td>
                <td class="td-barang"><h4>{{$d->barang->nama_barang}}</h4></td>
                <td class="td-barang"><h4>{{$b->donatur->instansi}}</h4></td>
                <td class="td-barang"><h4>{{$d->jumlah}}</h4></td>
                <td class="td-barang"><h4>{{$d->harga}}</h4></td>
                <td class="td-barang" style="text-align:right"><h4>Rp {{$total}}.00</h4></td>                
            </tr>
            @endforeach
        </table>
        
        <h4 style="text-indent:30px;">Dengan ini berita acara ini dibuat dengan sebernya untuk dapat dipergunakan sebagaimana mestinya.</h4>
        
        <br><br>
        <table>
            <tr>
                <td><h4><b>PIHAK KEDUA</b></h4></td>
                <td><h4><b>PIHAK PERTAMA</b></h4></td>
            </tr>
            <tr>
                <td><h4>Yang Menerima</h4></td>
                <td><h4>Yang Menyerahkan</h4></td>
            </tr>
            <tr>
                <td style="width:260px;height:40px;"></td>
                <td style="width:300px;height:40px;"></td>
            </tr>
            <tr>
                <td><h4><b><u>{{$b->penerima->nama}}</u></b></h4></td>
                <td><h4><b><u>{{$b->donatur->nama}}</u></b></h4></td>
            </tr>
        </table>

        <center>
        <h4><b>Diketahui Oleh</b></h4>
        <h4>Koordinator Logistik</h4>
        <h4>BPBD Provinsi Sumatera Barat</h4>
        <br><br><br>
        <h4><b><u>Drs. ANTORIZON, M,Hum</u></b></h4>
        <h4>NIP. 19640903 198503 1 005</h4>
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