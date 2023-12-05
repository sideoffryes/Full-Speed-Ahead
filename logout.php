<!-- script that logs user out. Link to this is found in nav bar. If user is not logged in they are given an error message. 
TODO: none -->
<!DOCTYPE html>
<html lang="en">
    <?php session_start(); ?>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            
        <title>Logout</title>
        
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
                        <li class="nav-item"><a class="nav-link" href="admin.html">Admin Page</a></li>

                        <!-- Account drop down menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="signup.html">Sign Up</a></li>
                                <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                                <li class="nav-item"><a class="nav-link active" aria-current="page" href="logout.php">Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <?php if (!isset($_SESSION['username'])) { ?>
                <!-- error message. gives user links to home parge and login page -->
                <h1 class="display-4 fw-bold text-center">Error</h1>
                <p class="fs-4 text-center">You cannot logout if you are not already not logged in.</p>

                <div class="text-center">
                    <a href="index.html" class="btn btn-secondary btn-lg" role="button" aria-pressed="false">Home</a>
                    <a href="login.html" class="btn btn-secondary btn-lg" role="button" aria-pressed="false">Login</a>
                </div>
                    
            <?php
                } else {
                    //if user is logged in, unset all session variables
                    unset($_SESSION['username']);
                    unset($_SESSION['first']);
                    unset($_SESSION['last']);
                    unset($_SESSION['alpha']);
                    unset($_SESSION['year']);
                    unset($_SESSION['company']);
            ?>

            <h1 class="display-4 fw-bold text-center">Successfully logged out.</h1>

            <div class="text-center">
                <a href="index.html" class="btn btn-secondary btn-lg" role="button" aria-pressed="false">Home</a>
                <a href="login.html" class="btn btn-secondary btn-lg" role="button" aria-pressed="false">Login</a>
            </div>
        </div>
        <?php } ?>
    </body>                
</html>