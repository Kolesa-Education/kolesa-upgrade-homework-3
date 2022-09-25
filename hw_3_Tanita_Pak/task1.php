<html>

<body>
    <ul>
        <?php
        $data = file_get_contents("https://api.thecatapi.com/v1/breeds?limit=5");
        $datai = json_decode($data);
        ?>
        <?php
        foreach ($datai as $i => $value) : ?>
            <?php
            $urlstring = "https://api.thecatapi.com/v1/images/search?breed_id=" . $datai[$i]->id;
            $cats = json_decode(file_get_contents($urlstring));
            ?>
            <li>
                <div>
                    <img src="<?php echo $cats[0]->url ?>" width="100" , height="100"> </img>
                </div>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</body>

</html>