<?php 
    Class Client{
        private $imageAPI = "https://api.thecatapi.com/v1/images/search";
        private $categoryAPI = "https://api.thecatapi.com/v1/categories";

        private function makeRequest($api){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $api);
            
            $result = curl_exec($ch);

            curl_close($ch);

            return $result;
        }

        function getCategories(){
            $categories = json_decode($this->makeRequest($this->categoryAPI));

            if(isset($categories->message)){
                return NULL;
            }

            return $categories;
        }

        function getRandomCat(){
            $result = json_decode($this->makeRequest($this->imageAPI));
            
            return $result;
        }

        function getCatByCategory($id){
            $imageCategoryAPI = $this->imageAPI . "?category_ids=";
            $imageCategoryAPI .= $id;

            $result = json_decode($this->makeRequest($imageCategoryAPI));

            return $result;
        }
    }
?>