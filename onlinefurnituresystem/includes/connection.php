<?php
 $db = mysqli_connect('localhost', 'root', 'root@123') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'sugars' ) or die(mysqli_error($db));
	//mysqli_query($db, "SET SESSION sql_mode = ''");
?>
