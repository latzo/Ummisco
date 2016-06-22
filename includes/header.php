<html>
    <head>
        <meta charset="UTF-8" />
        <title>
            <?php 
                if(isset($title)){
                    echo $title;
                } 
            ?>
             - UMMISCO
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
        <link rel="stylesheet" type="text/css" href="../dist/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../dist/font-awesome/css/font-awesome.min.css"/> 
        <?php 
            if(isset($stylesheets)){
                echo $stylesheets;
            } 
        ?>
    </head>
    <body>
        