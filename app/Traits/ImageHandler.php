<?php namespace Mom\Traits;

use Illuminate\Http\UploadedFile;

trait ImageHandler {
	
	// Uses Intervention to resize image
	public function resizeImage(UploadedFile $file, $w, $h, $path)
    {
        return \Intervention::make($file)
        ->fit($w, $h)
        ->save(public_path($path . $file->getClientOriginalName()));
    }
    
}