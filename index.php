<?php

$sUploadPath = 'files/';

// Url de la page
$sUrlPath = $_SERVER['REQUEST_URI'];

// Vérifie si l'url commence par /files/ et l'index === 0.
$dSearchPos = strpos($sUrlPath, $sUploadPath);
if ($dSearchPos !== false && $dSearchPos === 1) {
  // Supprimer le premier slash /
  $sFilePath = trim($sUrlPath, '/');
  // on récupère le contenu du fichier
  $sFileContent = @file_get_contents($sFilePath);

  if (empty($sFileContent)) {
    header('location: /');
    exit();
  }

  // on récupère son mine type (image/png)
  $sFileContentType = mime_content_type($sFilePath);
  // set le mine type dans la page
  header('Content-Type: ' . $sFileContentType);
  // on affiche le contenu du fichier (une image)
  echo $sFileContent;
  // on arrête l'execution du code.
  exit();
}

 $aMimeTypes = [
  'image/png',
  'image/jpeg'
 ];

 $dMaxSize = 4;

if (!empty($_POST) && !empty($_FILES)) {

  if ($_FILES['file']['error'] != 0) {
    echo 'error file size';
    exit();
  }

  echo '<pre>';
  print_r($_FILES);
  echo '</pre>';

  // File name
  $sFileName = $_FILES['file']['name'];
  // File path
  $sFilePath = $_FILES['file']['tmp_name'];
  // File Size
  $dFileSize = round($_FILES['file']['size'] / 1024 / 1024, 1);
  // File Type
  $sMimeType = mime_content_type($sFilePath);
  // File Extension
  $sFileExtension = pathinfo($sFileName, PATHINFO_EXTENSION);
  $sFileNameUUID = md5(time() .uniqid('filename_')) . '.' . $sFileExtension;

  // Check: MimeType, FileSize
  if (!in_array($sMimeType, $aMimeTypes)) {
    echo 'fail mime type';
    exit();
  } else if ($dFileSize > $dMaxSize) {
    echo 'fail size fail';
    exit();
  } else {
    // Privilège
    $sDestination = $sUploadPath . $sFileNameUUID;
    move_uploaded_file($sFilePath, $sDestination);
    chmod($sDestination, 0744);

    echo 'file upload </br>';
    move_uploaded_file($sFilePath, 'files/' . $sFileNameUUID);
    echo '<a href="'.$sUploadPath . $sFileNameUUID.'" target="_blank">open img</a>';
  }
}

?>

<!doctype html>
<html lang="fr">
<head>
 <meta charset="utf-8">
 <title>Demo App</title>
</head>
 <body>


<div class="fileUpload">
 <h1>File upload</h1>

 <form method="post" enctype="multipart/form-data">
   <input type="file" name="file" />
   <input type="hidden" name="csrf" value="somevalue" />
   <input type="submit" name="btnSubmit" value="Envoyer" />
 </form>
</div>

 </body>
</html>