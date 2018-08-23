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
     parse_str($youtube_link, $info);
     $id = $info['vid_id'];

$data['file'] = $id;






  
   
  
   $video_id = isset($_POST['video_id'])?(int)$_POST['video_id']:0;

   

   if($video_id > 0){
      $act = "update";
   	 $video_id = updateDataById('videos',$data,$video_id);

   }else{
          

          $act = "add";
   	      $video_id = addNews('videos',$data);
   }


   
   if($video_id){
   	 $_SESSION['success']="Video ".$act."ed successfully";
   }else{
   	 $_SESSION['error']="Sorry! There was problem while ".$act."ing video.";
   }

   @header('location:video-list');
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
         $_SESSION['error'] = "Invalid video id";
           
   	  	 @header('location:video-list');
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