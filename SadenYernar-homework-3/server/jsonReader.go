package server

import (
	"encoding/json"
	"log"
	"net/http"
)

type CatsPicture struct {
	URL string `json:"url"`
}

const urlPicture = "https://api.thecatapi.com/v1/images/search"

func GetsPicture() []CatsPicture {
	var c []CatsPicture

	resp, err := http.Get(urlPicture)
	if err != nil {
		log.Fatalf(err.Error())
	}

	defer resp.Body.Close()

	if err = json.NewDecoder(resp.Body).Decode(&c); err != nil {
		log.Fatalf(err.Error())
	}

	return c
}
