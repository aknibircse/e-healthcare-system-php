<?php
include("adformheader.php");
include("dbconnection.php");
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM doctor WHERE doctorid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Doctor Record Deleted Successfully.');</script>";
	}
}
?>
<div class="container-fluid">
	<div class="block-header">
		<h2 class="text-center">View Available Doctor</h2>

	</div>

<div class="card">

	<section class="container">
		<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
			<thead>
				<tr style="text-align: center;">
					<td><strong>Name</strong></td>
					<td><strong>Contact</strong></td>
					<td><strong>Department</strong></td>
					<td><strong>LoginID</strong></td>
					<td><strong>Consultancy Charge&nbsp;<i><span style="color: green;">৳</span></i></strong></td>
					<td><strong>Education</strong></td>
					<td><strong>Experience</strong></td>
					<td><strong>Status</strong></td>
					<td><strong>Action</strong></td>
				</tr>
			</thead>
			<tbody>
				
				<?php
				$sql ="SELECT * FROM doctor";
				$qsql = mysqli_query($con,$sql);
				while($rs = mysqli_fetch_array($qsql))
				{

					$sqldept = "SELECT * FROM department WHERE departmentid='$rs[departmentid]'";
					$qsqldept = mysqli_query($con,$sqldept);
					$rsdept = mysqli_fetch_array($qsqldept);
					echo "<tr>
					<td>$rs[doctorname]</td>
					<td>$rs[mobileno]</td>
					<td style='text-align:center;'>$rsdept[departmentname]</td>
					<td style='text-align:center;'>$rs[loginid]</td>
					<td style='text-align:center;'>$rs[consultancy_charge]</td>
					<td style='text-align:center;'>$rs[education]</td>
					<td style='text-align:center;'>$rs[experience] year</td>
					<td style='text-align:center;'>$rs[status]</td>
					<td style='text-align:center;'>
					<a href='doctor.php?editid=$rs[doctorid]' class='btn btn-sm btn-raised g-bg-cyan'>Edit</a> <a href='viewdoctor.php?delid=$rs[doctorid]' class='btn btn-sm btn-raised g-bg-blush2'>Delete</a> </td>
					</tr>";
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