<!--checks if user is logged in. If they are, allows them to select what filters they would like to use to search for workouts saved in the websites database (LOGWORK.txt)
The choices for filters are by class year, alpha, or company.
TODO: none -->
<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            
        <title>New Search</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
    </head>

  
    <?php
    if (!isset($_SESSION['username'])) {
        ?><br><br><br> 
        <!-- error message for if user is not logged in. Gices user link back to login page -->
        <div class="card" style="width: 50rem; margin: auto; margin-top: 100px color:051026;">
            <div class="card-body" style="color:051026;">
                <h4 class="card-title"style="text-align:center;">Error</h4>
                <p class="card-text" style="text-align:center;">Please login to search workouts.</p>
                <div style="text-align: center;">
                    <a href="login.html" class="card-link">Login Page</a>
                </div>
            </div>
        </div>
    <?php
    }else{?>
    <!-- if user is logged in -->
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
                                <li class="nav-item"><a class="nav-link active" aria-current="page" href="search.php">Search Workouts</a></li>
                                <li class="nav-item"><a class="nav-link" href="logWork.php">Log Workouts</a></li>
                            </ul>
                        </li>

                        <!-- Link to admin page -->
                        <li class="nav-item"><a class="nav-link" href="admin.html">Admin Page</a></li>

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
                <h1 class="display-4 fw-bold text-center">Search Workouts</h1>
                <p class="fs-4 text-center">Fill out the form below to search for workouts logged by users. Fill out the fields for desired filters.</p>
        </div>
        
        <div class="container-fluid">        
            <h2 class="display-5 fw-bold text-center">Search Filters</h1>

            <!-- new bootstrap form -->
            <form method="post" action="createSearch.php">
                <!-- Alpha input field -->
                <div class="mb-3">
                    <label for="alpha" class="form-label">Alpha</label>
                    <input type="text" class="form-control" id="alpha" aria-describedby="alphaHelp" name="alpha">
                    <div id="alphaHelp" class="form-text">Enter your Midshipman Alpha number here.</div>
                </div>
                
                <!-- Company input field -->
                <div class="mb-3">
                    <label for="company" class="form-label">Company</label>
                    <input type="text" class="form-control" id="company" aria-describedby="companyHelp" name="company">
                    <div id="companyHelp" class="form-text">Enter your company number here.</div>
                </div>
                
                <!-- Workout select field -->
                <div class="mb-3">
                    <label for="workout" class="form-label">Workout Type</label>
                    <select class="form-select" aria-label="Workout selection" id="type" name="type">
                        <option selected>Choose a workout type</option>
                        <option value="run">Run</option>
                        <option value="swim">Swim</option>
                        <option value="bike">Bike</option>
                        <option value="walk">Walk</option>
                    </select>
                    <div id="workoutHelp" class="form-text">Enter the type of workout you completed here.</div>
                </div>
                <button onclick=refresh() class="btn btn-primary btn-block mb-4">Search</button>
            </form>
        </div>
    </body>

 <?php }?>
 <script type="text/javascript">

 function refresh() {

    var display = document.getElementById("content");
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open("GET", "createSearch.php");

    ixmlhttp.send();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
          display.innerHTML = this.responseText;
        } else {
          display.innerHTML = "Loading...";
        };
      }
    }

  </script>