
      <?php 

         $page_title= "Dashboard";
         include 'inc/header.php'; 
         require 'inc/notification.php';

         $act = "add";

         if(isset($_GET['id'], $_GET['act']) && !empty($_GET['id']) && !empty($_GET['act'])){
            $act="edit";

          if($_GET['act']!='edit'){
            $_SESSION['warning'] = "Invalid action";
            @header('location:gallery-list');
            exit;
          }

            $id = (int)$_GET['id'];
            if($id <= 0){

                $_SESSION['error'] ="Invalid news id";
                @header('location:gallery-list');
                exit;

            }

            $gallery_info = getDataById('galleries',$id);

            if(!$gallery_info){

                 $_SESSION['warning'] = "Gallery already deleted or does not exists in the database";
                 @header('location:gallery-list');
                 exit;
            }
         }


       ?>
   
      <?php include 'inc/nav.php'; ?>
       
        <div id="page-wrapper">

            <div class="container-fluid">
                <?php include 'inc/notification.php'; ?>

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Gallery <?php echo ucfirst($act); ?>
                             
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="dashboard">Dashboard</a>
                            </li>

                           
                            <li class="active"> 
                                <i class="fa fa-<?php echo ($act == 'edit') ? 'pencil':'plus';?>"></i> Gallery <?php echo ucfirst($act); ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div clas="row">
                    
                   <form action="gallery.php" method="post" enctype="multipart/form-data">



                   	  <div class="form-group">
                           <label for="" class="control-lable col-sm-3">Folder Name:</label>
                           <div class="col-sm-8">

                             <input type="text" name ="title" placeholder="Enter Folder Name"  required class="form-control" id="title" value="<?php echo (isset($gallery_info['title']) && !empty($gallery_info['title'])) ? $gallery_info['title']:''; ?>">
                               
                           </div>
                           <br>
                           <br>
                      </div>



                      



                      <div class="form-group">
                           <label for="" class="control-lable col-sm-3">Upload Folder Images:</label>
                           <div class="col-sm-8">
                               
                               <input type="file" name="folder_images[]"  multiple accept="image/*"><br>


                             
                               
                           </div>
                      </div>




                      <br>
                      <br>



                      <div class="form-group">
                           <label for="" class="control-lable col-sm-3"></label>
                           <div class="col-sm-8">
                            
                              
                             
                            <button class="btn btn-danger" type="reset"><i class="fa fa-trash"></i> Cancel</button>
                            <button class="btn btn-success" type="submit"><i class="fa fa-trash"></i> Submit</button>
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

   
  