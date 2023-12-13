<!-- validates login attempts from admin.php -->
<!-- maggie kolassa 12/8 -->
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
    
//get admin login form values
$pswd = $_POST["psswd"];
$username = $_POST["email"];

$FoundUser = 0;

//admin account info is stored in ADMIN.txt
$fp = fopen('ADMIN.txt', 'r');
$line = fgets($fp);          // read lines
while( !feof($fp) ) 
{
    $parsedRow = explode("\t", $line);
    echo "$parsedRow[1]";

    //check if credentials match the ones for the current line. If so load variables that will be saved in the session
    if(($parsedRow[1] == $pswd) && ($parsedRow[0] == $username)){
        $FoundUser = 1;
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
                <a href="admin.php" class="card-link">Admin login Page</a>
             </div>
        </div>
        </div>

    <?php
}
else{
    //if login attempt is successfully, redirect to adminPage.php
    header("Location: adminPage.php");

    exit();
}
?>
</html>