<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>J2F1BELP5L2 - Content uit je database</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

	<!-- laad hier via php je header in (vanuit je includes map) -->
	<?php
		include("includes/header.php");
	?>


	<!-- Haal hier uit de URL welke pagina uit het menu is opgevraagd. Gebruik deze om de content uit de database te halen. -->

	<!-- Laat hier de content die je op hebt gehaald uit de database zien op de pagina. -->
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $dbname = "databank_php";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT id, name, description, image FROM onderwerpen";
    $result = $conn->query($sql);
    
    if ($_GET != null && $_GET != ""){
        function exceptions_error_handler($severity, $message, $filename, $lineno) {
            if (error_reporting() == 0) {
                return;
            }
            if (error_reporting() & $severity) {
                throw new ErrorException($message, 0, $severity, $filename, $lineno);
            }
            }
        set_error_handler('exceptions_error_handler');
        try{
            if ($result->num_rows > 0) {
                // output data of each row
                $name = [];
                $description = [];
                $images = [];
                while($row = $result->fetch_assoc()) {
                    array_push($name, $row["name"]);
                    array_push($description, $row["description"]);
                    array_push($images ,$row["image"]);
                }
                echo("<h1>". $name[$_GET["onderwerp"]]."</h1>");
                echo("<p>".$description[$_GET["onderwerp"]]."</p>");
                echo("<img class=InfoImage src=\"".$images[$_GET["onderwerp"]]."\">");
              } else {
                echo "0 results";
              }
        }
        catch(Exception $e){
            echo($e);
            echo("<img class=NotFoundImage src='images/404.png'>");
        }
    }
    else{
        ?>
        <h1>Home</h1>
        <p> I have no idea what to put here, so enjoy this gif of Heavy from TF2 </p>
        <img src="images/Heavy.gif">
        <?php
    }
    $conn->close();
    ?>

	<!-- laad hier via php je footer in (vanuit je includes map)-->
	<?php
		include("includes/footer.php");
	?>

</body>
</html>