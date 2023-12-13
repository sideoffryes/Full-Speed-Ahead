<!-- script that adds users to websites list of current users (LOG.txt). -->
<!-- maggie kolassa 12/3 -->

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

    $errors = False;
    $errorUp = False;
    $errorLow = False;
    $errorNum = False;

    //get form values
    $first = $_POST["first"];
    $last = $_POST["last"];
    $alpha = $_POST["alpha"];
    $company = $_POST["company"];
    $year = $_POST["year"];
    $email = $_POST["email"];
    $psswd = $_POST["psswd"];
    $psswdReal = $_POST["psswd"];
    $psswdLen = strlen($psswd);
    $psswd = "*";
    



    for($x = 1; $x < $psswdLen; $x++)
    {
        $psswd .= "*" ;
    }



    //check if password is complex enough
    if(!preg_match('/[A-Z]/', $psswdReal)){
        $errors = True;
        $errorUp = True;
       }

    if(!preg_match('/[a-z]/', $psswdReal)){
        $errors = True;
        $errorLow = True;
       
    }

    if(!preg_match('/[0-9]/', $psswdReal)){
        $errors = True;
        $errorNum = True;
       }


    //if there are no form errors add user to LOG.txt
    if(!$errors) {
        //if LOG.txt does not exist, create file and set permissions
        if(!file_exists("LOG.txt")){
            
            $myfile = fopen("LOG.txt", "a");
            chmod("LOG.txt", 0777);

            //print file header 
            $header = "first name\tlast name\talpha\tcompany\tclass year\temail\tpassword \n";
            fwrite($myfile, $header);
        }
        else{
            $myfile = fopen("LOG.txt", "a");
        }

        $txt = "$first\t$last\t$alpha\t$company\t$year\t$email\t$psswdReal\t";

        $find1 = '\n';
        $find2 = '\r';
        $find3 = '<br>';
        $replace = '&&';
        $replace2 = '&&&&';
        
        //strip input of any possible html code
        $result = str_replace($find1, $replace, $txt);
        $result = str_replace($find2, $replace, $result);
        $result = str_replace($find3, $replace2, $result);
    
        //wrtie new user's information to LOG.txt
        fwrite($myfile, $result);
        fwrite($myfile,"\n");
        fclose($myfile);

        ?>
    <br><br>
        <!-- once user's information has been added, tell them that their registration was successful. Give them link to sign in. -->
        <div class="card" style="width: 50rem; margin: auto; margin-top: 100px color:051026;">
        <div class="card-body" style="color:051026;">
            <h4 class="card-title"style="text-align:center;">Success!</h4>
            <p class="card-text">Account was created. Please click the link below to login to Full Speed Ahead to continue using the website. </p>
            <div style="text-align: center;">
                <a href="login.html" class="card-link">Login Page</a>
             </div>
        </div>
        </div>

        <?php
        

    }

    else{
        //if there were issues with form inputs give them to the user and give them link to retry.
        ?>
        
        <div class="card" style="width: 18rem; margin: auto; margin-top: 100px color:051026;">
        <div class="card-body" style="color:#051026;">
            <h5 class="card-title" style="text-align:center;">ERROR</h5>
            <h6 class="card-subtitle mb-2 text-muted">Return to registration page and fix the following errors</h6>
            <?php
                if($errorLow){
                    
                    echo <<<GFG
                        <p class="card-text">Password needs at least one lowercase letter.</p>
                    GFG;
                    

                }
                if($errorUp){
                    echo <<<GFG
                        <p class="card-text">Password needs at least one uppercase letter.</p>
                    GFG;

                }
                if($errorNum){
                    echo <<<GFG
                        <p class="card-text">Password needs at least one digit.</p>
                    GFG;

                }
                ?>
            <div style="text-align:center;">
                <a href="signup.html" class="card-link" >Return to sign up page</a>
            </div>
        </div>
        </div>

        <?php
    }


?>
<br><br>


</body>
</html>