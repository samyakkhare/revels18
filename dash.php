<?php
include "database.inc.php";
include "core.inc.php";
/* session_start();
if (loggedin()==false)
{
	session_unset();
	session_destroy();
	echo "Please login.";
}
*/
$events=100;
$stmt = $conn->prepare("SELECT events.name,schdl.start_time FROM events,team_config,team,schdl WHERE events.id=team.event_id AND events.id=schdhl.event_id AND team.id=team_config.team_id AND team_config.delno= ?;");
$stmt->bind_param('s',$events);
    $stmt->execute();
    $result = $stmt -> get_result();
    if(($result->num_rows) > 0)
										{
											echo "$result->num_rows events \n ";
											while($row = $result -> fetch_assoc())
											{
												foreach ($row as $key => $value) 
											{
													if($key=="events.name")
														{$val="Event: ";}
													echo "$val $value\n";
													if($key=="")
														
											}	
											
											}
									}
    $stmt -> close();
    $conn -> close();
?>
<?php
//echo $_SESSION['delno'];
?