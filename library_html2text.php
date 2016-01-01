<?php
	function html2txt($document){
		$document=str_replace("&lt;","<",$document);
		$document=str_replace("&gt;",">",$document);
		$search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript 
		               '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags 
		               '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly 
		               '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments including CDATA 
		); 
		$text = preg_replace($search, ' ', $document); 
		$text = str_replace(array('  ', '    ', '    '), '', $text);
		return $text; 
	}
?>