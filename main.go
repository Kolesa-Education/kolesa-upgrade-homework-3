package main

import (
	"encoding/json"
	"fmt"
	"io/ioutil"
	"log"
	"net/http"
	"text/template"
	"time"
)

const URL = "https://api.thecatapi.com/v1/images/search"

var myClient = &http.Client{Timeout: 5 * time.Second}

var Cats []Cat

type Cat struct {
	ID     int    `json:"id"`
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
		fmt.Println("r.Method != http.MethodGet")
		return
	}
	if r.URL.Path != "/" {
		fmt.Println("r.URL.Path != \"/\"", r.URL.Path)
		return
	}
	t, err := template.ParseFiles("./static/index.html")
	if err != nil {
		fmt.Println("template.ParseFiles(\"./static/index.html\")", err)
		return
	}
	err = t.Execute(w, nil)
	if err != nil {
		fmt.Println("t.ExecuteTemplate(w, \"index\", nil)", err)
		return
	}
}

func CatHandler(w http.ResponseWriter, r *http.Request) {
	fmt.Println("cats post", r.URL.Path)

	t, err := template.ParseFiles("./static/index.html")
	if err != nil {
		fmt.Println("template doesn't parse in catHandler", err)
		return
	}
	err = r.ParseForm()
	if err != nil {
		fmt.Println("parse form fail", err)
		return
	}
	limit := r.PostFormValue("limit")
	page := r.PostFormValue("page")
	order := r.PostFormValue("sort")
	fmt.Println(limit, page, order)
	// requestUrl := URL + "?limit=" + limit + "&page=" + page + "&order=" + order
	err = GetJson(URL)
	if err != nil {
		fmt.Println("parse Json fail", err)
		return
	}
	err = t.Execute(w, Cats)
	if err != nil {
		fmt.Println(err)
		return
	}
}

func GetJson(url string) error {
	fmt.Println("url", url)
	r, err := myClient.Get(url)
	if err != nil {
		return err
	}
	body, err := ioutil.ReadAll(r.Body)
	defer r.Body.Close()
	fmt.Printf("%v\n", string(body))
	return json.NewDecoder(r.Body).Decode(Cats)
}
