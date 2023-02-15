<?php 
        include("adminNav.php");
 ?>
 <?php if (!isset($_SESSION['admin_name']))
    header("location: adminLogin.php");
 ?>
<!DOCTYPE html>
<html lang="en">
    
<body>             
    <div class="col-md-10 col-sm-9 clearfix" id="admin-content">
        <div class="admin-content-container">
            <h2 class="admin-heading">Dashboard</h2>
        <!-- <div class="row">
            <div class="col-md-12">
                            </div>
            <div class="col-md-4">
                                <div class="detail-box">
                    <span class="count"></span>
                    <span class="count-tag">Products</span>
                </div>
            </div>
            <div class="col-md-4">
                                <div class="detail-box">
                    <span class="count">7</span>
                    <span class="count-tag">Categories</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="detail-box">
                                        <span class="count">4</span>
                    <span class="count-tag">Sub Categories</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="detail-box">
                                        <span class="count">2</span>
                    <span class="count-tag">Brands</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="detail-box">
                                        <span class="count">2</span>
                    <span class="count-tag">Orders</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="detail-box">
                                        <span class="count">2</span>
                    <span class="count-tag">Users</span>
                </div>
            </div>
        </div> -->
    </div>          
                    </div>
                    <!-- Content End-->
                </div>
            </div>
        </div>
           
        
    </body>
</html>
