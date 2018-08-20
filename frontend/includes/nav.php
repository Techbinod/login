
<!--   navigation bar --> 
<nav class=" navbar navbar-expand-lg  navbar_desing fixed-top ">

  <a class="navbar-brand" href="<?php echo SITE_URL; ?>">
    <img   class="img img-responsive" src="<?php echo IMG_URL ?>school_logo_with_name.png">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
    
  </button>
  <div class="container-fluid">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo SITE_URL; ?>">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo PAGES_URL?>about-us">About Us</a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="<?php echo PAGES_URL ?>academic-program">Academic Program</a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="<?php echo PAGES_URL ?>admission">Admission</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo PAGES_URL?>notice">Notices</a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="<?php echo PAGES_URL?>gallery"">Gallery</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Facilities
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo PAGES_URL?>extra">Extra Curriculum</a>
          <a class="dropdown-item" href="<?php echo PAGES_URL?>sports">Sports</a>
          <a class="dropdown-item" href="<?php echo PAGES_URL?>transport">Transport</a>
          <a class="dropdown-item" href="<?php echo PAGES_URL?>hostel">Hostel</a>
          
      </li>
     
     <li class="nav-item">
        <a class="nav-link" href="<?php echo PAGES_URL?>guest-teacher">Guest Teacher</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="<?php echo PAGES_URL?>contact-us">Contact</a>
      </li>
     
    </ul>
   
  </div>
  </div>
</nav>