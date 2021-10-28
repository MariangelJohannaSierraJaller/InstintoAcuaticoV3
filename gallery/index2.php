<?php
       
include ('includes.php');

foreach($_POST as $key => $value)
{
	if(substr($key, 0, 6) === 'delete')
	{
		$code = substr($key,6);
		$delete = $_POST['delete' . $code];
 
		$sqlImage = mysqli_query($link, "select * from gallery where code= $code;") or die (mysqli_error($link));
		$image = mysqli_fetch_array($sqlImage);
		if($image != null)
		{
			if(file_exists(DIR_IMAGES . $image['file']))
				unlink(DIR_IMAGES . $image['file']);       
			if(file_exists(DIR_THUMBS . $image['file']))
				unlink(DIR_THUMBS . $image['file']);
		}
        
		mysqli_query($link, "delete from gallery where code=$code") or die (mysqli_error($link));
	}
}

foreach($_POST as $key => $value)
{
	if(substr($key, 0, 8) === 'ordering')
	{
		$code = substr($key,8);
		$ordering = $_POST['ordering' . $code];
		if(!is_numeric($ordering))
		{
			$ordering = 0;
		}
        
		mysqli_query($link, "update gallery set ordering=$ordering where code=$code") or die (mysqli_error($link));     
	}
	
	if(substr($key, 0, 4) === 'name')
	{
		$code = substr($key,4);
		$name = $_POST['name' . $code];      
		mysqli_query($link, "update gallery set name='" . mysqli_real_escape_string($link, $name) .  "' where code=$code") or die (mysqli_error($link));     
	}
    	
	if(substr($key, 0, 11) === 'description')
	{
		$code = substr($key,11);
		$description = $_POST['description' . $code];      
		mysqli_query($link, "update gallery set description='" . mysqli_real_escape_string($link, $description) .  "' where code=$code") or die (mysqli_error($link));     
	}
}

foreach($_FILES as $key => $value)
{
	if($value['name'] != '' && ($value['type'] == 'image/jpeg' || $value['type'] == 'image/png' || $value['type'] == 'image/gif'))
	{
		$code = substr($key,5);
		$name = $_POST['name' . $code];
		$ordering = $_POST['ordering' . $code];
		$description = $_POST['description' . $code];
		
		if(!is_numeric($ordering))
		{
			$ordering = 0;
		}
     
		$sqlImage = mysqli_query($link, "select * from gallery where code= $code;") or die (mysqli_error($link));
		$image = mysqli_fetch_array($sqlImage);

		$extension = '';
		switch($value['type'])
		{
			case 'image/jpeg':
				$extension = 'jpg';
				break;
			case 'image/png':
				$extension = 'png';
				break;
			case 'image/gif':
				$extension = 'gif';
				break;
		}
                       
		if($image != null) // update
		{
			if(file_exists(DIR_IMAGES . $image['file']))
				unlink(DIR_IMAGES . $image['file']);
			if(file_exists(DIR_THUMBS . $image['file']))
				unlink(DIR_THUMBS . $image['file']);
            
			mysqli_query($link, "update gallery set name='$name', ordering=$ordering, description='" . mysqli_real_escape_string($link, $description) . "', file='" . $code . '.' . $extension . "' where code=$code") or die (mysqli_error($link));
		}
		else // insert
		{
			mysqli_query($link, "insert into gallery(code, name, ordering, description,file) values ($code, '$name', $ordering, '" . mysqli_real_escape_string($link, $description) . "','" . $code . '.' . $extension .  "')") or die (mysqli_error($link));           
		}
        
		move_uploaded_file($value['tmp_name'], DIR_IMAGES . $code . '.' . $extension);
	
		create_thumbnail(DIR_IMAGES . $code . '.' . $extension, DIR_THUMBS, 200, 200);
	}
}


function create_thumbnail($file, $folder, $w, $h, $crop = FALSE)
{
	list($width, $height) = getimagesize($file);
	$r = $width / $height;
	if ($crop)
	{
		if ($width > $height)
		{
			$width = ceil($width - ($width * abs($r - $w / $h)));
		}
		else
		{
			$height = ceil($height - ($height * abs($r - $w / $h)));
		}

		$newwidth = $w;
		$newheight = $h;
	}
	else
	{
		if ($w / $h > $r)
		{
			$newwidth = $h * $r;
			$newheight = $h;
		}
		 else
		{
			$newheight = $w / $r;
			$newwidth = $w;
		}
	}

	$dst = imagecreatetruecolor($newwidth, $newheight);
	
	$extension = substr($file, -3);
	
	switch ($extension)
	{
		case 'jpg':
			$src = imagecreatefromjpeg($file);
			break;

		case 'png':
			$src = imagecreatefrompng($file);		
			$background = imagecolorallocate($dst , 0, 0, 0);
			imagecolortransparent($dst, $background);
			imagealphablending($dst, false);
			imagesavealpha($dst, true);
			break;

		case 'gif':
			$src = imagecreatefromgif($file);
			$background = imagecolorallocate($dst , 0, 0, 0);
			imagecolortransparent($dst, $background);
			imagealphablending($dst, false);
			imagesavealpha($dst, true);
			break;
	}

	imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	
	$dot_pos = strpos($file, '.');
	$slash_pos = strrpos($file, '/');
	if($slash_pos === false)
		$slash_pos = 0;
	$length = $dot_pos - $slash_pos - 1;
	$code = substr($file, $slash_pos + 1, $length);
	
	switch($extension)
	{
		case 'jpg':
			imagejpeg($dst, $folder . $code . '.' . $extension);
			break;
		case 'png':
			imagepng($dst, $folder . $code . '.' . $extension);
			break;
		case 'gif':
			imagegif($dst, $folder . $code . '.' . $extension);
			break;
	}
}
?>

<script>
	self.location="index.php";
</script>
