<?php 


require 'inc/config.php';
require 'inc/functions.php';
require 'inc/session.php';
require 'inc/notification.php';


if(isset($_POST) && !empty($_POST)){ 
  


   $file= $_FILES['folder_images'];   

   $length=count($file['name']);

        
        $items=array("#000","","#c60d0d","#273996","#238224","#824d23","#672382","#647275");
        $color =$items[array_rand($items)];

      

   for($i=0;$i<$length;$i++){

   	if(isset($file['name'][$i]) && $file['error'][$i] == 0){ 

   	$ext=pathinfo($file['name'][$i],PATHINFO_EXTENSION);
      
   	if(in_array($ext,ALLOWED_EXTENSIONS)){
   		if($file['size'] <= 5000000 ){
   		   $_SESSION['warning'] ="Please Upload Image less than 1 MB";
   		   @header('location:gallery-add');
            exit;
   		}


      
   		$upload_dir =UPLOAD_DIR.'/gallery'.'/'.$_POST['title'];


   			
   		if(!is_dir($upload_dir)){
   			mkdir($upload_dir,'0777',true);
   		}

   		$file_name = "gallery-".date('Ymdhis').rand(0,999).'.'.$ext;
   		
   		$success = move_uploaded_file($file['tmp_name'][$i],$upload_dir.'/'.$file_name);
   		if($success){
   			$data['file']=$file_name;
   		}

   	}
   	
   
   }
      
     
    $data['folder']=$_POST['title'];
    $data['color']=$color;           
    $gallery_add = addNews('galleries',$data);    

   }
   @header('location:gallery-list');
}

if(isset($_GET['id'], $_GET['act']) && !empty($_GET['id']) && !empty($_GET['act'])){

     $act= $_GET['act'];
     $id = $_GET['id'];


    

     if($act ='edit'){
        

         
         
          
          
           @header("location:single-gallery-add?id=".$id);
        
     	
     	

     }


 }

     
   


   


          
         
   	     
  

    
  


 ?>