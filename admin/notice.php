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
         @header('location:notice-add');
            exit;
      }

      $upload_dir =UPLOAD_DIR.'/notice';
      if(!is_dir($upload_dir)){
        mkdir($upload_dir,'0777',true);
      }

      $file_name = "notice-".date('Ymdhis').rand(0,999).'.'.$ext;
      
      $success = move_uploaded_file($_FILES['file']['tmp_name'],$upload_dir.'/'.$file_name);
      if($success){
        $data['file']=$file_name;
      }

    }
   
   }


   if(isset($_POST['del_old_image']) && !empty($_POST['del_old_image'])){
      
        $old_image = $_POST['del_old_image'];
        if(file_exists(UPLOAD_DIR.'/notice/'.$old_image)){
           $success = unlink(UPLOAD_DIR.'/notice/'.$old_image);

           if($success){
                $data['file']=NULL;
           }
      }

   }

   

   $notice_id = isset($_POST['notice_id'])?(int)$_POST['notice_id']:0;

    
   if($notice_id > 0){
      $act = "update";
     $notice_id = updateDataById('notices',$data,$notice_id);


   }else{
          
          $act = "add";
          $news_id = addNews('notices',$data);
   }


   
   if($notice_id){
     $_SESSION['success']="Notice ".$act."ed successfully";
   }else{
     $_SESSION['error']="Sorry! There was problem while ".$act."ing notice.";
   }

   @header('location:notice-list');
   exit;


   /* debugger($data);
  echo "<pre>";
  print_r($_POST);
  print_r($_FILES);
  echo "</pre>";*/

}elseif (isset($_GET['id'],$_GET['act']) && !empty($_GET['id']) && !empty($_GET['act'])){



   if($_GET['act'] =='delete'){

   
      $notice_id = (int)$_GET['id'];
       
      if($notice_id <=0){
         $_SESSION['error'] = "Invalid notice id";
           
         @header('location:notice-list');
         exit;
    
      }

      $notice_info = getNewsById('notices',$notice_id);
     
         
      if($notice_info){


           $del = deleteData('notices','id',$notice_id);

           if($del){ 

              $_SESSION['success']='Notice deleted Successfully';
               $old_image = $notice_info['file'];
              if(file_exists(UPLOAD_DIR.'/notice/'.$old_image)){
              $success = unlink(UPLOAD_DIR.'/notice/'.$old_image);
              if($success){
               $data['file']=NULL;
             }
             
            }
            
           }else{
            $_SESSION['error'] = 'Sorry! There was problem  while deleting notice';
           }

           @header('location:notice-list');
           exit; 
      }else{
         $_SESSION['error']="Notice not found";
     @header('location:notice-list');
         exit;
      }

    
   }else{
     $_SESSION['error']="Invalid Action";
     @header('location:notice-list');
     exit;
   }
  
}



else {
  $_SESSION['warning'] = "Unauthorized access";
  @header('location:notice-list');
  exit;
}



 ?>