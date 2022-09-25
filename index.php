<?php

require_once  __DIR__ . '/vendor/autoload.php';
include 'src/Entity/CatImageCreator.php';
include 'src/Entity/CatImage.php';
use \src\Entity\CatImage;
use \src\Entity\CatImageCreator;
use GuzzleHttp\Client as Client;

echo "hello";

$catImageCreator = new CatImageCreator();
$data = $catImageCreator->createCatImage();


function getCategoriesAPI() : void
{
    try {
        $client = new Client(['base_uri' => 'https://api.thecatapi.com']);
        $response = $client->request('GET', '/v1/categories');
        $stringBody = $response->getBody();
        $categories = json_decode($stringBody);

        foreach ($categories as $category){
            echo "<option value=\"" . $category->id . "\">";
            echo $category->name . "</option>";
        }
    } catch (Exception $e) {
        echo "<option value=\"" . "Error" . "\">";
    }

}
getCategoriesAPI();

if(isset($_POST['select'])) {
    $data = $catImageCreator->createCatImage();
}
if(isset($_POST['insert'])) {
    $insert = $_POST['insert'];
    $catImageCreator->setType($insert);
    $data = $catImageCreator->createCatImage();
}
?>

<html>
<head>
    <style>
        .body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 5rem;
            background-color: antiquewhite;
            padding: 5rem;
        }
        .btn {
            background-color: chocolate;
            color: white;
            padding: 1rem;
            border-radius: 1rem;
            font-size: 1rem;
        }
    </style>
    <script>
        function sendCategory() {
            const category = document.getElementById("category");
            const chosenCategory = category.options[category.selectedIndex].value;
            console.log(chosenCategory);
            document.getElementById("sendCtg").value = category;
        }
        function sendCatImage() {
            document.getElementById("sendCatImg").value = "select";
        }
    </script>

</head>
<body class="body">
    <form action="index.php"  method="post" class="form">
        <div>
            <img alt="some image" src="<?=$data->getUrl()?>" width="200px" height="200px"/>
        </div>
        <div>
            <select name="category" id="category">
                <option value="all">All</option>
                <?php getCategoriesAPI() ?>
            </select>
            <input type="submit" name="insert" onclick="sendCategory() id="sendCtg" class="btn"/>
        </div>
        <div>
            <button type="submit" onclick="sendCatImage()" name="select" class="btn" id="sendCatImg">Randomly Choose Cat Image</button>
        </div>
    </form>
</body>
</html>