<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* CSS for navigation bar */
.topnav {
  overflow: hidden;
  padding: 4px;
}

.topnav a {
  float: left;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: rgb(173, 141, 85);
  border-radius: 4px;
  color: black;
}

.topnav a.active {
  background-color: rgb(125, 97, 47);
  border-radius: 4px;
  color: white;
}

/* CSS for search bar */
.topnav input[type=text] {
  float: left;
  padding: 6px;
  border: none;
  margin-top: 8px;
  margin-left: 16px;
  font-size: 17px;
}

/* CSS for header */
.header {
  padding: 10px;
  text-align: center;
  color: black;
  font-size: 25px;
}

/* CSS for container*/
.container {
  padding: 20px;
}

/* CSS for tables */
.container table {
  max-width: 300px;
}

/* CSS for purchase button */
input[type=submit] {
  background-color: rgb(125, 97, 47);
  color: whitesmoke;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-left: 25px;
}

/* Changes color when user hovers over purchase button */
input[type=submit]:hover {
  background-color: rgb(173, 141, 85);
}

</style>
</head>
<body style="background-color: rgb(235, 215, 181)">

<div class="topnav">
    <a href="home.html">Home</a>
    <a class="active" href="browse.php">Browse</a>
    <a href="contactme.html">Contact Me</a>
    <input type="text" placeholder="Search Paintings">
</div> 

<div class="header">
    <img src="Images/browse_title.png" alt="browse_title">
</div>

<div class="container"></div>
  <table stype="width:100%">
    <?php 
      // Gets all of the folders into an array
      $folderPath = __DIR__ . "/Images/Paintings";
      $folders = scandir($folderPath);

      // Gets the number of files
      $fi = new FilesystemIterator($folderPath, FilesystemIterator::SKIP_DOTS);
      $numFiles = iterator_count($fi);

      
      for ($n=0; $n<$numFiles; $n++) {
        $folder = $folders[$n+2];
        $painting = basename(glob('Images/Paintings/'.$folder.'/*.jpg')[0], '.jpg');
        $information = glob('Images/Paintings/'.$folder.'/*.txt');

        $price = file($information[0])[0];
        $dimensions = file($information[0])[1];

        echo '<tr>';
          echo '<form action="purchasePainting.php" method="GET">';
          echo '<td>';
            echo '<img src="Images/Paintings/'.$folder.'/'.$painting.'.jpg" alt="'.$painting.'" width=300 height=250>';
          echo '</td>';
          echo '<td>';
            echo '<label type="label" for="name" style="font-weight: bold;">Name: </label>';
            echo '<a>'.$painting.'</a>';
            echo '<br>';
            echo '<label type="label" for="price" style="font-weight: bold;">Price: </label>';
            echo '<a>'.$price.'</a>';
            echo '<br>';
            echo '<label type="label" for="dimensions" style="font-weight: bold;">Dimensions: </label>';
            echo '<a>'.$dimensions.'</a>';
          echo '</td>';
          echo '<td>';
            echo '<input type="submit" value="Purchase">';
          echo '</td>';
          echo '</form>';
        echo '</tr>';
      }
    ?>

  </table>

</div>

</body>
</html>