<!-- page allows site admins to see a full list of the current users and to either 
change accounts passwords or delete accounts all together -->
<!-- maggie kolassa 12/3 -->
<!-- hnery frye 12/5 -->
<!-- maggie kolassa 12/8 -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            
        <title>Admin Page</title>
        
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
                                <li class="nav-item"><a class="nav-link active" aria-current="page" href="signup.html">Sign Up</a></li>
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
            <h1 class="display-4 fw-bold text-center">Admin Page</h1>
            <p class="fs-4 text-center">Make changes to user accounts. </p>
            <p class="fs-4 text-center">Scroll down to see a complete list of current accounts. </p>
        </div>
        <div class="container">
        <!-- form -->
            <form method="post" action="makeChange.php">
                    <input type="hidden" id="loginSrc" name="loginSrc" value="loginPage">
                    <div class="row">
                        <div class="col-6">
                            <!-- Email input -->
                            <div class="mb-3">
                                <label class="form-label" for="email">Account Email address</label>
                                <input type="email" id="email" name="email" class="form-control" aria-describedby="emailHelp"/>
                                <div id="emailHelp" class="form-text">Enter the email address associated with account you want to change.</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <!-- Password input -->
                            <div class="mb-3">
                                <label class="form-label" for="psswd">Account Password</label>
                                <input type="password" id="psswd" name="psswd" class="form-control" aria-describedby="passwordHelp" />
                                <div id="passwordHelp" class="form-text">Enter the password associated with account you want to change.</div>
                            </div>
                        </div>
                    </div>
                <div class = "row">
                    <div class="col-6">
                        <!-- change select field -->
                        <div class="mb-3">
                            <label for="workout" class="form-label">Action Type</label>
                            <select class="form-select" aria-label="Workout selection" id="type" name="type">
                                <option value="delete">Delete account</option>
                                <option value="change">Change account's password</option>
                            </select>
                            <div id="workoutHelp" class="form-text">Choose what action you would like to take on user's account.</div>

                        </div>          
                    </div>
                    <!-- new password -->
                    <div class="col-6">
                        <div class="mb-3">
                                <label class="form-label" for="Newpsswd">New Password</label>
                                <input type="password" id="Newpsswd" name="Newpsswd" class="form-control" aria-describedby="passwordHelp" />
                                <div id="passwordHelp" class="form-text">If changing password, enter new password.</div>
                        </div>
                    </div> 
                </div>
                <!-- submit button -->
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4 text-center">
                        <button type="submit" class="btn btn-secondary">Submit</button>
                    </div>
                    <div class="col-4"></div>
                </div>
                </div>
            </form>
<br><br>
<!-- print table of current users -->
<h3 style="text-align: center";> All Current Accounts</h3>
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
                        <th scope = "col">EMAIL</th>
                        <th scope = "col">PASSWORD</th>
                       
                    </tr>

                </thead>
                <tbody class="table-group-divider"></tbody>

                <?php

                    //open LOGWORK.txt. 
                    $fp = fopen('LOG.txt', 'r');
                    $reportArray= [];
                    $tab = '/t';
                    $count = 0;
                    $found = 1;
                    

                    if (!$fp) {                   
                        echo "<p>ERROR! Could not open file LOG.txt for reading.</p>";
                    } else {
                        $line = fgets($fp); 
                        if($count == 0){
                            $line = fgets($fp);
                            $count += 1;
                        }         // read lines
                        while( !feof($fp) ) {
                       
                        
                            $parsedRow = explode("\t", $line);
                            $reportArray[$count] = $parsedRow;
                            $count += 1;
                        $line = fgets($fp);
                        }
                    }

                    fclose($fp);  

                    //print results

                    $k = 0;
                    while($k<$count) {
                        echo "<tr>";
                        for($i= 0; $i <7; $i++){
                        echo "<td>";
                        echo $reportArray[$k][$i];
                        echo "</td>";  
                        }
                        echo "</tr>";
                        
                        $k++;
                    } ?>
               
        </table>
        </div>
     

        
            
            </body>
</html>