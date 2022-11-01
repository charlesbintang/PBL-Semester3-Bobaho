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
        background: #d6dad6;
        
       }
       .LihatPesanan:hover {
        background:#d6dad6d3;
        color:#244b39;
        
           
        }
        .LihatPesanan:active {
            background: #d6dad6;
            color: #244b39;
            font-weight: bold;
            
         
        }
       .Clear {
        width: 125px;
        height: 29px;
        margin-top: 8px;
        margin-left: 5px;
        border: 2px solid transparent;
        border-radius: 9px;
        outline: none;
        background:#F5B202;
        color:#244b39;
        font-size: 24px;
       }

        .Clear:hover {
        background:#f5b002ce;
        color:#244b39;
        
           
        }
        .Clear:active {
            background: #09c403ea;
            color: #1d3b2d;
            font-weight: bold;
            
         
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
       
       #kaki {
        display: flex;
        justify-content: center;
        align-items: center;
       }

       .tombolBack {
            margin-left: 18px;
            border-radius: 50%;
            font-size: 24px;
            background-color: transparent;
            width: 35px;
            height: 35px;
            padding: 0;
            border: 1px solid;
        }
        .backButton {
          display: flex;
          justify-content: center;
          align-items: center;
        }

        .back {
            display: flex;
        justify-content: flex-start;
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
        .LihatPesanan {
        width: 279px;
        height: 35px;
        font-size: larger;
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

        <!-- tombol back -->
        <div class="back">
            <button class="tombolBack" type="button">
                <span class="backButton">
                    <ion-icon name="arrow-round-back"></ion-icon>
                </span>
                <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

            </button>

    </div>
    
</body>
</html>