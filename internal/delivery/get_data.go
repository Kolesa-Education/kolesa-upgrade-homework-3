package delivery

import (
	"encoding/json"
	"net/http"
	"time"
)

func getDataFromAPI(url string, result interface{}) error {
	client := http.Client{
		Timeout: 2 * time.Second,
	}

	request, err := http.NewRequest("GET", url, nil)
	if err != nil {
		return err
	}

	response, err := client.Do(request)
	if err != nil {
		return err
	}

	defer response.Body.Close()

	return json.NewDecoder(response.Body).Decode(result)
}
