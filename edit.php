<!-- fungsi update -->
<?php

include_once("config.php");


if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $gambar = $_FILES['gambar']['name'];

if ($gambar !="") {
    $ekstensi_diperbolehkan = array('png', 'jpg');
    $x = explode('.' $gambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $angka_acak = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $gambar;
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, 'gambar/' . $nama_gambar_baru);
            $query = "UPDATE tb_users SET name='$name', Email='$email', Mobile='$mobile, Gambar='$nama_gambar_baru' WHERE id=$id";
            $result = mysqli_query($mysqli, $query);

            if (!result) {
                die("Querry gagal dijalankan:" . mysqli_errno($mysqli) . 
                    "-" . mysqli_error($mysqli));

            }
           else {
            header("Location: tabel.php");
           } 
        }
        else {
            echo "<script>alert('Hanya boleh jpg atau png.');window.location='tabel.php';</script>";
        }
        else {
            $result = mysqli_query($mysqli, "UPDATE tb_users SET name='$name', Email='$email', Mobile='$mobile, ambar='$nama_gambar_baru' WHERE id=$id");
            header("Location: tabel.php");
        }

}






































    $result = mysqli_query($mysqli, "UPDATE tb_users SET Name='$name',Email='$email',Mobile='$mobile' WHERE id=$id");

    header ("Location: tabel.php");
}
?>

<?php
$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM tb_users WHERE id=$id");

while ($user_data = mysqli_fetch_array($result)) {
    $name = $user_data ['Name'];
    $email = $user_data ['Email'];
    $mobile = $user_data ['Mobile'];
    $gambar = $user_data['gambar'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <a href="tabel.php">Home</a>
  <br /> <br />
  
  <form name="update_user" method="post" action="edit.php" enctype="multipart/form-data">
    <table border="0">
        <tr>
            <td>Name</td>
            <td><input type="text" name ="name" value=<?php echo $name; ?>></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name ="email" value=<?php echo $email; ?>></td>
        </tr>
        <tr>
            <td>Mobile</td>
            <td><input type="text" name ="mobile" value=<?php echo $mobile; ?>></td>
        </tr>
        <tr>
            <td>Gambar</td>
            <td> <img src="gambar/<?php echo $gambar;?>" style="width: 120px;float: left;margin-bottom: 5px;"></td>
            <td> <input type="file" name="gambar" />
                <br>
                <i style ="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar</i>
            </td>
        </tr>
        <tr>
            <td><input type="hidden" name ="id" value=<?php echo $_GET['id'];?>></td>
            <td><input type="submit" name ="update" value="UPDATE"></td>

        </tr>

    </table>
  </form>
</body>
</html>