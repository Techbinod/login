<?php


function getCurrentPage(){
	$current_page =pathinfo($_SERVER['PHP_SELF'],PATHINFO_FILENAME);
	return $current_page;
}


function debugger($data, $is_die="false"){

   echo "<pre>";
   print_r($data);
   echo "</pre>";

   if($is_die){
   	exit;
   }
}


function sanitize($str){
	global $conn;
	return  mysqli_real_escape_string($conn,$str);
	
}


function getUserInfoByUsername($username){
    

    global $conn;
	$sql = "SELECT *FROM users WHERE email_address = '".$username."' ";
	$query  = mysqli_query($conn,$sql);

	if(mysqli_num_rows($query) <= 0){
		return false;
	} else{
		$data = mysqli_fetch_assoc($query);
		return $data;

	}

}

function generateRandomString($length = 100){
	$chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

	$leng=strlen($chars);
	for($i=0;$i<$length;$i++){
		$random.=$chars[rand(0,$leng-1)];
	}
	return $random;

}


function addNews($table,$data){


	global $conn;
	$sql = "INSERT INTO ".$table." SET ";

	    if(is_array($data)){

	    	$temp = array();
	    	foreach($data as $column_name => $value){
	    		$str = $column_name."=";
	    		if(is_string($value)){
	    			$str .="'".$value."'";
	    		}else{
	    			$str .= $value;
	    		}
	    		$temp[] = $str;
	    	}
	    	$sql .= implode("," , $temp );
	    }else{
	    	$sql .= $data;
	    }

  
   $query = mysqli_query($conn,$sql);

   if($query){
   	return mysqli_insert_id($conn);
   }else{
   	return false;
   }
	
}

function getAllNews($table){
	global $conn;
    
	$sql = "SELECT id,title,date,file FROM ".$table." order by id DESC";

	$query = mysqli_query($conn,$sql); 

	if(mysqli_num_rows($query) <=0){
		return false;
	}else{
		$data = array();
		while($row=mysqli_fetch_assoc($query)){
            $data[]=$row;
		}
		return $data;

	}


}



function getDataById($table,$id){

	global $conn;

	$sql = "SELECT * FROM ".$table." WHERE id = ".$id;


	$query = mysqli_query($conn,$sql);

	if(mysqli_num_rows($query) <=0){
		return flase;
	}else{

		return  mysqli_fetch_assoc($query);
	}


 
} 


function updateDataById($table,$data,$row_id ){
   
	global $conn;
	
        $sql = "UPDATE ".$table." SET ";

	    if(is_array($data)){

	    	$temp = array();
	    	foreach($data as $column_name => $value){
	    		$str = $column_name."=";
	    		if(is_string($value)){
	    			$str .="'".$value."'";
	    		}else{
	    			$str .= $value;
	    		}
	    		$temp[] = $str;
	    	}
	    	$sql .= implode("," , $temp );
	    }else{
	    	$sql .= $data;
	    	
	    }

	    $sql .=" WHERE id = ".$row_id."";
	   

    
    
  
	    $query = mysqli_query($conn, $sql);
	    if($query){
	    	return $row_id;

	    }else{
	    	return false;
	    }


}

function getNewsById($title,$id){


	global $conn;
	$sql = "SELECT *FROM ".$title." WHERE id = ".$id;
	$query = mysqli_query($conn,$sql);

	if(mysqli_num_rows($query) <= 0){

		return false;
	}else{
		return mysqli_fetch_assoc($query);
	}

}

function deleteData($table, $field,$value){

	global $conn;

	$sql =" DELETE FROM ".$table." WHERE ".$field." = '".$value."'";

    
	$query = mysqli_query($conn, $sql);

	if($query){

		return true;


	}else{

	 return false;

	}

}



 ?>