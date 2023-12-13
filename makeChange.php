<!-- Script makes changes to user accounts as specified by admin filling out admin page form -->

<!-- maggie kolassa 12/8 -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            
        <title>Make Changes</title>
        
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
</body>
</html>

<?php
    //get form values
    $pswd = $_POST["psswd"];
    $username = $_POST["email"];
    $newpswd = $_POST["Newpsswd"];

    $type = $_POST["type"];
    $FoundUser = 0;
    $first;
    $last;
    $alpha;
    $year;
    $company;

    

       
    $fp = fopen('LOG.txt', 'r');
    $lineNum = 1;
    $line = fgets($fp);          // read lines
    while( !feof($fp) ) 
    {
        $parsedRow = explode("\t", $line);

        //check if credentials match the ones for the current line. If so load variables that will be saved inorder to be rewritten to LOG.txt
        if(($parsedRow[6] == $pswd) && ($parsedRow[5] == $username)){
            $FoundUser = 1;
            $first = $parsedRow[0];
            $last = $parsedRow[1];
            $alpha = $parsedRow[2];
          
            $year = $parsedRow[4];
            $company = $parsedRow[3];
            
            
            break;
        }
        $line = fgets($fp);
        $lineNum += 1;

    }

    fclose($fp);
    if($FoundUser == 0){
        ?>
        <!-- error message for if account entered doesn't match a current user -->
            <br><br>
            <div class="card" style="width: 50rem; margin: auto; margin-top: 100px color:051026;">
            <div class="card-body" style="color:051026;">
                <h4 class="card-title"style="text-align:center;">Error</h4>
                <p class="card-text" style="text-align:center;">Incorrect password or email address entered. Click the link below to re-try. </p>
                <div style="text-align: center;">
                    <a href="adminPage.php" class="card-link">Admin Page</a>
                    </div>
            </div>
            </div>
    
        <?php
    }
    else{
        //delete line in LOG.txt associated with the account that is being changed
        $filename="LOG.txt";
        $endline = $lineNum + 1;
        exec('sed -i.bak ' . $lineNum . ',' . $lineNum . 'd ' . $filename);

       
        $lines = count(file("LOG.txt")); 
        $k = 0;
        
        //delete all empty lines for appereance
        while($k < $lines)
        {
            $empty = 0;
            $fp = fopen('LOG.txt', 'r');
            $lineNums = 1;
            $line = fgets($fp);          // read lines
            while( !feof($fp) ) 
            {
                $parsedRow = explode("\t", $line);
                if($line == "\n"){
                    $empty = 1;
                    break;
                }
                $lineNums += 1;
                $line = fgets($fp);

            }

            if($empty == 1){
                exec('sed -i.bak ' . $lineNums . ',' . $lineNums . 'd ' . $filename);
            }
            $k += 1;
        }
        
        if($type == "delete"){
            ?>
                <!-- success message for when an account is deleted -->
                <br><br>
                <div class="card" style="width: 50rem; margin: auto; margin-top: 100px color:051026;">
                <div class="card-body" style="color:051026;">
                    <h4 class="card-title"style="text-align:center;">Success!</h4>
                    <p class="card-text" style="text-align:center;">Account was deleted. Return to the admin page using the link below. </p>
                    <div style="text-align: center;">
                        <a href="adminPage.php" class="card-link">Admin Page</a>
                        </div>
                </div>
                </div>
        
            <?php
        }

        else{
            
            if($newpswd == ""){
                ?>
                <!-- Error for if admin  tries to change an account password without entering a new password -->
                <br><br>
                <div class="card" style="width: 50rem; margin: auto; margin-top: 100px color:051026;">
                <div class="card-body" style="color:051026;">
                    <h4 class="card-title"style="text-align:center;">ERROR</h4>
                    <p class="card-text" style="text-align:center;">Must enter a new password. Use link below to try again. </p>
                    <div style="text-align: center;">
                        <a href="adminPage.php" class="card-link">Admin Page</a>
                        </div>
                </div>
                </div>
        
            <?php
            }
            else{
                //if password is changed, re-write account information to LOG.txt with the new password
                $myfile = fopen("LOG.txt", "a");
                $txt = "$first\t$last\t$alpha\t$company\t$year\t$username\t$newpswd\t";
                fwrite($myfile, $txt);
                fwrite($myfile,"\n");
                fclose($myfile);

                ?>
                <br><br>
                <!-- success message for when password is changed -->
                <div class="card" style="width: 50rem; margin: auto; margin-top: 100px color:051026;">
                <div class="card-body" style="color:051026;">
                    <h4 class="card-title"style="text-align:center;">Success!</h4>
                    <p class="card-text" style="text-align:center;">Account was chagned. Return to the admin page using the link below. </p>
                    <div style="text-align: center;">
                        <a href="adminPage.php" class="card-link">Admin Page</a>
                        </div>
                </div>
                </div>
        
            <?php
            }


        }
    
    }



