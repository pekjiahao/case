<html>
<head>
  <title>Menu Price Update</title>
</head>
<body>
<h1>menu price update</h1>
<?php
  // create short variable names
    print_r($_POST);





  if (!get_magic_quotes_gpc()) {
    $drinksizeid = addslashes($drinksizeid);
    $price = doubleval($price);
  }

   $db = new mysqli('localhost', 'pekjiahao', '9343738a', 'javajam');

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }
  
  foreach ($_POST as $drinksizeid => $price) {
	   $query = "UPDATE drinksize SET price = $price WHERE drinksizeid = $drinksizeid";
           
	echo $query;
  $result = $db->query($query);

  if ($result) {
      echo  $db->affected_rows." book inserted into database.";
  } else {
  	  echo "An error has occurred.  The item was not added.";
	  echo $price;
	  echo $drinksizeid;	
  }
  }


  $db->close();
  header ('Location: menu.php');
  
?>
</body>
</html>
