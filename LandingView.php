<?php

namespace Vanilla\hw3\views;

$query1 = "SELECT Name From Category ORDER BY Name ASC;";
$result1 = mysqli_query($db, $query);

$query2 = "SELECT Title, aDate, aTime 
FROM (SELECT * FROM agendas
      ORDER BY adate DESC) t
ORDER BY atime ASC
LIMIT 3;";
$result2 = mysqli_query($db, $query2);

//this view should be wrapped by html header and footer
?>
<h1><a href="">Talking Points</h1>
	<table>
		<tr><th>Category</th><th>Upcoming</th></tr>
		<tr>
			<td>
				<ul>
					<?php
					foreach($result1 as $index => $value) {
						foreach($value as $column => $name) {
								echo "<li>$name</li>";
						}
					}
					?>
				</ul>
			</td> 
			<td>
				<ul>
					<?php
					foreach($result2 as $index => $value) {
						echo "<li>";
						foreach($value as $nestedIndex => $nestedValue) {
							echo $nestedValue . ", ";
						}
						echo "</li>";
					}
					?>
				</ul>
			</td>
		</tr>
	</table>