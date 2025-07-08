<?php
// session_start();
?>
        <div class="sidebar pe-1 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h5 class="text-primary"><img style="hight:50px; width:50px;" class="mb-2" src="img/phonecart_logo.png" alt="">&nbsp;Phonecart</h5>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/phonecart_logo.png" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Karan Prajapati</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <?php $page=substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1); ?>
                <div class="navbar-nav w-100">
                    <a href="dashboard.php" class="nav-item nav-link <?php echo $page == 'dashboard.php' ? 'active':"" ?>"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="view_banner.php" class="nav-item nav-link <?php echo $page == 'view_banner.php' ? 'active':"" ?>"><i class="fa fa-laptop me-2"></i>Manage banner</a>
                    <a href="view_category.php" class="nav-item nav-link <?php echo $page == 'view_category.php' ? 'active':"" ?>"><i class="fa fa-laptop me-2"></i>Manage Category</a>
                    <a href="view_subcategory.php" class="nav-item nav-link <?php echo $page == 'view_subcategory.php' ? 'active':"" ?>"><i class="fa fa-th "></i>Manage Sub-category</a>
                    <a href="view_product.php" class="nav-item nav-link <?php echo $page == 'view_product.php' ? 'active':"" ?>"><i class="fa fa-keyboard me-2"></i>Manage Products</a>
                    <a href="view_order.php" class="nav-item nav-link <?php echo $page == 'view_order.php' ? 'active':"" ?>"><i class="fa fa-table me-2"></i>View Order</a>
                    <a href="view_user.php" class="nav-item nav-link <?php echo $page == 'view_user.php' ? 'active':"" ?>"><i class="fa fa-table me-2"></i>View Users</a>
                    <a href="view_contact_us.php" class="nav-item nav-link <?php echo $page == 'view_contact_us.php' ? 'active':"" ?>"><i class="fa fa-table me-2"></i>View Feedback</a>
                    </div>
                </div>
            </nav>
        </div>