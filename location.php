<?php

    error_reporting(E_ALL);
    ini_set('display_errors',1);

    include('dbcon.php');


    $stmt = $con->prepare('select a.loc_name, a.loc_address, b.image, c.u_name, a.loc_type, a.loc_date, a.loc_platform, a.loc_latitude, a.loc_longitude, a.loc_category, a.loc_enter, a.loc_seat, a.loc_park, a.loc_toilet, a.loc_elevator, a.phone_num, a.u_aditional from location as a join image as b on a.loc_no = b.img_no join user as c on a.u_no = c.u_no order by a.loc_no desc;');
    $stmt->execute();

    

    if ($stmt->rowCount() > 0)
    {
        $data = array();

        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
         extract($row);
         array_push($data,
         array('name'=>$locName,
               'address'=>$locAddress,
		'image' =>$image,
		'userName'=>$u_name,  
		'locType'=>$loc_type,
		'uploadDate'=>$loc_date,
		'platform'=>$loc_platform,
		'latitude' => $loc_latitude,
		'longitude' => $loc_longitude,
		'category' =>$loc_category,
		'entrance' =>$loc_enter,
		'seat'=>$loc_seat,
		'parking'=>$loc_park,
		'toilet'=>$loc_toilet,
		'elevator'=>$loc_elevator,
		'phone' =>$phone_num,
		'etcInfo'=>$u_additional
                ));
         }
	
	
        
        header('Content-Type: application/json; charset=utf8');
        $json = json_encode(array("root"=>$data),JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
        echo $json;

        
	//echo json_encode(array("response" => $data),JSON_UNESCAPED_UNICODE);
  }
?>
