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

    <link href="/src/styles/owl.carousel.min.css" rel="stylesheet">
    <link href="/src/styles/owl.theme.default.css" rel="stylesheet">


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
                {block "content"}No content{/block}
            </div>
        </div>
    </div>
</div>

<!-- FOOTER -->
{include file="partials/footer.tpl"}

<!-- CDN SCRIPTS -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/src/scripts/bootstrap.min.js"></script>
<script src="/src/scripts/show-menu.js"></script>
<script src="/src/scripts/owl.carousel.min.js"></script>

<script src="/src/scripts/js.js"></script>
<script src="/src/scripts/footer.js"></script>
<script src="/src/scripts/add-cart.js"></script>
<script src="/src/scripts/input-count.js"></script>

<!-- CUSTOM SCRIPTS -->
{block "scripts"}{/block}

</body>
</html>