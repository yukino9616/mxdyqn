<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link href="../css/shoplist.css" rel="stylesheet" type="text/css">
<title>Pink Unicorn</title>
</head>
<body>

<h4><img src="../images/ribbonn.png" alt="" width="1000" height="250"></h4>
<h1><img src="../images/IMG_3570.jpg" alt="" width="250" height="180"></h1>
<h2><img src="../images/IMG_1212-1.JPG" alt="" width="1100" height="820"></h2>
<br/>

<?php 
session_start();
session_regenerate_id(true);
if(isset($_SESSION['member_login'])==false)
{
	
	print '<section>';
	print '<table cellpadding="10" cellspacing="80" align="center">';
	print '<th><a href="member_login.html"><img src="../images/IMG_2679.PNG" alt="" width="250" height="250"></a></th>';

}
else 
{
	print '<div>';
	print $_SESSION['member_oname'];
	print '様 ログイン中</div>';
	print '<table cellpadding="10" cellspacing="80" align="center">';
	print '<th><a href="member_logout.php"><img src="../images/IMG_2690.PNG" alt="" width="250" height="250"></a></th>';
	print '<br/>';
}

print '<th><a href="shop_cartlook.php"><img src="../images/IMG_2681.PNG" alt="" width="250" height="250"></a></th>';
print '<th><a href="about_pu.php"><img src="../images/IMG_2680.PNG" alt="" width="250" height="250"></a></th>';
print  '</table>';
print  '</section>';

?>

<?php 

try
{

	$dsn ='mysql:dbname=yukino;host=localhost;charset=utf8';
	$user='root';
	$password='root';
	$dbh = new PDO($dsn,$user,$password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
	$sql='SELECT code,name,price,gazou FROM ykn_outfit WHERE 1';
	$stmt=$dbh->prepare($sql);
	$stmt->execute();
	
	$dbh=null;
	
	print '<h3>Outfits List</h3><br/><br/>';
	
while(true)
{
	$rec=$stmt->fetch(PDO::FETCH_ASSOC);
	if($rec==false)
	{
		break;
	}
	print '<p><a href="shop_outfit.php?outcode='.$rec['code'].'">';
	print $rec['name'];
	print '<br/>';
	print '<img src="../outfit/gazou/'.$rec['gazou'].'"  width="650" height="650"></p>';
	print '</a>';
	
	print '<br/>';
	print '<br/>';
	print '<br/>';
	
}


}
catch (Exception $e)
{
	
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}
?>
  <p><a href="">❥❥Page Top</a></p>

</body>
</html>
