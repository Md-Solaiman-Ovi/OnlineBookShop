<html>
<?php 
    ob_start();
        include("../header/header.php");
        include("../../functions/functions.php");
        

?>

<?php 
    $showSuccess = false;
    $showExist = false;
    $showLogged = false;
    $noAccount = false;

///// Registration section//////
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $user= $_POST['reguser'];
        $email= $_POST['regemail'];
        $pass = $_POST['regpassword'];
        $hashpass = password_hash($pass, PASSWORD_DEFAULT);
        $address = $_POST['regaddress'];
        
        $checkexits = "SELECT * FROM user WHERE '$email' = uemail";
        $checksql = mysqli_query($conn, $checkexits);
        if (mysqli_num_rows($checksql)<1) {
             $sql = "INSERT INTO user (uname, uemail, upass, uaddress) 
            VALUES('$user', '$email', '$hashpass', '$address')";
            $runsql = mysqli_query($conn, $sql);
            $showSuccess = true; 
            
         } 
         else{
            $showExist = true;
         }


       }
/// Login section //////
       if (isset($_GET['logemail'])) {
            
            
            $userMail = $_GET['logemail'];
            $userPass = $_GET['logpassword'];
            $sql = "SELECT * FROM user WHERE '$userMail' = uemail";
            $sqlRun = mysqli_query($conn,$sql);
            if(mysqli_num_rows($sqlRun)==1){
                while ($row = mysqli_fetch_array($sqlRun)) {
                    // passWord varify
                    if (password_verify($userPass, $row['upass'])) {
                        $showLogged = true;
                        
                        $_SESSION['uloggedin'] = true;
                        $_SESSION['user_id'] = $row['uid'];
                        $_SESSION['username'] = $row['uname'];
                        $_SESSION['ulogginemail'] = $row['uemail'];
                        
                    }
                    else{
                        $noAccount = true;
                    }
                }
                
                
                
                
               // header("location: ../home.php");
                
            }
            else{
                $noAccount = true;
            }
        }
        else{
            echo "";
        } 
    
 ?>

<body style="background-image: url('https://images.unsplash.com/photo-1510936111840-65e151ad71bb?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=767&q=80'); overflow-x: hidden;" onload="loaders()">
    <div id="loader">
    </div>
    <?php 

    if ($showSuccess) {
        successMessage("Account Created Successfully");
    }
     

    else if ($showExist) {
        warningMessage(" Account already exists!!");
    }
    else if ($showLogged) {
        successMessage("Successfully Logged-In");
    }
    else if ($noAccount) {
        warningMessage("No account exist! Please check your email and pass!");
    }
     ?>
    
    <div class="row">
        <!--    Login form starts   -->
        <div class="container-fluid col-md-6" id="logforms" style="margin-top: 200px; ">
            <div class="container col-md-4 mb-5">
                <h4 style="color:green;" style="padding-bottom: 50px;">User Login</h4>
            </div>
            <form class="col-md-5" style="margin: auto;" action="userlogin.php" method="GET" onsubmit="return true">
                <div class="form-group mt-1">
                    <input class="form-control" type="email" name="logemail" id="loginemail" aria-describedby="emailHelp" onfocus="this.placeholder=''" onblur="this.placeholder='Enter email address!'" placeholder="Enter-email" required="" style="background: transparent ; color: white; border-color: green;">
                </div>
                <div class="form-group ">
                    <input class="form-control" type="password" name="logpassword" id="loginpass" onfocus="this.placeholder=''" onblur="this.placeholder='Enter correct password'" placeholder="Password" style="background: transparent ;color: white;border-color: green;;" required="">
                </div>
                <button type="submit" class="btn btn-outline-success">Login</button>
            </form>
        </div>
<!--   Login form ends   -->

<!--         Registration form starts   -->
        <div class="container-fluid col-md-6" id="regforms" style="margin-top: 180px; ">
            <div class="container col-md-4 mb-5">
                <h4 style="color:red;" style="padding-bottom: 50px; text-align: inline;">User Registration</h4>
            </div>
            <form class="col-md-5" style="margin: auto;" action="#" method="POST" >
                <div class="form-group mt-1">
                    <input class="form-control" type="text" name="reguser" id="reguser" onfocus="this.placeholder=''" onblur="this.placeholder='Enter a username'" placeholder="Username" style="background: transparent ;color: white;  border-color: red;" required="">
                </div>
               
                <div class="form-group ">
                    
                    <input class="form-control" type="email" name="regemail" id="regemail" aria-describedby="emailHelp" onfocus="this.placeholder=''" onblur="this.placeholder='Enter email address!'" placeholder="Enter-email" required="" style="background: transparent ; color: white; border-color: red;">
                </div>
                <div class="form-group ">
                    <textarea class="form-control" name="regaddress" id="regaddress"  onfocus="this.placeholder=''" onblur="this.placeholder='Enter your correct address!'" placeholder="Enter-your address" required="" style="background: transparent ; color: white; border-color: red;"></textarea>
                   
                </div>
                <div class="form-group ">
                    <input class="form-control" type="password" name="regpassword" id="regpassword" onfocus="this.placeholder=''" onblur="this.placeholder='Enter correct password'" placeholder="Password" style="background: transparent ;color: white;  border-color: red;" required="">
                </div>
                <button type="submit" class="btn btn-outline-danger">Register</button>
            </form>
        </div>
<!--         Registration form Ends   -->
    </div>
    <script>
    
    var preloader = document.getElementById('loader');
    function loaders (){
        preloader.style.display = 'none';
    }
    </script>
    
</body>

</html>
<?php 
    ob_end_flush();
 ?>
