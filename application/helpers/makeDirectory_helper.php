<?php  

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('makeDirectory'))
{
    function makeDirectory($folder){
    	$publicDirectory="./automade/";
		print_r(scandir($publicDirectory, 1));	
		if (file_exists($publicDirectory.$folder)) {
   			deleteDirectory($publicDirectory.$folder);
		}

 		mkdir($publicDirectory.$folder, 0777, true);
	}
	
	
	function makeFile($directoryFilename,$string){
		$publicDirectory="./automade/";
		$file = fopen($publicDirectory.$directoryFilename,"w");
    	fputs($file,$string);
    	fclose($file);
	}
	
	
	function formatName($string){
		return ucwords(strtolower($string));
	}
	
	function deleteDirectory($dir) {
    	if(!$dh = @opendir($dir)) return;
    	while (false !== ($current = readdir($dh))) {
        if($current != '.' && $current != '..') {
            echo 'Se ha borrado el archivo '.$dir.'/'.$current.'<br/>';
            if (!@unlink($dir.'/'.$current)) 
                deleteDirectory($dir.'/'.$current);
        	}       
    	}
    	closedir($dh);
    	echo 'Se ha borrado el directorio '.$dir.'<br/>';
   	 	@rmdir($dir);
	}
}