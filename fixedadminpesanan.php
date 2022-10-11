<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pesanan Admin</title>
    <style>
        body {
            background-color: #69916F;
            margin: 20px;
            padding: opx;
        }
       header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-left: 10px;
        margin-top: 10px;
       }
       #pesanan {
        margin-left: 20px;
        color: #d6dad6;
        margin-top: -10px;
       }
       .Container {
        width: 360px;
        height: 90px;
        background: #28533F;
        margin: 5px auto;
        border: 2px solid transparent;
        border-radius: 10px;
    
       }
       
       #exampleFormControlTextarea1 {
        margin-top: 8px;
        margin-left: 5px;
        width: 250px;
        height: 24px;
        border-radius: 10px;
        border: 2px solid transparent;
        outline: none;
        background: #D9D9D9;
        line-height: 1.8;
       }
       .LihatPesanan {
        width: 125px;
        height: 29px;
        margin-top: 8px;
        margin-left: 5px;
        border: 2px solid transparent;
        border-radius: 9px;
        outline: none;
        background: #D9D9D9;
        
       }
       .Clear {
        width: 125px;
        height: 29px;
        margin-top: 8px;
        margin-left: 5px;
        border: 2px solid transparent;
        border-radius: 9px;
        outline: none;
        background: #3BBA00;
        
        color: white;
       }
       #KodePesanan {
        float: right;
        width: 73px;
        height: 66px;
        margin-top: 8px;
        margin-right: 5px;
        border-radius: 10px;
        border: 2px solid transparent;
        outline: none;
        background: #D9D9D9;
        line-height: 66px;
        
       }
       .kelompok {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        /* border: 1px solid black; */
        
       }
       hr.vertical {
        width: 0px;
        height: 60px;
        color: black;
        left: 50%;
        margin-top: 15px;
        background: #000000;
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        
        }
       .footer {
        width: 460px;
        height: 90px;
        background: #F5B202;
        border: 2px solid transparent;
        border-radius: 50px 50px 50px 50px ;
        display: flex;
        justify-content: space-around;
        margin-top: 30px ;
       }

       .HomeButton {
        background-color: transparent;
        width: 50px;
        height: 50px;
        padding: 0px;
        font-size: 35px;
        outline: none;
        border: none;
       }
       .HomeButton:hover {
            color: #2c2c2c;
        }
        .HomeButton:active {
            font-size: 45px;
            color: #6b6b6b;
        }
       .Keranjang {
        background-color: transparent;
        width: 40px;
        height: 40px;
        padding: 0px;
        font-size: 35px;
        outline: none;
        border: none;
       }
       .Keranjang:hover {
            color: #2c2c2c;
        }
        .Keranjang:active {
            font-size: 45px;
            color: #6b6b6b;
        }
       .footer button.HomeButton {
        margin-top: 23px;
       }
       .footer button.Keranjang {
        margin-top: 23px;
       }
       
       
       
       #kaki {
        display: flex;
        justify-content: center;
        align-items: center;
       }

       @media all and (min-width: 560px) {
         #pesanan { 
            font-size: 30px;
         }
       }

       @media all and (min-width: 700px) {
        .Container {
        width: 700px;
        height: 110px;
        }
        #KodePesanan {
        width: 85px;
        height: 85px;
        }
        #exampleFormControlTextarea1 {
        width: 560px;
        height: 35px;
        border-radius: 15px;
        }
        .Clear {
        width: 279px;
        height: 35px;
        font-size: larger;
        border-radius: 15px;
        }
        .footer {
        width: 750px;
        height: 90px;
        }
       }

       @media all and (min-width: 1400px) {
        .Container {
        width: 1350px;
        height: 120px;
        } 
        #KodePesanan {
        width: 104px;
        height: 99px;
        }
        #exampleFormControlTextarea1 {
        width: 1180px;
        height: 38px;
        border-radius: 15px;
        }
        .LihatPesanan {
        width: 590px;
        height: 38px;
        font-size: larger;
        border-radius: 15px;
        }
        .Clear {
        width: 590px;
        height: 38px;
        font-size: larger;
        border-radius: 15px;
        }
        .footer {
        width: 1400px;
        height: 90px;
        }
        .back {
        width: 590px;
        height: 38px;
        font-size: larger;
        border-radius: 15px;
        }
        
       }
      

    </style>
