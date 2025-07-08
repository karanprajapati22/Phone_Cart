<body style="background-image: url('./images/phonecart_logo.png'); background-size:cover;"></body>
<?php
session_start();
include_once  'admin/dbcontroller.php';
$handle = new DBcontroller();
// $handle->formate($_POST);
if(isset($_POST['insertbilling'])) {
    $fname=$handle->secure($_POST['f_name']);
    $lname=$handle->secure($_POST['l_name']);
    $home=$handle->secure($_POST['society']);
    $street=$handle->secure($_POST['street']);
    $landmark=$handle->secure($_POST['landmark']);
    $city=$handle->secure($_POST['city']);
    $pin=$handle->secure($_POST['pin']);
    $mob=$handle->secure($_POST['mob']);
    $email=$_SESSION['email'];
    $name=$fname.' '.$lname;
    $address=$home.', '.$street.', '.$landmark.', '.$city.', '.$pin;
    
    $res = $_SESSION['cart'];
    $total_amount=0;
    foreach ($res as $row) {
        $total_amount = $total_amount + ($row['prod_price'] * $row['prod_qty']);
        // $registration_id = $row['reg_id'];
    }
    $paise=$total_amount*100;


    $query="select * from registration where `email`='$email'";
    $fetch=$handle->fetchresult($query);
    $reg=$fetch['reg_id'];

    if($_POST['payment'] == 'cod'){
        $query2="INSERT INTO `billing`(`name`, `address`, `city`, `pincode`, `mobile`, `email`, `reg_id`) VALUES ('$name','$address','$city','$pin','$mob','$email','$reg')";
        $result=$handle->executequery($query2);

        if($result){
            header('location:order.php');
        }
    }elseif($_POST['payment'] == 'pay'){

        ?>
            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
            <script>
                    var options = {
                        "key": "rzp_test_W0CW3EJKobiaS2", // Enter the Key ID generated from the Dashboard
                        "amount": "<?php echo $paise; ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        "currency": "INR",
                        "name": "Phonecart", //your business name
                        "description": "Order Payment Transaction",
                        "image": "./images/phonecart_logo.png",
                        // "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                        "callback_url": "http://localhost/phonecart/insertorder.php?type=online/",
                        "prefill": {
                            "name": "<?php echo $name ?>", //your customer's name
                            "email": "<?php echo $email ?>",
                            "contact": "<?php echo $mob ?>"
                        },
                        "notes": {
                            "address": "Razorpay Corporate Office"
                        },
                        "theme": {
                            "color": "#3399cc"
                        }
                    };
                    <?php 
                        $v=compact("name","address","city","pin","mob","email","reg");
                        $_SESSION['billing_pay']=$v;
                    ?>
                    var rzp1 = new Razorpay(options);
                        rzp1.open();

                        

                        // $query2="INSERT INTO `billing`(`name`, `address`, `city`, `pincode`, `mobile`, `email`, `reg_id`) VALUES ('$name','$address','$city','$pin','$mob','$email','$reg')";
                        // $result=$handle->executequery($query2);

                        // if($result){
                        //     header('location:order.php');
                        // }
                        
            </script>
        <?php
    }
}

?>