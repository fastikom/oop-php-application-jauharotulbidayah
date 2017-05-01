<?php
include_once 'dbcrud.php';
$con = new connect();

if(isset($_POST['btn-save']))
{
 $first_name = $_POST['first_name'];
 $last_name = $_POST['last_name'];
 $city = $_POST['city_name'];
 $con->setdata("INSERT INTO users(first_name,last_name,user_city) VALUES('$first_name','$last_name','$city')");
 header("Location: index.php");
}

if(isset($_GET['edit_id']))
{
 $res=$con->getdata("SELECT * FROM users WHERE user_id=".$_GET['edit_id']);
 $row=mysql_fetch_array($res);
}

if(isset($_POST['btn-update']))
{
 $con->setdata("UPDATE users SET first_name='".$_POST['first_name']."',
           last_name='".$_POST['last_name']."',
           user_city='".$_POST['city_name']."'
          WHERE user_id=".$_GET['edit_id']);
 header("Location: index.php");
}

?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Mahasiswa Fastikom</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>

<div id="header">
 <div id="content">
    <label>Data Mahasiswa Fastikom</label>
    </div>
</div>
<div id="body">
 <div id="content">
    <form method="post">
    <table align="center">
    <tr>
    <td align="center"><a href="index.php">Kembali Ke Halaman Awal</a></td>
    </tr>
    <tr>
    <td><input type="text" name="first_name" placeholder="Nama Depan" value="<?php if(isset($row))echo $row['first_name']; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="last_name" placeholder="Nama Belakang" value="<?php if(isset($row))echo $row['last_name']; ?>" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="city_name" placeholder="Asal Kota" value="<?php if(isset($row))echo $row['user_city']; ?>" required /></td>
    </tr>
    <tr>
    <td>
    <?php
 if(isset($_GET['edit_id']))
 {
  ?><button type="submit" name="btn-update"><strong>UPDATE</strong></button></td><?php
 }
 else
 {
  ?><button type="submit" name="btn-save"><strong>SAVE</strong></button></td><?php
 }
 ?>
    </tr>
    </table>
    </form>
    </div>
</div>

</center>
</body>
</html>