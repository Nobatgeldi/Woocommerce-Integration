<?php
   session_start();

   header('Content-Type: text/html; charset=utf-8');

   $password_sub=$_POST["password"];
   $password=md5($password_sub);

   $user_mail=$_POST["user_mail"];
   $say=0;

    $user_mail=str_replace("'","",$user_mail);

    include("connection.php");

    //get Student data from database
    $sql = "SELECT * FROM zp_users WHERE user_mail='$user_mail' AND user_pass='$password'";
    $result = $conn->query($sql);
    if (!mysqli_query($conn,$sql))
    {
        echo("Error description: " . mysqli_error($conn));
    }
    if ($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();

        $user_email					= $row["user_email"];
        $_SESSION["user_email"]   	= $user_email;

        $user_nicname				= $row["user_nicname"];
        $_SESSION["user_nicname"]   = $user_nicname;


        $url="../products.php";
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }
	else
	{
		print '<script>alert("Email ve/veya şifre hatalı!");history.back(-1);</script>';
		exit;
	}
    mysqli_free_result($result);
	$conn->close();
?>