<?php 
// Cremos objeto de la clase zipArchive
$zip = new ZipArchive();

//abrir archivo zip

if ($zip->open('files.zip', ZipArchive::CREATE) === true) {
    
    $files = glob('files/*');

    foreach($files as $file) {
        $zip->addFile($file);
    }

    //proceso finalizado
    $zip->close();
    echo 'Se ha creado correctamente el archivo zip';
} else {
    echo "error";
}