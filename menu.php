
<!DOCTYPE html>
<html>
<head>
    <title>JavaJam - Price Update</title>
    <link rel="stylesheet" href="styles.css">
    <script type="text/javascript" src="menuUpdate.js"></script>

</head>
<body>
<div id="wrapper">
	   <header>
            <center><img src="javalogo.jpg" maxwidth="500" alt="Cofdfe"></center>
        </header>


        <div id="leftcolumn">

            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="music.html">Music</a></li>
                <li><a href="jobs.html">Jobs</a></li>
            </ul>


        </div>
    <?php //include 'sideMenu.php' ?>


    <div id="rightcolumn">
        <h2>Coffee at JavaJam</h2>
        
		<form action="menuUpdate.php" method="post">
			<table id="mtable">

				<?php
				$db = new mysqli('localhost', 'pekjiahao', '9343738a', 'javajam');

				if (mysqli_connect_errno()) {
					echo 'Error: Could not connect to database.  Please try again later.';
					exit;
				}

				$query = "select * from drinks";
				$result = $db->query($query);
				$num_results = $result->num_rows;

				//create number of rows according to number of items in database
				for ($i = 0; $i < $num_results; $i++) {
					$row_data = $result->fetch_assoc();
					$drink_options = array();

					//Create number of drink options according to the number of drink sizes
					$drink_size_query = "select * from drinksize where drinkid={$row_data['drinkid']}";
					$drink_size_result = $db->query($drink_size_query);
					$num_drink_sizes = $drink_size_result->num_rows;
					for ($j = 0; $j < $num_drink_sizes; $j++) {
						$drink_size_data = $drink_size_result->fetch_assoc();
						array_push($drink_options, $drink_size_data);
					}
					$drink_size_result->free_result();


					echo '<tr><td><div id='.$row_data['divtag'].'Button><input onclick=\'changePrice("';
					echo $row_data['divtag'];
					echo '",' . json_encode($drink_options) . ')\' type="checkbox"/></div></td><td><strong><center>';
					echo $row_data['name'];
					echo '</center></strong></td><td>';
					echo $row_data['note'];
					echo '</br><div id=';
					echo $row_data['divtag'];
					echo '>';

					for ($j = 0; $j < $num_drink_sizes; $j++) {
						$drink_size_data = array_shift($drink_options);
						echo $drink_size_data['name'];
						echo ' $';
						echo $drink_size_data['price'];
						echo '   ';
						array_push($drink_options, $drink_size_data);
					}
					
					echo '</div></td></tr>';

				}
				$result->free_result();

				?>

			</table>
		</form>
        </br>


    </div>

    <footer>
        <small><i>Copyright &copy; 2018 JavaJam Coffee House
            </i></small><br>
        <small><i>jiahao@pek.com</a></i></small>
    </footer>

</div>
</body>
</html>