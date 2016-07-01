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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../dist/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../dist/font-awesome/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="../dist/ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../dist/AdminLTE/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link rel="stylesheet" href="../dist/AdminLTE/css/skins/skin-blue.min.css">
        <link rel="apple-touch-icon" sizes="57x57" href="../dist/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="../dist/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="../dist/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="../dist/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="../dist/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="../dist/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="../dist/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="../dist/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="../dist/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="../dist/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../dist/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="../dist/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../dist/favicon/favicon-16x16.png">
        <link rel="manifest" href="../dist/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="../dist/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="../dist/AdminLTE/js/html5shiv.min.js"></script>
        <script src="../dist/AdminLTE/js/respond.min.js"></script>
        <![endif]-->
        <?php 
            if(isset($stylesheets)){
                echo $stylesheets;
            } 
        ?>
    </head>
    <body>
        