
      <?php 

         $page_title= "Dashboard";
         include 'inc/header.php'; 
         require 'inc/notification.php';

         $act = "add";

         if(isset($_GET['id'], $_GET['act']) && !empty($_GET['id']) && !empty($_GET['act'])){
            $act="edit";

          if($_GET['act']!='edit'){
            $_SESSION['warning'] = "Invalid action";
            @header('location:image-list');
            exit;
          }

            $id = (int)$_GET['id'];
            if($id <= 0){

                $_SESSION['error'] ="Invalid image id";
                @header('location:image-list');
                exit;

            }

            $image_info = getDataById('images',$id);

            if(!$image_info){

                  $_SESSION['warning'] = "Image already deleted or does not exists in the database";
                 @header('location:image-list');
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
                            Image <?php echo ucfirst($act); ?>
                            
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="dashboard">Dashboard</a>
                            </li>

                           
                            <li class="active"> 
                                <i class="fa fa-<?php echo ($act == 'edit') ? 'pencil':'plus';?>"></i> Image <?php echo ucfirst($act); ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div clas="row">
                    
                    <form action ="image" method="post" enctype="multipart/form-data" class="form form-horizontal" novalidate>

                      <div class="form-group">
                           <label for="" class="control-lable col-sm-3">Image Caption:</label>
                           <div class="col-sm-8">

                             <input type="text" name ="title" placeholder="Image title"  required class="form-control" id="title" value="<?php echo (isset($image_info['title'])) ? $image_info['title']:''; ?>">
                               
                           </div>
                      </div>

                       
                      <div class="form-group">
                           <label for="" class="control-lable col-sm-3">Image Date:</label>
                           <div class="col-sm-8">

                             <input type="text" name ="date" id="date" required  value="<?php echo date('Y-m-d');?>" class="form-control" value="<?php echo (isset($image_info['date'])) ? $image_info['date']:''; ?>" > </input>
                               
                           </div>
                      </div>
                                
                       



                      <div class="form-group">
                           <label for="" class="control-lable col-sm-3">Image:</label>
                           <div class="col-sm-4">
                            <input type="file"  name="file" accept="image/*" />
                           
                           </div>
                           <div class="col-sm-4">
                                <?php 

                                 $thumbnail = ADMIN_IMAGES.'thumbnail.png';

                                 if(isset($image_info['file']) && $image_info['file']!=null && file_exists(UPLOAD_DIR.'/image/'.$image_info['file'])){
                                    $thumbnail=UPLOAD_URL.'image/'.$image_info['file'];
                                 }
                                 ?>
                                
                                 <img src="<?php echo $thumbnail; ?>" alt="thumbnail" class="img img-thumbnail img-responsive">
                                 <br>
                                 <br>
                                  <input type="checkbox" name="del_old_image" value="<?php echo (isset($image_info['file']) && !empty($image_info['file']))? $image_info['file']:''; ?>"> Delete Image
                                 
                           </div>
                       </div>


                       <div class="form-group">
                           <label for="" class="control-lable col-sm-3"></label>
                           <div class="col-sm-8">
                             <input type="hidden" name="image_id" value="<?php echo (isset($image_info['id']) && !empty($image_info['id'])) ? $image_info['id']:''; ?>">
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

   
  