<?php

// function to convert a base64 encrypted image string back to image.
function base64_to_jpeg($base64_string, $output_file)
{
	// open the output file for writing
	$ifp = fopen($output_file, 'wb');

	// split the string on commas
	// $data[ 0 ] == "data:image/png;base64"
	// $data[ 1 ] == <actual base64 string>
	$data = explode(',', $base64_string);

	// we could add validation here with ensuring count( $data ) > 1
	fwrite($ifp, base64_decode($data[1]));

	// clean up the file resource
	fclose($ifp);

	return $output_file;
}

function get_mime_type($img_str)
{
	$pos  = strpos($img_str, ';');
	$mime =  explode(':', substr($img_str, 0, $pos))[1];
	return $ext  = explode('/', $mime)[1];
}