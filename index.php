<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM siswa ORDER BY nim DESC");
?>

<html>
<head>    
    <title>Beranda</title>
</head>

<body>
<a href="add.php">Menambahkan Mahasiswa Baru</a><br/><br/>

    <table width='80%' border=1>

    <tr>
        <th>NIM</th> <th>Nama</th> <th>Jurusan</th> <th>Email</th> <th>Update</th>
    </tr>
    <?php  
    while($siswa_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$siswa_data['nim']."</td>";
        echo "<td>".$siswa_data['nama']."</td>";
        echo "<td>".$siswa_data['jurusan']."</td>";
        echo "<td>".$siswa_data['email']."</td>";    
        echo "<td><a href='edit.php?id=$siswa_data[nim]'>Edit</a> | <a href='delete.php?id=$siswa_data[nim]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>