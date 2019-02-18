<html>

<head>

</head>

<body>
<?php

include "include/config.php";

if ($_POST) {

//    $uploadPath = 'news';
//    $upload_result = @upload_image($_FILES['picture'], $uploadPath, $image_sizes['services']);
//    $uploaded_file_name = $upload_result['data']['file_name'];
//    $thumb_file = 'images/' . $uploadPath . '/img/' . $uploaded_file_name;
//    var_dump($thumb_file);



}


?>


<form action="" method="post" enctype="multipart/form-data">
    <label>Pic:</label><input type="file" name="file" accept="application/">
    <input type="submit" name="file" value="ok">
</form>


</body>
</html>