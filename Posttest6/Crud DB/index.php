<?php
    require 'konek.php';

    $result = mysqli_query($db, "SELECT * FROM pesan");
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inputan</title>
    <link rel="stylesheet" type="text/css" href="../posttest3.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <style>
    
    body{
        margin:0;
        padding:0;
        background:white;
        height:100vh; 
    }

    .center{
        position:absolute;
        top: 70%;
        left: 50%;
        transform: translate(-50%,-50%);
        border-radius:10px;
        color: black;
        /* margin-top: 50px; */
    }



    tr th{
        color:black;
        padding: 0 10px;
        font-size: 18px;
        background:skyblue;

    }

    
    td{
        padding:0 10px;   
        font-size: 20px;
        color: black;
        background:white;

        
    }

    table{
        margin-top:30px;
        top:30%;
    }

    .Tambah{
        padding:5px;
        margin-bottom:30px;
        border-bottom: 1px solid;
        background:darkblue;
        border-radius:5px;
        color:white;
    }

    .frame{
        margin-top:50px;
    }

    .edit{
        background:limegreen;
    }
    
    .hapus{
        background:red;
    }
    
    footer{
        margin-top:50%;
    }

    </style>
</head>
<body>
<div class="medsos">
        <div class="container">
            <ul>
                <li><a href="#"><i class="fa-brands fa-line"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-whatsapp"></i></a></li>
                <li><a href="#"><i class="fa-solid fa-sun" id="mode"></i></a></li>
                <li ><h1 id="nama">ASMABA<span>MART</span></h1></li>
            </ul>
        </div>
    </div>
    <header>
        <div class="container">
            <nav >
                <ul>
                    <li><a href="../index.html">HOME</a></li>
                    <li><a href="../produk.html">PRODUK</a></li>
                    <li><a href="../about.html">ABOUT ME</a></li>
                    <li class="aktif"><a href="index.php">PESANAN</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section class="label">
        <div class="container">
            <p>HOME/PESANAN</p>
        </div>
    </section>
        
    <section>
        <div class="container">
            <div class="frame">
                <h3>Pesanan</h3>
            </div>
            <div class="center">
                <br>
                <br>
                <br>
                <br>
                <a class="Tambah" href="formPesan.php">Tambah Pesanan</a>
                <table border='1'>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>Nama Produk</th>
                        <th>Jenis Produk</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah Produk</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Tanggal Pengantaran</th>
                        <th>Bukti Pembayaran</th>
                        <th colspan='2'>Aksi</th>
                    </tr>

                    <?php 
                        $i = 1;
                        while($row = mysqli_fetch_array($result)){
                    ?>

                    <tr>
                        <td> <?=$i; ?> </td>
                        <td> <?=$row['namaPemesan']?> </td>
                        <td> <?=$row['nama_produk']?> </td>
                        <td> <?=$row['jenis']?> </td>
                        <td> <?=$row['harga']?> </td>
                        <td> <?=$row['jumlah']?> </td>
                        <td> <?=$row['tanggalPesan']?> </td>
                        <td> <?=$row['tanggal_antar']?> </td>
                        <td><img src="nota/<?=$row['nota']?>" alt="" width=60px></td>
                        <td class="edit"><a  href="edit.php?id=<?=$row['id']?>">Edit</a></td>
                        <td class="hapus"><a  href="hapus.php?id=<?=$row['id']?>">Hapus</a></td>
                    </tr>

                    <?php
                        $i++;
                        }
                    ?>

                </table>
            </div>
        </div>
    </section>
<footer>
    <div class="container">
        <small>Copyright 2022 by Herni Suhartati</small>
    </div>
</footer>
<script src="../posttest3.js"></script>
</body>
</html>

















