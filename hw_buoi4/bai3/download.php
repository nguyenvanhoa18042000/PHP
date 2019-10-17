<?php
	if (isset($_GET['file'])) {
	 	$file=$_GET['file'];
	 	$filepath="uploads/".$file;//nếu muốn yêu cầu đuôi file j thì ("uploads/".$file .'.txt');
	 	if (file_exists($filepath)) {
	 		header('Content-Description: File Transfer');
	 		header('Content-Type: application/octet-stream');
	 		header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
	 		header('Expires: 0');
	 		header('Cache-Control: must-revalidate');
	 		header('Prama: public');
	 		header('Content-Lenght:' .filesize($filepath));
	 		flush();
	 		readfile($filepath);
	 		exit();
	 	}
	 } 
?>