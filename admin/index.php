        <?php  include 'inc/header.php';



         if(isset($_SESSION['admin_token']) && !empty($_SESSION['admin_token']) && strlen($_SESSION['admin_token']) ==30){

            $_SESSION['success'] ="You are already logged in ";
            @header('location:dashboard');
            exit;
         }



         ?>


        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">

                    <?php include 'inc/notification.php'; ?>

                	<form method="post" name="login" action="login">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" class="form-control" id="username" required />
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" id="username" required />
						</div>
						<div class="form-group">
							<input type="submit" name="submit" class="btn btn-primary" id="username" required />
						</div>
                	</form>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include 'inc/footer.php'; ?>