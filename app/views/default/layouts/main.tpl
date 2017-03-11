{config_load file='smarty_main.conf'}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{block "title"}Odious Framework{/block}</title>

    <link rel="icon" type="image/x-icon" href="src/images/icon.jpg"/>

    <!-- BOOTSTRAP THEME -->
    <link rel="stylesheet"
          href="https://bootswatch.com/yeti/bootstrap.min.css">

    <!-- CDN STYLES-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
          crossorigin="anonymous">
    <!-- CUSTOM STYLES -->
    <link rel="stylesheet" href="src/styles/app.css">
</head>
<body>

<!-- HEADER -->
{include file="partials/header.tpl"}

<!-- CONTENT -->
<div class="container">
    {block "content"}Content{/block}
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
    <script src="src/scripts/app.js"></script>
</body>
</html>