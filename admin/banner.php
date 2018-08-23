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
   		   @header('location:banner-add');
            exit;
   		}

   		$upload_dir =UPLOAD_DIR.'/banner';
   		if(!is_dir($upload_dir)){
   			mkdir($upload_dir,'0777',true);
   		}

   		$file_name = "banner-".date('Ymdhis').rand(0,999).'.'.$ext;
   		
   		$success = move_uploaded_file($_FILES['file']['tmp_name'],$upload_dir.'/'.$file_name);
   		if($success){
   			$data['file']=$file_name;
   		}

   	}
   
   }


   if(isset($_POST['del_old_image']) && !empty($_POST['del_old_image'])){
      
        $old_image = $_POST['del_old_image'];
        if(file_exists(UPLOAD_DIR.'/banner/'.$old_image)){
      	   $success = unlink(UPLOAD_DIR.'/banner/'.$old_image);

      	   if($success){
      	   	    $data['file']=NULL;
      	   }
      }

   }

   

   $banner_id = isset($_POST['banner_id'])?(int)$_POST['banner_id']:0;

    
   if($banner_id > 0){
      $act = "update";
   	 $banner_id = updateDataById('banners',$data,$banner_id);


   }else{
          
          $act = "add";
   	      $news_id = addNews('banners',$data);
   }


   
   if($news_id){
   	 $_SESSION['success']="Banner ".$act."ed successfully";
   }else{
   	 $_SESSION['error']="Sorry! There was problem while ".$act."ing banners.";
   }

   @header('location:banner-list');
   exit;


  

}elseif (isset($_GET['id'],$_GET['act']) && !empty($_GET['id']) && !empty($_GET['act'])){



   if($_GET['act'] =='delete'){

   
   	  $banner_id = (int)$_GET['id'];


       
   	  if($banner_id <=0){
         $_SESSION['error'] = "Invalid banner id";
           
   	  	 @header('location:banner-list');
   	     exit;
    
   	  }

   	  $news_info = getNewsById('banners',$banner_id);

   
   	 
         
   	  if($news_info){


           $del = deleteData('banners','id',$banner_id);

           if($del){ 

              $_SESSION['success']='Banner deleted Successfully';
               $old_image = $banner_info['file'];
              if(file_exists(UPLOAD_DIR.'/banner/'.$old_image)){
      	      $success = unlink(UPLOAD_DIR.'/banner/'.$old_image);
      	      if($success){
      	   	   $data['file']=NULL;
      	     }
      	     
            }
            
           }else{
           	$_SESSION['error'] = 'Sorry! There was problem  while deleting banner';
           }

           @header('location:banner-list');
           exit; 
   	  }else{
   	  	 $_SESSION['error']="Banner not found";
		 @header('location:banner-list');
   	     exit;
   	  }

    
   }else{
   	 $_SESSION['error']="Invalid Action";
   	 @header('location:banner-list');
   	 exit;
   }
	
}



else {
	$_SESSION['warning'] = "Unauthorized access";
	@header('location:banner-list');
	exit;
}



 ?>