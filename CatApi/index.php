<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">
    <title>(=^･ω･^=)</title>
</head>

<body class="vsc-initialized">
<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Котики</h1>
            <p class="lead text-muted">На любой вкус и цвет</p>
        </div>
    </section>

    <form class="needs-validation" action= "<?= $_SERVER['PHP_SELF'];?>" method="POST" novalidate>
        <div class="row">
            <div class="col-md-4 mb-1"></div>

            <div class="col-md-2 mb-1">
                <label >Количество котиков(1-10)</label>
                <input type="number" class="form-control" name="num" min="1" max="10">
            </div>

            <div class="col-md-2 mb-1">
                <label >Категория котиков</label>
                <input type="number" class="form-control" name="cat_category"min="1" max="5">
            </div>


            <div class="col-md-3 mb-1"></div>
        </div>

        <div class="row">
            <div class="col-md-5 mb-1"></div>

            <button class="btn btn-primary col-md-2 m-1" name="submit" type="submit">Посмотреть</button>

            <div class="col-md-5 mb-1"></div>
        </div>

    </form>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <?php require 'CatControl.php'; ?>
            </div>
        </div>
    </div>
</main>


</body>
</html>