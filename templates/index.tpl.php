<?php
    $content = file_get_contents('./templates/' . $query['file'] . '.tpl.php');
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title><?php echo $windowTitle; ?></title>
    <style>
        .main.container {padding: 1rem;}
        .head .jumbotron {margin-bottom: 1rem; padding: 1rem 2rem;}
        .head .jumbotron hr.my-4 {margin-top: 1rem !important; margin-bottom: 1rem !important;}
        .head .jumbotron p {margin-bottom: 0; text-align: justify;}
        .navbar.bg-light {background-color: #e9ecef !important; border-radius: .3rem; margin-bottom: 1rem;}
        .content {background-color: #e9ecef !important; border-radius: .3rem; padding: 1rem;}
        .content hr.my-4 {margin-top: 0 !important; margin-bottom: .8rem !important;}
        .content p {text-align: justify;}
        footer {background-color: #e9ecef !important; border-radius: .3rem; margin-bottom: 1rem; text-align: center;}
        fieldset {background-color: #f5f5f5; border: 1px solid #ccc; border-radius: 1rem; padding: 1rem;}

        .gsc-control-cse {background-color: transparent !important; border: none !important; padding: 0 !important; width: 250px !important;}
        .gsc-search-button-v2 {border-radius: .3rem !important; padding: 9px 27px !important;}
        .gsc-input-box {border-radius: .3rem !important;}
    </style>
</head>
<body>

<div class="main container">
    <div class="head row">
        <div class="col-sm">
            <div class="jumbotron">
                <?php if (!empty($_SESSION['user'])): ?>
                <span class="text-muted float-right">Bejelentkezett: <?php echo $_SESSION['user']['lastname'] . ' ' . $_SESSION['user']['firstname'] . ' (' . $_SESSION['user']['username'] . ')'; ?></span>
                <?php endif; ?>
                <h1 class="display-5"><?php echo $headDetails['title']; ?></h1>
                <hr class="my-4">
                <p class="lead"><?php echo $headDetails['slogan']; ?></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Főoldal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/?page=about-us"><?php echo $pages['about-us']['title']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/?page=community-service"><?php echo $pages['community-service']['title']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/?page=gallery"><?php echo $pages['gallery']['title']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/?page=videos"><?php echo $pages['videos']['title']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/?page=contact"><?php echo $pages['contact']['title']; ?></a>
                        </li>
                        <li class="nav-item">
                            <?php if (empty($_SESSION['user'])): ?>
                            <a class="nav-link" href="/?page=login"><?php echo $pages['login']['title']; ?></a>
                            <?php else: ?>
                            <a class="nav-link" href="/?action=logout">Kilépés</a>
                            <?php endif; ?>
                        </li>
                    </ul>
                    <script>
                        (function() {
                            var cx = '015623446626408757465:eyv1jxqyziu';
                            var gcse = document.createElement('script');
                            gcse.type = 'text/javascript';
                            gcse.async = true;
                            gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                            var s = document.getElementsByTagName('script')[0];
                            s.parentNode.insertBefore(gcse, s);
                        })();
                    </script>
                    <gcse:search></gcse:search>

                </div>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
            <div class="content"><?php echo $content; ?></div>
        </div>
    </div>
</div>

<div class="container">
    <footer class="footer p-2">
        <span class="text-muted"><?php echo $footerDetails['copyright'] . ' &#8211; ' . $footerDetails['company']; ?></span>
    </footer>
</div>

<?php
if (!empty($_SESSION['message'])) {
    $toastHeaderBgClass = 'bg-info';
    if ($_SESSION['success'] === true) {
        $toastHeaderBgClass = 'bg-success';
    }
    elseif ($_SESSION['success'] === false) {
        $toastHeaderBgClass = 'bg-danger';
    }
?>
<div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false" style="position: absolute; top: 1rem; right: 1rem;">
    <div class="toast-header <?php echo $toastHeaderBgClass; ?>">
        <strong class="mr-auto text-white">Üzenet</strong>
        <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        <?php echo $_SESSION['message']; ?>
    </div>
</div>
<?php } ?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<?php if (!empty($_SESSION['message'])): ?>
<script>
    $('.toast').toast('show');
</script>
<?php
    $_SESSION['message'] = '';
endif;
?>

</body>
</html>
