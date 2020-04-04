<?php
    header("Content-Type: text/html;charset=UTF-8");
    $conn = mysqli_connect("localhost","id","passwd","table");

    mysqli_set_charset($con,'utf8');

    if(mysqli_connect_errno($conn))
    {
      echo "Failed to connect" . mysqli_connect_error();
    }

    $userId = $_GET['id'];
    $userName = $_GET['name'];
    $userEmail = $_GET['email'];
	
    $query = "insert into user value('$u_id','$u_name','$u_email')";
    $result = mysqli_query($conn, $query);

    if($result)
      echo $data;
    else
       echo mysqli_error($conn);


    mysqli_close($conn);
?>


