<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>View Cats 4 Free</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/heroes.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>
    
  </head>
<body>
  <header>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a href="#" class="navbar-brand d-flex align-items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
          <strong>Cat Photos</strong>
        </a>
        <a href="https://upgrade.kolesa.group/backend" class="nav-item text-decoration-none text-white">Made for Kolesa Upgrade Backend 2022</a>
      </div>
    </div>
  </header>

<main>

<div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="img/logo.svg" alt="" width="120" height="120">
    <h1 class="display-5 fw-bold">View Cats for Free</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4 mt-4">Without any registration or SMS</p>
      <p class="lead mb-4">The app made using PHP, Composer & Guzzle.<br>Cheers to Anton Sergeev.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a href="#cats-album" class="btn btn-primary btn-lg px-4 gap-3">View Cats!</a>
        <a href="https://github.com/Kolesa-Education/kolesa-upgrade-homework-3" class="btn btn-outline-secondary btn-lg px-4">Go to Repo</a>
      </div>
    </div>
  </div>

  <div class="album py-5 bg-light" id="cats-album">
    <div class="container">
        <div class="row">

            <?php require_once 'cats.php'; ?>

        </div>
    </div>

</main>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
