<!-- Script to verify users credentials 
TODO: none-->
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


<?php
    

$pswd = $_POST["psswd"];
$username = $_POST["email"];
$FoundUser = 0;
$first;
$last;
$alpha;
$year;
$company;




$fp = fopen('LOG.txt', 'r');
$line = fgets($fp);          // read lines
while( !feof($fp) ) 
{
    $parsedRow = explode("\t", $line);
    

    //check if credentials match the ones for the current line. If so load variables that will be saved in the session
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

}

fclose($fp);


//error message for incorrect login. Gives the user a link back to the login page.
if($FoundUser == 0){
    ?>
     <br><br>
     <div class="card" style="width: 50rem; margin: auto; margin-top: 100px color:051026;">
        <div class="card-body" style="color:051026;">
            <h4 class="card-title"style="text-align:center;">Error</h4>
            <p class="card-text" style="text-align:center;">Incorrect password or email address entered. Click the link below to re-try. </p>
            <div style="text-align: center;">
                <a href="login.html" class="card-link">Login Page</a>
             </div>
        </div>
        </div>

    <?php
}
else{
    //store session variables
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['first'] = $first;
    $_SESSION['last'] = $last;
    $_SESSION['alpha'] = $alpha;
    $_SESSION['year'] = $year;
    $_SESSION['company'] = $company;

    header("Location: logWork.php");
    header("Location: search.php");
    header("Location: logWork.php");
    header("Location: submitWork.php");
    header("Location: index.html");


    exit();
}
?>
</html>