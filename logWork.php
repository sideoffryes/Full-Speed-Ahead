<!-- First checks if user is logged in. If they are presents user with a form for them to fill out to log their workout.
-->
<!-- maggie kolassa 12/3 -->
<!-- hnery frye 12/5 -->


<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            
        <title>Log a Workout</title>
        
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
                                <li class="nav-item"><a class="nav-link active" aria-current="page" href="logWork.php">Log Workouts</a></li>
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
        <?php
        if (!isset($_SESSION['username'])) {
            ?><br><br><br>
            <!-- Error message if user is not logged in. Gives user link back to login page. -->
            <div class="card" style="width: 50rem; margin: auto; margin-top: 100px color:051026;">
                <div class="card-body" style="color:051026;">
                    <h4 class="card-title"style="text-align:center;">Error</h4>
                    <p class="card-text" style="text-align:center;">Please login to record workouts.</p>
                    <div style="text-align: center;">
                        <a href="login.html" class="card-link">Login Page</a>
                    </div>
                </div>
                </div>
        <?php
        } else { ?>
        <!-- Page title -->
        <div class="container-fluid bg-dark-subtle">
            <h1 class="display-4 fw-bold text-center">Log a Workout</h1>
            <p class="fs-4 text-center">Fill out the form below to add your workout. This will help you keep track of your own workouts and will allow other users to see what you have been doing recently.</p>
        </div>

        <div class="container">
            <h2 class="display-5 fw-bold text-center">Enter Workout</h1>
            
            <!-- new bootstrap form -->
            <form method="post" action="submitLog.php">
                <div class="row">
                    <div class="col-6">
                        <!-- Workout Location -->
                        <div class="mb-3">
                            <label class="form-label" for="location">Location of Workout</label>
                            <input type="text" id="location" name = "location" class="form-control" aria-describedby="locationHelp" required/>
                            <div id="locationHelp" class="form-text">Enter the location of where you completed the workout.</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <!-- Workout Duration -->
                        <div class="mb-3">
                            <label class="form-label" for="duration">Duration in Minutes</label>
                            <input type="text" id="duration" name="duration" class="form-control" aria-describedby="durationHelp" required/>
                            <div id="durationHelp" class="form-text">Enter the duration of the workout.</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <!-- Distance -->
                        <div class="mb-3">
                            <label class="form-label" for="distance">Distance in miles</label>
                            <input type="text" id="distance" name="distance" class="form-control" aria-describedby="distanceHelp" required/>
                            <div id="distanceHelp" class="form-text">Enter the distance of the workout.</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <!-- Type -->
                        <div class="mb-3">
                            <label class="form-label" for="sel">Type of Workout</label>
                            <select  id="type" name = "type" class="form-select" aria-label="Workout type selection">
                                <option selected>Choose a workout type</option>
                                <option value="run">Run</option>
                                <option value="swim">Swim</option>
                                <option value="bike">Bike</option>
                                <option value="walk">Walk</option>
                            </select>
                            <div id="workoutHelp" class="form-text">Enter the type of the workout you completed here.</div>
                        </div>
                    </div>
                </div>
                <!-- Submit button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-secondary btn-lg">Submit</button>
                </div>
            </form>
        </div>
    </body>
    <?php } ?>
</html>