<?php 
  

    include('header/header.php');
    include('../functions/db.php');
    include('../functions/functions.php');

 ?>
 <html>
<body>
    
<div class="product-cart-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 clearfix">
                <h2 class="section-head">My Cart</h2>
                
                                <table class="table table-bordered">
                                    <thead>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th width="120px">Product Price</th>
                                    <th width="100px">Qty.</th>
                                    <th width="100px">Sub Total</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                
                                    <tr class="item-row">
                                        <td><img src="" alt="" width="70px" /></td>
                                        <td>DF</td>
                                        <td> <span class="product-price">80</span></td>
                                        <td>
                                            <input class="form-control item-qty" type="number" value="1"/>
                                            <input type="hidden" class="item-id" value=""/>
                                            <input type="hidden" class="item-price" value=""/>
                                        </td>
                                        <td> <span class="sub-total"></span></td>
                                        <td>
                                            <a class="btn btn-sm btn-primary remove-cart-item" href="" ><i class="fa fa-remove"></i></a>
                                        </td>
                                    </tr>
                       
                                    <tr>
                                        <td colspan="5" align="right"><b>TOTAL AMOUNT ()</b></td>
                                        <td class="total-amount"></td>
                                    </tr>
                                    </tbody>
                                </table>
                                
                               

            </div>
        </div>
    </div>
</div>
</body>
</html>
