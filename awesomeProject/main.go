package main

import (
	"encoding/json"
	"html/template"
	"io/ioutil"
	"net/http"
	"time"
)

const URL = "https://api.thecatapi.com/v1/images/search"

var client = &http.Client{Timeout: 2 * time.Second}

type Cat struct {
	ID     string `json:"id"`
	UrlImg string `json:"url""`
	Width  int    `json:"width"`
	Height int    `json:"height"`
}

func getJson(url string) (Cats []Cat, err error) {
	response, err := client.Get(url)
	if err != nil {
		return Cats, err
	}

	bytes, errRead := ioutil.ReadAll(response.Body)
	if errRead != nil {
		return Cats, err
	}

	defer response.Body.Close()
	err = json.Unmarshal(bytes, &Cats)
	return Cats, err
}

func CatHandler(w http.ResponseWriter, r *http.Request) {
	if r.Method != http.MethodPost {
		http.Error(w, http.StatusText(http.StatusBadRequest), http.StatusBadRequest)
		return
	}

	tmpl, err := template.ParseFiles("index.html")
	if err != nil {
		http.Error(w, err.Error(), 400)
		return
	}

	Cats, err := getJson(URL)
	if err != nil {
		http.Error(w, http.StatusText(http.StatusBadRequest), http.StatusBadRequest)
		return
	}

	err = tmpl.Execute(w, Cats)
	if err != nil {
		http.Error(w, err.Error(), 400)
		return
	}
}

func HomePage(w http.ResponseWriter, r *http.Request) {
	if r.Method != http.MethodGet {
		http.Error(w, http.StatusText(http.StatusBadRequest), http.StatusBadRequest)
		return
	}

	t, err := template.ParseFiles("index.html")
	if err != nil {
		http.Error(w, err.Error(), 400)
		return
	}

	err = t.Execute(w, nil)
	if err != nil {
		http.Error(w, err.Error(), 400)
		return
	}
}

func main() {
	http.HandleFunc("/", HomePage)
	http.HandleFunc("/Cats", CatHandler)
	http.ListenAndServe(":9090", nil)
}
