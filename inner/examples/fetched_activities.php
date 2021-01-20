<?php 
include("../../auth_session.php");
include('header.php');
require('../../db.php'); 
 // $key=$_GET['key'];
 $id = $_SESSION['id'];
 $user_type = $_SESSION['user_type'];
$date= date('Y-m-d');
if ($user_type==1) {$sql = "SELECT * FROM `activities`";
  # code...
}else{
  $sql = "SELECT * FROM `activities` WHERE  user_id=$id ";
}
   
               
          		$result = $con->query($sql);

              ?>
<?php
if (isset($_GET['type'])) {

  $activity_id=$_GET['id'];

 
  $sql = "DELETE FROM `activities` WHERE  id = $activity_id";
    $result = $con->query($sql);
     echo '<script>window.location.href = "fetched_activities.php";</script>';

}

?>





<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
      
     <div class="container"><div class="container"><div class="container"><div class="container"> <div class="container"> <div class="container"> <div class="container"> <div class="container"> <div class="container"> <div class="container">      
     
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Edit Activity </h4>
                  <p class="card-category"> </p>
                </div>
                <div class="card-body">
                  <div class="data-tables table-responsive">
            <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
              <thead class="bg-light text-capitalize"> 
              <tr>
                <th>Sl no</th>
                 <th>ACTIVITY</th>
                 <th>Date</th>
                 <th>Activity key</th>
                 <th>User ID</th>
                 <th>Action</th>
              </tr>
                <?php 
                $no=1;
                 while($row = $result->fetch_assoc()) { ($row);?>
                <tr>
                
                  <td><?php echo $no++; ?></td>
                 <td><?php echo $row['activity_name']; ?></td>
                 <td><?php echo $row['date_show']; ?></td>
                 <td><?php echo $row['activity_key']; ?></td>
                 <td><?php echo $row['user_id']; ?></td>
                 <td><?php if($user_type==2){?> 
                  <a class="btn btn-primary" href="edit_activity.php?key=<?php echo $row['activity_key']; ?>">EDIT</a><?php } ?>
                  <?php if($user_type==1){?>
                  <a class="btn btn-primary" href="fetched_activities.php?type=delete&id=<?php echo $row['id']; ?>">DELETE</a></td><?php } ?>
                </tr>
                 <?php } ?>
              </thead>
            </table>
            
            
            
           </form>
               <button class="btn btn-primary" onclick="window.history.back()">BACK</button>  
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>
            </div>
            

<?php include('footer.php')?>