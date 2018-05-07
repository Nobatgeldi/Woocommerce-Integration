<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Şifre Gönderme</title>
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="">
		<meta name="description" content="">
		<!-- animate css -->
		<link href="../../css/animate.min.css" rel="stylesheet" type="text/css">
		<!-- bootstrap css -->
		<link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<!-- font-awesome -->
		<link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- google font -->
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700,800' rel='stylesheet' type='text/css'>
		<!-- custom css -->
		<link href="../../css/templatemo-style.css" rel="stylesheet" type="text/css">
		<style type="text/css">
		body,td,th 
		{
			font-family: Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
		}
        </style>
	</head>
<?php
	
	$password_sub=$_POST["password"];
	$password=md5($password_sub);

	$email		=$_POST["email"];
	$email		=str_replace("'","",$email);
	
	$Name		=$_POST["Name"];
	$Type		=$_POST["type"];
	$Surname	=$_POST["Surname"];
	$Address	=$_POST["address"];
    $Tel	    =$_POST["Tel"];
	$Il			=$_POST["il"];
	$Country	=$_POST["country"];
    $Departmant	=$_POST["bolum"];
    $Company_Name =$_POST["Company_Name"];
    include("connection.php");
	
	$sql = "INSERT INTO Users (username, password, type) VALUES ('$email', '$password', $Type)";
	$result = $conn->query($sql);
	
	$sql = "SELECT ID FROM Users WHERE username='$email' and password='$password'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) 
	{
		$row = $result->fetch_assoc();
		$ID = $row["ID"];
		if ($Type != 1)
		{
            include("connection _student.php");
            $sql = "INSERT INTO students (ID, Name, Surname, Tel, Departmant) VALUES ('$ID', '$Name', '$Surname', '$Tel', $Departmant)";
			$result = $conn->query($sql);
            $sql = "INSERT INTO networks (ID, tel, email) VALUES ('$ID', '$Tel', '$email')";
            $result = $conn->query($sql);
            $sql = "INSERT INTO lise (ID) VALUES ('$ID')";
            $result = $conn->query($sql);
            $sql = "INSERT INTO universite (ID) VALUES ('$ID')";
            $result = $conn->query($sql);
            $sql = "INSERT INTO personal_info (ID) VALUES ('$ID')";
            $result = $conn->query($sql);

			echo $Type;
		}
		else
		{
            include("connection_company.php");
			echo "no insert to student";
		}
		?>
		<div class="jumbotron">
			<p align="center" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size: 36px; color: #00D3FF;">KAYIT İŞLEMİNİZ BAŞARIYLA TAMAMLANMIŞTIR.</p>

			<p align="center"><img src="../../css/default.gif"/></p>
		</div>
		<?php
		header( "refresh:3;url=../login/" );
	}
	$conn->close();

?>
		<script src="../../js/jquery.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
		<script src="../../js/wow.min.js"></script>
		<script src="../../js/jquery.singlePageNav.min.js"></script>
		<script src="../../js/custom.js"></script>
	</body>
</html>