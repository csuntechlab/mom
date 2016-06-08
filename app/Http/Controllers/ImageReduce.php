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

    private $path;

    private function resize($image, $profile = false, $fileName)
    {
    	if($profile) {
	    	Intervention::make($image)->fit(50, 50)->save($this->path . '/sm_' . $fileName;
	    	Intervention::make($image)->fit(200, 200)->save($this->path . '/lg_' . $fileName);
    	} else {
	    	Intervention::Make($image)->fit(150, 150)->save($this->path . '/sm_' . $fileName);
            Intervention::make($image)->fit(200, 175)->save($this->path . '/lg_' . $fileName);
    	}
    }

    private function traverseImages()
    {
    	$files = File::files($this->path);
    	foreach($files as $file) {
    		if(!strpos($file, 'placeholder')) {
    			$this->resize($file, true, str_replace($this->path . '/', '', $file));
    		}
    	}
    }

    public function index()
    {
    	$this->path = 'user-profile/image';
    	$this->traverseImages();

    	$this->path = 'imgs/projects';
    	$this->traverseImages();
    }
}
