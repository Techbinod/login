
      <?php 
         
         $page_title= "Dashboard";
         include 'inc/header.php'; 
         
         if(!isset($_SESSION['admin_token']) || empty($_SESSION['admin_token']) || strlen($_SESSION['admin_token']) !=30){

            $_SESSION['warning'] ="Please login first";
            @header('location:./');
            exit;
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
                            Notice List
                           <a href="notice-add" class="btn btn-success pull-right"><i class="fa fa-send"></i>Add Notice </a>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-newspaper-o"></i> Notice List
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
            
                <div class="row">

                    <table class="table table-bordered table-hover" >
                        <thead >
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Thumbnail</th>
                            <th>Action</th>
                        </thead>

                          <tbody>
                              
                              <?php 
                              $all_notice = getAllNews('notices');
                              
                              
                              if($all_notice){
                                foreach($all_notice as $key => $notice){
                                  ?>

                                  <tr>
                                      <td><?php echo $key+1; ?></td>
                                      <td><?php echo $notice['title']; ?></td>
                                      <td><?php echo $notice['date']; ?></td>
                                      <td style="width:10%;">

                                        

                                        <?php 
                                          
                                          if($notice['file'] !=null && file_exists(UPLOAD_DIR.'/notice/'.$notice['file'])){

                                            echo ' <img src="'.UPLOAD_URL.'notice/'.$notice['file'].'" class="img img-responsive img-thumbnail" > ';

                                          }else{

                                            echo "Image not Uploaded";

                                          }

                                          

                                        ?>

                                      </td>
                                      <td>
                                    <a href="<?php echo SITE_URL.'detail?id='.$notice['id'];  ?>" class="btn btn-primary " target="_notice_preview"><i class="fa fa-eye"></i> View</a>
                                    
                                    <a href="notice-add?id=<?php echo $notice['id'];?>&amp;act=edit" class="btn btn-success "><i class="fa fa-pencil"></i> Edit </a>
                                    

                                    <a href="notice?id=<?php echo $notice['id'];?>&amp;act=delete" class="btn btn-danger " onclick="return confirm('Are you sure you want to delete')" ><i class="fa fa-pencil"></i> Delete</a>
                                      </td>
                                      
                                  </tr>
                                  
                                  <?php   
                                }
                              }
                               
                               ?>

                          </tbody>

                    </table>
                    
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

      <?php include 'inc/footer.php'; ?>
   
  