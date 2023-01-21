<?php
include("adformheader.php");
include("dbconnection.php");
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM treatment WHERE treatmentid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Treatment Deleted Successfully.');</script>";
	}
}
?>


<div class="container-fluid">
  <div class="block-header">
    <h2 class="text-center">View Available Treatments</h2>

  </div>

  <div class="card">

    <section class="container">
     <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
      <tbody>
        <tr>
          <td align="center"><strong>Treatment Type</strong></td>
          <td align="center"><strong>Cost&nbsp;<i><span style="color: green;">৳</span></i></strong></td>
          <td align="center"><strong>Treatment Description</strong></td>
          <td align="center"><strong>Status</strong></td>
          <?php
          if(isset($_SESSION['adminid']))
          {
            ?>
            <td align="center"><strong>Action</strong></td>
            <?php
          }
          ?>
        </tr>
        <?php
        $sql ="SELECT * FROM treatment";
        $qsql = mysqli_query($con,$sql);
        while($rs = mysqli_fetch_array($qsql))
        {
          echo "<tr>
          <td>$rs[treatmenttype]</td>
          <td>$rs[treatment_cost]</td>
          <td>$rs[note]</td>
          <td>$rs[status]</td>";
          if(isset($_SESSION['adminid']))
          {
            echo "<td align='center'>
            <a href='treatment.php?editid=$rs[treatmentid]' class='btn btn-raised bg-green'>Edit</a>
            <a href='viewtreatment.php?delid=$rs[treatmentid]' class='btn btn-raised bg-blush'>Delete</a> 
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