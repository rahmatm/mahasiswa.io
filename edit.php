<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $nim = $_POST['nim'];

    $nama=$_POST['nama'];
    $jurusan=$_POST['jurusan'];
    $email=$_POST['email'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE siswa SET nim='$nim',nama='$nama',jurusan='$jurusan',email='$email' WHERE nim=$nim");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
include_once("config.php");
$nim = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM siswa WHERE nim=$nim");

while($siswa_data = mysqli_fetch_array($result))
{
    $nim = $siswa_data['nim'];
    $nama = $siswa_data['nama'];
    $jurusan = $siswa_data['jurusan'];
    $email = $siswa_data['email'];
}
?>
<html>
<head>  
    <title>Edit Data Mahasiswa</title>
</head>

<body>
    <a href="index.php">Beranda</a>
    <br/><br/>

    <form name="update_siswa" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>NIM</td>
                <td><input type="text" name="nim" value=<?php echo $nim;?>></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
            </tr>
            <tr> 
                <td>Jurusan</td>
                <td><input type="text" name="jurusan" value=<?php echo $jurusan;?>></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value=<?php echo $email;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>