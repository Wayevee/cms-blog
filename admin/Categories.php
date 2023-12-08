<?php include("includes/header.php");?>
<?php include("includes/functions.php") ?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include("includes/navbar.php");?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
           <?php include("includes/sidebar.php"); ?>

        <div id="page-wrapper">


            <div class="container-fluid">


                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin!
                            <small>Subheading</small>
                        </h1>
                   
     <!-- Display categories -->
                      
                         <?php insertinto() ?>

                        </div>

                        <?php  displayingtables() ?>



                      
                </div>
                <!-- /.row -->


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include("includes/footer.php");?>

</body>

</html>
