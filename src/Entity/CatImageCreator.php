<?php

namespace src\Entity;
use Psr\Http\Message\ResponseInterface as ResponseInterfaceAlias;
use GuzzleHttp\Exception\RequestException as RequestException;
use GuzzleHttp\Client as Client;
use GuzzleHttp\Psr7\Request as request;

/**
 * Класс для создания объекта котика
 */
class CatImageCreator
{
    protected string $type = '';

    /**
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return CatImageCreator
     */
    public function setType(string $type): CatImageCreator
    {
        $this->type = $type;
        return $this;
    }

    function getCatImageAPI() {
        $client = new Client(['base_uri' => 'https://api.thecatapi.com']);
        try {
            if($this->getType()) {
                $response = $client->request('GET', '/v1/images/search?category='.$this->getType());
            } else {
                $response = $client->request('GET', '/v1/images/search');
            }
            $stringBody = $response->getBody();
            $data = json_decode($stringBody, true);
            return $data[0];
        } catch(Exception $e) {
            return $e;
        }


    }

    function createCatImage() : CatImage
    {
        $catImageData = new CatImage();
        $data = $this->getCatImageAPI();
        $catImageData->setId($data['id'])->setUrl($data['url'])->setHeight($data['height'])->setWidth($data['width']);
        return $catImageData;
    }

}