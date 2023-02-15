<?php 
        ob_start();
        include("adminNav.php");
        if (!($_SESSION['admin_email'] == 'nurulabrar2369@gmail.com')) {
                header("location: aDashboard.php");
        }

 ?>
 <?php 
        if (isset($_POST['adminreg'])) {
                $admin_name = $_POST['adminName'];
                $admin_email = $_POST['adminEmail'];
                $admin_pass = $_POST['adminpassword'];
                $hashpass = password_hash($admin_pass, PASSWORD_DEFAULT);
                $sql = "INSERT INTO admin(admin_name, admin_email, admin_pass) VALUES('$admin_name','$admin_email','$hashpass')";
                $sqlRun = mysqli_query($conn,$sql);
        }

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin SignUp(Restricted)</title>
</head>
<body>
        <form action="adminSignupRestrict.php" method="POST">
                <div class="form-group mt-1">
                    <input class="form-control" type="text" name="adminName" id="reguser" onfocus="this.placeholder=''" onblur="this.placeholder='Enter a username'" placeholder="Username" style="background: transparent ;color: black;  border-color: red;" required="">
                </div>
               
                <div class="form-group ">
                    
                    <input class="form-control" type="email" name="adminEmail" id="adminEmail" aria-describedby="emailHelp" onfocus="this.placeholder=''" onblur="this.placeholder='Enter email address!'" placeholder="Enter-email" required="" style="background: transparent ; color: black; border-color: red;">
                </div>
                
                <div class="form-group ">
                    <input class="form-control" type="password" name="adminpassword" id="adminpassword" onfocus="this.placeholder=''" onblur="this.placeholder='Enter correct password'" placeholder="Password" style="background: transparent ;color: black;  border-color: red;" required="">
                </div>
                <button type="submit" name="adminreg" class="btn btn-outline-danger">Register</button>
            
        </form>
</body>
</html>