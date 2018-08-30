

      
      <?php 

         $page_title= "Dashboard";
         include 'inc/header.php'; 
         require 'inc/notification.php';
       ?>


   
      <?php include 'inc/nav.php'; ?>
       
        <div id="page-wrapper">

            <div class="container-fluid">
                <?php include 'inc/notification.php'; ?>

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Gallery Image Edit
                            <a href="gallery-list" class="btn btn-primary pull-right"><i class="fa fa-send"></i> Back To List</a>
                             
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="dashboard">Dashboard</a>
                            </li>

                           
                            <li class="active"> 
                                <i class="fa fa-pencil"></i> Gallery Edit
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->



                <div clas="row">
                    
                   <form action="single-gallery" method="post" enctype="multipart/form-data">

                     <div class="form-group">

                     	<?php  
                          $id=$_GET['id'];
                     	  $edit = getDataById("galleries",$id);
                           
                     	  
                     	               	  
                     	 ?>
                            <div class="form-group">
		                           <label for="" class="control-lable col-sm-3">Folder Name:</label>
		                           <div class="col-sm-8">

		                             <input type="text" name ="title" placeholder="Enter Folder Name"  required class="form-control" id="title" value="<?php echo $edit['folder'] ?>">
		                               
		                           </div>

		                           <br>
		                           <br>
		                           <br>

		                         <label for="" class="control-lable col-sm-3">Image:</label>
		                           <div class="col-sm-4 text-center">


                                 
                                  	 <button class="btn btn-primary disabled ">Change Image</button>
                                  	 <br>
                                  
                                   <br>

		                           <img  class="img img-responsive img-thumbnail" src="<?php echo UPLOAD_URL.'gallery/'.$edit['folder'].'/'.$edit['file']; ?>">
		                               
		                           </div>
		                           <div class="col-sm-4">
		                           	<input style="margin-top:50%" type="file" name="file" accept="image/*"><br>
		                           
		                           	<br>
		                           	<br>
		                             <br>
		                             <input type="hidden" name="id" value="<?php echo $id; ?>">
                                 <input type="hidden" name="color" value="<?php echo $edit['color']; ?>">
		                             <input type="hidden" name="file" value="<?php echo $edit['file']; ?>">
		                           	<button class="btn btn-danger" type="reset"><i class="fa fa-trash"></i> Cancel</button>
		                           	 
                            <button class="btn btn-success" type="submit"><i class="fa fa-send"></i> Submit</button>

		                           </div>
                           			 <br>
                           			 <br>

                          </div>

                       </div>
      	
                   </form>

                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

      <?php include 'inc/footer.php'; ?>
      <script type="text/javascript" src="<?php echo ASSETS_URL.'tinymce/tinymce.min.js';?>"></script>
      <script type="text/javascript">
          tinymce.init({
            selector:'#description'
          });
      </script>

   
  