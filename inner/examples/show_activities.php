<?php include("../../auth_session.php");
 include('header.php'); ?>


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
          $key=$_GET['key'];
            $content = file_get_contents("http://www.boredapi.com/api/activity?key=".$key);

            $result  = json_decode($content);

            // print_r( $result->activity );
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
                 
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>
            </div>
            
         
          <!-- your content here -->
       
     

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
