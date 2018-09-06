
<?php include('frontend/config/config.php'); ?>
<?php include('frontend/config/function.php'); ?>
<?php include('frontend/includes/header.php'); ?>
<?php include('frontend/includes/nav.php'); ?>
    
   <!-- body containers -->

  
   <div class="container-fluid cover_image col-md-12 col-sm-12 col-lg-12">

   	 

      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">

        
    <?php 
    $banner_image = getNewsId('banners');
    if($banner_image){
      foreach ($banner_image as $key => $data) {

      if($key==0){
         ?>
         <div class="carousel-item active">
          <img src="<?php echo UPLOAD_URL.'banner/'.$data['file']; ?>" class="img-fluid">  
         </div>

         <?php  
      }
    ?>
       <div class="carousel-item">
       <img src="<?php echo UPLOAD_URL.'banner/'.$data['file']; ?>" class="img-fluid">  
       </div>
    <?php 

      }
    }
    
     ?>
    

    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

   </div>


   <div class="container-fluid notice_background ">
   	 
   	 	<div class="container">
   	 		<div class="row text-center  ">
   	 			<div class="col-md-4 my-2">
   	 				 <div class="card" style="width:100%">
				  
				  	<div class="box">
				  		<div class="notice_name"><b>News & Events</b></div>
				  		<div class="notice_name_icon"></div>
				  	</div>

				  <ul class="list-group list-group-flush ">
				    
				     
				    	<?php 
                    $news_data =getNewsId('news');
                     if($news_data){
                      
                      foreach($news_data as $data){
                        
                        ?>
                        <li class="list-group-item ">
                             <a  href="<?php echo PAGES_URL; ?>notice">
                              <h5><?php echo date("F j,Y",strtotime($data['date'])); ?></h5>
                                 <p><?php echo $data['title']; ?></p>
                             </a>
                        </li>
                       <?php 
				                 }
                       }

                       ?>
                       <hr>
                        <a style="margin:-29px 5px 2px; border-radius:20px; color:#fff;" href="<?php echo PAGES_URL; ?>notice" class="btn btn-dark w-50"><i class="fa fa-send"></i>Read More</a>
				  
				  </ul>

                   </div>
   	 			</div>
   	 			<div class="col-md-4 my-2">

   	 					<div class="card" style="width:100%">
				  
				  	<div class="box">
				  		<div class="notice_name"><b>Notice Board</b></div>
				  		<div class="notice_name_icon"></div>
				  	</div>

				  <ul class="list-group list-group-flush ">
				      <?php 
                    $news_data = getNewsId('notices');
                     if($news_data){
                      
                      foreach($news_data as $data){
                        
                        ?>
                        <li class="list-group-item ">
                             <a  href="<?php echo PAGES_URL; ?>notice">
                              <h5><?php echo date("F j,Y",strtotime($data['date'])); ?></h5>
                                 <p><?php echo $data['title']; ?></p>
                             </a>
                        </li>
                       <?php 
                         }
                       }

                       ?>
                       <hr>
                        <a style="margin:-29px 5px 2px; border-radius:20px; color:#fff;" href="<?php echo PAGES_URL; ?>notice" class="btn btn-dark w-50"><i class="fa fa-send"></i>Read More</a>
				  </ul>

                   </div>
   	 				
   	 			</div>
   	 			<div class="col-md-4 my-2  ">

   	 			  <div class="card" style="width:100%;">
				  
				  	<div class="box">
				  		<div class="notice_name"><b>Calendar</b></div>
				  		<div class="notice_name_icon"></div>
				  	</div>

				    <div>

             

              
				    	<img class="card-img-top" src=" <?php echo UPLOAD_URL.'calendar/calender-2018082909275111.jpg'  ?>" alt="Card image cap">
				    </div>

                   </div>
   	 				
   	 			</div>
   	 		</div>
   	 		
   	 	</div>   	 
   	</div>




    <div class="container-fluid teacher_student_row ">

    	<div class="container">
        <div class="row text-center ">
                    
                      <div class="col-md-4">
                        
                        <div class="teacher">

                          <h3>Message From Principal</h3>
                           <div class="card">
                            
                            
                               <img class="img-thumbnail img-responsive " src="frontend/assets/img/teacher.png" alt="Card image cap">
                               
                                  <div class="card-body">
                                    <p class="card-text">As the Head of the Academy, I have the pleasure to assure all the prospective students that you will find this place conducive and productive for your academic pursuit. We focus on imparting quality education and availing of all necessary opportunities to our students for gaining excellence in their respective subjects..</p>
                                    <a href="<?php echo PAGES_URL; ?>about-us" class="btn btn-primary">ReadMore..</a>
                                </div>
                            </div>
                        </div>
                      </div>

                      <div class="col-md-8">
                        <br>
                        <br>
                        <br>
                        
                        <h1>Student Voice</h1>
                        <hr>
                         <div class="row student">

                            <div class="col-md-12 ">
                             
                              <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
   <?php 
    $review_data = getNewsId('reviews');


    if($review_data){
   
      foreach ($review_data as $key => $data) {
         $description=html_entity_decode ($data['description']);
        

      if($key==0){
         ?>
         <div class="carousel-item active">
           <div class="row">
             <div class="col-md-4">
                <img src="<?php echo UPLOAD_URL.'review/'.$data['file']; ?>" class="img-fluid">
                <hr>
               <b> <?php echo $data['title']; ?></b> 
             </div>
             <div class="col-md-7">
              <p ><?php  echo $description; ?></p> 
                      </div>
           </div>
         
         </div>
       

         <?php  
      }
    ?>
       <div class="carousel-item">
       <div class="row">
             <div class="col-md-4">
                <img src="<?php echo UPLOAD_URL.'review/'.$data['file']; ?>" class="img-fluid">
                <hr>
                <b><?php echo $data['title']; ?></b>
             </div>
             <div class="col-md-7">
              <p ><?php echo $description; ?></p> 
                      </div>
           </div>
       </div>
        
    <?php 
      
      }
    }
    
     ?>
  </div>



  <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  
  
