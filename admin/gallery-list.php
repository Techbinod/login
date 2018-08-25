
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
                            Gallery List
                           <a href="gallery-add" class="btn btn-success pull-right"><i class="fa fa-send"></i>Add Gallery</a>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-newspaper-o"></i> Gallery List
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
            
                <div class="row">

                    <table class="table table-bordered table-hover" >
                        <thead >
                            <th>S.N</th>
                            <th>Folder</th>
                            <th>File</th>
                            <th>Action</th>
                            
                        </thead>

                          <tbody>
                              
                              <?php 
                              $all_gallery = getGalleryData('galleries');

                               

                              
                             
                              if($all_gallery){
                                foreach($all_gallery as $key => $gallery){
                                  ?>

                                  <tr>
                                      <td><?php echo $key+1; ?></td>

                                      <td style="font-weight:bold;color:<?php echo $gallery['color']; ?>;"><?php echo $gallery['folder'] ?></td>

                                       <td style="width:10%;height: 20%">                   


                                        <img  class="img img-responsive img-thumbnail" src="<?php echo UPLOAD_URL.'gallery/'.$gallery['folder'].'/'.$gallery['file'];?>">
                                 
                                       	
                                      </td>

                                       <td>
                                    <a href="<?php echo SITE_URL.'detail?id='.$news['id'];  ?>" class="btn btn-primary " target="_news_preview"><i class="fa fa-eye"></i> View</a>
                                    
                                    <a href="gallery?id=<?php echo $gallery['id'];?>&amp;act=edit" class="btn btn-success "><i class="fa fa-pencil"></i> Edit </a>
                                    

                                    <a href="gallery?id=<?php echo $gallery['id'];?>&amp;act=delete" class="btn btn-danger " onclick="return confirm('Are you sure you want to delete')" ><i class="fa fa-pencil"></i> Delete</a>
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
   
  