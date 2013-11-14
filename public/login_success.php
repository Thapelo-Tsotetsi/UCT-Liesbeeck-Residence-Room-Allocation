<?php

	session_start();
	if(!session_is_registered('formemailaddress')){
		header("Location: http://www.google.com");
		exit();
	}


?>

<html>
<head> </head>

<body>Succesfully logged in!</body>
</html>