<?php

namespace Mom\Http\Controllers;

use File;
use Intervention;

use Illuminate\Http\Request;

use Mom\Http\Requests;
use Mom\Traits\ImageHandler;

class ImageReduce extends Controller
{
    use ImageHandler;

    /**
     * Here is where the resizing of the images takes place
     * @param  File $image the full path of where the image is
     * @param  boolean $flag  whether the imeage belongs to a profile or project
     * @param  String $path the path of the current image
     * @param  String $fileName the filename of the string
     */
    private function resize($image, $flag, $path, $fileName)
    {
    	// image resizing for profiles
    	if($flag) {
	    	Intervention::make($image)->fit(50, 50)->save($path . '/sm_' . $fileName);
	    	Intervention::make($image)->fit(200, 200)->save($path . '/lg_' . $fileName);
	    // image resizing for project images
    	} else {
	    	Intervention::Make($image)->fit(150, 150)->save($path . '/sm_' . $fileName);
            Intervention::make($image)->fit(200, 175)->save($path . '/lg_' . $fileName);
    	}
    }

    /**
     * This traverses the files based on a globally defined path
     * @param String $path the path of the current file
     * @param  boolean $bool determines between re-sizing useror profile images
     */
    private function traverseImages($path, $bool)
    {
    	$files = File::files($path);
    	// to hold the images we do not want to get deleted
    	$tmp = [];
    	foreach($files as $file) {
    		// check to see if images that have the sm_ lg_ or placeholder on the image name
    		if(!strpos($file, 'placeholder') && !strpos($file, 'sm_') && !strpos($file, 'lg_')) {
    			$this->resize($file, $bool, $path, str_replace($path . '/', '', $file));
    		} else {
    			// add the files we want to keep
    			$tmp [] = $file;
    		}
    	}

    	// We delete the files ignoring the ones we want to keep
    	$files = array_diff($files, $tmp);
    	File::delete($files);
    }

    /**
     * The index page that does the image re-sizing
     * @return String the success string to the user
     */
    public function index()
    {
    	// trigger the user-profile resizing
    	$path = 'user-profile/image';
    	$this->traverseImages($path, true);

    	// trigger the project image resizing
    	$path = 'imgs/projects';
    	$this->traverseImages($path, false);

    	return "<h1>Successfully re-sized all images</h1>";
    }
}
