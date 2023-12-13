<!-- Admin login page. 
   Passwords for admin accounts are in ADMIN.txt -->
<!-- maggie kolassa 12/3 -->
<!-- hnery frye 12/5 -->
<!-- maggie kolassa 12/8 -->


<!DOCTYPE html>
<?php session_start() ?>
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
                                <li class="nav-item"><a class="nav-link" href="signup.html">Sign Up</a></li>
                                <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                                <li class="nav-item"><a class="nav-link active" aria-current="page" href="logout.php">Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <!-- Page title -->
        <div class="container-fluid bg-dark-subtle">
            <h1 class="display-4 fw-bold text-center">Admin Login</h1>
            <p class="fs-4 text-center">Log in to view admin reports.</p>
        </div>

        <!-- check if user is already logged in -->
        <?php
        
        ?>
        <!-- Login form -->
        <div class="container">
            <form method="post" action="loginAdmin.php">
                <input type="hidden" id="loginSrc" name="loginSrc" value="admin">
                <div class="row">
                    <div class="col-6">
                        <!-- Email input -->
                        <div class="mb-3">
                            <label class="form-label" for="email">Email address</label>
                            <input type="email" id="email" name="email" class="form-control" />
                        </div>
                    </div>
                    <div class="col-6">
                        <!-- Password input -->
                        <div class="mb-3">
                            <label class="form-label" for="psswd">Password</label>
                            <input type="password" id="psswd" name="psswd" class="form-control" />
                        </div>
                    </div>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-secondary">Sign in</button>
                    <!-- Register buttons -->
                   
                </div>
            </form>
        </div>
        <?php 
        ?>
    </body>
</html>