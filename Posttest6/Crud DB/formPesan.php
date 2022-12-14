<?php

    // include
    require 'konek.php';

    if(isset($_POST['btn'])){
        $namapembeli=$_POST['namapemesan'];
        $namaproduk=$_POST['nama'];
        $jenis=$_POST['jenis'];
        $harga=$_POST['harga'];
        $jumlah=$_POST['jumlah'];
        $tanggalpesan=$_POST['tanggal'];
        $tanggalantar=$_POST['tanggalAntar'];

        $nota = $_FILES['bukti']['name'];
        $x = explode('.',$nota);
        $ekstensi = strtolower(end($x));

        $nota_baru = "$namapembeli.$ekstensi";
        $tmp = $_FILES['bukti']['tmp_name'];

        if(move_uploaded_file($tmp, 'nota/'.$nota_baru)){
            $query = "INSERT INTO pesan(nama_produk, jenis, harga, jumlah, tanggal_antar, tanggalPesan, namaPemesan, nota) 
            VALUES ('$namaproduk', '$jenis', '$harga', '$jumlah', '$tanggalantar', '$tanggalpesan', '$namapembeli', '$nota_baru')";
            $result = $db->query($query);

            if($result){
                echo "
                    <script>
                        alert('Pesanan Berhasil Ditambah');
                    </script>
                ";
            }else{
                echo "
                    <script>
                        alert('Pesanan Gagal Ditambah');
                    </script>
                ";
            }
            header("Location:index.php");
        }
    }
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
        /* overflow:hidden; */
    }
    .center{
        position:absolute;
        top: 80%;
        left: 50%;
        transform: translate(-50%,-50%);
        background:skyblue;
        width:500px;
        border-radius:10px;
    }

    .center h2{
        text-align:center;
        padding: 0 0 20px 0;
        border-bottom: 1px solid;
        color:white;
        background:darkblue;
        border-radius:10px;


    }

    .center form{
        padding:0 40px;
        box-sizing:border-box;
        border: 1px solid;
        
    }

    form .txt{
        position:relative;
        /* border-bottom:1px solid; */
        margin:30px 0;
    }

    .txt input{
        width:100%;
        padding: 0 5px;
        height:20px;
        font-size:16px;
        border:1px solid;
        background:white;
        color:black;
        outline:none;
    } 

    .txt label{
        top:50px;
        bottom:30px;
        left:5px;
        color:black;
        transform:translate(-50%);
        font-size:16px;
        pointer-events:none;
    }
    td{
        padding:0 5px;   
    }


    input[type="submit"]{
        width:100%;
        height:50px;
        border: 1px solid;
        background:darkblue;
        border-radius:25px;
        color:white;
        margin-bottom:20px;
        font-size:15px;
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
            <p>HOME/PESANAN/TAMBAH PESANAN</p>
        </div>
    </section>
    <section>
        <div class="center">
            <h2>Pesan di Sini</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="txt">
                    <label for="">Nama Pemesan</label>
                    <input type="text" name="namapemesan" required autocomplete="off">
                </div>
                <div class="txt">
                    <label for="">Nama Produk</label>
                    <input type="text" name="nama" required autocomplete="off">
                </div>
                <div class="txt">
                    <label for="">Jenis Produk</label>
                    <table>
                        <tr>
                            
                            <td><input type="radio" name="jenis" value="Makanan" required></td>
                            <td>Makanan</td>

                            <td><input type="radio" name="jenis" value="Minuman" required></td>
                            <td>Minuman</td>
                        </tr>
                    </table>
                </div>
                <div class="txt">
                    <label for="">Harga Satuan</label>
                    <input type="number" name="harga" required>
                </div>
                <div class="txt">
                    <label for="">Jumlah Produk</label>
                    <input type="number" name="jumlah" required>
                </div>
                <div class="txt">
                    <label for="">Tanggal Pengantaran</label>
                    <input type="date" name="tanggalAntar"required>
                </div>
                <div class="txt">
                    <label for="">Bukti Pembayaran</label>
                    <input type="file" name="bukti">
                </div>
                <input type="hidden" name="tanggal" value=<?=date("Y-m-d")?>>
                <input type="submit" name="btn" value="Simpan">
            </form>
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