<?php 
require "src/FileUpload.php";

if($_SERVER["REQUEST_METHOD"] == 'POST'){
	$upload = new FileUpload;
	$upload->validate('single', 'Single')->required()->single()->min_size(2048, 'KB')->get();
	$file = $upload->validate('multiple', 'Multiple')->required()->multiple()->min_size(2, 'MB')->get();
	var_dump($upload->move_uploaded_file($file[0], 'uploads/file'.time().'.txt'));
}
 ?>

<form action="<?= $_SERVER["PHP_SELF"]?>" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="single">
  <input type="file" name="multiple[]" multiple="">
  <input type="submit" value="Upload Image" name="submit">
</form>
