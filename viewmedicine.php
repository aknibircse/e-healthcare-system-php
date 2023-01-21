<?php
include("adformheader.php");
include("dbconnection.php");
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM medicine WHERE medicineid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Medicine Redcord Deleted Successfully.');</script>";
	}
}
?>
<div class="container-fluid">
  <div class="block-header">
    <h2 class="text-center">View Medicine List</h2>

  </div>
</div>
<div class="card">

  <section class="container">
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">

          <thead>
            <tr>
              <th style="text-align:center;">Name</th>
              <th style="text-align:center;">Cost&nbsp;<i><span style="color: green;">৳</span></i></th>
              <th style="text-align:center;">Description</th>
              <th style="text-align:center;">Status</th>
              <th style="text-align:center;">Action</th>
            </tr>
          </thead> 
          <tbody>

            <?php
            $sql ="SELECT * FROM medicine";
            $qsql = mysqli_query($con,$sql);
            while($rs = mysqli_fetch_array($qsql))
            {
              echo "<tr>
              <td>$rs[medicinename]</td>
              <td>$rs[medicinecost]</td>
              <td>$rs[description]</td>
              <td style='text-align:center;'>$rs[status]</td>
              <td style='text-align:center;'>&nbsp;
              <a href='medicine.php?editid=$rs[medicineid]' class='btn btn-raised bg-green'>Edit</a> 
              <a href='viewmedicine.php?delid=$rs[medicineid]' class='btn btn-raised bg-blush'>Delete</a></td>
              </tr>";
            }
            ?>
          </tbody>
        </table>
      </section>
     
    </div>
  </div>
</div>

</div>
</div>
<?php
include("adformfooter.php");
?>