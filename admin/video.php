<?php
require 'inc/config.php';
require 'inc/functions.php';
require 'inc/session.php';
require 'inc/notification.php';

if(isset($_POST) && !empty($_POST)){

   $data['title']=sanitize($_POST['title']);
   $data['description']=htmlentities(sanitize($_POST['description']));
   $data['date']= sanitize($_POST['date']);
   $post_link=sanitize($_POST['file']);
   $youtube_link =str_replace('https://youtu.be/', 'https://www.youtube.com/watch?v=', $post_link);
   $youtube_link = str_replace('https://www.youtube.com/watch?v=', 'vid_id=', $youtube_link);	
   parse_str($youtube_link, $video);
   $id = $video['vid_id'];
   $data['file']= $id;
  
   
   $video_id = addNews('videos',$data);
   if($video_id){
   	 $_SESSION['success'] = "Video added Successfully.";
   	 @header('location:video-list');
   	 exit;
   }


   

   $notice_id = isset($_POST['id'])?(int)$_POST['id']:0;

   if($notice_id > 0){
      $act = "update";
   	 $notice_id = updateDataById('notices',$data,$notice_id);

   }else{
          
          $act = "add";
   	      $notice_id = addNews('notices',$data);
   }


   
   if($notice_id){
   	 $_SESSION['success']="Notice ".$act."ed successfully";
   }else{
   	 $_SESSION['error']="Sorry! There was problem while ".$act."ing notices.";
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

   
   	  $video_id = (int)$_GET['id'];
       
   	  if($video_id <=0){
         $_SESSION['error'] = "Invalid notice id";
           
   	  	 @header('location:notice-list');
   	     exit;
    
   	  }

   	  $video_info = getNewsById('videos',$video_id);
   	 
         
   	  if($video_info){


           $del = deleteData('videos','id',$video_id);

           if($del){ 

              $_SESSION['success']='Video deleted Successfully';
               
             
           }else{
           	$_SESSION['error'] = 'Sorry! There was problem  while deleting videos';
           }

           @header('location:video-list');
           exit; 
   	  }else{
   	  	 $_SESSION['error']="Notice not found";
		 @header('location:video-list');
   	     exit;
   	  }

    
   }else{
   	 $_SESSION['error']="Invalid Action";
   	 @header('location:video-list');
   	 exit;
   }
	
}



else {
	$_SESSION['warning'] = "Unauthorized access";
	@header('location:video-list');
	exit;
}



 ?>