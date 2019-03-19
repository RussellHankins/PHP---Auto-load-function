<?php
// http://php.net/manual/de/function.spl-autoload-register.php
// The idea of autoload is that a function is called whenever
// a class is used that PHP doesn't recognize. This gives the
// program a chance to load that class. Just make the name of
// the class match the file name of the include file
// containing that class.
// Use public static functions in classes to run a function
// in that class without creating an instance of that class.
function my_autoload($sClassName)
{
	// LOAD THE CLASS.
	for($loop=0;$loop < strlen($sClassName);$loop++)
	{
		$thischar = substr($sClassName,$loop,1);
		if (($thischar != "_") && ((!ctype_alnum($thischar)) || (ctype_digit($thischar))))
		{
			// INVALID CLASS NAME.
			echo 'Class ' . $sClassName . ' has invalid characters.';
			return;
		}
	}
	$filename = dirname(__FILE__) . '/' . strtolower($sClassName) . '.php';	
	if (file_exists($filename))
	{
		require($filename);
	} else
	{
		echo 'Error: file ' . $filename . ' not found looking for class ' . $sClassName;
	}
	return;
}
spl_autoload_register("my_autoload");
?>
