<?php

namespace App\HelperClass;
use Intervention\Image\Facades\Image;

class Imageupload{
	//$file_input_field is the file input field name, $filefolder is the folder name
    public $storage_path = '';
    public $prev_name = '';
    public $file_input_field;
    public $filefolder;

    public function setFileInputField($file_input_field) {
        $this->file_input_field = $file_input_field;
        return $this;
    }

    public function setFileFolder($filefolder) {
        $this->filefolder = $filefolder;
        return $this;
    }

    public function setPrevName($prevname) {
        $this->prev_name = $prevname;
        return $this;
    }

    public function build() {
        $url = "http://$_SERVER[HTTP_HOST]";
        $path = uniqid().'.'.$this->file_input_field->getClientOriginalExtension();
		//$file_input_field is the file input field name, $filefolder is the folder name
        $resize_image = Image::make($this->file_input_field);
        $resize_image->save("../public/".$this->filefolder."/img".$path);
        $storage = "img".$path;
        $this->storage_path = $storage;
		return ['storage_path'=>$this->storage_path, 'prev_name'=>$this->prev_name];
        //return new Imageupload($this->storage_path, $this->prev_name);
    }
}


?>