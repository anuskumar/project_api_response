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
                  <h4 class="card-title ">Activities Table</h4>
                  <p class="card-category"> </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="example">
                       <thead class=" text-primary">
                        <th>
                          Slno
                        </th>
                        
                        <th>
                          Activities
                        </th>
                        <th>
                     	 Fetch
                        </th>
                      </thead>
                      <tbody>
                       
                         <?php
                $no=1;
            for ($x = 0; $x <= 10; $x++) {?>
  			 <tr>
  			 	<td><?php echo $no++ ?></td>

  			 	<td>	<?php 
  			 	// print_r($_SESSION);
  			 	$type= $_SESSION['type'];
            $content = file_get_contents("http://www.boredapi.com/api/activity?type=".$type);

            $result  = json_decode($content);

            print_r( $result->activity ); ?></td>  
            <td>Fetch</td>
        </tr>

           <?php } ?>
          </tbody>
                       
                      </tbody>
                    </table>
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
