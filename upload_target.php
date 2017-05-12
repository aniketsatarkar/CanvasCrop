<?php

include_once 'base64_to_image.php';

if(isset($_POST['img_data']))
{
	$img_data = $_POST['img_data'];
	$extension  = get_mime_type($img_data);
 	$output_file = 'uploads/image' . '.' . $extension;

	if(base64_to_jpeg($img_data, $output_file) != null)
	{
		$result = array('status' => 'success');
		echo json_encode($result);
	}
}