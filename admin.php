<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan</title>

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
        margin-left: 150px;
        color: #d6dad6;
        margin-top: -10px;
        text-transform: uppercase;
        font-size: 170%;
       }
       .kelompok {
        display: flex;
        flex-wrap: wrap;
        
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
       #Catatan {
        margin-top: 6px;
        margin-left: 5px;
        width: 250px;
        height: 24px;
        border-radius: 10px;
        border: 2px solid transparent;
        outline: none;
        background: #D9D9D9;
        line-height: 1.8;
       }
       .list-container {
        width: 360px;
        height: 90px;
        background: #28533F;
        margin: 20px auto;
        border: 2px solid transparent;
        border-radius: 10px;
        
       }
       #boba-picture {
        margin-top: -15px;
        margin-left: 5px;
        position: relative;
       }
       #nama-boba {
        position: absolute;
        color: #d6dad6;
        margin-left: 90px;
        margin-top: 20px;
       }
       .tersedia {
        margin-top: -35px;
        margin-left: 50px;
        display: flex;
        justify-content: space-evenly;
        position: relative;
        
       }
       .button-tersedia {
        border: 2px solid transparent;
        border-radius: 9px;
        outline: none;
        background: #D9D9D9;
        width: 100px;
        height: 25px;
        font-size: 12px;
       }
       .button-tidak {
        border: 2px solid transparent;
        border-radius: 9px;
        outline: none;
        background: #D9D9D9;
        width: 100px;
        height: 25px;
        font-size: 12px;
       }
       .checkbox {
        position: static;
        padding-left: 0px;
        font-size: 20px;
        flex-direction: row;
        justify-content: space-evenly;
        }
        .checkbox input {
        /* position: absolute; */
        opacity: 50%;
        cursor: pointer;
        background: rgba(0, 0, 0, 0.4);
        }
        .check {
        /* position: absolute; */
        /* top: 0; */
        /* left: 0; */
        height: 20px;
        width: 5px;
        background-color: #28533F;
        border: 0px  solid #ccc;
        padding: 0px;
        margin-top: 1PX;
      
        }

        .cek-gede {
            width: 360px;
            height: 30px;
            background: #28533F;
            margin-left: 20px;
            border-radius: 5px;
            flex-direction: row;
        }
        /* besar kecil checkbox pake kelas ini ya */
        .cek {
            margin-top: 0px;
            width: 25px;
            height: 30px;
            position: relative;
            outline:none;
            margin-left: 8px;
            opacity: 0;
            margin-left: 12px;
        }

       .gambar-topping {
        display: flex;
        justify-content: space-evenly;
        margin-top: 5px;
        margin-left: 10px;
        margin-right: 5px;
       }
       .Tombol-Tunai {
        display: flex;
        justify-content: space-around;
        margin-top: 20px;
       }
       .Tunai {
        width: 160px;
        height: 35px;
        outline: none;
        border-radius: 10px;
        background: #D9D9D9;
        border: 2px solid transparent;
       }
       .QRIS {
        width: 160px;
        height: 35px;
        outline: none;
        border-radius: 10px;
        background: #D9D9D9;
        border: 2px solid transparent;
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
       .scroll{
        display:block;
        border:0px solid;
        padding:5px;
        margin-top:5px;
        width: 380px;
        height:600px;
        overflow:scroll;
       }
    </style>
</head>
<body>
    <!-- logo dan Judul -->
    <header>
        <img src="Judul.png" width="150px" id="Bobaandtea" alt="">
        <img src="logo.png" width="100px" id="ayam" alt="">
    </header>
    
    <h3 id="pesanan">topping</h3>

    <div class="scroll">
        <div class="list-container">
            <h4 id="nama-boba">Love Berry Boba</h4>
            <img src="loveberry.png" id="boba-picture" width="60px" alt="">
            
            <!-- Button tersedia dan tidak -->
            <div class="tersedia">
                <button class="button-tersedia" type="button"> Tersedia</button>

                <button class="button-tidak" id="tidak-tersedia" type="button"> Tidak Tersedia</button>
           </div>
            
        </div>

        <!-- checkbox -->
        <div class="cek-gede">
        <form action="" method="post">
            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>
            
            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>

            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>
                
            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>

            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>
                
            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>
    
            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>

            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>             
           
        </form>  
        </div>
        <!-- <form action="" method="get" class="checkbox">
            <input type="checkbox" class="check" >
            <input type="checkbox" class="check">
            <input type="checkbox" class="check">
            <input type="checkbox" class="check">
            <input type="checkbox" class="check">
            <input type="checkbox" class="check">
            <input type="checkbox" class="check">
            <input type="checkbox" class="check">
        </form> -->

        <div class="gambar-topping">
            <img src="jeli merah.png" width="26px"alt="">
            <img src="jeli oren.png" width="26px"alt="">
            <img src="jeli putih.png" width="26px"alt="">
            <img src="topping boba.png" width="26px"alt="">
            <img src="jeli merah.png" width="26px"alt="">
            <img src="topping jelly.png" width="26px"alt="">
            <img src="jeli merah.png" width="26px"alt="">
            <img src="jeli putih.png" width="26px"alt="">
        </div>

        <!-- DETAIL MENU YANG KEDUA -->
        <div class="list-container">
            <h4 id="nama-boba">Brown Sugar Milk Tea</h4>
            <img src="milkboba.png" id="boba-picture" width="60px" alt="">
            
            <!-- Button tersedia dan tidak -->
            <div class="tersedia">
                <button class="button-tersedia" type="button"> Tersedia</button>

                <button class="button-tidak" id="tidak-tersedia" type="button"> Tidak Tersedia</button>
           </div>
            
        </div>

        <!-- checkbox -->
        <div class="cek-gede">
        <form action="" method="post">
            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>
            
            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>

            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>
                
            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>

            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>
                
            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>
    
            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>

            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>             
           
        </form>  
        </div>
        
        <div class="gambar-topping">
            <img src="jeli merah.png" width="26px"alt="">
            <img src="jeli oren.png" width="26px"alt="">
            <img src="jeli putih.png" width="26px"alt="">
            <img src="topping boba.png" width="26px"alt="">
            <img src="jeli merah.png" width="26px"alt="">
            <img src="topping jelly.png" width="26px"alt="">
            <img src="jeli merah.png" width="26px"alt="">
            <img src="jeli putih.png" width="26px"alt="">
        </div>

        <!-- DETAIL MENU YANG KETIGA -->
        <div class="list-container">
            <h4 id="nama-boba">Teh Blackcurrant</h4>
            <img src="bobaberry.png" id="boba-picture" width="60px" alt="">
            
            <!-- Button tersedia dan tidak -->
            <div class="tersedia">
                <button class="button-tersedia" type="button"> Tersedia</button>

                <button class="button-tidak" id="tidak-tersedia" type="button"> Tidak Tersedia</button>
           </div>
            
        </div>

        <!-- checkbox -->
        <div class="cek-gede">
        <form action="" method="post">
            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>
            
            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>

            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>
                
            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>

            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>
                
            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>
    
            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>

            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>             
           
        </form>  
        </div>
        
        <div class="gambar-topping">
            <img src="jeli merah.png" width="26px"alt="">
            <img src="jeli oren.png" width="26px"alt="">
            <img src="jeli putih.png" width="26px"alt="">
            <img src="topping boba.png" width="26px"alt="">
            <img src="jeli merah.png" width="26px"alt="">
            <img src="topping jelly.png" width="26px"alt="">
            <img src="jeli merah.png" width="26px"alt="">
            <img src="jeli putih.png" width="26px"alt="">
        </div>

        <!-- DETAIL MENU YANG KEEMPAT -->
            <div class="list-container">
            <h4 id="nama-boba">Teh Blackcurrant</h4>
            <img src="bobaberry.png" id="boba-picture" width="60px" alt="">
            
            <!-- Button tersedia dan tidak -->
            <div class="tersedia">
                <button class="button-tersedia" type="button"> Tersedia</button>

                <button class="button-tidak" id="tidak-tersedia" type="button"> Tidak Tersedia</button>
           </div>
            
        </div>

        <!-- checkbox -->
        <div class="cek-gede">
        <form action="" method="post">
            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>
            
            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>

            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>
                
            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>

            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>
                
            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>
    
            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>

            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>             
           
        </form>  
        </div>
        
        <div class="gambar-topping">
            <img src="jeli merah.png" width="26px"alt="">
            <img src="jeli oren.png" width="26px"alt="">
            <img src="jeli putih.png" width="26px"alt="">
            <img src="topping boba.png" width="26px"alt="">
            <img src="jeli merah.png" width="26px"alt="">
            <img src="topping jelly.png" width="26px"alt="">
            <img src="jeli merah.png" width="26px"alt="">
            <img src="jeli putih.png" width="26px"alt="">
        </div>
                <!-- DETAIL MENU YANG KETIGA -->
                <div class="list-container">
            <h4 id="nama-boba">Teh Blackcurrant</h4>
            <img src="bobaberry.png" id="boba-picture" width="60px" alt="">
            
            <!-- Button tersedia dan tidak -->
            <div class="tersedia">
                <button class="button-tersedia" type="button"> Tersedia</button>

                <button class="button-tidak" id="tidak-tersedia" type="button"> Tidak Tersedia</button>
           </div>    
    </div>

        <!-- checkbox -->
        <div class="cek-gede">
        <form action="" method="post">
            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>
            
            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>

            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>
                
            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>

            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>
                
            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>
    
            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>

            <label class="checkbox">
            <input  class="cek" type="checkbox" >
            <span class="check"></span>             
           
        </form>  
        </div>
        
        <div class="gambar-topping">
            <img src="jeli merah.png" width="26px"alt="">
            <img src="jeli oren.png" width="26px"alt="">
            <img src="jeli putih.png" width="26px"alt="">
            <img src="topping boba.png" width="26px"alt="">
            <img src="jeli merah.png" width="26px"alt="">
            <img src="topping jelly.png" width="26px"alt="">
            <img src="jeli merah.png" width="26px"alt="">
            <img src="jeli putih.png" width="26px"alt="">
        </div>
    </div>
        <div class="Tombol-Tunai">
            <button type="button" class="Tunai">tunai</button>
            <button type="button" class="QRIS">QRIS</button>

        </div>


        <!-- footer logo -->
    <footer id="kaki">
        <div class="footer">
            <button class="HomeButton" type="button">
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