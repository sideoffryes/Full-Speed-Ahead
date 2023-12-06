<!-- script that adds workouts to LOGWORK.txt after user fills out logWork.php form.
TODO: none-->

<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            
        <title>Log Success!</title>
        
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
                        <li class="nav-item"><a class="nav-link" href="admin.html">Admin Page</a></li>

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
            //load session variables that will be stored with workout to keep track of which user logged which workout
            $first = $_SESSION["first"];
            $last = $_SESSION["last"];
            $alpha = $_SESSION["alpha"];
            $company = $_SESSION["company"];
            $year = $_SESSION["year"];

            //load form values
            $dur = $_POST["duration"];
            $location = $_POST["location"];
            $dist = $_POST["distance"];
            $type = $_POST["type"];

            //if no workouts have been logged yet, create LOGWORK.txt and set permissions
            if(!file_exists("LOGWORK.txt")){
                
                $myfile = fopen("LOGWORK.txt", "a");
                chmod("LOGWORK.txt", 0777);

                $header = "first name\tlast name\talpha\tcompany\tclass year\ttype\tduration\tlocation\tdistance\n";
                fwrite($myfile, $header);
            }
            //if LOGWORK.txt exists, open file
            else{
                $myfile = fopen("LOGWORK.txt", "a");
            }
            $txt = "$first\t$last\t$alpha\t$company\t$year\t$type\t$dur\t$location\t$dist\t";

            //scrub form input of html code
            $find1 = '\n';
            $find2 = '\r';
            $find3 = '<br>';
            $replace = '&&';
            $replace2 = '&&&&';
            
            $result = str_replace($find1, $replace, $txt);
            $result = str_replace($find2, $replace, $result);
            $result = str_replace($find3, $replace2, $result);
        
            //write workout information to log
            fwrite($myfile, $result);
            fwrite($myfile,"\n");
            fclose($myfile);
        ?>
        <!-- If log was success, tell userand give them a list of links to use to continue interacting with the website -->
        <div class="container-fluid">
            <h1 class="display-4 fw-bold text-center">Success!</h1>
            <p class="fs-4 text-center">Workout was created. Please click one of the links below to continue using the website.</p>

            <div class="text-center">
                <a href="index.html" class="btn btn-secondary btn-lg" role="button" aria-pressed="false">Home</a>
                <a href="logWork.php" class="btn btn-secondary btn-lg" role="button" aria-pressed="false">Log Another Workout</a>
                <a href="search.php" class="btn btn-secondary btn-lg" role="button" aria-pressed="false">Start a New Search</a>
            </div>
        </div>
    </body>
</html>