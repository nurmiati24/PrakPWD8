<?php
    // include database connection file
    include_once("koneksi.php");
    // Check if form is submitted for user update, then redirect to homepage after update
    if(isset($_POST['update']))
        {
            $nim = $_POST['nim'];
            $namaMHS=$_POST['namaMHS'];
            $jkel=$_POST['jkel'];
            $alamat=$_POST['alamat'];
            $tgllahir=$_POST['tgllahir'];
            $jurusan = $_POST['jurusan'];
            // update user data
            $result = mysqli_query($con, "UPDATE mahasiswa SET namaMHS='$namaMHS',jkel='$jkel',alamat='$alamat',tgllahir='$tgllahir',jurusan='$jurusan' WHERE nim='$nim'");
            // Redirect to homepage to display updated user in list
            header("Location: index.php");
        }
?>
<?php
    // Display selected user data based on id
    // Getting id from url
    $nim = $_GET['nim'];
    // Fetech user data based on id
    $result = mysqli_query($con, "SELECT * FROM mahasiswa WHERE nim='$nim'");
    while($user_data = mysqli_fetch_array($result))
        {
            $nim = $user_data['nim'];
            $namaMHS = $user_data['namaMHS'];
            $jkel = $user_data['jkel'];
            $alamat = $user_data['alamat'];
            $tgllahir = $user_data['tgllahir'];
            $jurusan = $user_data['jurusan'];
        }
?>
<html>
    <head>
        <title>Edit Data Mahasiswa</title>
    </head>
    <body>
        <a href="index.php">Home</a>
        <br/><br/>
        <form name="update_mahasiswa" method="post" action="edit.php">
            <table border="0">
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="namaMHS" value=<?php echo $namaMHS;?>></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><input type="text" name="jkel" value=<?php echo $jkel;?>></td>
                </tr>
                <tr>
                    <td>alamat</td>
                    <td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
                </tr>
                <tr>
                    <td>Tgl Lahir</td>
                    <td><input type="date" name="tgllahir" value=<?php echo $tgllahir;?>></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td><input type="text" name="jurusan" value=<?php echo $jurusan;?>></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="nim" value=<?php echo $_GET['nim'];?>></td>
                    <td><input type="submit" name="update" value="Update"></td>
                </tr>
            </table>
        </form>
    </body>
</html>