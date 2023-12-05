<!-- script that adds workouts to LOGWORK.txt after user fills out logWork.php form.
TODO: none-->
<?php
  session_start();
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Proj Sign confirm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="toolbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>



</head>

<body>



 
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
<br><br>
<!-- If log was success, tell userand give them a list of links to use to continue interacting with the website -->
<div class="card" style="width: 50rem; margin: auto; margin-top: 100px color:051026;">
        <div class="card-body" style="color:051026;">
            <h4 class="card-title"style="text-align:center;">Success!</h4>
            <p class="card-text">Workout was created. Please click one of the links below to continue using the website. </p>
            <div style="text-align: center;">
                <a href="index.html" class="card-link">Home Page</a>
                <a href="logWork.php" class="card-link">Log Workout</a>
                <a href="search.php" class="card-link">Search</a>

             </div>
        </div>
        </div>

    
        

 

</body>
</html>