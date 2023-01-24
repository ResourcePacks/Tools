<?php
// Get the path where the .mcpack files are stored
echo "Enter your path: ";
fscanf(STDIN, "%s", $path);

// Create a function that takes a .mcpack file as its argument
function mcpack_to_folder($mcpack) {
	// Extract the .mcpack file
	$zip = new ZipArchive;
	$zip->open($mcpack);
	$zip->extractTo(dirname($mcpack) . '/' . basename($mcpack, '.mcpack'));
	$zip->close();

	// Delete the .mcpack file
	unlink($mcpack);
}

// Create a directory iterator object
$dir_iterator = new DirectoryIterator($path);

// Iterate through the directory iterator object
foreach ($dir_iterator as $file_info) {
	// Check if the file is a .mcpack file
	if ($file_info->getExtension() == 'mcpack') {
		// Call the function if the file is a .mcpack file
		mcpack_to_folder($file_info->getPathname());
	}
}
