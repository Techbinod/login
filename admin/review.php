<?php 


require 'inc/config.php';
require 'inc/functions.php';
require 'inc/session.php';
require 'inc/notification.php';


if(isset($_POST) && !empty($_POST)){
 
   
   
   $data['title']=sanitize($_POST['title']);
   $data['description']=htmlentities(sanitize($_POST['description']));
   $data['date']= sanitize($_POST['date']);
   $data['is_sticky']= (isset($_POST['is_sticky']) && $_POST['is_sticky']=='on')? 1:0;


   if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){

   	$ext=pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
   	if(in_array($ext,ALLOWED_EXTENSIONS)){
   		if(($_FILES['file']['size']) > 1048576){
   		   $_SESSION['warning'] ="Please Upload Image less than 1 MB";
   		   @header('location:review-add');
            exit;
   		}

   		$upload_dir =UPLOAD_DIR.'/review';
   		if(!is_dir($upload_dir)){
   			mkdir($upload_dir,'0777',true);
   		}

   		$file_name = "review-".date('Ymdhis').rand(0,999).'.'.$ext;
   		
   		$success = move_uploaded_file($_FILES['file']['tmp_name'],$upload_dir.'/'.$file_name);
   		if($success){
   			$data['file']=$file_name;
   		}

   	}
   
   }



   if(isset($_POST['del_old_image']) && !empty($_POST['del_old_image'])){
      
        $old_image = $_POST['del_old_image'];
        if(file_exists(UPLOAD_DIR.'/review/'.$old_image)){
      	   $success = unlink(UPLOAD_DIR.'/review/'.$old_image);

      	   if($success){
      	   	    $data['file']=NULL;
      	   }
      }

   }

  

   $review_id = isset($_POST['id'])?(int)$_POST['id']:0;

   
  


   if($review_id > 0){
      $act = "update";
   	 $review_id = updateDataById('reviews',$data,$review_id);



   }else{
          


          $act = "add";
   	      $review_id = addNews('reviews',$data);




   	     
   }


   
   if($review_id){
   	 $_SESSION['success']="Reviews ".$act."ed successfully";
   }else{
   	 $_SESSION['error']="Sorry! There was problem while ".$act."ing review.";
   }

   @header('location:review-list');
   exit;



}elseif (isset($_GET['id'],$_GET['act']) && !empty($_GET['id']) && !empty($_GET['act'])){



  

   if($_GET['act'] =='delete'){

       

   	  $review_id = (int)$_GET['id'];
       
   	  if($review_id <=0){
         $_SESSION['error'] = "Invalid review id";
           
   	  	 @header('location:review-list');
   	     exit;
    
   	  }

   	  $review_info = getNewsById('reviews',$review_id);
   	 
   	 
         
   	  if($review_info){


           $del = deleteData('reviews','id',$review_id);

           if($del){ 

              $_SESSION['success']='News deleted Successfully';
               $old_image = $review_info['file'];
              if(file_exists(UPLOAD_DIR.'/review/'.$old_image)){
      	      $success = unlink(UPLOAD_DIR.'/review/'.$old_image);
      	      if($success){
      	   	   $data['file']=NULL;
      	     }
      	     
            }
            
           }else{
           	$_SESSION['error'] = 'Sorry! There was problem  while deleting review';
           }

           @header('location:review-list');
           exit; 
   	  }else{
   	  	 $_SESSION['error']="Review not found";
		 @header('location:review-list');
   	     exit;
   	  }

    
   }else{
   	 $_SESSION['error']="Invalid Action";
   	 @header('location:review-list');
   	 exit;
   }
	
}



else {
	$_SESSION['warning'] = "Unauthorized access";
	@header('location:review-list');
	exit;
}



 ?>