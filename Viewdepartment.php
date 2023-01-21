<?php
include("adformheader.php");
include("dbconnection.php");
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM department WHERE departmentid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>
    Swal.fire({
      title: 'Done!',
      text: 'department deleted successfully',
      type: 'success',
      
    })</script>";
  }
}
?>


<div class="container-fluid">
  <div class="block-header">
    <h2 class="text-center">View Department Record</h2>
    
  </div>
  <div class="card">
    
    <section class="container">
     <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
      <tbody>
        <tr>
          <td style="text-align:center;"><strong>Name</strong></td>
          <td style="text-align:center;"><strong>Department Description</strong></td>          
          <td style="text-align:center;"><strong>Status</strong></td>
          <?php
          if(isset($_SESSION['adminid']))
          {
            ?>
            <td style="text-align:center;"><strong>Action</strong></td>
            <?php
          }
          ?>
        </tr>
        <?php
        $sql ="SELECT * FROM department";
        $qsql = mysqli_query($con,$sql);
        while($rs = mysqli_fetch_array($qsql))
        {
          echo "<tr>
          <td>$rs[departmentname]</td>
          <td> $rs[description]</td>        
          <td>$rs[status]</td>";
          if(isset($_SESSION['adminid']))
          {
            echo "<td>
            <a href='department.php?editid=$rs[departmentid]' class='btn btn-raised bg-green'>Edit</a> 
            <a href='viewdepartment.php?delid=$rs[departmentid]' class='btn btn-raised bg-blush'>Delete</a> 
            </td>";
          }
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </section>
  
</div>
</div>

<?php
include("adformfooter.php");
?>