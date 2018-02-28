
			<?php
//$file = 'Bookreport.pdf';
//$filename = 'Bookreport.pdf'; /* Note: Always use .pdf at the end. */
//header('Content-type: application/pdf');
//header('Content-Disposition: inline; filename="' . $filename . '"');
//header('Content-Transfer-Encoding: binary');
//header('Content-Length: ' . filesize($file));
//header('Accept-Ranges: bytes');

//echo @readfile($file);
echo "<iframe src=\"Book_report.pdf\" width=\"100%\" style=\"height:100%\"></iframe>";
?>
		
