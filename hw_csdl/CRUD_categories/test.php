<?php
    require_once('connection_mysql.php');
    $query = "SELECT p.* 
    FROM posts p
    JOIN categories c ON p.category_id=c.id
    WHERE p.category_id=1";

    $result = $conn->query($query);

    $categories = array();

    while($row = $result->fetch_assoc()) { 
    $categories[] = $row;
}
?>
<?php 
	foreach ($categories as $key) {
		echo "<pre>";
			var_dump($key);
		echo "</pre>";
	}
?>