<?php
//Koneksi dengan databse
include_once("config.php");

//Ambil data dari database menggunakan Query SQL
$result = mysqli_query($mysqli, "SELECT * FROM tb_users ORDER BY id Desc");
//var_dump(mysqli_fetch_array($result));
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tabel.php">
    <title>Homepage</title>
</head>
<body>
    <a href="add.php">Tambah data</a> <br>

    <table width="80%" border=1>
        <tr>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Gambar</th>
            <th>Update</th>
        </tr>
        <?php
        while ($user_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $user_data['Name'] . "</td>";
            echo "<td>" . $user_data['Mobile'] . "</td>";
            echo "<td>" . $user_data['Email'] . "</td>";
            echo "<td style='text-align: center;'><img src= 'gambar/{$user_data['gambar']}' style='width: 120px;'></td>";
            echo "<td> <a href ='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";
        }
    
       ?>     


    </table>



</body>
</html>