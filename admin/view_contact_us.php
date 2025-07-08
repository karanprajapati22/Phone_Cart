<!DOCTYPE html>
<html lang="en">

<head>
<?php
        include 'head.php';
?>
</head>
<?php
include 'auth.php';
?>
<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <?php
            include 'sidebar.php';
        ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php
            include 'navbar.php';
        ?>
            <!-- Navbar End -->


            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">View Feedback</h6>
                            <div class="table-responsive">
                                <table class="table table-hover table-stripped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Message</th>
                                            <th scope="col">Ratings</th>

                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        include 'dbcontroller.php';
                                        $obj=new DBcontroller;
                                        $query="select * from contact_us";
                                        $fetch=$obj->fetchall($query);

                                        // $obj->formate($fetch);
                                    ?>
                                    <tbody>
                                    <?php 
                                        foreach($fetch as $row){
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $row['contact_id'] ?></th>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['message'] ?></td>
                                            <td><?php echo $row['rating'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary px-4">Delete</button>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->


            <!-- Footer Start -->
            <?php
                include 'footer.php';
            ?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
</body>

</html>