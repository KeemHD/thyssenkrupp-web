<?php 
require_once 'security.php';
require_once 'databaseConnect.php';

if(!($_SESSION['is_admin']))
			header("Location: index.php");
		
		
if($_SESSION['is_admin'])
	{	
		echo <<<_END
				<center><h2><p>Welcome </p></h2></center>
<div>
			<form>			
						
						
			<a href = "createUser.php"><IMG class = "buttongrid" SRC = "" HEIGHT=100 WIDTH=100 ALT="Create Usser"></a>
			<a href = "searchJobs.php"><IMG class = "buttongrid" SRC = "" HEIGHT=100 WIDTH=100 ALT="Search Jobs"></a>
            </form>
    </div>
_END;
		$query = "SELECT * FROM jobs_table";
		$result = mysql_query($query);
		
		
		echo "<table>";
		while($row = mysql_fetch_array($result))
		{
			echo "<tr><td>" . $row['jobNumber'] . "</td><td>" . $row['location'] . "</td></td>"
					. $row['startDate'] . "</td></td>". $row['endDate'] . "</td></td>"
							. $row['email'] . "</td></td>". $row['status'] . "</td></tr>";
		}
		
		echo "</table>"; //Close the table in HTML
				
	}
			
?>