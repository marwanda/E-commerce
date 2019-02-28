<html>

<head>

</head>

<body>
<?php

include "include/config.php";

if ($_POST) {
//var_dump($_FILES);

    $uploadPath = 'products';
    $upload_result = @upload_image($_FILES['picture'], $uploadPath, $image_sizes['services']);
    $uploaded_file_name = $upload_result['data']['file_name'];
    $thumb_file = $FILES_ROOT .'images/'. $uploadPath .'/thumb/'. $uploaded_file_name;
    $medium_file = $FILES_ROOT .'images/'. $uploadPath .'/medium/'. $uploaded_file_name;
    $large_file = $FILES_ROOT .'images/'. $uploadPath .'/large/'. $uploaded_file_name;
    $pics=array(
            'thumb'=>$thumb_file,
        'medium'=>$medium_file,
        'large'=>$large_file,
    );
//    var_dump($pics);



}


?>


<form action="" method="post" enctype="multipart/form-data">
    <label>Pic:</label><input type="file" name="picture" accept="image/*">
    <input type="submit" name="file" value="ok">
</form>


</body>
</html>