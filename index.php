<?php
class Cat
{
    protected $fetchBreeds;
    protected $getBreed;

    public function __construct($fetchBreeds, $getBreed)
    {
        $this->setFetchBreeds($fetchBreeds);
        $this->getBreed = $getBreed;
    }
    /**
     * @param mixed $fetchBreeds
     */
    public function setFetchBreeds($fetchBreeds)
    {
        $this->fetchBreeds = json_decode(file_get_contents($fetchBreeds), true);
    }

    public function eachIMG(){
        for ($i = 0; $i < count($this->fetchBreeds); $i++) {
            if ($this->fetchBreeds[$i]['name'] == $this->getBreed) {
                return '<img width="400px" height="auto" src="'.$this->fetchBreeds[$i]['image']['url'].'">';
            }
        }
        return null;
    }

    public function eachId()
    {
        for ($i = 0; $i < count($this->fetchBreeds); $i++) {
            echo '<option value="'.$this->fetchBreeds[$i]['name'].'">'.$this->fetchBreeds[$i]['name'].'</oprion>';
        }
    }
}
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Это заголовок тайтл</title>
</head>
<body>
<form action="" method="get">
    <?php

    $cat = new Cat('https://api.thecatapi.com/v1/breeds/', isset($_GET['paroda']) ? $_GET['paroda'] : null);

    if (isset($_GET['submit'])) {
        echo $cat->eachIMG();
    }
    ?>
    <select name="paroda" id="paroda">
        <option value="change">change</option>
        <?php $cat->eachId(); ?>
    </select>
    <button type="submit" name="submit" value="submit">Submit</button>

</form>

</body>
