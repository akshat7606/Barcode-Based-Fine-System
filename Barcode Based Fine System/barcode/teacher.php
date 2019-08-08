<?php
include_once('header.php');
?>

<br><h3>Insert Teacher</h3><br><br><br>
<form action="teacher.php" method="post">
<table align="center">
<tr>
<td>ID</td><td><input type="text" name="id" /></td>
</tr>
<tr>
<td>Name</td><td><input type="text" name="name" /></td>
</tr>
<tr>
<td>Branch</td><td><select name="branch"> <option value='CSE'>CSE</option><option value='IT'>IT</option><option value='EEE'>EEE</option><option value='ETC'>ETC</option>

</select>
</td>
</tr>
<tr>
<td>Semester</td><td>
<?php
for($i=1;$i<=8;$i++)
{
echo "<input type='checkbox' name=$i value='$i'/>&nbsp;$i &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
}
?></td>
</tr>
<tr><td><input type="submit" value="Save" name="b" /></td></tr>
</table>
</form><br><br><br><br><br><br><br>
<?php
if(isset($_POST['b']))
{
$id=$_POST['id'];
$name=$_POST['name'];
$branch=$_POST['branch'];

mysql_connect('localhost','root','');
mysql_select_db('cashdigi');
$query="insert into teacher values($id,'$name','$branch')";
mysql_query($query);

for($i=1;$i<=8;$i++)
{
if(isset($_REQUEST[$i]))
{
$sem=$_REQUEST[$i];
echo $sql="insert into teacher_sem values($id,$sem)";
$rs=mysql_query($sql);
}
}


if($rs){
	echo "<h3>Inserted<h3>";
}
else{
	echo "Error";
}
}
include_once('footer.php');
?>