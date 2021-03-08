FileUpload
==========

Simple File uploading library capable of handling multiple file uploads

Installing
Add file to Composer.json file:

```json
{
  "require": {
    "eeshiro/file-upload": "~1.0.0"
  }
}
```
or

`composer require eeshiro/file-upload`


# Usage

```php
require './vendor/autoload.php';

$upload = new FileUpload;
$single_file = $upload->validate('single_file', 'Single File')
				->required()
				->single()
				->max_size(2)
				->get();

$multiple_file= $upload->validate('multiple_file', 'Multiple File')
				->required()
				->multiple()
				->max_size(2, 'MB')
				->max_file(3)
				->get();

if($upload->has_error()){
	echo $upload->get_errors('<br>');
	die();
}

$upload->move_uploaded_file($single_file, 'directory/filename.txt');

foreach ($multiple_file as $key => $file) {
	$upload->move_uploaded_file($file, 'directory/'.$file['name']);
}

```
# Rules and Methods Reference


<table>
	<thead>
		<tr>
			<th>Rule</th>
			<th>Parameter</th>
			<th>Description</th>
			<th>Example</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>require</td>
			<td>No</td>
			<td>Returns FALSE if the form element is empty.</td>
			<td></td>
		</tr>
		<tr>
			<td>single</td>
			<td>No</td>
			<td>Returns FALSE if file upload type multiple.</td>
			<td></td>
		</tr>
		<tr>
			<td>multiple</td>
			<td>No</td>
			<td>Returns FALSE if file upload type single.</td>
			<td></td>
		</tr>
		<tr>
			<td>max_file</td>
			<td>Yes</td>
			<td>Returns FALSE if file count is greater than maximum number of files specified.</td>
			<td>max_file(5)</td>
		</tr>
		<tr>
			<td>min_file</td>
			<td>Yes</td>
			<td>Returns FALSE if file count is less than minimum number of files specified.</td>
			<td>min_file(2)</td>
		</tr>
		<tr>
			<td>image</td>
			<td>No</td>
			<td>Returns FALSE if uploaded file is not an image.</td>
			<td></td>
		</tr>
		<tr>
			<td>exist</td>
			<td>Yes</td>
			<td>Returns FALSE if file already exist on the directory.</td>
			<td>exist(directory)</td>
		</tr>
		<tr>
			<td>min_size</td>
			<td>Yes</td>
			<td>Returns FALSE file size is under the minimum size specified. 
				Parameter 1 : size (Integer). 
				Parameter 2 : size Type (String)
				Available size type (KB, MB, GB, TB)
			</td>
			<td>min_size(2, 'MB')</td>
		</tr>
		<tr>
			<td>max_size</td>
			<td>Yes</td>
			<td>Returns FALSE if file exceeds the maximum size specified. 
				Parameter 1 : size (Integer). 
				Parameter 2 : size Type (String)
				Available size type (KB, MB, GB, TB)
			</td>
			<td>min_size(2, 'MB')</td>
		</tr>
		<tr>
			<td>valid_format</td>
			<td>Yes</td>
			<td>Returns FALSE if file format is not in the list specified.
				Parameter 1 : file type list (Array)
			</td>
			<td>valid_format(['jpg', 'png', 'gif'])</td>
		</tr>
		<tr>
			<td>move</td>
			<td>Yes</td>
			<td>Moves the validated file to the directory specified. 
				Returns TRUE if successfully saved, FALSE if not.
				Parameter 1 : directory (String).
				Parameter 2 : use original filename (Boolean) (true if retain, false if not).
			</td>
			<td>move('directory/filename.txt', false)</td>
		</tr>
		<tr>
			<td>get</td>
			<td>No</td>
			<td>Returns the file validated.
			</td>
			<td></td>
		</tr>
		<tr>
			<td>has_error</td>
			<td>Yes</td>
			<td>Returns TRUE if validation has error.
				Parameter 1: file index /  file field name (String).
				NOT REQUIRED.
			</td>
			<td></td>
		</tr>
		<tr>
			<td>error_count</td>
			<td>Yes</td>
			<td>Returns NUMBER of errors on validation.
				Parameter 1: file index /  file field name (String).
				NOT REQUIRED.
			</td>
			<td></td>
		</tr>
		<tr>
			<td>get_errors</td>
			<td>Yes</td>
			<td>Return validation errors.
				Parameter 1: glue (String) (If NULL returns array of errors).
				Parameter 1: file index /  file field name (String) (NOT required).
			</td>
			<td>get_errors('<br>')</td>
		</tr>
		<tr>
			<td>move_uploaded_file</td>
			<td>Yes</td>
			<td>Moves the file to the directory specified.
				Parameter 1 : File from get method (Array).
				Parameter 2 : File directory.
			</td>
			<td>move_uploaded_file($file, 'directory/'.$file['name'])</td>
		</tr>
	</tbody>
</table>





