<?php
/***
 * 
 * 
 * 
 * INCLUDE PHP FILE
 * 
 * 
 * 
 */
$array_folder = array('functions','framework');
function getSubDirectories($dir)
{
    $subDir = array();
    // Get and add directories of $dir
    $directories = array_filter(glob($dir), 'is_dir');
    $subDir = array_merge($subDir, $directories);
    // Foreach directory, recursively get and add sub directories
    foreach ($directories as $directory) $subDir = array_merge($subDir, getSubDirectories($directory.'/*'));
    // Return list of sub directories
    return $subDir;
}
foreach ($array_folder as $folder):
    $dir =   dirname(__FILE__) .'/'.$folder; 
    foreach(getSubDirectories($dir) as $folder){ 
        $files = glob($folder."/*.php"); // return array files
        foreach($files as $phpFile){   
            require_once("$phpFile"); 
        }
    }
endforeach;


/***
 * 
 * 
 * 
 * INCLUDE CLASSES
 * 
 * 
 * 
 */
 spl_autoload_register( function($classname) {
    // Regular
    $class      = str_replace( '\\', DIRECTORY_SEPARATOR, strtolower($classname) ); 
    $classpath  = dirname(__FILE__) .  DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . $class . '.php'; //change the name of the folder here
    // WordPress
    $parts      = explode('\\', $classname);
    $class      = 'class-' . strtolower( array_pop($parts) );
    $folders    = strtolower( implode(DIRECTORY_SEPARATOR, $parts) );
    $wppath     = dirname(__FILE__) .  DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . $folders . DIRECTORY_SEPARATOR . $class . '.php'; //Folder classes : change the name of the folder here
    if ( file_exists( $classpath ) ) {
        include_once $classpath;
    } elseif(  file_exists( $wppath ) ) {
        include_once $wppath;
    }
} );