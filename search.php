<!--checks if user is logged in. If they are, allows them to select what filters they would like to use to search for workouts saved in the websites database (LOGWORK.txt)
The choices for filters are by class year, alpha, or company.
TODO: none -->
<!DOCTYPE html>
<?php
  session_start();
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Proj Log</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="toolbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>



</head>

  
<?php
  if (!isset($_SESSION['username'])) {
    ?><br><br><br> 
    <!-- error message for if user is not logged in. Gices user link back to login page -->
     <div class="card" style="width: 50rem; margin: auto; margin-top: 100px color:051026;">
        <div class="card-body" style="color:051026;">
            <h4 class="card-title"style="text-align:center;">Error</h4>
            <p class="card-text" style="text-align:center;">Please login to search workouts.</p>
            <div style="text-align: center;">
                <a href="login.html" class="card-link">Login Page</a>
             </div>
        </div>
        </div>
<?php
  }
  ///if user is logged in
  else{?>
    <body>
    <!-- nav bar -->
    <div class="topnav">
        <a  href="index.html">Home</a>
        <a class="active" href="search.php">Search Workouts</a>
        <a  href="logWork.php">Log Workouts</a>  
        <a  href="login.html">Login</a>
        <a  href="signup.html">Sign up</a>
        <a href="admin.html">Admin</a>
        <a href = "logout.php"> Log out</a>

    </div>

    <div class="jumbotron" style="color: rgba(251, 213, 130, 0.789); background-color:#051026; ">
        <h1 class="display-4" style="text-align: center;">Search workouts</h1>
       
        <p style="text-align: center;">Fill out the form below to search for workouts logged by users. Fill out the fields for desired filters.</p>
      
       
        
      </div>

      <br>
        <h1 style="color:#051026; text-align: center;">Search Filters</h1>
        <br>
        <form class = "borders"  method="post" action="createSearch.php">


            <div class="form-outline mb-4">
                <input type="text" id="alpha" name = "alpha" class="form-control" />
                <label class="form-label" for="location">Alpha</label>
            </div> <br>

            
            <div class="form-outline mb-4">
                <input type="text" id="company" name="company" class="form-control" />
                <label class="form-label" for="Company">Company</label>
            </div> <br>

    
            <div class="form-outline mb-4">
            <div id ="sel">
                <select  id="type" name = "type" class="form-select" >
                    <option selected>Select Type</option>
                    <option value="run">Run</option>
                    <option value="swim">Swim</option>
                    <option value="bike">Bike</option>
                    <option value="walk">Walk</option>
                    
                </select>
             </div>
             <label for="sel">Type of Workout</label> 
            </div> <br>

        
    
        
            <!-- calls  -->
            <button onclick=refresh() class="btn btn-primary btn-block mb-4">Search</button>
  </form>
  <div id="content">

  


  </body>


 <?php }?>
 <script type="text/javascript">

 function refresh() {

    var display = document.getElementById("content");
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open("GET", "createSearch.php");

    ixmlhttp.send();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
          display.innerHTML = this.responseText;
        } else {
          display.innerHTML = "Loading...";
        };
      }
    }

  </script>