package internal

import (
	"apiserver/models"
	"encoding/json"
	"net/http"
)

const imageURL = "https://api.thecatapi.com/v1/images/search"

func GetJson() ([]models.Image, error) {
	var data []models.Image

	response, err := http.Get(imageURL)
	if err != nil {
		return nil, err
	}
	defer response.Body.Close()

	if err := json.NewDecoder(response.Body).Decode(&data); err != nil {
		return nil, err
	}

	return data, nil
}
