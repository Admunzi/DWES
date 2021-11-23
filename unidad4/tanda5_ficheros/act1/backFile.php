<?php
$filePath = 'files/output.txt';
if(file_exists($filePath)){
    // Define headers
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=output.txt");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");
    
    // Read the file
    readfile($filePath);
    exit;
}
