<!-- <?php
function sortArray() {
    $inputArray = array(8, 2, 7, 4, 5);
    $outArray = array();
    for($x=1; $x<=100; $x++) {
        if (in_array($x, $inputArray)) {
            array_push($outArray, $x);
        }
    }
    return $outArray;
}


$sortArray = sortArray();
foreach ($sortArray as $value) {
    echo $value . "<br />";
}
?>
 -->

<?php

	require_once("db.php");

	$sql = "SELECT * FROM job_post";
	$result = $conn->query($sql);

	$count = mysqli_num_rows($sql);

    while ($row = mysqli_fetch_array($result)) {
    	echo $row['jobtitle'];
    	echo "<br>";

    	for($x=0;$x<$count;$x++){
    	    for($i = 0; $i < $count-1; $i ++){

        if($row['id_jobpost'] > $row['id_jobpost']+1) {
            $temp = $row['id_jobpost']+1;
            ($row['id_jobpost']+1) = $row['id_jobpost'];
            $row['id_jobpost'] = $temp;
        }       
    }	
    	}
    }

  ?>