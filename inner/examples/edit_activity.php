<?php 
include("../../auth_session.php");
include('header.php');
require('../../db.php'); 

 $id = $_SESSION['id'];
$date= date('Y-m-d');

              ?>
<?php
if(isset($_POST['update'])){
                     
                 echo $activity_id = $_POST['id'];
                 echo $activity_name = $_POST['activity_name'];                
                 // die;
        mysqli_query($con,"UPDATE activities SET activity_name= '$activity_name' WHERE id=$activity_id");
        echo '<script>window.location.href = "fetched_activities.php";</script>';
 }else{

   $key=$_GET['key'];
   $sql = "SELECT * FROM `activities` WHERE  user_id= $id AND activity_key=$key";
               
             $result = $con->query($sql);
          
 		

 }
 
?>


      
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
            <table class="table table-striped table-bordered" style="width:100%">
              
              	<form action="edit_activity.php" method="post">
                <?php while($row = $result->fetch_assoc()) { ($row);?>
                <tr>
	                 <th>ACTIVITY</th>

	                 <th><input type="text"  name="activity_name" style="width:400px;"  
	                 	value="<?php echo $row['activity_name']; ?>"  >
	                 	 <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
	                 </th>

                </tr>
 
             <?php } ?>
            
            </table>
            <button type="submit" name='update' class="btn btn-primary ">UPDATE</button>
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