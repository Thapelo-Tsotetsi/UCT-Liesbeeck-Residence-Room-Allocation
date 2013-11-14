<?php
	require 'dbconnect.php';

	$con = mysql_connect($hostname, $username, $password) or
		die("Could not connect to mysql \n");

	mysql_query("DROP DATABASE IF EXISTS $databasename") or
		die("Could not drop the database \n".mysql_error());

	mysql_query("CREATE DATABASE IF NOT EXISTS $databasename") or
	    die("creating database failed... <br />".mysql_error());
	
	mysql_select_db("$databasename") or
		die("Could not select database \n");

        echo "Created database successfully \n";

/*
* Creating tables for LBG room allocation
*/

    mysql_query("CREATE TABLE IF NOT EXISTS $table_name_flat (
    				flat_id VARCHAR(225) NOT NULL,
    				room_number VARCHAR(255) NOT NULL,
    				additional_info VARCHAR(255),
    				student_number VARCHAR(255),
                    mobile_number VARCHAR(255),
    				PRIMARY KEY (flat_id)
    	       )") or die("Error creating tables \n".mysql_error());

    mysql_query("CREATE TABLE IF NOT EXISTS $table_name_applications (
                    flat_id_application INT(5) auto_increment NOT NULL,
                    room_number VARCHAR(10),
                    student_number VARCHAR(225),
                    mobile_number VARCHAR(255),
                    email_address VARCHAR(255),                 
                    PRIMARY KEY (flat_id_application)
               )") or die("Error creating tables \n".mysql_error());


    mysql_query("CREATE TABLE IF NOT EXISTS $table_name_members (
                    id INT(5) NOT NULL auto_increment,
                    username VARCHAR(255) NOT NULL default '',
                    password VARCHAR(255) NOT NULL default '',
                    PRIMARY KEY (id)
               )") or die("Error creating tables \n".mysql_error());    

            echo "Done creating tables \n";

    //Inserting temp db data        
    $sql = "INSERT INTO $table_name_members VALUES(1, 'thapelo', 'thapelo407')";
    mysql_query($sql) or die("Error inserting values \n".mysql_error()); 

    //    $sql = "INSERT INTO $table_name_applications VALUES(1, 'mtnnkr001', '0831234567','email@email.co.za')//";
    //mysql_query($sql) or die("Error inserting values \n".mysql_error());
/*
* Inserting sample data into db for testing.
*/

	$sql = "INSERT INTO $table_name_flat(flat_id, room_number, additional_info, student_number, mobile_number)
			VALUES
                ('101A','101A','','',''),
                ('101B','101B','','',''),
                ('102A','102A','','',''),
                ('102B','102B','','',''),
                ('103A','103A','','',''),
                ('103B','103B','','',''),
                ('103C','103C','','',''),
                ('104A','104A','','',''),
                ('104B','104B','','',''),
                ('105A','105A','','',''),

                ('105B','105B','','',''),
                ('106A','106A','','',''),
                ('106B','106B','','',''),
                ('107A','107A','','',''),
                ('107B','107B','','',''),
                ('108A','108A','','',''),
                ('108B','108B','','',''),
                ('109A','109A','','',''),
                ('109B','109B','','',''),
                ('109C','109C','','',''),

                ('110A','110A','','',''),
                ('110B','110B','','',''),
                ('111A','111A','','',''),
                ('111B','111B','','',''),
                ('111C','111C','','',''),
                ('112A','112A','','',''),
                ('112B','112B','','',''),
                ('113A','113A','','',''),
                ('113B','113B','','',''),
                ('113C','113C','','',''),

                ('114','114','','',''),
                ('115','115','','',''),
                ('116A','116A','','',''),
                ('116B','116B','','',''),
                ('116C','116C','','',''),
                ('116D','116D','','',''),
                ('117A','117A','','',''),
                ('117B','117B','','',''),
                ('117C','117C','','',''),
                ('117D','117D','','',''),

                ('118','118','','',''),
                ('119','119','','',''),
                ('120','120','','',''),
                ('121','121','','',''),
                ('122','122','','',''),
                ('123','123','','',''),
                ('124A','124A','','',''),
                ('124B','124B','','',''),
                ('125A','125A','','',''),
                ('125B','125B','','',''),

                ('126A','126A','','',''),
                ('126B','126B','','',''),
                ('127A','127A','','',''),
                ('127B','127B','','',''),
                ('128A','128A','','',''),
                ('128B','128B','','',''),
                ('129A','129A','','',''),
                ('129B','129B','','',''),
                ('130A','130A','','',''),
                ('130B','130B','','',''),

                ('131A','131A','','',''),
                ('131B','131B','','',''),
                ('132','132','','',''),
                ('133','133','','',''),
                ('134','134','','',''),
                ('135','135','','',''),
                ('136A','136A','','',''),
                ('136B','136B','','','')";	

	mysql_query($sql) or die("Error inserting values \n".mysql_error()); 
    echo "Done inserting values \n";

	mysql_close($con);
?>

