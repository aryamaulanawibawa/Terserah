<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="add.php" method="post" name="form1" enctype="multipart/form-data">
        <table width="25%" border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td><input type="text" name="mobile"></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td><input type="file" name="gambar"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>

        </table>
    </form> 
    <?php

if (isset ($_POST['Submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gambar = $_FILES['gambar']['name'];
    // var_dump($name, $email, $mobile);

    include_once("config.php");

    if ($gambar !="") {
        $ekstensi_diperbolehkan = array('png', 'jpg');
        $x = explode('.' $gambar);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar']
        $angka_acak = rand(1, 999);
        $nama_gambar_baru = $angka_acak . '-' . $gambar;
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, 'gambar/' . $nama_gambar_baru);
            $query = "INSERT INTO tb_users(Name, Email, Mobile, gambar) VALUES('$name','$email','$mobile','$nama_gambar_baru')";
            $result = mysqli_query($mysqli, $query);

            if (!result) {
                die("Querry gagal dijalankan:" . mysqli_errno($mysqli) . 
                    "-" . mysqli_error($mysqli));

            }
           else {
            echo "User added successfully. <a href='tabel.php'>Lihat user</a>";
           } 
        }
        else {
            echo "<script>alert('Hanya boleh jpg atau png.');window.location='tabel.php';</script>";
        }
    }
    else {
        $query= "INSERT INTO tb_users(Name, Email, Mobile, gambar)VALUES('$name','$email','$mobile', null)";
        $result = mysqli_query($mysqli, $query);

        if (!result){
            die("Query gagal dijalankan: ". mysqli_errno($mysqli) .
            "-" . mysqli_error($mysqli));
        }
        else {
            echo "User added succsessfully. <a href='tabel.php'>Lihat user</a>";
        }
    }
    

?>

</body>
</html>


