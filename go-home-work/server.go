package main

import (
	"fmt"
	"io"
	"log"
	"net/http"
)

func main() {
	http.HandleFunc("/", GetCats)
	fmt.Printf("Starting server on port	8080\n")
	if err := http.ListenAndServe(":8080", nil); err != nil {
		log.Fatal(err)
	}
}

func GetCats(w http.ResponseWriter, r *http.Request) {

	if r.Method != "GET" {
		http.Error(w, "Method is not supported.", http.StatusNotFound)
		return
	}

	query := r.URL.Query()
	category := query.Get("category")
	fmt.Printf(category)
	categories := map[string]string{
		"boxes":      "5",
		"caturday":   "6",
		"clothes":    "15",
		"dream":      "9",
		"funny":      "3",
		"hats":       "1",
		"kittens":    "10",
		"sinks":      "14",
		"space":      "2",
		"sunglasses": "4",
		"ties":       "7",
		"":           "",
	}
	res, err := http.Get("https://api.thecatapi.com/v1/images/search?size=small&limit=10&category_ids=" + categories[category])
	if err != nil {
		log.Fatal(err)
	}
	body, err := io.ReadAll(res.Body)
	res.Body.Close()
	if res.StatusCode > 299 {
		log.Fatalf("Response failed with status code: %d and\nbody: %s\n", res.StatusCode, body)
	}
	if err != nil {
		log.Fatal(err)
	}
	w.Header().Set("Access-Control-Allow-Origin", "*")
	w.Header().Set("Content-Type", "application/json")
	w.Write(body)
}
