  <?php

  session_start();
  ob_start();

  require './config/dbconnect.php';
  $con = mysql_connect($hostname, $username, $password) or
    die("Could not coneect to mysql \n");

  mysql_select_db("$databasename") or
    die("Could not select database \n");

  //Username and password sent from form
  $formemailaddress = $_POST['formemailaddress'];
  $formpassword = $_POST['formpassword'];

  //To protect from Mysql Injection
  $formemailaddress = stripcslashes($formemailaddress);
  $formpassword = stripcslashes($formpassword);
  $formemailaddress = mysql_real_escape_string($formemailaddress);
  $formpassword = mysql_real_escape_string($formpassword);

  echo "$formemailaddress";
  echo "$formpassword";


  //$query = "SELECT * FROM $table_name_members WHERE username='$formemailaddress', password='$formpassword'";
  echo "before";
  $query = "SELECT username, password FROM $table_name_members WHERE username='$formemailaddress'";
  $result = mysql_query($query) or die(mysql_error());

/*
  $row = mysql_fetch_array($result);

  if($row["username"]== $formemailaddress && $row["password"]== $formpassword)
    echo "You are a validated user.";
  else
    echo "Sorry, your credential are not valid";

  echo "after";
*/

  $count = mysql_num_rows($result);

  //If result matched $username and password, table row must be 1 row
  if($count == 1){

    //Register $formemailaddress, $password and redirect to file "login_success.php"
    session_register("formemailaddress");
    //session_register("formpassword");

    echo "inside count == 1";

    header("Location: http://localhost:8095/bootstraplive/docs/lbg/login_success.php");

    //exit();
  }
  else{
    echo "Wrong Username or Password";
    header("Location: http://localhost:8095/bootstraplive/docs/lbg/login_success.php");
  }


mysql_close($con);

ob_end_flush();
?>