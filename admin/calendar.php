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
         @header('location:calendar-add');
            exit;
      }

      $upload_dir =UPLOAD_DIR.'/calendar';
      if(!is_dir($upload_dir)){
        mkdir($upload_dir,'0777',true);
      }

      $file_name = "calender-".date('Ymdhis').rand(0,999).'.'.$ext;
      
      $success = move_uploaded_file($_FILES['file']['tmp_name'],$upload_dir.'/'.$file_name);
      if($success){
        $data['file']=$file_name;
      }

    }
   
   }


   if(isset($_POST['del_old_image']) && !empty($_POST['del_old_image'])){
      
        $old_image = $_POST['del_old_image'];
        if(file_exists(UPLOAD_DIR.'/calendar/'.$old_image)){
           $success = unlink(UPLOAD_DIR.'/calendar/'.$old_image);

           if($success){
                $data['file']=NULL;
           }
      }

   }

   


   $calendar_id = isset($_POST['calendar_id'])?(int)$_POST['calendar_id']:0;

   
   
   if($calendar_id > 0){
      $act = "update";
     $calendar_id = updateDataById('calendars',$data,$calendar_id);


   }else{
          
          $act = "add";
          $calendar_id = addNews('calendars',$data);
   }


   
   if($notice_id){
     $_SESSION['success']="Calendars ".$act."ed successfully";
   }else{
     $_SESSION['error']="Sorry! There was problem while ".$act."ing calendar.";
   }

   @header('location:calendar-list');
   exit;



}elseif (isset($_GET['id'],$_GET['act']) && !empty($_GET['id']) && !empty($_GET['act'])){



   if($_GET['act'] =='delete'){

   
      $calendar_id = (int)$_GET['id'];

       
      if($calendar_id <=0){
         $_SESSION['error'] = "Invalid calendar id";
           
         @header('location:calendar-list');
         exit;
    
      }

    

      $calendar_info = getNewsById('calendars',$calendar_id);
      
        
         
      if($calendar_info){


           $del = deleteData('calendars','id',$calendar_id);



           if($del){ 

              $_SESSION['success']='Notice deleted Successfully';
               $old_image = $calendar_info['file'];
              if(file_exists(UPLOAD_DIR.'/calendar/'.$old_image)){
              $success = unlink(UPLOAD_DIR.'/calendar/'.$old_image);
              if($success){
               $data['file']=NULL;
             }
             
            }
            
           }else{
            $_SESSION['error'] = 'Sorry! There was problem  while deleting notice';
           }

           @header('location:calendar-list');
           exit; 
      }else{
         $_SESSION['error']="Calendar not found";
     @header('location:calendar-list');
         exit;
      }

    
   }else{
     $_SESSION['error']="Invalid Action";
     @header('location:calendar-list');
     exit;
   }
  
}



else {
  $_SESSION['warning'] = "Unauthorized access";
  @header('location:calendar-list');
  exit;
}



 ?>