<?php
// $koneksi = mysqli_connect("localhost", "root", "", "Bobaho");

// if (isset($_POST['signup'])) {
//     $this->load->library('form_validation');
//     if ($this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[customer.nama_customer]', ['is unique' => 'This username is already registered']) && $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[2]', ['min_length' => 'Password too short'])) {
//         $data = [
//             'id_customer' => NULL,
//             'nama_customer' => htmlspecialchars($this->input->post('username', true)),
//             'kata_sandi' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
//         ];
//         $this->db->insert('customer', $data);
//         redirect('');
//     }

// // filter data yang diinputkan
// $username = filter_input(INPUT_POST, 'username');
// // enkripsi password
// $password = md5($_POST["password"]);

// // menyiapkan query 
// $sql = "INSERT INTO customer (id_customer, nama_customer, kata_sandi) 
//             VALUES (NULL, '$username', '$password');";


// // eksekusi query untuk menyimpan ke database
// $saved = mysqli_query($koneksi, $sql);

// // jika query simpan berhasil, maka user sudah terdaftar
// // maka alihkan ke halaman login
// if ($saved) {
//     redirect('');
// } else {
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Bobaho</title>

    <style>
        body {
            background-color: #69916F;
            margin: 0;
            padding: 0;
        }

        .MainContainer {
            width: 350px;
            height: 500px;
            border-radius: 45px;
            background-color: #D6D5D5;
            margin: auto;
            margin-top: 230px;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
        }

        .person {
            display: flex;
            justify-content: center;
        }

        #emaill {
            box-shadow: inset 3px 3px 4px rgba(0, 0, 0, 0.4);
            padding: 10px;
            border: 1px solid grey;
            display: flex;
            justify-content: center;
            margin-top: 30px;
            padding: 1em;
            border-radius: 25px;
            margin: auto;
            border: 2px solid transparent;
            outline: none;
            width: 234px;
            height: 40px;
            background-color: #d3d2d2;
            margin-top: 30px;
            font-size: larger;
        }

        button {

            width: 270px;
            height: 55px;
            display: flex;
            align-items: center;
            box-shadow: -3px -3px 4px rgba(255, 255, 255, 0.582), 3px 3px 4px rgba(0, 0, 0, 0.4);
            padding: 19.2px;
            border-radius: 20px;
            border: 2px solid transparent;
            background-color: #d3d2d2dc;
            font-size: larger;
            margin-top: 20px;
            outline: none;
            justify-content: center;

        }

        button:hover {
            background: #d6dad6d3;
            color: #000000;


        }

        button:active {
            background: #caceca;
            color: #000000;
            font-weight: bold;
        }

        .input {
            margin-top: -30px;
        }

        @media all and (min-width: 700px) {
            .MainContainer {
                width: 550px;
                height: 700px;
            }

            #emaill {
                width: 384px;
                height: 40px;
            }

            button {
                width: 420px;
                height: 55px;
            }
        }
    </style>
</head>

<body>
    <div class="MainContainer">
        <img width="50px" height="56px" style="margin-top: 0px" src="<?= base_url('assets/'); ?>aset boba/person.png" alt="">
        SIGN UP

        <form class="customer" method="POST" action="<?= base_url('auth/registration'); ?>">
            <div class="input">
                <label class="form-label"></label>
                <input type="text" class="form-control" id="emaill" name="nama_customer" placeholder="Username" value="<?= set_value('nama_customer'); ?>">
                <?= form_error('nama_customer', '<small style="color:red;margin-left: 10px;">', '</small>'); ?>
                <label class="form-label"></label>
                <input type="password" class="form-control" id="emaill" name="kata_sandi" style="margin-bottom: 10px;" placeholder="Password">
                <?= form_error('kata_sandi', '<small style="color:red;margin-left: 10px;">', '</small>'); ?>
                <button class="Button" type="submit" name="signup" value="signup" style="margin-top: 20px;">Sign Up</button>
            </div>
        </form>
        <hr>
        <p align="center"><a href="<?= base_url(''); ?>">Kembali</a></p>
    </div>
</body>

</html>