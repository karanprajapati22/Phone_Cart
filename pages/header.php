<script>
    $(document).ready(function(){
        $.ajax({
            type: "post",
            url: "cartcount.php",
            success: function (data2) {
                $('#count1').html(data2);
            }
        });
    });
</script>

<style>
    a {

        text-decoration: none;
    }

    .bglight {
        background-color: rgba(255, 255, 205, 0.6);
    }
</style>
<?php include_once 'ajax.php'; ?>
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    Phonecart
                </div>

                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        Help & FAQs
                    </a>
                    <?php

if(isset($_SESSION['email'])){
    echo '<a href="profile.php" class="flex-c-m trans-04 p-lr-25">
    Myaccount
</a>

<a href="#" class="flex-c-m trans-04 p-lr-25">'.$_SESSION['email'].'</a>
<a href="signout.php" class="flex-c-m trans-04 p-lr-25">
    Signout
</a>
';

}else{

?>
                    <a href="signin.php" class="flex-c-m trans-04 p-lr-25">
                        Sign in
                    </a>
                    <a href="signup.php" class="flex-c-m trans-04 p-lr-25">
                        Sign up
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop bgdark">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="#" class="logo">
                    <img src="images/phonecart_logo.png" width="50px" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu">
                            <a href="index">Home</a>
                        </li>

                        <li>
                            <a href="product.php">Shop</a>
                        </li>

                        <li>
                            <a href="#">About</a>

                        </li>
                        
                        <li>
                            <a href="contact.php">Contact</a>
                        </li>
                    </ul>
                </div>




                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>
                    <?php if(isset($_SESSION['email'])){ ?>
                    <span id="count1">   
                    <div onclick="window.location='shoping-cart.php'" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
                        data-notify="0">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                    </span>
                    <?php } else { ?>
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                        data-notify="0" onclick="window.location='signin.php?info=Login required'">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                    <?php } ?>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="index.php"><img src="images/phonecart_logo.png" width="50px" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
                data-notify="2">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>

            <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti"
                data-notify="0">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    Free shipping for standard order over $100
                </div>
            </li>

            <li>
                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        Help & FAQs
                    </a>
                    <?php

if(isset($_SESSION['email'])){
    echo '<a href="profile.php" class="flex-c-m trans-04 p-lr-25">
    Myaccount
</a>

<a href="#" class="flex-c-m trans-04 p-lr-25">'.$_SESSION['email'].'</a>
<a href="signout.php" class="flex-c-m trans-04 p-lr-25">
    Signout
</a>
';

}else{

?>
                    <a href="signin.php" class="flex-c-m trans-04 p-lr-25">
                        Sign in
                    </a>
                    <a href="signup.php" class="flex-c-m trans-04 p-lr-25">
                        Sign up
                    </a>
                    <?php } ?>
                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        EN
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        USD
                    </a>
                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            <li>
                <a href="index.php">Home</a>
            </li>

            <li>
                <a href="product.php">Shop</a>
            </li>

            <li>
                <a href="shoping-cart.php" class="label1 rs1" data-label1="hot">Features</a>
            </li>

            <li>
                <a href="blog.php">Blog</a>
            </li>

            <li>
                <a href="about.php">About</a>
            </li>

            <li>
                <a href="contact.php">Contact</a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="images/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</header>
<div class="dis-none panel-filter w-full p-t-40 m-t-40">
    <div class=" flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
        <div class="filter-col1 p-r-15 p-b-27">
            <div class="mtext-102 cl2 p-b-15">
                Sort By
            </div>

            <ul>
                <li class="p-b-6">
                    <a href="#" class="filter-link stext-106 trans-04">
                        Default
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="#" class="filter-link stext-106 trans-04">
                        Popularity
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="#" class="filter-link stext-106 trans-04">
                        Average rating
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                        Newness
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="#" class="filter-link stext-106 trans-04">
                        Price: Low to High
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="#" class="filter-link stext-106 trans-04">
                        Price: High to Low
                    </a>
                </li>
            </ul>
        </div>

        <div class="filter-col2 p-r-15 p-b-27">
            <div class="mtext-102 cl2 p-b-15">
                Price
            </div>

            <ul>
                <li class="p-b-6">
                    <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                        All
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="#" class="filter-link stext-106 trans-04">
                        $0.00 - $50.00
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="#" class="filter-link stext-106 trans-04">
                        $50.00 - $100.00
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="#" class="filter-link stext-106 trans-04">
                        $100.00 - $150.00
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="#" class="filter-link stext-106 trans-04">
                        $150.00 - $200.00
                    </a>
                </li>

                <li class="p-b-6">
                    <a href="#" class="filter-link stext-106 trans-04">
                        $200.00+
                    </a>
                </li>
            </ul>
        </div>

        <div class="filter-col3 p-r-15 p-b-27">
            <div class="mtext-102 cl2 p-b-15">
                Color
            </div>

            <ul>
                <li class="p-b-6">
                    <span class="fs-15 lh-12 m-r-6" style="color: #222;">
                        <i class="zmdi zmdi-circle"></i>
                    </span>

                    <a href="#" class="filter-link stext-106 trans-04">
                        Black
                    </a>
                </li>

                <li class="p-b-6">
                    <span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
                        <i class="zmdi zmdi-circle"></i>
                    </span>

                    <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                        Blue
                    </a>
                </li>

                <li class="p-b-6">
                    <span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
                        <i class="zmdi zmdi-circle"></i>
                    </span>

                    <a href="#" class="filter-link stext-106 trans-04">
                        Grey
                    </a>
                </li>

                <li class="p-b-6">
                    <span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
                        <i class="zmdi zmdi-circle"></i>
                    </span>

                    <a href="#" class="filter-link stext-106 trans-04">
                        Green
                    </a>
                </li>

                <li class="p-b-6">
                    <span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
                        <i class="zmdi zmdi-circle"></i>
                    </span>

                    <a href="#" class="filter-link stext-106 trans-04">
                        Red
                    </a>
                </li>

                <li class="p-b-6">
                    <span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
                        <i class="zmdi zmdi-circle-o"></i>
                    </span>

                    <a href="#" class="filter-link stext-106 trans-04">
                        White
                    </a>
                </li>
            </ul>
        </div>

        <div class="filter-col4 p-b-27">
            <div class="mtext-102 cl2 p-b-15">
                Tags
            </div>

            <div class="flex-w p-t-4 m-r--5">
                <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                    Fashion
                </a>

                <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                    Lifestyle
                </a>

                <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                    Denim
                </a>

                <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                    Streetstyle
                </a>

                <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                    Crafts
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Cart -->