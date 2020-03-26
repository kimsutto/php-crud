<?php
    header("Content-Type: text/html;charset=UTF-8");
    $conn = mysqli_connect("localhost","id","passwd","table");


    $image=$_POST['image'];
    $data=base64_decode($image);
    $escaped_values=mysqli_real_escape_string($conn,$data);


    $query = "insert into image(image) value('$image')";
    $result = mysqli_query($conn, $query);

    if($result)
      echo $data;
    else
       echo mysqli_error($conn);


    mysqli_close($conn);
?>
