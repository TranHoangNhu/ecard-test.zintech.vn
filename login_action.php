<?php
require('lib/db.php');
session_start();

$id = "";
$user = ""; $pass = "";
if(isset($_GET['id']))
	$id=$_GET['id'];
if(isset($_GET['username']))
	$user=$_GET['username'];
if(isset($_GET['password']))
	$pass=$_GET['password'];
//
//
if(isset($_POST['username']) && $user == "")
	$user=$_POST['username'];
if(isset($_POST['password']) && $pass == "")
	$pass=$_POST['password'];
	
	if($id !== "")
	{
		$sql="select 1 as IsDungMatKhau, a.* from tblKhachHangECard a where a.IdMaHoa like '$id'"; 
	}
	else
	{
		$sql="select PWDCOMPARE('$pass',MatKhau) as IsDungMatKhau, a.* from tblKhachHangECard a where a.Username like '$user'"; 
	}
	$rs= $conn->query($sql);
	if($rs===false)
	{
?>
		<script>
			window.onload=function(){
		alert("Đăng nhập không thành công. Vui lòng liên hệ CSKH");
			setTimeout('window.location="login.php"',0);
		}
		</script>
<?php
	}
	else
	{
	 	$r = $rs->fetch( PDO::FETCH_ASSOC );

		$r['MaKH'];	$r['TenKH']; $r['IsDungMatKhau']; $r['MaDangKy']; $r['Stt'];
		$r['MatKhauText'];
 
		if($r['IsDungMatKhau'])
		{
			$_SESSION['Stt']=$r['Stt'];
			$_SESSION['MaKH']=$r['MaKH'];
			$_SESSION['TenKH']=$r['TenKH'];
			$_SESSION['MatKhauText']=$r['MatKhauText'];

			header('location:home.php');
		}
		else
		{
?>
			<script>
				window.onload=function(){
				alert("Đăng nhập không thành công. Vui lòng liên hệ CSKH");
				setTimeout('window.location="login.php"',0);
				}
			</script>
<?php
		}
	}
?>
	
		
	