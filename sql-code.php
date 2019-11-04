<?php require 'utilities/conn.php' ?>
<?PHP require 'utilities/head-link.php' ?>

<!-- Sidebar -->
<?php require 'utilities/sidemenu.php' ?>
<!-- End of Sidebar -->
<?php
$project_name = $_POST['project-name'];
$category_name = $_POST['category-name'];
$cover_image = date("YmdH:i:s").$_FILES['cover-image']['name'];
$project_image = date("YmdH:i:s").$_FILES['project-image']['name'];

if(isset($_POST['upload'])){
    
// first file cover-image
$target_dir = "uploads/img/";
$target_file1 = $target_dir .date('mdY').time(). basename($_FILES["cover-image"]["name"]);
// print_r($target_file1);die;
$uploadOk = 1;
$imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["upload"])) {
    $check = getimagesize($_FILES["cover-image"]["tmp_name"]);
    if($check !== false) {
        echo "<br> File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "<br> File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file1)) {
    echo "<br> Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["cover-image"]["size"] > 50000000) {
    echo "<br> Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"
&& $imageFileType1 != "gif" && $imageFileType1 != "svg" ) {
    echo "<br> Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<br> Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["cover-image"]["tmp_name"], $target_file1)) {
        echo "<br> The file ".date('mdYH:i:s'). basename( $_FILES["cover-image"]["name"]). " has been uploaded.";
    } else {
        echo "<br> Sorry, there was an error uploading your file.";
    }
}


// second fileproject-image

$target_dir = "uploads/img/";
$target_file2 = $target_dir .date('mdYHis').basename($_FILES["project-image"]["name"]);
$uploadOk = 1;
$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["upload"])) {
    $check = getimagesize($_FILES["project-image"]["tmp_name"]);
    if($check !== false) {
        echo "<br> File is an image - " . $check["mime"] . ".";

        $uploadOk = 1;
    } else {
        echo "<br> File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file2)) {
    echo "<br> Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["project-image"]["size"] > 50000000) {
    echo "<br> Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
&& $imageFileType2 != "gif" && $imageFileType2 != "svg" ) {
    echo "<br> Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<br> Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["project-image"]["tmp_name"], $target_file2)) {
        echo "<br> The file ".date('m-d-Y H:i:s'). basename( $_FILES["project-image"]["name"]). " has been uploaded.";
    } else {
        echo "<br> Sorry, there was an error uploading your file.";
    }
}



if(isset($_POST['upload'])){

    if($uploadOk != 0){
        $sql = "INSERT INTO projects (project_name,category_name,cover_image,project_image)
         VALUE ('$project_name','$category_name','$cover_image','$project_image')";    
    }
    
    if (mysqli_query($conn, $sql) != "") {
      echo "<br> New record created successfully";
    } else {
      echo "<br> Error: " . $sql . "<br>" . mysqli_error($conn);
    } 

}

}

if(isset($_POST['edit'])){

    $id = $_POST['edit'];

    $sql = "UPDATE projects SET project_name='$project_name', category_name='$category_name', cover_image='$cover_image', project_image='$project_image' where id='$id' ";


    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    


}


?>


<?php require 'utilities/foot-link.php' ?>