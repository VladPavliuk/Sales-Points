<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=500px, initial-scale=1">

    <title>{#pageTitle#}</title>

    <link rel="shortcut icon" href="/src/images/icon.jpg" type="image/png">

    <!-- BOOTSTRAP THEME
    <link rel="stylesheet"
          href="https://bootswatch.com/yeti/bootstrap.min.css">
     -->

    <!-- CDN STYLES-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/spacelab/bootstrap.min.css"
          crossorigin="anonymous">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
          crossorigin="anonymous">

    <link href="/src/styles/owl.carousel.min.css" rel="stylesheet">
    <link href="/src/styles/owl.theme.default.css" rel="stylesheet" >


    <!-- CUSTOM STYLES -->
    <link href="/src/styles/main.css" rel="stylesheet">
    <link href="/src/styles/media.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- HEADER -->
{include file="partials/header.tpl"}

<!-- CONTENT -->
<div class="main">
    <div class="container">
        <div class="row">
            {include file="partials/categoriesList.tpl"}
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                {block "content"}Content{/block}
            </div>
        </div>
    </div>
</div>

<!-- FOOTER -->
{include file="partials/footer.tpl"}

<!-- CDN SCRIPTS -->
<script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<!-- CUSTOM SCRIPTS -->
<script src="/src/scripts/app.js"></script>
<script src="/src/scripts/cart.js"></script>

<script src="/src/scripts/show-menu.js"></script>
<script src="/src/scripts/owl.carousel.min.js"></script>
<script src="/src/scripts/js.js"></script>
</body>
</html>