</head>




<body>
    <!-- logo dan Judul -->
    <header>
        <img src="Judul.png" width="150px" id="Bobaandtea" alt="">
        <img src="logo.png" width="100px" id="ayam" alt="">
    </header>




    <h4 id="pesanan">Pesanan Customer :</h4>
    <div class="kelompok">
        <!-- Nama Pelanggan -->
        <div class="Container">
            <!-- Textarea No Pesanan -->
            <label for="KodePesanan" class="form-label">  </label>
            <textarea class="form-control" id="KodePesanan" rows="1" placeholder=></textarea>
            <label for="exampleFormControlTextarea1" class="form-label">  </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder=></textarea>
            <!-- Tombol Lihat Pesanan -->
            <button class="LihatPesanan" onclick="document.location.href = 'fixeddetailpesanan.php'" type="button">Lihat Pesanan</button>
            <!-- Tombol Clear -->
            <button class="Clear" onclick="document.location.href = 'login.php'" type="button">Clear</button>
        </div>

        <!-- Nama Pelanggan -->
        <div class="Container">
            <!-- Textarea No Pesanan -->
            <label for="KodePesanan" class="form-label">  </label>
            <textarea class="form-control" id="KodePesanan" rows="1" placeholder=></textarea>
            <label for="exampleFormControlTextarea1" class="form-label">  </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder=></textarea>
            <!-- Tombol Lihat Pesanan -->
            <button class="LihatPesanan" type="button">Lihat Pesanan</button>
            <!-- Tombol Clear -->
            <button class="Clear" type="button">Clear</button>
        </div>

        <!-- Nama Pelanggan -->
        <div class="Container">
            <!-- Textarea No Pesanan -->
            <label for="KodePesanan" class="form-label">  </label>
            <textarea class="form-control" id="KodePesanan" rows="1" placeholder=></textarea>
            <label for="exampleFormControlTextarea1" class="form-label">  </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder=></textarea>
            <!-- Tombol Lihat Pesanan -->
            <button class="LihatPesanan" type="button">Lihat Pesanan</button>
            <!-- Tombol Clear -->
            <button class="Clear" type="button">Clear</button>
        </div>

        <!-- Nama Pelanggan -->
        <div class="Container">
            <!-- Textarea No Pesanan -->
            <label for="KodePesanan" class="form-label">  </label>
            <textarea class="form-control" id="KodePesanan" rows="1" placeholder=></textarea>
            <label for="exampleFormControlTextarea1" class="form-label">  </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder=></textarea>
            <!-- Tombol Lihat Pesanan -->
            <button class="LihatPesanan" type="button">Lihat Pesanan</button>
            <!-- Tombol Clear -->
            <button class="Clear" type="button">Clear</button>
        </div>

        <!-- Nama Pelanggan -->
        <div class="Container">
            <!-- Textarea No Pesanan -->
            <label for="KodePesanan" class="form-label">  </label>
            <textarea class="form-control" id="KodePesanan" rows="1" placeholder=></textarea>
            <label for="exampleFormControlTextarea1" class="form-label">  </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder=></textarea>
            <!-- Tombol Lihat Pesanan -->
            <button class="LihatPesanan" type="button">Lihat Pesanan</button>
            <!-- Tombol Clear -->
            <button class="Clear" type="button">Clear</button>
        </div>

        <!-- Nama Pelanggan -->
        <div class="Container">
            <!-- Textarea No Pesanan -->
            <label for="KodePesanan" class="form-label">  </label>
            <textarea class="form-control" id="KodePesanan" rows="1" placeholder=></textarea>
            <label for="exampleFormControlTextarea1" class="form-label">  </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder=></textarea>
            <!-- Tombol Lihat Pesanan -->
            <button class="LihatPesanan" type="button">Lihat Pesanan</button>
            <!-- Tombol Clear -->
            <button class="Clear" type="button">Clear</button>
            
        </div>

    </div>
    
</body>
</html>