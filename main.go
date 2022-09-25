package main

import (
	"encoding/json"
	"io/ioutil"
	"log"
	"net/http"
	"text/template"
	"time"
)

const URL = "https://api.thecatapi.com/v1/images/search"

var myClient = &http.Client{Timeout: 5 * time.Second}

type Cat struct {
	ID     string `json:"id"`
	UrlImg string `json:"url"`
	Width  int    `json:"width"`
	Height int    `json:"height"`
}

func main() {
	log.Printf("Tap to link http://localhost:3000")
	http.HandleFunc("/", IndexHandler)
	http.HandleFunc("/cats", CatHandler)
	if err := http.ListenAndServe(":3000", nil); err != nil {
		log.Fatal("ListenAndServe: ", err)
	}
}

func IndexHandler(w http.ResponseWriter, r *http.Request) {
	if r.Method != http.MethodGet {
		http.Error(w, http.StatusText(http.StatusBadRequest), http.StatusBadRequest)
		return
	}
	if r.URL.Path != "/" {
		http.Error(w, http.StatusText(http.StatusNotFound), http.StatusNotFound)
		return
	}
	t, err := template.ParseFiles("./static/index.html")
	if err != nil {
		http.Error(w, http.StatusText(http.StatusInternalServerError), http.StatusInternalServerError)
		return
	}
	err = t.Execute(w, nil)
	if err != nil {
		http.Error(w, http.StatusText(http.StatusInternalServerError), http.StatusInternalServerError)
		return
	}
}

func CatHandler(w http.ResponseWriter, r *http.Request) {
	if r.Method != http.MethodPost {
		http.Error(w, http.StatusText(http.StatusBadRequest), http.StatusBadRequest)
		return
	}
	t, err := template.ParseFiles("./static/index.html")
	if err != nil {
		http.Error(w, http.StatusText(http.StatusInternalServerError), http.StatusInternalServerError)
		return
	}
	err = r.ParseForm()
	if err != nil {
		http.Error(w, http.StatusText(http.StatusInternalServerError), http.StatusInternalServerError)
		return
	}
	limit := r.PostFormValue("limit")
	page := r.PostFormValue("page")
	order := r.PostFormValue("sort")
	requestUrl := URL + "?limit=" + limit + "&page=" + page + "&order=" + order
	Cats, err := getJson(requestUrl)
	if err != nil {
		http.Error(w, http.StatusText(http.StatusInternalServerError), http.StatusInternalServerError)
		return
	}
	err = t.Execute(w, Cats)
	if err != nil {
		http.Error(w, http.StatusText(http.StatusInternalServerError), http.StatusInternalServerError)
		return
	}
}

func getJson(url string) ([]Cat, error) {
	var Cats []Cat
	r, err := myClient.Get(url)
	if err != nil {
		return Cats, err
	}
	body, err := ioutil.ReadAll(r.Body)
	defer r.Body.Close()
	err = json.Unmarshal(body, &Cats)
	return Cats, err
}
