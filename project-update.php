<?php require 'utilities/conn.php' ?>
<?PHP require 'utilities/head-link.php' ?>

<!-- Sidebar -->
<?php require 'utilities/sidemenu.php' ?>
<!-- End of Sidebar -->

<?php
$c = $_GET['id'];
// if($_GET !=""){
// }
?>

<?php if($c==0){?>
<div class="card ml-auto mr-auto mt-5" style="width: 40vw;height: fit-content;">

  <div class="card-header d-flex justify-content-between">
    projects Details
  </div>

  <div class="card-body">
    <form action="sql-code.php" method="post" enctype="multipart/form-data">

      <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="project-name" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter Name of project">
        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
      </div>

      <div class="form-group">
        <label for="">Category Name</label>
        <input type="text" name="category-name" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter Name of Category Name">
        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
      </div>

      <div class="form-group">
        <label for="">Thumb-Image</label>
        <input type="file" name="cover-image">
      </div>

      <div class="form-group">
        <label class="form-check-label" for="">Page Image</label>
        <input type="file" id="" name="project-image" multiple="multiple">
      </div>

      <div class="card-footer product-edit-foot text-right bg-dark">
      
        <button type="submit" name="upload" class="btn btn-primary">ADD PROJECT</button>
      
      </div>

    </form>
  </div>
</div>
<?php } ?>

<?php if($c!=0){


  $sql = "SELECT * FROM projects WHERE id=$c";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
          // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
   
?>
<div class="card ml-auto mr-auto mt-5" style="width: 40vw;height: fit-content;">

  <div class="card-header d-flex justify-content-between">
    projects Details
  </div>

  <div class="card-body">
    <form action="sql-code.php" method="post" enctype="multipart/form-data">

      <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="project-name" class="form-control" id="" aria-describedby="emailHelp" value="<?php echo $row["project_name"]?>" placeholder="Enter Name of project">
        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
      </div>

      <div class="form-group">
        <label for="">Category Name</label>
        <input type="text" name="category-name" class="form-control" id="" aria-describedby="emailHelp" value="<?php echo $row["category_name"]?>" placeholder="Enter Name of Category Name">
        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
      </div>

      <div class="form-group">
        <label for="">Thumb-Image</label>
        <input type="file" name="cover-image" value="<?php echo $row['cover_image']?>">
      </div>

      <div class="form-group">
        <label class="form-check-label" for="">Page Image</label>
        <input type="file" id="" name="project-image" multiple="multiple" value="<?php echo $row['project_image']?>">
      </div>

      <div class="card-footer product-edit-foot text-right bg-dark">
      
        <button type="submit" name="edit" value="<?php echo "$c" ?>" class="btn btn-primary">Edit PROJECT</button>
       
      </div>

    </form>
  </div>
</div>

      
      <?php 
       }
      } else {
          echo "0 results";
      }
    
    } ?>

<?php require 'utilities/foot-link.php' ?>