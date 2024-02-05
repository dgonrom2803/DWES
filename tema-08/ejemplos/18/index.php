<?php 
// Cremos objeto de la clase zipArchive
$zip = new ZipArchive();

//abrir archivo zip

if ($zip->open('files.zip', ZipArchive::CREATE) === true) {
    //agregamos el directorio a zipar
    $zip->addFile('files/fichero_01.jpg');
    $zip->addFile('files/fichero_02.jpg');
    $zip->addFile('files/fichero_03.jpg');

    //proceso finalizado
    $zip->close();
    echo 'Se ha creado correctamente el archivo zip';
} else {
    echo "error";
}