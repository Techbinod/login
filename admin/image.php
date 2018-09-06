<?php 


require 'inc/config.php';
require 'inc/functions.php';
require 'inc/session.php';
require 'inc/notification.php';


/*var_dump($_POST);

debugger($_FILES,true);*/


if(isset($_POST) && !empty($_POST)){
 
     
  
   $data['title']=sanitize($_POST['title']);
   $data['date']= sanitize($_POST['date']);
   
   if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){

    $ext=pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
    if(in_array($ext,ALLOWED_EXTENSIONS)){
      if(($_FILES['file']['size']) > 1048576){
         $_SESSION['warning'] ="Please Upload Image less than 1 MB";
         @header('location:calendar-add');
            exit;
      }

      $upload_dir =UPLOAD_DIR.'/image';
      if(!is_dir($upload_dir)){
        mkdir($upload_dir,'0777',true);
      }

      $file_name = "image-".date('Ymdhis').rand(0,999).'.'.$ext;
      
      $success = move_uploaded_file($_FILES['file']['tmp_name'],$upload_dir.'/'.$file_name);
      if($success){
        $data['file']=$file_name;
      }

    }
   
   }


   if(isset($_POST['del_old_image']) && !empty($_POST['del_old_image'])){
      
        $old_image = $_POST['del_old_image'];
        if(file_exists(UPLOAD_DIR.'/image/'.$old_image)){
           $success = unlink(UPLOAD_DIR.'/image/'.$old_image);

           if($success){
                $data['file']=NULL;
           }
      }

   }

   


   $image_id = isset($_POST['image_id'])?(int)$_POST['image_id']:0;

   
   
   if($image_id > 0){
      $act = "update";
     $image_id = updateDataById('images',$data,$image_id);


   }else{
          
          $act = "add";
          $image_id = addNews('images',$data);
   }


   
   if($image_id){
     $_SESSION['success']="Image ".$act."ed successfully";
   }else{
     $_SESSION['error']="Sorry! There was problem while ".$act."ing images.";
   }

   @header('location:image-list');
   exit;



}elseif (isset($_GET['id'],$_GET['act']) && !empty($_GET['id']) && !empty($_GET['act'])){



   if($_GET['act'] =='delete'){

   
      $image_id = (int)$_GET['id'];

       
      if($image_id <=0){
         $_SESSION['error'] = "Invalid calendar id";
           
         @header('location:image-list');
         exit;
    
      }

    

      $image_info = getNewsById('images',$image_id);
      
        
         

      if($image_info){


           $del = deleteData('images','id',$image_id);

            
           if($del){ 

              $_SESSION['success']='Image deleted Successfully';
               $old_image = $image_info['file'];
              if(file_exists(UPLOAD_DIR.'/image/'.$old_image)){
              $success = unlink(UPLOAD_DIR.'/image/'.$old_image);
              if($success){
               $data['file']=NULL;
             }else{
              echo "There was problem while unlinking images";
              exit;
             }
             
            }
            
           }else{
            $_SESSION['error'] = 'Sorry! There was problem  while deleting image';
           }

           @header('location:image-list');
           exit; 
      }else{
         $_SESSION['error']="Image not found";
     @header('location:Image-list');
         exit;
      }

    
   }else{
     $_SESSION['error']="Invalid Action";
     @header('location:image-list');
     exit;
   }
  
}



else {
  $_SESSION['warning'] = "Unauthorized access";
  @header('location:image-list');
  exit;
}



 ?>