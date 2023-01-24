<?php
echo "Enter your path: ";
fscanf(STDIN, "%s", $path);
$files = scandir($path);
foreach ($files as $file) {
	if (strpos($file, '.mcpack') !== false) {
		$dest = str_replace('.mcpack', '.zip', $file);
		$source = $path . '/' . $file;
		$dest = $path . '/' . $dest;
		rename($source, $dest);
	}
}
