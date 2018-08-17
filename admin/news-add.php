
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
                            News Add
                            
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="dashboard">Dashboard</a>
                            </li>

                            <li>
                                <i class="fa fa-newspaper-o"></i>  <a href="news-list">News List</a>
                            </li>
                            <li class="active"> 
                                <i class="fa fa-plus"></i> News Add
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div clas="row">
                    
                    <form action ="" class="form form-horizontal">

                      <div class="form-group">
                           <label for="" class="control-lable col-sm-3">News Titile:</label>
                           <div class="col-sm-8">

                             <input type="text" name ="title" placeholder="news title" required class="form-control" id="title">
                               
                           </div>
                      </div>

                       <div class="form-group">
                           <label for="" class="control-lable col-sm-3">Description:</label>
                           <div class="col-sm-8">

                             <textarea type="text" name ="description" rows="5" placeholder="Enter Description Here"  required class="form-control" id="description"></textarea>
                               
                           </div>
                      </div>



                      <div class="form-group">
                           <label for="" class="control-lable col-sm-3">News Date:</label>
                           <div class="col-sm-8">

                             <input type="text" name ="news_date" id="news_date" required value="<?php echo date('Y-m-d');?>" class="form-control" > </input>
                               
                           </div>
                      </div>


                       <div class="form-group">
                           <label for="" class="control-lable col-sm-3">Is_Sticky:</label>
                           <div class="col-sm-8">

                            <input type="checkbox" name="is_sticky" vlaue="1" > Yes
                           </div>
                       </div>


                       <div class="form-group">
                           <label for="" class="control-lable col-sm-3">Image or Pdf:</label>
                           <div class="col-sm-8">

                            <input type="file"  name="info_pdf" id="info_pdf"  accept="image/*">
                           </div>
                       </div>



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
   
  