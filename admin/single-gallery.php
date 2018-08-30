

       <?php 

      include 'inc/header.php'; 
      require_once 'inc/notification.php';
      require_once 'inc/functions.php';
      require_once 'inc/session.php';


      
   
   $data['folder']=sanitize($_POST['title']);
   $data['color']=sanitize($_POST['color']);
   $id=$_POST['id'];
   $old_image = $_POST['file'];

    

   if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){


   

   	$ext=pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);



   	if(in_array($ext,ALLOWED_EXTENSIONS)){
   		if(($_FILES['file']['size']) > 1048576){
   		   $_SESSION['warning'] ="Please Upload Image less than 1 MB";
   		   @header('location:single-gallery-add');
            exit;
   		}

   		 if(file_exists(UPLOAD_DIR.'/gallery/'.$data['folder'].'/'.$old_image)){
      	   $success = unlink(UPLOAD_DIR.'/gallery/'.$data['folder'].'/'.$old_image);

      	   if($success){
      	   	    $data['file']=NULL;
      	   }
         }
 
      
   		$upload_dir =UPLOAD_DIR.'/gallery/'.$data['folder'];


   		if(!is_dir($upload_dir)){
   			mkdir($upload_dir,'0777',true);
   		}

   		$file_name = $data['folder']."-".date('Ymdhis').rand(0,999).'.'.$ext;
   		$success = move_uploaded_file($_FILES['file']['tmp_name'],$upload_dir.'/'.$file_name);
   		if($success){
   			$data['file']=$file_name;
   		}

   	}
   
   }
     

    

     $update= updateDataById('galleries',$data,$id);
     	if($update){
            
     		$_SESSION['success']="Successfully Image Edited";
     		@header('location:gallery-list');
        }else{
        	$_SESSION['error']="Sorry there was problem while editing image gallery";
     		@header('location:gallery-list');
        }	
     


        ?>
     