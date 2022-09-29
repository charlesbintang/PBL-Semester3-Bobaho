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
            height: 100%;
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
        margin-top: 8px;
        margin-left: 5px;
        border: 2px solid transparent;
        border-radius: 9px;
        outline: none;
        background: #D9D9D9;
        width: 125px;
        height: 29px;
       }
       .Clear {
        margin-top: 8px;
        margin-left: 5px;
        border: 2px solid transparent;
        border-radius: 9px;
        outline: none;
        background: #3BBA00;
        width: 125px;
        height: 29px;
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
        
       }
       hr.vertical {
        width: 0px;
        height: 60px;
        position: fixed;
        color: black;
        position: absolute; 
        left: 50%;
        margin-top: 50px;
        background: #515252;
        
        }
       .footer {
        width: 460px;
        height: 90px;
        background: #F5B202;
        margin: auto;
        margin-left: -32px;
        margin-top: 40px;
        border: 2px solid transparent;
        border-radius: 50px 50px 0px 0px ;
        display: flex;
        justify-content: space-around;
       }
       .HomeButton {
        background-color: transparent;
        width: 35px;
        height: 35px;
        padding: 0px;
        font-size: 35px;
        outline: none;
        border: none;
       }
       .Keranjang {
        background-color: transparent;
        width: 35px;
        height: 35px;
        padding: 0px;
        font-size: 35px;
        outline: none;
        border: none;
       }
       .footer button.HomeButton {
        margin-top: 23px;
       }
       .footer button.Keranjang {
        margin-top: 23px;
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

    <hr class="vertical"/>

    <!-- footer logo -->
    <footer id="kaki">
        <div class="footer">
            <button class="HomeButton" type="button" >
                <span class="buttonRumah">
                    <ion-icon name="home"></ion-icon>
                </span>
                <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
            </button>

            <button class="Keranjang" type="button">
                <span class="tombolKeranjang">
                    <ion-icon name="cart"></ion-icon>
                </span>
                <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
            </button>
        </div>
    </footer>

    
</body>
</html>