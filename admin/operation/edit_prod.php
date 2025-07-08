    <?php
    include_once '../dbcontroller.php';
    if (isset($_POST['editproduct'])) {
        $handle = new DBcontroller();

        $product_id = $handle->secure($_POST['product_id']);
        $subcategory_id = $handle->secure($_POST['subcategory_id']);    
        $product_name = $handle->secure($_POST['product_name']);
        $product_des = $handle->secure($_POST['product_des']);
        $product_price = $handle->secure($_POST['product_price']);
        $product_sp_price = $handle->secure($_POST['special_price']);
        $product_qty = $handle->secure($_POST['product_qty']);
        $product_flavour = $handle->secure($_POST['product_flavour']);
        $convert = trim($_POST['convert']);
        $product_weight = $handle->secure($_POST['product_weight']);

        $query5 = "select * from product where prod_id='$product_id'";
        $fetch5 = $handle->fetchresult($query5);
        $feimage = $fetch5['prod_image'];
        

        session_start();
        if (($_FILES['image1']['name'] != '') and ($_FILES['image2']['name'] != '')) {
            if ($_FILES['image1']['type'] != 'image/png' && $_FILES['image1']['type'] != 'image/jpg' && $_FILES['image1']['type'] != 'image/jpeg' && $_FILES['image2']['type'] != 'image/png' && $_FILES['image2']['type'] != 'image/jpg' && $_FILES['image2']['type'] != 'image/jpeg') {
                $arrr = ['category_id' => $category_id, 'subcategory_id' => $subcategory_id, 'product_id' => $product_id, 'product_name' => $product_name, 'product_des' => $product_des, 'convert' => $convert, 'product_price' => $product_price, 'special_price' => $product_special_price, 'product_qty' => $product_qty, 'product_weight' => $product_weight, 'product_flavour' => $product_flavour, 'prod_image' => $feimage];

                $_SESSION['error'] = $arrr;
                header('Location:../add_product.php?page='.$page.'&prod_id='.$product_id.'&info=Please select only png,jpg and jpeg format in image1 or image2');
            } else {
                $files1 = rand(111111111, 999999999) . '_' . $_FILES['image1']['name'];
                $files2 = rand(111111111, 999999999) . '_' . $_FILES['image2']['name'];
                $image_check = explode(",", $feimage, 3);
                $array = [$files1, $files2, $image_check[2]];
                $imagelode = implode(",", $array);
                $image1_O = "R" . $files1;
                $image1_C = "RC" . $files1;
                $image2_O = "R" . $files2;
                $image2_C = "RC" . $files2;
                $originalpath = "../img/product/original/";
                $convertpath = "../img/product/convert/";

                // echo "done1";
                // die();
                move_uploaded_file($_FILES['image1']['tmp_name'], $originalpath . $image1_O);
                move_uploaded_file($_FILES['image2']['tmp_name'], $originalpath . $image2_O);

                if ($_POST['convert'] == "y") {
                    // echo "string";
                
                    include_once '../simpleimage.php';
                    // die();
                    $image = new SimpleImage();
                    $image->load($originalpath . $image1_O);
                    $image->resize(700, 750);
                    $image->save($convertpath . $image1_C);
                    $image = imagecreatefromjpeg($convertpath  . "$image1_C");
                    $image = new SimpleImage();
                    $image->load($originalpath . $image2_O);
                    $image->resize(700, 750);
                    $image->save($convertpath . "$image2_C");
                    $image = imagecreatefromjpeg($convertpath  . "$image2_C");
                    // $destination = $convertpath . "$image1_C";
                } else {
                    copy($originalpath . $image1_O, $convertpath . "$image1_C");
                    copy($originalpath . $image2_O, $convertpath . "$image2_C");
                }
                $query = "update product set `prod_name`='$product_name', `prod_desc`='$product_des', `prod_image`='$imagelode', `prod_price`='$product_price', `prod_sp_price`='$product_sp_price', `prod_qty`='$product_qty', `prod_flavour`='$product_flavour', `prod_weight`='$product_weight', `convert`='$convert', `subcat_id`='$subcategory_id' where `prod_id`='$product_id'";
            }
        } elseif (($_FILES['image2']['name'] != '') and ($_FILES['image3']['name'] != '')) {
            if ($_FILES['image2']['type'] != 'image/png' && $_FILES['image2']['type'] != 'image/jpg' && $_FILES['image2']['type'] != 'image/jpeg' && $_FILES['image3']['type'] != 'image/png' && $_FILES['image3']['type'] != 'image/jpg' && $_FILES['image3']['type'] != 'image/jpeg') {
                $arrr = ['category_id' => $category_id, 'subcategory_id' => $subcategory_id, 'product_id' => $product_id, 'product_name' => $product_name, 'product_des' => $product_des, 'convert' => $convert, 'product_price' => $product_price, 'special_price' => $product_special_price, 'product_qty' => $product_qty, 'product_weight' => $product_weight, 'product_flavour' => $product_flavour, 'prod_image' => $feimage];

                $_SESSION['error'] = $arrr;
                header('Location:../add_product.php?page='.$page.'&prod_id='.$product_id.'&info=Please select only png,jpg and jpeg format in image1');
            } else {
                $files2 = rand(111111111, 999999999) . '_' . $_FILES['image2']['name'];
                $files3 = rand(111111111, 999999999) . '_' . $_FILES['image3']['name'];
                $image_check = explode(",", $feimage, 3);
                $array = [$image_check[0], $files2, $files3];
                $imagelode = implode(",", $array);
                $image2_O = "R" . $files2;
                $image2_C = "RC" . $files2;
                $image3_O = "R" . $files3;
                $image3_C = "RC" . $files3;
                $originalpath = "../img/product/original/";
                $convertpath = "../img/product/convert/";
                move_uploaded_file($_FILES['image2']['tmp_name'], $originalpath . $image2_O);
                move_uploaded_file($_FILES['image3']['tmp_name'], $originalpath . $image3_O);

                if ($_POST['convert'] == "y") {

                    include_once '../simpleimage.php';
                    $image = new SimpleImage();
                    $image->load($originalpath . $image2_O);
                    $image->resize(700, 750);
                    $image->save($convertpath . $image2_C);
                    $image = imagecreatefromjpeg($convertpath  . "$image2_C");
                    $image = new SimpleImage();
                    $image->load($originalpath . $image3_O);
                    $image->resize(700, 750);
                    $image->save($convertpath . "$image3_C");
                    $image = imagecreatefromjpeg($convertpath  . "$image3_C");
                    // $destination = $convertpath . "$image1_C";
                } else {
                    copy($originalpath . $image1_O, $convertpath . "$image2_C");
                    copy($originalpath . $image2_O, $convertpath . "$image3_C");
                }
                $query = "update product set `prod_name`='$product_name', `prod_desc`='$product_des', `prod_image`='$imagelode', `prod_price`='$product_price', `prod_sp_price`='$product_sp_price', `prod_qty`='$product_qty', `prod_flavour`='$product_flavour', `prod_weight`='$product_weight', `convert`='$convert', `subcat_id`='$subcategory_id' where `prod_id`='$product_id'";
            }
        } elseif (($_FILES['image1']['name'] != '') && ($_FILES['image3']['name'] != '')) {
            if ($_FILES['image1']['type'] != 'image/png' && $_FILES['image1']['type'] != 'image/jpg' && $_FILES['image1']['type'] != 'image/jpeg' && $_FILES['image3']['type'] != 'image/png' && $_FILES['image3']['type'] != 'image/jpg' && $_FILES['image3']['type'] != 'image/jpeg') {
                $arrr = ['category_id' => $category_id, 'subcategory_id' => $subcategory_id, 'product_id' => $product_id, 'product_name' => $product_name, 'product_des' => $product_des, 'convert' => $convert, 'product_price' => $product_price, 'special_price' => $product_special_price, 'product_qty' => $product_qty, 'product_weight' => $product_weight, 'product_flavour' => $product_flavour, 'prod_image' => $feimage];

                $_SESSION['error'] = $arrr;
                header('Location:../add_product.php?page='.$page.'&prod_id='.$product_id.'&info=Please select only png,jpg and jpeg format in image1 or image3');
            } else {
                $files1 = rand(111111111, 999999999) . '_' . $_FILES['image1']['name'];
                $files3 = rand(111111111, 999999999) . '_' . $_FILES['image3']['name'];
                $image_check = explode(",", $feimage, 3);
                $array = [$files1, $image_check[1], $files3];
                $imagelode = implode(",", $array);
                $image1_O = "R" . $files1;
                $image1_C = "RC" . $files1;
                $image3_O = "R" . $files3;
                $image3_C = "RC" . $files3;
                $originalpath = "../img/product/original/";
                $convertpath = "../img/product/convert/";
                move_uploaded_file($_FILES['image1']['tmp_name'], $originalpath . $image1_O);
                move_uploaded_file($_FILES['image3']['tmp_name'], $originalpath . $image3_O);

                if ($_POST['convert'] == "y") {
                    // echo "string";
                    // die();
                    include_once '../simpleimage.php';
                    $image = new SimpleImage();
                    $image->load($originalpath . $image1_O);
                    $image->resize(700, 750);
                    $image->save($convertpath . $image1_C);
                    $image = imagecreatefromjpeg($convertpath . "$image1_C");
                    $image = new SimpleImage();
                    $image->load($originalpath . $image3_O);
                    $image->resize(700, 750);
                    $image->save($convertpath . "$image3_C");
                    $image = imagecreatefromjpeg($convertpath  . "$image3_C");
                    // $destination = $convertpath . "$image1_C";
                } else {
                    copy($originalpath . $image1_O, $convertpath . "$image1_C");
                    copy($originalpath . $image2_O, $convertpath . "$image3_C");
                }
                $query = "update product set `prod_name`='$product_name', `prod_desc`='$product_des', `prod_image`='$imagelode', `prod_price`='$product_price', `prod_sp_price`='$product_sp_price', `prod_qty`='$product_qty', `prod_flavour`='$product_flavour', `prod_weight`='$product_weight', `convert`='$convert', `subcat_id`='$subcategory_id' where `prod_id`='$product_id'";
            }
        } elseif ($_FILES['image1']['name'] != '') {
            if ($_FILES['image1']['type'] != 'image/png' && $_FILES['image1']['type'] != 'image/jpg' && $_FILES['image1']['type'] != 'image/jpeg') {
                $arrr = ['category_id' => $category_id, 'subcategory_id' => $subcategory_id, 'product_id' => $product_id, 'product_name' => $product_name, 'product_des' => $product_des, 'convert' => $convert, 'product_price' => $product_price, 'special_price' => $product_special_price, 'product_qty' => $product_qty, 'product_weight' => $product_weight, 'product_flavour' => $product_flavour, 'prod_image' => $feimage];

                $_SESSION['error'] = $arrr;
                header('Location:../add_product.php?page='.$page.'&prod_id='.$product_id.'&info=Please select only png,jpg and jpeg format in image1');
            } else {
                $files1 = rand(111111111, 999999999) . '_' . $_FILES['image1']['name'];
                $image_check = explode(",", $feimage, 3);
                $array = [$files1, $image_check[1], $image_check[2]];
                $imagelode = implode(",", $array);
                $image1_O = "R" . $files1;
                $image1_C = "RC" . $files1;
                $originalpath = "../img/product/original/";
                $convertpath = "../img/product/convert/";
                move_uploaded_file($_FILES['image1']['tmp_name'], $originalpath . $image1_O);
                if ($_POST['convert'] == "y") {
                    // echo "string";
                    // die();
                    include_once '../simpleimage.php';
                    $image = new SimpleImage();
                    $image->load($originalpath . $image1_O);
                    $image->resize(700, 750);
                    $image->save($convertpath . $image1_C);
                    $image = imagecreatefromjpeg($convertpath  . "$image1_C");
                    // $destination = $convertpath . "$image1_C";
                } else {
                    copy($originalpath . $image1_O, $convertpath . "$image1_C");
                }
                $query = "update product set `prod_name`='$product_name', `prod_desc`='$product_des', `prod_image`='$imagelode', `prod_price`='$product_price', `prod_sp_price`='$product_sp_price', `prod_qty`='$product_qty', `prod_flavour`='$product_flavour', `prod_weight`='$product_weight', `convert`='$convert', `subcat_id`='$subcategory_id' where `prod_id`='$product_id'";
            }
        } elseif ($_FILES['image2']['name'] != '') {

            if ($_FILES['image2']['type'] != 'image/png' && $_FILES['image2']['type'] != 'image/jpg' && $_FILES['image2']['type'] != 'image/jpeg') {
                $arrr = ['category_id' => $category_id, 'subcategory_id' => $subcategory_id, 'product_id' => $product_id, 'product_name' => $product_name, 'product_des' => $product_des, 'convert' => $convert, 'product_price' => $product_price, 'special_price' => $product_special_price, 'product_qty' => $product_qty, 'product_weight' => $product_weight, 'product_flavour' => $product_flavour, 'prod_image' => $feimage];

                $_SESSION['error'] = $arrr;
                header('Location:../add_product.php?page='.$page.'&prod_id='.$product_id.'&info=Please select only png,jpg and jpeg format in image2');
            } else {
                $files2 = rand(111111111, 999999999) . '_' . $_FILES['image2']['name'];
                $image_check = explode(",", $feimage, 3);
                $array = [$image_check[0], $files2, $image_check[2]];
                $imagelode = implode(",", $array);
                $image2_O = "R" . $files2;
                $image2_C = "RC" . $files2;
                $originalpath = "../img/product/original/";
                $convertpath = "../img/product/convert/";
                move_uploaded_file($_FILES['image2']['tmp_name'], $originalpath . $image2_O);
                if ($_POST['convert'] == "y") {
                    // echo "string";
                    // die();
                    include_once '../SimpleImage.php';
                    $image = new SimpleImage();
                    $image->load($originalpath . $image2_O);
                    $image->resize(700, 750);
                    $image->save($convertpath . "$image2_C");
                    $image = imagecreatefromjpeg($convertpath  . "$image2_C");
                    //	$destination = $convertpath . "$image_C";
                } else {
                    copy($originalpath . $image2_O, $convertpath . "$image2_C");
                }
                $query = "update product set `prod_name`='$product_name', `prod_desc`='$product_des', `prod_image`='$imagelode', `prod_price`='$product_price', `prod_sp_price`='$product_sp_price', `prod_qty`='$product_qty', `prod_flavour`='$product_flavour', `prod_weight`='$product_weight', `convert`='$convert', `subcat_id`='$subcategory_id' where `prod_id`='$product_id'";
            }
        } elseif ($_FILES['image3']['name'] != '') {

            if ($_FILES['image3']['type'] != 'image/png' && $_FILES['image3']['type'] != 'image/jpg' && $_FILES['image3']['type'] != 'image/jpeg') {
                $arrr = ['category_id' => $category_id, 'subcategory_id' => $subcategory_id, 'product_id' => $product_id, 'product_name' => $product_name, 'product_des' => $product_des, 'convert' => $convert, 'product_price' => $product_price, 'special_price' => $product_special_price, 'product_qty' => $product_qty, 'product_weight' => $product_weight, 'product_flavour' => $product_flavour, 'prod_image' => $feimage];

                $_SESSION['error'] = $arrr;
                header('Location:../add_product.php?page='.$page.'&prod_id='.$product_id.'&info=Please select only png,jpg and jpeg format in image3');
            } else {
                $files3 = rand(111111111, 999999999) . '_' . $_FILES['image3']['name'];
                $image_check = explode(",", $feimage, 3);
                $array = [$image_check[0], $image_check[1], $files3];
                $imagelode = implode(",", $array);
                $image3_O = "R" . $files3;
                $image3_C = "RC" . $files3;
                $originalpath = "../img/product/original/";
                $convertpath = "../img/product/convert/";
                move_uploaded_file($_FILES['image3']['tmp_name'], $originalpath . $image3_O);
                if ($_POST['convert'] == "y") {
                    // echo "string";
                    // die();
                    include_once '../SimpleImage.php';
                    $image = new SimpleImage();
                    $image->load($originalpath . $image3_O);
                    $image->resize(700, 750);
                    $image->save($convertpath . "$image3_C");
                    $image = imagecreatefromjpeg($convertpath  . "$image3_C");
                    //	$destination = $convertpath . "$image_C";
                } else {
                    copy($originalpath . $image3_O, $convertpath . "$image3_C");
                }

                $query = "update product set `prod_name`='$product_name', `prod_desc`='$product_des', `prod_image`='$imagelode', `prod_price`='$product_price', `prod_sp_price`='$product_sp_price', `prod_qty`='$product_qty', `prod_flavour`='$product_flavour', `prod_weight`='$product_weight', `convert`='$convert', `subcat_id`='$subcategory_id' where `prod_id`='$product_id'";
            }
        } else {
            $query = "update product set `prod_name`='$product_name', `prod_desc`='$product_des', `prod_price`='$product_price', `prod_sp_price`='$product_sp_price', `prod_qty`='$product_qty', `prod_flavour`='$product_flavour', `prod_weight`='$product_weight', `convert`='$convert', `subcat_id`='$subcategory_id' where `prod_id`='$product_id'";
        }
        $result = $handle->executequery($query);
        if ($result) {
            header('Location:../view_product.php?success=Product Updated Successfully');
        } else {
            header('Location:../view_product.php?error=Product is not update');
        }
    } else {
        header('Location:../view_product.php?error=Wrong button press');
    }
