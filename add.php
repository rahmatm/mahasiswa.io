<html>
<head>
    <title>Menambah Siswa</title>
</head>

<body>
    <a href="index.php">Kembali Ke Beranda</a>
    <br/><br/>

    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>NIM</td>
                <td><input type="text" name="nim"></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr> 
                <td>Jurusan</td>
                <td><input type="text" name="jurusan"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jurusan = $_POST['jurusan'];
        $email = $_POST['email'];

        // include database connection file
        include_once("config.php");

        // Insert data siswa into table
        $result = mysqli_query($mysqli, "INSERT INTO siswa(nim,nama,jurusan,email) VALUES('$nim','$nama','$jurusan','$email')");

        // Show message when user added
        echo "User added successfully. <a href='index.php'>Data Mahasiswa</a>";
    }
    ?>
</body>
</html>