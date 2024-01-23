<?php

include_once("config.php");
if (isset($_POST['delete'])) {

    $id = $_POST['id'];

    $result = mysqli_query($mysqli, "DELETE FROM tb_users WHERE id =$id");

    header("Location: tabel.php");

}
?>

<?php

$id = $_GET['id'];


$result = mysqli_query($mysqli, "SELECT * FROM tb_users WHERE id =$id");

while ($user_data = mysqli_fetch_array($result)) {
    $name = $user_data['Name'];
}
?>

<body>
    <a href="tabel.php">Kembali</a>
    <br /> <br />

    <form name="delete_user" method="post" action ="delete.php">
        <input type="hidden" name="id" value = "<?php echo $id; ?>">
        <h3>Yakin dek <?php echo $name; ?> ?</h3>
        <input type="submit" name="delete" value = "Hapus">
        <input type="button" value = "Batal" onclick = "window.location.href='tabel.php'">
    </form>
</body>