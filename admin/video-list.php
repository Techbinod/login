
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
                            Video  List
                           <a href="video-add" class="btn btn-success pull-right"><i class="fa fa-send"></i>Add Video</a>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-newspaper-o"></i> News List
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
                              $all_videos = getAllNews('videos');
                              

                              if($all_videos){
                                foreach($all_videos as $key => $videos){
                                  ?>

                                  <tr>
                                      <td><?php echo $key+1; ?></td>
                                      <td><?php echo $videos['title']; ?></td>
                                       <td><?php echo $videos['date']; ?></td>
                                      
                                      
                                      <td style="width:10%;">
                                      	<iframe src="https://www.youtube.com/embed/<?php echo $videos['file']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

                                        
                                      </td>
                                      <td>
                                    <a href="<?php echo SITE_URL.'detail?id='.$videos['id'];  ?>" class="btn btn-primary " target="_news_preview"><i class="fa fa-eye"></i> View</a>
                                    
                                    <a href="video-add?id=<?php echo $videos['id'];?>" class="btn btn-success "><i class="fa fa-pencil"></i> Edit </a>
                                    <!-- news?id=1&act=delete -->
                                    <a href="video?id=<?php echo $videos['id'];?>&amp;act=delete" class="btn btn-danger " onclick="return confirm('Are you sure you want to delete')" ><i class="fa fa-pencil"></i> Delete</a>
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
   
  