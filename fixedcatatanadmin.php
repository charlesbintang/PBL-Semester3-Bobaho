<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan Khusus</title>
    <style>
        body {
            background-color: #69916F;
            margin: 15px;
        }
       header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-left: 10px;
        margin-top: 10px;
       }
        .Container {
            width: 335px;
            height: 575px;
            background-color: #d9d9d9b0;
            border: 5px;
            border-radius: 15px;
            margin: 40px auto;
            position: relative;
        }
        .BoxCatatan {
            position: sticky;
            margin: 10px auto;
            padding: 10px 20px 10px 20px;
        }

        #exampleFormControlTextarea1 {
            line-height: 1.4;
            margin-top:10px;
            padding: 1em;
            border-radius: 10px;
            border: 2px solid transparent;
            outline: none;
            width: 265px;
            height: 360px;
            background-color: #D9D9D9;
        }
        #exampleFormControlInput1 {
            padding: 1em;
            border-radius: 10px;
            border: 2px solid transparent;
            outline: none;
            width: 210px;
            height: 12px;
            background-color: #D9D9D9;
        }
        .ButtonKirim {
            display: inline-flex;
            height: 40px;
            width: 110px;
            padding: 0;
            border: none;
            outline: none;
            border-radius: 5px;
            overflow: hidden;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-left: 245px;
            background: #F5B202;
            box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.25);
            align-items: center;
            justify-content: space-evenly;
            flex-direction: row-reverse;
        }
        .kirim {
           float: right;
           margin-right: 190px;
        }
        .ButtonKirim:hover {
            background: #D99D00;
        }
        .ButtonKirim:active {
            background: #B28100;
        }
        .Button,
        .Button1 {
            display: inline-flex;
            align-items: center;
            padding: 0 24px;
            height: 100%;
        }
        .Button1 {
            font-size: 1.5em;
            background: rgba(0, 0, 0, 0.08);
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
        @media all and (min-width: 600px)
        {
            .Container {
            width: 535px;
            height: 575px;
            }
            #exampleFormControlTextarea1 {
            width: 465px;
            height: 360px;
            }
            #exampleFormControlInput1 {
            width: 410px;
            height: 12px;
            }
        }

        @media all and (min-width: 1000px)
        {
            .Container {
            width: 835px;
            height: 575px;
            }
            #exampleFormControlTextarea1 {
            width: 765px;
            height: 360px;
            }
            #exampleFormControlInput1 {
            width: 710px;
            height: 12px;
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

    <!-- catatan dan nama -->
    <div class="Container">
        <div class="BoxCatatan">
            <p>isi form dibawah ini ya</p>
            <label for="exampleFormControlInput1" class="form-label">Nama : </label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
        <div class="BoxCatatan">
            <label for="exampleFormControlTextarea1" class="form-label">  is there any special request??  </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" placeholder="enter your request here..."></textarea>
        </div>
   </div>

   <!-- button kirim -->
   <div class="kirim">
        <button class="ButtonKirim" onclick="document.location.href = 'fixedadminpesanan.php'" type="button" >
            <span class="button">OK</span>
        </button>
       
   </div>

    
</body>
</html>