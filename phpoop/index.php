<?php
include_once 'dbcrud.php';
$con = new connect();

// delete condition
if(isset($_GET['delete_id']))
{
 $con->delete("DELETE FROM users WHERE user_id=".$_GET['delete_id']);
 header("Location: index.php");
}
// delete condition

?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Mahasiswa FAstikom</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<script type="text/javascript">
function edt_id(id)
{
 if(confirm('Apakah Benar akan edit ?'))
 {
  window.location.href='insert-update.php?edit_id='+id;
 }
}
function delete_id(id)
{
 if(confirm('Apakah Benar akan hapus ?'))
 {
  window.location.href='index.php?delete_id='+id;
 }
}
</script>
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
    <table align="center">
    <tr>
    <th colspan="5"><a href="insert-update.php">Tambah Data</a></th>
    </tr>
    <th>Nama Depan</th>
    <th>Nama Belakang</th>
    <th>Asal Kota</th>
    <th colspan="2">Aksi</th>
    </tr>
    <?php
$res=$con->getdata("SELECT * FROM users");
if(mysql_num_rows($res)==0)
{
 ?>
    <tr>
    <td colspan="5">Data Tidak Ada !</td>
    </tr>
    <?php
}
else
{
 while($row=mysql_fetch_array($res))
 {
  ?>
        <tr>
        <td><?php echo $row['first_name'];  ?></td>
        <td><?php echo $row['last_name'];  ?></td>
        <td><?php echo $row['user_city'];  ?></td>
        <td align="center"><a href="javascript:edt_id('<?php echo $row['user_id']; ?>')">Edit</td>
        <td align="center"><a href="javascript:delete_id('<?php echo $row['user_id']; ?>')">Hapus</a></td>
        </tr>
        <?php
 }
}
?>
    </table>
    </div>
</div>

</center>
</body>
</html>