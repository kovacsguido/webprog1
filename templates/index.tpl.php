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
        .navbar.bg-light {background-color: #e9ecef !important; margin-bottom: 1rem;}
        .content {background-color: #e9ecef !important; padding: 1rem;}
        .content hr.my-4 {margin-top: 0 !important; margin-bottom: .8rem !important;}
        .content p {text-align: justify;}
    </style>
</head>
<body>

<div class="main container">
    <div class="head row">
        <div class="col-sm">
            <div class="jumbotron">
                <h1 class="display-5"><?php echo $windowTitle; ?></h1>
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
                            <a class="nav-link" href="/?page=gallery"><?php echo $pages['gallery']['title']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/?page=videos"><?php echo $pages['videos']['title']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/?page=contact"><?php echo $pages['contact']['title']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/?page=login"><?php echo $pages['login']['title']; ?></a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Keresés..." aria-label="Search">
                        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Keres</button>
                    </form>
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
</body>
</html>
