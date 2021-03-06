<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <meta name="description" content="<?php echo $description; ?>">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico?v=<?php echo $site_version; ?>">

    <title><?php echo $page_title; ?> - <?php echo $site_title; ?></title>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css?v=<?php echo $site_version; ?>">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css?v=<?php echo $site_version; ?>">

    <?php if (isset($css_files) && is_array($css_files)) : ?>
        <?php foreach ($css_files as $css) : ?>
            <?php if ( ! is_null($css)) : ?>
                <link rel="stylesheet" href="<?php echo $css; ?>?v=<?php echo $site_version; ?>"><?php echo "\n"; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js?v=<?php echo $site_version; ?>"></script>
    <script src="https://raw.github.com/scottjehl/Respond/master/respond.min.js?v=<?php echo $site_version; ?>"></script>
    <![endif]-->
</head>
<body>

    <?php // Fixed navbar ?>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="row">
                <?php // Nav bar left ?>
                <ul class="nav navbar-nav">
                    <li<?php echo ($active == 'admin/dashboard') ? ' class="active"' : ''; ?>><a href="/admin"><?php echo lang('admin nav dashboard'); ?></a></li>
                    <li<?php echo ($active == 'admin/users') ? ' class="active"' : ''; ?>><a href="/admin/users"><?php echo lang('admin nav users'); ?></a></li>
                </ul>
                <?php // Nav bar right ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/logout"><?php echo lang('core button logout'); ?></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?php // Main body ?>
    <div class="container">

        <div class="row">
            <?php // Page title ?>
            <div class="col-md-8">
                <h1><?php echo $page_title; ?></h1>
            </div>
            <?php // Main controls ?>
            <div class="col-md-4" id="controls">
                <?php if (isset($controls)) : ?>
                    <br />
                    <?php foreach ($controls as $control) : ?>
                        <a class="btn <?php echo $control['bootstrap_button_class']; ?> pull-right" href="<?php echo $control['url']; ?>"><span class="glyphicon <?php echo $control['bootstrap_icon_class']; ?>"></span> <?php echo $control['title']; ?></a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <?php // System messages ?>
        <?php if ($this->session->flashdata('message')) : ?>
            <div class="row alert alert-success">
                <?php echo $this->session->flashdata('message'); ?>
            </div>
        <?php elseif ($this->session->flashdata('error')) : ?>
            <div class="row alert alert-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?php // Main content ?>
        <?php echo $content; ?>

        <footer class="row footer text-muted"><br />Page rendered in <strong>{elapsed_time}</strong> seconds</footer>
    </div>

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js?v=<?php echo $site_version; ?>"></script>
    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js?v=<?php echo $site_version; ?>"></script>
    <?php if (isset($js_files) && is_array($js_files)) : ?>
        <?php foreach ($js_files as $js) : ?>
            <?php if ( ! is_null($js)) : ?>
                <?php echo "\n"; ?><script type="text/javascript" src="<?php echo $js; ?>?v=<?php echo $site_version; ?>"></script><?php echo "\n"; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if (isset($js_files_i18n) && is_array($js_files_i18n)) : ?>
        <?php foreach ($js_files_i18n as $js) : ?>
            <?php if ( ! is_null($js)) : ?>
                <?php echo "\n"; ?><script type="text/javascript"><?php echo "\n" . $js . "\n"; ?></script><?php echo "\n"; ?>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

</body>
</html>