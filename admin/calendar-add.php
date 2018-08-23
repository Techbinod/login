
      <?php 

         $page_title= "Dashboard";
         include 'inc/header.php'; 
         require 'inc/notification.php';



         $act = "add";

         if(isset($_GET['id'], $_GET['act']) && !empty($_GET['id']) && !empty($_GET['act'])){
            $act="edit";

          if($_GET['act']!='edit'){
            $_SESSION['warning'] = "Invalid action";
            @header('location:calendar-list');
            exit;
          }

            $id = (int)$_GET['id'];
            if($id <= 0){

                $_SESSION['error'] ="Invalid calendar id";
                @header('location:calendar-list');
                exit;

            }

            $calendar_info = getDataById('calendars',$id);

             

            if(!$calendar_info){

                 $_SESSION['warning'] = "Calendar already deleted or does not exists in the database";
                 @header('location:calendar-list');
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
                            Calendar <?php echo ucfirst($act); ?>
                             
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="dashboard">Dashboard</a>
                            </li>

                           
                            <li class="active"> 
                                <i class="fa fa-<?php echo ($act == 'edit') ? 'pencil':'plus';?>"></i>Calendar <?php echo ucfirst($act); ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div clas="row">
                    
                    <form action ="calendar" method="post" enctype="multipart/form-data" class="form form-horizontal" novalidate>

                      <div class="form-group">
                           <label for="" class="control-lable col-sm-3">Calendar Title:</label>
                           <div class="col-sm-8">

                             <input type="text" name ="title" placeholder="Calendar title"  required class="form-control" id="title" value="<?php echo (isset($calendar_info['title']) && !empty($calendar_info['title'])) ? $calendar_info['title']:''; ?>">
                               
                           </div>
                      </div>

                       <div class="form-group">
                           <label for="" class="control-lable col-sm-3">Description:</label>
                           <div class="col-sm-8">

                             <textarea type="text" name ="description"  placeholder="Enter Description Here"  required  class="form-control" id="description" class="form-control" ><?php echo (isset($calendar_info['description']) && !empty($calendar_info['description'])) ? html_entity_decode($calendar_info['description']):''; ?></textarea>
                               
                           </div>
                      </div>



                      <div class="form-group">
                           <label for="" class="control-lable col-sm-3">Calander Date:</label>
                           <div class="col-sm-8">

                             <input type="text" name ="date" id="date" required  value="<?php echo date('Y-m-d');?>" class="form-control" value="<?php echo (isset($calendar_info['date']) && !empty($calendar_info['date'])) ? $calendar_info['date']:''; ?>" > </input>
                               
                           </div>
                      </div>


                       <div class="form-group">
                           <label for="" class="control-lable col-sm-3">Is_Sticky:</label>
                           <div class="col-sm-8">

                            <input type="checkbox" name="is_sticky" vlaue="1"<?php echo (isset($calendar_info['is_sticky']) && $calendar_info['is_sticky']==1) ? 'checked':'' ?> > Yes
                           </div>
                       </div>


                       <div class="form-group">
                           <label for="" class="control-lable col-sm-3">Image</label>
                           <div class="col-sm-4">
                            <input type="file"  name="file" accept="image/*" />
                           
                           </div>
                           <div class="col-sm-4">
                                <?php 

                                 $thumbnail = ADMIN_IMAGES.'thumbnail.png';

                                 if(isset($calendar_info['file']) && $calendar_info['file']!=null && file_exists(UPLOAD_DIR.'/calendar/'.$calendar_info['file'])){
                                    $thumbnail=UPLOAD_URL.'calendar/'.$calendar_info['file'];
                                 }
                                 ?>
                                
                                 <img src="<?php echo $thumbnail; ?>" alt="thumbnail" class="img img-thumbnail img-responsive">
                                 <br>
                                 <br>
                                  <input type="checkbox" name="del_old_image" value="<?php echo (isset($calendar_info['file']) && !empty($calendar_info['file']))? $calendar_info['file']:''; ?>"> Delete Image
                                 
                           </div>
                       </div>



                       <div class="form-group">
                           <label for="" class="control-lable col-sm-3"></label>
                           <div class="col-sm-8">
                             <input type="hidden" name="calendar_id" value="<?php echo (isset($calendar_info['id']) && !empty($calendar_info['id'])) ? $calendar_info['id']:''; ?>">
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

   
  