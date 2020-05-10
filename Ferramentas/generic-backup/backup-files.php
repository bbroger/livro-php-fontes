<?php
/**
 * @author-name Ribamar FS
 * @copyright	Copyright (C) 2010 Ribamar FS.
 * @license		GNU/GPL, see http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 * backup-for-all is free and open source software. This version may have been modified 
 * pursuant to the GNU General Public License, and as distributed it includes or is open source software licenses. 
 */

if(!defined('DS')){
	define('DS',DIRECTORY_SEPARATOR);
}

//ini_set('display_errors', 0);
ini_set('memory_limit', '2024M');
ini_set('max_execution_time', 1800);

$folder = $_POST['folder'];

if(isset($folder)){

    function Zip($source, $destination){
        if (!extension_loaded('zip') || !file_exists($source)) {
            return false;
        }

        $zip = new ZipArchive();
        if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
            return false;
        }

        $source = str_replace('\\', '/', realpath($source));

        if (is_dir($source) === true){
            $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

        foreach ($files as $file){
                $file = str_replace('\\', '/', $file);

                // Ignore "." and ".." folders
                if( in_array(substr($file, strrpos($file, '/')+1), array('.', '..')) )
                    continue;

                $file = realpath($file);
                if (is_dir($file) === true){					
                    $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
                }else if (is_file($file) === true){
                    $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
                }
            }
        }
        else if (is_file($source) === true)
        {
            $zip->addFromString(basename($source), file_get_contents($source));
        }

        return $zip->close();
        // Crédito: http://stackoverflow.com/questions/1334613/how-to-recursively-zip-a-directory-in-php
    }

    // Year-month-day_Hour
    $date = date("Y-m-d_H");

    $dir = dirname(__FILE__);
    $database = basename($folder);
    $zip = $dir.DS.'backup'.DS.$database. '_'. $date . '.zip';

    Zip($folder, $zip);
    ?>

    <html>
        <head>
            <title>Backup Files</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/custom.css" rel="stylesheet" type="text/css">
            <script>
            var language = window.navigator.userLanguage || window.navigator.language;
            if(language == "pt-BR"){
            var suc='Backup do pacote Zip bem Sucedido';
            var files='Arquivos';
            var ret='Voltar';
            }else{
            var suc='Backup Package Zip Sucessuful';
            var files='Files';
            var ret='Return';
            }
            </script>        
        </head>
        <body>
        <div class="container">    
                <div class="row">            
                        <div class="col-lg-8 col-lg-offset-2">

    <?php

    $dir = dirname($_SERVER['PHP_SELF']).DS.'backup';
    $host = 'http://'.$_SERVER['HTTP_HOST'].$dir.DS.$database. '_'. $date . '.zip';

    echo '<h1 align="center"><script>document.writeln(suc);</script></h1>';
    echo "<h3 align='center'>Download<br><a href=\"$host\"><script>document.writeln(files);</script></a></h3>";	    

    print '<br><h4 align="center"><a href="index.html"><script>document.writeln(ret);</script></a></h4>';
}
?>
