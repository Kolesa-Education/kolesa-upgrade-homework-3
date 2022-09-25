<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">
    <title>Cats</title>
</head>

<body>
    <section class="jumbotron text-center">
        <div >
            <h1 class="jumbotron-heading">Cats</h1>
        </div>
    </section>

    <form class="needs-validation" action="index.php" method="POST" novalidate>
        <div class="row">
            <div class="col-md-5 mb-1"></div>
            <button class="btn btn-primary col-md-2 m-1" name="submit" type="submit">Показать еще</button>
            <div class="col-md-5 mb-1"></div>
        </div>
    </form>

    <div >
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-1"></div>
                <?php require 'cat.php'; ?>
                <div class="col-md-4 mb-1"></div>
            </div>
        </div>
    </div>

</body>
</html>