// PHP priceUpdate.php
<!DOCTYPE html>
<html>
<head>
    <title>JavaJam - Price Update</title>
    <link rel="stylesheet" href="styles.css">
    <script type="text/javascript" src="updateMenuPrice.js"></script>

</head>
<body>
<div id="wrapper">

    <?php include 'sideMenu.php' ?>


    <div id="rightcolumn">
        <h2>Coffee at JavaJam</h2>
        <table id="mtable">

            <?php
            $db = new mysqli('localhost', 'f36ee', 'f36ee', 'f36ee');

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
                $drink_size_query = "select * from drink_sizes where drinkId={$row_data['drinkId']}";
                $drink_size_result = $db->query($drink_size_query);
                $num_drink_sizes = $drink_size_result->num_rows;
                for ($j = 0; $j < $num_drink_sizes; $j++) {
                    $drink_size_data = $drink_size_result->fetch_assoc();
                    array_push($drink_options, $drink_size_data);
                }
                $drink_size_result->free_result();


                echo '<tr><td><div id='.$row_data['divId'].'Button><input onclick=\'changePrice("';
                echo $row_data['divId'];
                echo '",' . json_encode($drink_options) . ')\' type="checkbox"/></div></td><td><strong><center>';
                echo $row_data['name'];
                echo '</center></strong></td><td>';
                echo $row_data['note'];
                echo '</br><div id=';
                echo $row_data['divId'];
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
        </br>


    </div>

    <?php include 'footer.php' ?>

</div>
</body>
</html>