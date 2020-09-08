 <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style1.css">
		<title>VideoShot</title>
	</head>
	<body>
		<div class="head">
			<div class="container">
				<div class="logo">
					<a href="index.htm"><img src="img/logo2.png" width="75" height="75" alt="logo"></a>
					<h1>вход</h1>
				</div>

					<ul class="menu">
						<li><a href="камеры.html">камеры</a></li>
						<li><a href="контакты.html">контакты</a></li>
						<li><a href="news.php">новости</a></li>
						<li><a href="reg.php">войти</a></li>
					</ul>
			</div>
		</div>

		<div class="clear"></div>

		<div class="body">
			<div class="container">
				<div >
				<h2>Администратор</h2>
				<table>
				<?php
$user = "root";
$pass = "";
$host_name = "localhost";
$database_name = "test";
$asd = mysqli_connect($host_name, $user, $pass) or die( "?????????? ???????????? ? MySQL.");
mysqli_select_db($asd, $database_name) or die(mysql_error());
$asd->set_charset("utf8");
$query = mysqli_query($asd, "select * from user");
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);


foreach ($result as $row){
echo "<tr><form action='' method='post'><td><input type=hidden value=".$row['id']." name = 'id'></td>";
echo "<td><textarea class='news' name='login'>".$row['login']."</textarea></td>";
echo "<td><textarea class='news' name='pass'>".$row['pass']."</textarea></td>";
echo "<td><input type='submit' name='update' value='Изменить'></td>";
echo "<td><input type='submit' name='submit' value='Удалить'></td></tr></form>";
if(isset($_POST['submit'])){
	mysqli_query($asd, "delete from user where `id` = '".$_POST['id']."'");
	header("Refresh:0");
}
else if (isset($_POST['update'])){
	mysqli_query($asd, "update user set `login` = '".$_POST['login']."', `pass` = '".$_POST['pass']."' where `id` = '".$_POST['id']."'");
	header("Refresh:0");
}
}
echo "<tr><form action='' method='post'><td><input type=hidden value='' name = 'id'></td>";
echo "<td><textarea class='news' name='login'></textarea></td>";
echo "<td><textarea class='news' name='pass'></textarea></td>";
echo "<td><input type='submit' name='add' value='Добавить'></td></tr></form>";
if(isset($_POST['add'])){
	mysqli_query($asd, "insert into user (login,pass) values ('".$_POST['login']."','".$_POST['pass']."')");
	header("Refresh:0");
}
mysqli_close($asd);
?>
</table>
    
    
				</div>			
			</div>
		</div>
		
		<div>
			<p></p>
		</div>
		
		
	</body>
</html>