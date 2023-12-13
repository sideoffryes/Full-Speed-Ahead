<!-- Script creates a table of workouts that match the filter reuiqrements set by the user when they filled out the form on serch.html
    TODOS: none that I can think of-->
<!-- maggie kolassa 12/3 -->
<!-- henry frye 12/5 -->


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            
        <title>Search Results</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
    </head>

  <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-sm bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Full Speed Ahead</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                            
                        <!-- Workouts drop down menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Workouts</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="search.php">Search Workouts</a></li>
                                <li class="nav-item"><a class="nav-link" href="logWork.php">Log Workouts</a></li>
                            </ul>
                        </li>

                        <!-- Link to admin page -->
                        <li class="nav-item"><a class="nav-link" href="admin.php">Admin Page</a></li>

                        <!-- Link to about us page -->
                        <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li>

                        <!-- Account drop down menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="signup.html">Sign Up</a></li>
                                <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                                <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page title -->
        <div class="container-fluid bg-dark-subtle">
            <h1 class="display-4 fw-bold text-center">Search Results</h1>
            <p class="fs-4 text-center">Table is sorted in ascending order by user's class year.</p>
        </div>

        <div class="container-fluid">
            <table class = "table table-striped table-hover table-sm text-center">
            
                <!-- start table -->
                <thead>
                    <tr>
                        <th scope = "col">FIRST NAME</th>
                        <th scope = "col">LAST NAME</th>
                        <th scope = "col">ALPHA</th>
                        <th scope = "col">COMPANY</th>
                        <th scope = "col">CLASS YEAR</th>
                        <th scope = "col">TYPE</th>
                        <th scope = "col">DURATION IN MIN</th>
                        <th scope = "col">LOCATION</th>
                        <th scope = "col">DISTANCE IN MILES</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    //check if type value was selected by user. if not, set it to an empty string.
                    $type = $_POST['type'];
                    if($type == "Choose a workout type"){
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
                    } else {
                        $line = fgets($fp);          // read lines
                        while( !feof($fp) ) {
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
                    while($k<$count) {
                        echo "<tr>";
                        for($i= 0; $i <9; $i++){
                        echo "<td>";
                        echo $reportArray[$k][$i];
                        echo "</td>";  
                        }
                        echo "</tr>";
                        
                        $k++;
                    } ?>
                </tbody>    
            </table>
        </div>

        <!-- button to return to search page -->
        <div class="d-grid gap-2 col-6 mx-auto">
            <a href="search.php" class="btn btn-secondary btn-lg" role="button" aria-pressed="false">New Search</a>
        </div>

    </body>
</html>