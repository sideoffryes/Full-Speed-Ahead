<!-- script that loggs user out. Link to this is found in nav bar. If user is not logged in they are given an error message. 
TODO: none -->
<html>
<?php
    session_start(); ?>

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
//error message. gives user links to home parge and login page
    if (!isset($_SESSION['username'])) {
        ?><br><br><br>
        <div class="card" style="width: 50rem; margin: auto; margin-top: 100px color:051026;">
            <div class="card-body" style="color:051026;">
                <h4 class="card-title"style="text-align:center;">Error</h4>
                <p class="card-text" style="text-align:center;">Cannot Logout when you are not already not logged in.</p>
                <div style="text-align: center;">
                    <a href="index.html" class="card-link">Home Page</a>

                    <a href="login.html" class="card-link">Login Page</a>
                </div>
            </div>
            </div>
    
        
<?php
    }
    //if user is logged in, unset all session variables
    else{
        unset($_SESSION['username']);
        unset($_SESSION['first']);
        unset($_SESSION['last']);
        unset($_SESSION['alpha']);
        unset($_SESSION['year']);
        unset($_SESSION['company']);
    

?>
<br><br>

<div class="card" style="width: 50rem; margin: auto; margin-top: 100px color:051026;">
            <div class="card-body" style="color:051026;">
                <p class="card-text" style="text-align:center;">Successfully logged out.</p>
                <div style="text-align: center;">
                    <a href="index.html" class="card-link">Home Page</a>
                    <a href="login.html" class="card-link">Login Page</a>
                </div>
            </div>
            </div>

<?php } ?>
    
</html>