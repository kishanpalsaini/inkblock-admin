<!DOCTYPE html>
<html lang="en">


<?php require 'utilities/conn.php';  ?>
<?php require 'utilities/head-link.php' ?>
<?php require 'utilities/sidemenu.php' ?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="card w-100 mt-5">
                <div class="card-header d-flex justify-content-between">
                    projects
                    <a href="project-update.php?id=0" class="btn btn-success text-align-right">ADD PROJECT</a>
                </div>
                <div class="card-body">

                    <!-- start-Table -->
                    <table class="table">
                        <thead>
                            <th>id</th>
                            <th>Name</th>
                            <th>category-name</th>
                            <th>cover-image</th>
                            <th>project-image</th>
                            <th><b>Action</b></th>
                        </thead>
                        <tbody>

                            <?php
                            $sql_select = "SELECT * FROM projects ";
                            $result = mysqli_query($conn, $sql_select);

                            if (mysqli_num_rows($result) > 0) {
                              // output data of each row
                              while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row["id"]?></td>
                                        <td><?php echo $row["project_name"]?></td>
                                        <td><?php echo $row["category_name"]?></td>
                                        <td><?php echo $row['cover_image']?></td>
                                        <td><?php echo $row['project_image']?></td>
                                        <td><a href="project-update.php?id=<?php echo ($row['id'])?>">Edit</a>/<a
                                                href="javascript:;"
                                                onclick="alertmagic(<?php echo ($row['id'])?>)">Delete</a>/<a href="">View</a>
                                        </td>
                                    </tr>

                                    <!-- echo "<tr><td>" .$row['id']. "</td><td>" .$row['project_name']. "</td><td>" .$row['category_name']. "</td><td>" .$row['cover_image']. "</td><td>" .$row['project_image']. "</td><td>" ."<a href='upload-data.php?option=edit'>"."Edit/"."</a>"."<a href='upload-data.php?option='delete''>"."Delete"."</a>". "</td></tr>"; -->

                                    <?php
                              }
                          } else {
                              echo "0 results";
                          }
                          ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="login.html">Logout</a>
      </div>
    </div>
  </div>
</div> -->


<script>
// if the ok button is clicked, result will be true (boolean)

function alertmagic(id_no) {
    var result = confirm("Do you want to do this?");
    var id = id_no;
    if (result) {
        // the user clicked ok
        window.location.href = "project-list.php?alert=ok&id="+id;
        debugger

           
    } else {
        // the user clicked cancel or closed the confirm dialog.
    }
}
</script>

<?php

if($_GET['alert'] == "ok"){

  $id_no = $_GET['id'];
  $sql = "DELETE FROM projects WHERE `id`= $id_no";
  $x=mysqli_query($conn, $sql);
  // print_r($x);die;
  if (mysqli_query($conn, $sql)) {
      echo "Record deleted successfully";
      // header("Location: project-list.php?alert");

      $file_name = "SELECT cover_image, project_image FROM projects WHERE id=$id_no ";
      $result = mysqli_query($conn, $file_name);

      if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
          $file_cover = $row['cover_image'];
          $file_project = $row['project_image'];
        }

      } else {
        echo "0 results";
    }

              // Folder path to be flushed 
        $folder_path = "uploads/img/"; 
          
        // List of name of files inside 
        // specified folder 
        $files = glob($folder_path.'/*');  
          
        // Deleting all the files in the list 
        foreach($files as $file_cover) { 
          
            if(is_file($file_cover))  
            
                // Delete the given file 
                unlink($file_cover);  
        } 
        
        foreach( $files as $file_project) { 
          
          if(is_file($file_project))  
          
              // Delete the given file 
              unlink($file_project);  
      } 


      ?>
      <script> 
        window.location.href = "project-list.php?alert";
         </script>
      <?php
  } else {
      echo "Error deleting record: " . mysqli_error($conn);
  }
  
}


?>

<?php require 'utilities/foot-link.php' ?>