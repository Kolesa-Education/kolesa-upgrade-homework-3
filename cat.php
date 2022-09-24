<?php

class Cat
{
    private $id;
    private $url;
    private $width;
    private $height;

    private function getId()
    {
        return $this->id;
    }

    private function getUrl()
    {
        return $this->url;
    }

    private function getWidth()
    {
        return $this->width;
    }

    private function getHeight()
    {
        return $this->height;
    }

    private function getCardComponent($id, $url, $width='225px', $height='100%')
    {
        return <<<END
            <div class="col-md-4" id="$id">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="$url" alt="image" style="height: 225px; width: 100%; object-fit: contain;">
                </div>
            </div>
        END;
    }

    public function setParams($cat)
    {
        $this->id = $cat->id;
        $this->url = $cat->url;
        $this->width = $cat->width;
        $this->height = $cat->height;
    }

    public function displayCat()
    {
        $id = $this->getId();
        $url = $this->getUrl();
        $width = $this->getWidth();
        $height = $this->getHeight();

        echo $this->getCardComponent($id, $url);
    }
}

class ApiController
{
    private $url = 'https://api.thecatapi.com/v1/images/search';
    private $limit = 3;
    private $page = 1;
    private $order = 'Desc';

    public function setParams($limit, $page, $order)
    {
        $this->limit = $limit;
        $this->page = $page;
        $this->order = $order;
    }

    private function getUrl()
    {
        return $this->url;
    }

    private function getLimit()
    {
        return $this->limit;
    }

    private function getPage()
    {
        return $this->page;
    }

    private function getOrder()
    {
        return $this->order;
    }

    private function getDataFromExternalApi()
    {
        $url = $this->url;
        return $data = json_decode(file_get_contents($url));
    }

    private function concat($url, $limit, $page, $order)
    {
        $urlAndLimit = $url . '?limit=' . $limit;
        $page = 'page' . $limit;
        $order = 'order' . $limit;

        $array = [$urlAndLimit, $page, $order];
        $this->url = implode("&", $array);
    }

    public function show()
    {
        $url = $this->getUrl();
        $limit = $this->getLimit();
        $page = $this->getPage();
        $order = $this->getOrder();

        $this->concat($url, $limit, $page, $order);

        $data = $this->getDataFromExternalApi();

        foreach ($data as $cat) {
            $cat_obj = new Cat;
            $cat_obj->setParams($cat);
            $cat_obj->displayCat();
        }
    }
}

if (isset($_POST['submit'])) {
    $limit = $_POST['limit'];
    $page = $_POST['page'];
    $order = $_POST['order'];

    $controller = new ApiController();
    $controller->setParams($limit, $page, $order);
    $controller->show();
} else {
    $controller = new ApiController();
    $controller->show();
}
