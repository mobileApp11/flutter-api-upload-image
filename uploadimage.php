<?php

include "connect.php" ;


   
   $imagename 	= $_POST['imagename'] ;

   $image		= base64_decode($_POST['image64']) ;


   if($imagename != null) {

   $stmt = $con->prepare( "INSERT INTO `img` (`imagename`) VALUES ( :ximage ) ") ;

   $stmt->execute(array( ":ximage" =>$imagename) );

   $row 	= $stmt->rowCount() ;

   if($row > 0 ) { 
    
    file_put_contents("img\\" . $imagename , $image) ;

    echo json_encode(array(
    'status' => "sucess" ,
     'ximage' => $imagename
    ));

   }
}
