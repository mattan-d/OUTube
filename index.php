<?php
$json = file_get_contents('data.json');
$data = json_decode($json);

$welcomeVideo = $data->items[0];
if (isset($_GET['vid']))
    $welcomeVideo->snippet->resourceId->videoId = $_GET['vid'];
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>OU · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">


    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">About</h4>
                    <p class="text-muted">Video lectures from the open Video lectures from the open Video lectures from the open Video lectures from the open</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Contact</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Follow on Twitter</a></li>
                        <li><a href="#" class="text-white">Like on Facebook</a></li>
                        <li><a href="#" class="text-white">Email me</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                     stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2"
                     viewBox="0 0 24 24">
                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>
                    <circle cx="12" cy="13" r="4"/>
                </svg>
                <strong>OU YouTube</strong>
            </a>
        </div>
    </div>
</header>

<main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">MOOCs by OUIL</h1>
                <p class="lead text-muted">Video lectures from the open, free course הרצאות וידיאו מקורס פתוח (MOOC)
                    About the course: Hebrew: http://mooc.openu.ac.il/modern-middle-east/
                    English:http://mooc.openu.ac.il/en/the-modern-middle-east/</p>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="ratio ratio-4x3">
                    <iframe title="YouTube video"
                            src="https://www.youtube.com/embed/<?= $welcomeVideo->snippet->resourceId->videoId ?>?autoplay=0&fs=0&iv_load_policy=3&showinfo=0&rel=0&cc_load_policy=0&start=0&end="
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($data->items as $item): ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="<?= $item->snippet->thumbnails->high->url; ?>">

                            <div class="card-body">
                                <p class="card-text"><a
                                            href="/?vid=<?= $item->snippet->resourceId->videoId; ?>"><?= $item->snippet->title ?></a>
                                </p>
                                <p class="card-text"><?= $item->snippet->description ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted"><?= $item->snippet->publishedAt; ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</main>

<footer class="text-muted py-5">
    <div class="container">
        <p class="float-end mb-1">
            <a href="#">Back to top</a>
        </p>
        <p class="mb-1">OU By Mattan &copy; Bootstrap!</p>
    </div>
</footer>

<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>
</html>
