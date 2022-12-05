<html>
<head>
<title>passing javascript variable to php</title>

<script type="text/javascript">
function cek123()
{
var varJS = "1234567";
document.form1.media.value = varJS;
}

</script>
</head>

<body>

<form name="form1" id="form1" method="post" onsubmit="cek123()">
<input type="hidden" id="media" name="media" value="">
<input type="submit" id="submit" name="submit" value="cek">
</form>

<?php
$varPHP = $_POST['media'];
echo "variabel javascript yang telah diisikan ke variabel php : $varPHP";
?>

</body>
</html>