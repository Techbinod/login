<?php include('../config/config.php'); ?>
<?php include('../includes/header.php'); ?>
<?php include('../includes/nav.php'); ?>


<div style="margin-top: 100px;">
    <h4 style="text-align: center; color:black;background-color:#BC9F93; padding:50px;">Home/Gallery</h4>
 </div>

<div class="container">
     
 
 
<div class="container gallery-container">
  
    <h1 class="text-center">Memorable Events</h1>
  
    
      
    <div class="tz-gallery">
  
        <div class="row mb-3">
            <div class="col-md-4 ">
                <div class="gallery_box">
                    <a class="lightbox" href="<?php echo GALLERY_IMAGE?>1.jpg">
                    <img src="<?php echo GALLERY_IMAGE?>1.jpg" alt="Park" class="card-img-top">
                    </a>
                </div>
            </div>
             
            <div class="col-md-4">
                <div class="gallery_box">
                    <a class="lightbox" href="<?php echo GALLERY_IMAGE?>2.jpg">
                    <img src="<?php echo GALLERY_IMAGE?>2.jpg" alt="Park" class="card-img-top">
                    </a>
                </div>
            </div>
             
            <div class="col-md-4">
                <div class="gallery_box">
                    <a class="lightbox" href="<?php echo GALLERY_IMAGE?>3.jpg">
                    <img src="<?php echo GALLERY_IMAGE?>3.jpg" alt="Park" class="card-img-top">
                    </a>
                </div>
            </div>
        </div>
          <div class="row"> 
            <div class="col-md-4">
                <div class="gallery_box">
                    <a class="lightbox" href="<?php echo GALLERY_IMAGE?>4.jpg">
                    <img src="<?php echo GALLERY_IMAGE?>4.jpg" alt="Park" class="card-img-top">
                    </a>
                </div>
            </div>
             
            <div class="col-md-4">
                <div class="gallery_box">
                    <a class="lightbox" href="<?php echo GALLERY_IMAGE?>5.jpg">
                    <img src="<?php echo GALLERY_IMAGE?>5.jpg" alt="Park" class="card-img-top">
                    </a>
                </div>
            </div>
             
            <div class="col-md-4">
                <div class="gallery_box">
                    <a class="lightbox" href="<?php echo GALLERY_IMAGE?>6.jpg">
                    <img src="<?php echo GALLERY_IMAGE?>6.jpg" alt="Park" class="card-img-top">
                    </a>
                </div>
            </div>
         
        </div>
  
    </div>
  
</div>
 
</div>

<?php include('../includes/footer.php'); ?>
