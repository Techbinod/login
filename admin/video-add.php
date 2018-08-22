
      <?php 

         $page_title= "Dashboard";
         include 'inc/header.php'; 
         require 'inc/notification.php';

         $act = "add";

         if(isset($_GET['id']) && !empty($_GET['id'])){
            $act="edit";
            $id = (int)$_GET['id'];
            if($id <= 0){

                $_SESSION['error'] ="Invalid notice id";
                @header('location:video-list');
                exit;

            }

            $video_info = getDataById('videos',$id);

            if(!$video_info){

                  $_SESSION['warning'] = "Video already deleted or does not exists in the database";
                 @header('location:video-list');
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
                            Video <?php echo ucfirst($act); ?>
                            
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="dashboard">Dashboard</a>
                            </li>

                           
                            <li class="active"> 
                                <i class="fa fa-<?php echo ($act == 'edit') ? 'pencil':'plus';?>"></i> Video <?php echo ucfirst($act); ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div clas="row">
                    
                    <form action ="video" method="post"  class="form form-horizontal" novalidate>

                      <div class="form-group">
                           <label for="" class="control-lable col-sm-3">Youtube Title:</label>
                           <div class="col-sm-8">

                             <input type="text" name ="title" placeholder="video title"  required class="form-control" id="title" value="<?php echo (isset($video_info['title'])) ? $video_info['title']:''; ?>">
                               
                           </div>
                      </div>

                       <div class="form-group">
                           <label for="" class="control-lable col-sm-3">Description:</label>
                           <div class="col-sm-8">

                             <textarea type="text" name ="description"  placeholder="Enter Description Here"  required  class="form-control" id="description" class="form-control" ><?php echo (isset($video_info['description'])) ? html_entity_decode($video_info['description']):''; ?></textarea>
                               
                           </div>
                      </div>
                      <div class="form-group">
                           <label for="" class="control-lable col-sm-3">News Date:</label>
                           <div class="col-sm-8">

                             <input type="text" name ="date" id="date" required  value="<?php echo date('Y-m-d');?>" class="form-control" value="<?php echo (isset($video_info['date'])) ? $video_info['date']:''; ?>" > </input>
                               
                           </div>
                      </div>
                                
                       <div class="form-group">
                           <label for="" class="control-lable col-sm-3">Video Link:</label>
                           <div class="col-sm-5">

                             <input type="text" name ="file" placeholder="Paste Youtube Link"  required class="form-control" id="title" value="<?php echo (isset($video_info['file'])) ?"https://www.youtube.com/watch?v=".$video_info['file']:''; ?>">
                               
                           </div>
                           <div class="col-sm-4">
                           	<iframe src="https://www.youtube.com/embed/<?php echo $video_info['file']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                           </div>
                      </div>



                       <div class="form-group">
                           <label for="" class="control-lable col-sm-3"></label>
                           <div class="col-sm-4">
                             <input type="hidden" name="video_id" value="<?php echo (isset($video_info['id']) && !empty($video_info['id'])) ? $video_info['id']:''; ?>">
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

   
  