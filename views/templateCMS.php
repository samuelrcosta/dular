<html lang="pt-br">
<head>
    <title><?php echo $titulo ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo BASE_URL;?>/assets/imgs/logo.png" type="image/png" />
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/style-CMS.css">
    <script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/tether.min.js"></script>
    <script type="text/javascript">var BASE_URL = '<?php echo BASE_URL;?>'</script>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato%3A400%2C700%7CArimo%3A700&subset=latin&ver=1480945793
" type="text/css">
</head>
<body>
<?php inserirMenu($usuario, $tipo) ?>
<?php $this->loadViewInTemplate($viewName, $viewData) ?>
</div>
<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/canvas-to-blob.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/resize.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/script.js"></script>
</body>
</html>