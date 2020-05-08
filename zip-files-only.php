<?php
/*
  *   This script can be used if your directory have only files.
*/
$zip = new ZipArchive();

$DelFilePath="first.zip";
if ($zip->open($_SERVER['DOCUMENT_ROOT']."/folder-name/".$DelFilePath, ZIPARCHIVE::CREATE) === TRUE)
{
    if ($handle = opendir($_SERVER['DOCUMENT_ROOT']."/folder-name/"))
    {
        // Add all files inside the directory
        while (false !== ($entry = readdir($handle)))
        {

            if ($entry != "." && $entry != ".." && !is_dir('folder-name/' . $entry))
            {
                $zip->addFile($_SERVER['DOCUMENT_ROOT']."/folder-name/" . $entry);
            }
        }
        closedir($handle);
    }

    $zip->close();
}
