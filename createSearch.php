<!-- Script creates a table of workouts that match the filter reuiqrements set by the user when they filled out the form on serch.html
    TODOS: none that I can think of-->

<title>Proj Create Search</title>
<head>
<meta charset="utf-8">
    <title>Proj Sign confirm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="toolbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

  <style type="text/css">
    
    th{
        background-color: #ccdbe6;
    }
  </style>
</head>

<body>
    <!-- nav bar-->
    <div class="topnav">
        <a  href="index.html">Home</a>
        <a class="active" href="search.php">Search Workouts</a>
        <a  href="logWork.php">Log Workouts</a>  
        <a  href="login.html">Login</a>
        <a  href="signup.html">Sign up</a>
        <a href = "logout.php"> Log out</a>
    </div> <br><br>

<h2 style = "text-align: center; color: #051026"> Search Results </h2>
  <table class = "table" style="margin:auto; width: 1500px;">
    
    <!-- start table -->
    <thead>
      <tr><th scope = "col">FIRST NAME</th><th scope = "col">LAST NAME</th><th scope = "col">ALPHA</th><th scope = "col">COMPANY</th><th scope = "col">CLASS YEAR</th>
          <th scope = "col">TYPE</th><th scope = "col">DURATION IN MIN</th><th scope = "col">LOCATION</th><th scope = "col">DISTANCE IN MILES</th></tr>
  </thead>
  

  <?php
    //check if type value was selected by user. if not, set it to an empty string.
    $type = $_POST['type'];
    if($type == "Select Type"){
        $type = "";
    }
    //get values of other filter fields
    $company = $_POST['company'];
    $alpha = $_POST['alpha'];

    //open LOGWORK.txt. This is the file where lopWork.php saves its form entries
    $fp = fopen('LOGWORK.txt', 'r');
    $reportArray= [];
    $tab = '/t';
    $count = 0;
    $found = 1;
    

    if (!$fp) {                   
      echo "<p>ERROR! Could not open file LOG.txt for reading.</p>";
    } 
    else 
    {
      $line = fgets($fp);          // read lines
      while( !feof($fp) ) 
      {

        //check if form variables are empty. If they are, ignore them.
        if($type !== ""){
            if(!str_contains($line, $type)){
                $found = 0;
            }

        }
        if($company !== ""){
            if(!str_contains($line, $company)){
                $found = 0;
            }

        }
        if($alpha !== ""){
            if(!str_contains($line, $alpha)){
                $found = 0;
            }

        }

        //if line meets filter requirements, save to be printed later
        if($found == 1){
        
          $parsedRow = explode("\t", $line);
          $reportArray[$count] = $parsedRow;
          $count += 1;

          }
          $line = fgets($fp);
         $found = 1;

      }
          
        
    }



    fclose($fp);  

    //sort and print results
    array_multisort((array_column($reportArray, 2)), SORT_ASC, $reportArray);  

    $k = 0;
    while($k<$count)
    {
      echo "<tr>";
      for($i= 0; $i <9; $i++){
        echo "<td>";
        echo $reportArray[$k][$i];
        echo "</td>";  
      }
      echo "</tr>";
      
      $k++;
    }

    ?>
   



  <p style="text-align:center;"> Table is sorted in ascending order by user's class year.<p>

  </table>
  <br><br>

<!-- button to return to search page -->
<div class="d-flex justify-content-center">
  <a href="search.php" class="btn btn-dark btn-lg active" role="button" aria-pressed="true" style="text-align:center">New Search</a>
</div>
</body>