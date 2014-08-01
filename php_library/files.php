<?php 

function deleteDir($dir) {

	  if (is_dir($dir)) {
		$objects = scandir($dir);
		foreach ($objects as $object) {
		  if ($object != "." && $object != "..") {
			if (filetype($dir."/".$object) == "dir") 
			   deleteDir($dir."/".$object); 
			else unlink   ($dir."/".$object);
		  }
		}
		reset($objects);
		rmdir($dir);
	  }
}


?>