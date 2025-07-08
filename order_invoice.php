<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once 'pages/head.php' ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoive</title>
    <style>
        .body-main {
        background: #ffffff;
        border-bottom: 15px solid #1E1F23;
        border-top: 15px solid #1E1F23;
        margin-top: 30px;
        margin-bottom: 30px;
        padding: 40px 30px !important;
        position: relative ;
        box-shadow: 0 1px 21px #808080;
        font-size:10px;        
    }
    .main thead {
		background: #1E1F23;
        color: #fff;
		}
    .img{
        height: 100px;}
    h1{
       text-align: center;
    }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <div class="">
        <center>
          <a class="btn btn-lg btn-info text-capitalize border-0" onclick="window.print()" data-mdb-ripple-color="dark"><i class="far fa-file-pdf text-danger"></i>&nbsp; Print</a>
          <a class="btn btn-lg btn-info text-capitalize" data-mdb-ripple-color="dark" onclick="window.location='vieworder.php'">Back</a>
        </center>
        </div>
    <div class="container-fluid">
        <?php
            include 'admin/dbcontroller.php';
            $handle=new DBcontroller();
            // $handle->formate($_SESSION);
        ?>
        <?php
        if(isset($_GET["id"])){
            $order_id=$_GET["id"];
            $query = "select * from `order` where reg_id=(select reg_id from registration where email='" . $_SESSION['email'] . "') and order_id='$order_id' order by order_id desc";
            $row2 = $handle->fetchresult($query);
          
            $q = "select * from billing where reg_id='".$row2["reg_id"]."' order by billing_id desc limit 1";
            $result = $handle->fetchresult($q);
        ?>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 body-main">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="img" alt="Invoce Template" src="./images/phonecart_logo.png" />
                        </div>
                        <div class="col-md-4 text-center">
                            <h4 class="text-secondary">ORDER INVOICE</h4>
                        </div>
                        <div class="col-md-4 text-right">
                            <h4 style="color: #F81D2D;"><strong>Phonecart</strong></h4>
                            <p>The Online Mobile Shoping</p>
                            <p>phonecart2024@gmail.com</p>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-8">
                            <p>Name : <?php echo $result['name'] ?></p>
                            <p>Address : <?php echo $result['address'] ?></p>
                            <p>Mobile No : <?php echo $result['mobile'] ?></p>
                            <p>E-mail : <?php echo $result['email'] ?></p>
                        </div>
                        <div class="col-md-4">
                            <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <h5>ID: #<?php echo rand(11,99)?>-<?php echo rand(11111,99999)?></h5></p>
                        </div>
                    </div>
                    <?php
                        $query = "select * from `order` where reg_id=(select reg_id from registration where email='" . $_SESSION['email'] . "') and order_id='$order_id' order by order_id desc";
                        $row2 = $handle->fetchresult($query);
                          
                        $q = "select * from billing where reg_id='".$row2["reg_id"]."' order by billing_id desc limit 1";
                        $result = $handle->fetchresult($q);
                    ?>
                    <div>
                        <table class="table table-borderd">
                            <thead>
                                <tr>
                                    <th><h5>Description</h5></th>
                                    <th><h5>price</h5></th>
                                    <th><h5>Qty</h5></th>
                                    <th><h5>Amount</h5></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sum=0;
                                $query = "select `cart`.*,`order`.*,`order_item`.* from `cart`,`order`,`order_item` where `cart`.prod_id=`order_item`.prod_id and `order`.order_id='" . $row2['order_id'] . "' and `order_item`.order_id='" . $row2['order_id'] . "' and `cart`.reg_id='" . $row2['reg_id'] . "' and `cart`.cart_id=`order_item`.cart_id";
                                $res2 = $handle->fetchall($query);
                                $count = count($res2);
                                $i = 0;
                                foreach ($res2 as $row) {
                                    $order_status = $row['or_item_status'];
                                    $total=$row['prod_price'] * $row['prod_qty'];
                                    $sum+=$total;
                            ?>
                                <tr>
                                    <td class="col-md-9"><img src="./admin/img/product/convert/RC<?php echo $row['prod_image'] ?>" height="40px" width="40px">&nbsp;<?php echo $row['prod_name'] ?></td>
                                    <td><?php echo $row['prod_price']; ?></td>
                                    <td><?php echo $row['prod_qty']; ?></td>
                                    <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i><?php echo $total; ?></td>
                                </tr>
                            <?php
                                }
                            ?>
                                <tr>
                                    <td colspan="3" class="text-right">
                                        <p>
                                            <strong>Shipping:</strong>
                                        </p>
                                        <p>
                                            <strong>Total Amount: </strong>
                                        </p>
                                        <p>
                                            <!-- <strong>Discount: </strong> -->
                                        </p>
                                        <p>
                                            <strong>Payable Amount: </strong>
                                        </p>
                                    </td>
                                    <td>
                                    <p>
                                        <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> FREE </strong>
                                    </p>
                                    <p>
                                        <strong><i class="fas fa-rupee-sign" area-hidden="true"></i><?php echo $sum; ?></strong>
                                    </p>
                                    <p>
                                        <!-- <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 3,000 </strong> -->
                                    </p>
                                    <p>
                                        <strong><i class="fas fa-rupee-sign" area-hidden="true"></i><?php echo $sum; ?></strong>
                                    </p>
                                    </td>
                                </tr>
                                <tr style="color: #F81D2D;">
                                    <td></td>
                                    <td colspan="2" class="text-right"><h4><strong>Total:</strong></h4></td>
                                    <td class="text-left"><h4><strong><i class="fas fa-rupee-sign" area-hidden="true"></i><?php echo $sum; ?></strong></h4></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <div class="col-md-12">
                            <?php
                                date_default_timezone_set('Asia/Kolkata');
                                $date = date('d-M-Y');
                            ?>
                            <p><b>Date : <?php echo $date ?></b></p>
                            <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</body>
</html>