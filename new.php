<div class="row">

          <div class="col-md-12 student">
                             
            <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
   <?php 
    $review_data = getNewsId('reviews');

    if($review_data){
   
      foreach ($review_data as $key => $data) {

        

      if($key==0){
         ?>
         <div class="carousel-item active">
          <img src="<?php echo UPLOAD_URL.'review/'.$data['file']; ?>" class="img-fluid"> 
          <hr>
         <h5><?php echo $data['title']; ?></h5> 
         </div>
          

         <?php  
      }
    ?>
       <div class="carousel-item">
       <img src="<?php echo UPLOAD_URL.'review/'.$data['file']; ?>" class="img-fluid">
       <hr>
         <h5><?php echo $data['title']; ?></h5>

         <div style="text-align: justify;" >
                              <p>It Is my immense pleasure to become a part of Tribhuwan Adarsha Awasiya Secondary School. Highly Qualified teachers, well equipped Science lab along with the friendly environment boosted my confidence and provided me platform to show my capabilities. Better SEE results every year  has proven that it is one of the best school in Pharping,Dakshinkali Municipality. So I suggest you all to join TAASS and make your future bright.</p>
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