<?php include("../../auth_session.php");
 include('header.php');
 require('../../db.php'); 
 $id = $_SESSION['id'];
 $key=$_GET['key'];
 $date= date('Y-m-d');
$query_pri = "SELECT * FROM `activities` WHERE date_show='$date'
                     AND user_id= $id AND activity_key=$key";
        $result_pri= mysqli_query($con, $query_pri) or die(mysql_error());
         $rows_pri = mysqli_num_rows($result_pri);
if($rows_pri>0){ ?>






<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
      
     <div class="container"><div class="container"><div class="container"><div class="container"> <div class="container"> <div class="container"> <div class="container"> <div class="container"> <div class="container"> <div class="container">      
     
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Activities </h4>
                  <p class="card-category"> </p>
                </div>
                <div class="card-body">
                  <div class="data-tables table-responsive">
            <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
              <thead class="bg-light text-capitalize">
                <?php 
          // print_r($_SESSION);
          
            $content = file_get_contents("http://www.boredapi.com/api/activity?key=".$key);

            $result  = json_decode($content);

            
             ?>
                <tr>
                 <td>ACTIVITY</td>
                 <td><?php print_r( $result->activity );?></td>
                </tr>
                <tr>
                 <td>TYPE</td>
                 <td><?php print_r( $result->type );?></td>
                </tr>
                <tr>
                 <td>PARTICIPANTS</td>
                 <td><?php print_r( $result->participants );?></td>
                </tr>
                <tr>
                 <td>PRICE</td>
                 <td><?php print_r( $result->price );?></td>
                </tr>
                <tr>
                 <td>LINK</td>
                 <td><?php print_r( $result->link );?></td>
                </tr>
              </thead>
            </table>
            
            <button class="btn btn-primary" onclick="window.history.back()">BACK</button>
            <a class="btn btn-primary" href="edit_activity.php?key=<?php echo $key ?>" >EDIT</a>
                 
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>
            </div>
            



















<?php }else{?> 



<?php 
 $query = "SELECT * FROM `activities` WHERE date_show='$date'
                     AND user_id= $id";
        $result1= mysqli_query($con, $query) or die(mysql_error());
         $rows1 = mysqli_num_rows($result1);
         if($rows1>=2){?>
          <script type="text/javascript">
   alert("Warning!..THE MAXIMUM LIMIT EXEEDED..ONLY 2 PER DAY ALLOWED");
   window.history.back();
</script>
       <?php   }

        if($rows1>=2){echo "MAX LIMIT EXEEDED";
        die;} ?>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
      
     <div class="container"><div class="container"><div class="container"><div class="container"> <div class="container"> <div class="container"> <div class="container"> <div class="container"> <div class="container"> <div class="container">      
     
      <div class="content">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Activities </h4>
                  <p class="card-category"> </p>
                </div>
                <div class="card-body">
                  <div class="data-tables table-responsive">
            <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
              <thead class="bg-light text-capitalize">
                <?php 
          // print_r($_SESSION);
          
            $content = file_get_contents("http://www.boredapi.com/api/activity?key=".$key);

            $result  = json_decode($content);

            // print_r( $result->activity );
             $query1234 = "SELECT * FROM `activities` WHERE date_show='$date'
                     AND activity_key=$key AND user_id=$id";
                  $result1234   = mysqli_query($con, $query1234);
                  $rows1234 = mysqli_num_rows($result1234);

                          if($rows1234>0){ 

                             echo "<script type='text/javascript'>
                               alert('THIS ACTIVITY IS UNEQUE PER DAY');
                               window.history.back();
                            </script>";
                            die;

                   }
             ?>
                <tr>
                 <td>ACTIVITY</td>
                 <td><?php print_r( $result->activity );?></td>
                </tr>
                <tr>
                 <td>TYPE</td>
                 <td><?php print_r( $result->type );?></td>
                </tr>
                <tr>
                 <td>PARTICIPANTS</td>
                 <td><?php print_r( $result->participants );?></td>
                </tr>
                <tr>
                 <td>PRICE</td>
                 <td><?php print_r( $result->price );?></td>
                </tr>
                <tr>
                 <td>LINK</td>
                 <td><?php print_r( $result->link );?></td>
                </tr>
              </thead>
            </table>
            <?php
              if($rows1<2){

                 $query123 = "SELECT * FROM `activities` WHERE date_show='$date'
                     AND user_id= $id AND activity_key=$key";
                  $result123   = mysqli_query($con, $query123);
                  $rows123 = mysqli_num_rows($result123);

                   
                  if($rows123==0){ 

                  

                $query = "INSERT into `activities` (user_id, activity_key,activity_name,date_show)
                     VALUES ('$id','$key','$result->activity','$date')";
                $result = mysqli_query($con, $query);

                 }

                 
          
         }
         ?>
            <button class="btn btn-primary" onclick="window.history.back()">BACK</button>
             <a class="btn btn-primary" href="edit_activity.php?key=<?php echo $key ?>" >EDIT</a>
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>
            </div>
            
         
          <!-- your content here -->
       
     <?php } ?>

<?php include('footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable( {
        "lengthMenu": [[3, 25, 50, -1], [3, 25, 50, "All"]]
    } );
} );
</script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
