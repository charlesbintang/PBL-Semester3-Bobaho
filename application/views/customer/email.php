<?php
//mengirim email jika user sudah ada session payment
if (isset($_SESSION['session_payment']) && $_SESSION['QRIS'] == true) {
    redirect('menu/sendEmail');
} elseif (isset($_SESSION['session_payment'])) {
    $_SESSION['CASH'] = true;
    redirect('menu/sendEmail');
} else {
    redirect('menu');
}
