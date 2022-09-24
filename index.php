<?php
include ('catApi.php');
?>

<html>
<body>
<form method="get">
    <select name="category">
        <option value="all">All</option>
        <?php
        getCategories();
        ?>
    </select>
    <button type="submit">GET</button>
</form>
<img src="<?php echo getCat($requestedCategory) ?>" width="500" height="600"/>
<h1> <?php
    if ($error != 0){
        echo $error;
    }
    ?></h1>
</body>
</html>