</div>
                            </div>
                              
                            
                              
                           

                         </div>
                      </div>
                    
               </div>
      </div>
    	
    </div>


    <div class="container-fluid image_gallery">
          
               <?php 

               $image_data = getNewsId('images');

                ?>
              
          <div class="container">
            <h1 class="text-center">Gallery</h1>
            <div class="row text-center">
              <div class="col-md-6 ">
                
                 <div class="hover_box">
                   <img src="<?php echo UPLOAD_URL.'image/'.$image_data[0]['file']; ?>" class="img-thumbnail">
                     <div class="hover_text">
                       <h5>
                       <?php echo $image_data[0]['title']; ?>
                       </h5>
                     </div>
                 </div>
                 
                  <div class="row">
                    <h6>We Love Our Students' Creativity.</h6>
                  </div>      
              </div>
              
              <div class="col-md-6">

                <?php 

                $video_data=getNewsId('videos');
                
                $video_id= $video_data[0]['file'];
                

                 ?>
                <iframe  width="100%" height="407px" src="https://www.youtube.com/embed/<?php echo $video_id; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
              </div>
           
          </div>

          <div class="row ">

              <div class="col-md-6">
                <div class="hover_box">
                   <img src="<?php echo UPLOAD_URL.'image/'.$image_data[1]['file']; ?>" class="img-thumbnail">
                     <div class="hover_text">
                        <h5>
                        <?php 
                        echo $image_data[1]['title'];
                         ?>
                       </h5>
                     </div>
                 </div>
               </div>

              <div class="col-md-6"><div class="hover_box">
                   <img src="<?php echo UPLOAD_URL.'image/'.$image_data[2]['file']; ?>" class="img-thumbnail">
                     <div class="hover_text">
                        <h5>
                         <?php echo $image_data[2]['title']; ?>
                       </h5>
                     </div>
                 </div>
               </div>
             
            
          </div>
          </div>
      
   </div>

   	 <div class="container-fluid bottom">
   	 	<div class="container">
   	 		
   	 			<div class="row text-center">
   	 			       
   	 				
             <div style="text-align:justify" class="col-md-3">
              <h1 >Contact Us</h1>
               <p><i class="fas fa-map-marker-alt"></i> Pharping,Kathmandu</p>
               <p><i class="fas fa-phone-volume"></i><a href="tel:+014710005"> 01-4710005</a> , <a href="tel:9841115701"> 9841115701</a></p>
               <p><i class="fas fa-envelope"></i><a href="mailto:bindasbino@gmail.com" target="_blank"> bindasbino@gmail.com</a></p>
               <div class="row contact_media">
                   <a  style="padding-left:15px;" class="facebook" href="#"><i class="fab fa-facebook-f"></i></a>
                   <a  class="youtube" href="#"><i class="fab fa-youtube"></i></a>
                   <a  class="twitter" href="#"><i class="fab fa-twitter"></i></a>
                 
               </div>
               <hr>
             </div>
             <div class="col-md-3 quick_links">
                <h1 style="text-align:justify;">Quick Links</h1>
                <ul>
                    <li><a href="">Downloads</a></li>
                    <li><a href="">Notices</a></li>
                    <li><a href="">Gallery</a></li>
                </ul>
                 <hr>
             </div>


   	 				<div class="col-md-6">
   	 					   
   	 						<h1>Google Location</h1>
                 <div class="col-md-12" >
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3535.4078761832898!2d85.26359172483963!3d27.611881647725326!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1ec18304966d9680!2sTribhuvan+Adarsha+School!5e0!3m2!1sen!2snp!4v1533717659098" width="100%"  frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
   	 					</div>
   	 			
   	 				</div>
   	 			</div>
   	 		
   	 	</div>
   	
    
   
 <?php include('frontend/includes/footer.php'); ?>
   