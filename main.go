package main

import (
	"encoding/json"
	"fmt"
	"html/template"
	"io/ioutil"
	"net/http"
)

const apiKey = "live_3H3yDi9s1qTk7ClzdMvHF0wMIQiGbe2YE1LQn5rFZ7g47IZKRMdCh3cPEDaC24CC"

type CatImgRand struct {
	Url string `json:"url"`
}
type CatImgBoxes struct {
	Url string `json:"url"`
}
type Category struct {
	ID   int    `json:"id"`
	Name string `json:"name"`
}

func catsRandom(w http.ResponseWriter, _ *http.Request) {
	client := &http.Client{}
	rqst, err := http.NewRequest("GET", "https://api.thecatapi.com/v1/images/search", nil)
	if err != nil {
		fmt.Println("Error: ", err)
		return
	}
	rqst.Header.Set("api_key", apiKey)
	resp, err := client.Do(rqst)
	if err != nil {
		fmt.Println("Error: ", err)
		return
	}
	body, err := ioutil.ReadAll(resp.Body)
	if err != nil {
		fmt.Println("Error: ", err)
		return
	}
	var catImgRand []CatImgRand
	err = json.Unmarshal(body, &catImgRand)
	if err != nil {
		fmt.Println("Error: ", err)
		return
	}
	var imgRand CatImgRand
	for _, j := range catImgRand {
		imgRand.Url = j.Url
	}
	tmpl, err := template.ParseFiles("templates/cats.html")
	if err != nil {
		fmt.Println("Error: ", err)
		return
	}
	err = tmpl.Execute(w, imgRand)
	if err != nil {
		fmt.Println("Error: ", err)
		return
	}
}

func getCategories(myCategory string) int {
	var category []Category
	client := &http.Client{}
	rqst, err := http.NewRequest("GET", "https://api.thecatapi.com/v1/categories", nil)
	if err != nil {
		fmt.Println("Error: ", err)
		return -1
	}
	rqst.Header.Set("x-api-key", apiKey)
	rspn, err := client.Do(rqst)
	if err != nil {
		fmt.Println("Error: ", err)
		return -1
	}
	body, err := ioutil.ReadAll(rspn.Body)
	if err != nil {
		fmt.Println("Error: ", err)
		return -1
	}
	err = rspn.Body.Close()
	if err != nil {
		fmt.Println("Error: ", err)
		return -1
	}
	err = json.Unmarshal(body, &category)
	if err != nil {
		fmt.Println("Error: ", err)
		return -1
	}
	for _, j := range category {
		//fmt.Println(j.Name)
		if j.Name == myCategory {
			return j.ID
		}
	}
	return -1
}

func catsBoxes(w http.ResponseWriter, _ *http.Request) {
	client := &http.Client{}
	ids := fmt.Sprintf("https://api.thecatapi.com/v1/images/search?category_ids=%d",
		getCategories("boxes"))
	rqst, err := http.NewRequest("GET", ids, nil)
	if err != nil {
		fmt.Println("Error: ", err)
		return
	}
	rqst.Header.Set("api_key", apiKey)
	resp, err := client.Do(rqst)
	if err != nil {
		fmt.Println("Error: ", err)
		return
	}
	body, err := ioutil.ReadAll(resp.Body)
	if err != nil {
		fmt.Println("Error: ", err)
		return
	}
	var catImgBoxes []CatImgBoxes
	err = json.Unmarshal(body, &catImgBoxes)
	if err != nil {
		fmt.Println("Error: ", err)
		return
	}
	var imgBoxes CatImgBoxes
	for _, j := range catImgBoxes {
		imgBoxes.Url = j.Url
	}
	tmpl, err := template.ParseFiles("templates/boxes.html")
	if err != nil {
		fmt.Println("Error: ", err)
		return
	}
	err = tmpl.Execute(w, imgBoxes)
	if err != nil {
		fmt.Println("Error: ", err)
		return
	}
}

func ping(w http.ResponseWriter, _ *http.Request) {
	tmpl, err := template.ParseFiles("templates/ping.html")
	if err != nil {
		fmt.Println("Error: ", err)
		return
	}
	err = tmpl.Execute(w, nil)
	if err != nil {
		fmt.Println("Error: ", err)
		return
	}
}

func curl(w http.ResponseWriter, _ *http.Request) {
	tmpl, err := template.ParseFiles("templates/curl.html")
	if err != nil {
		fmt.Println("Error: ", err)
		return
	}
	err = tmpl.Execute(w, nil)
	if err != nil {
		fmt.Println("Error: ", err)
		return
	}
}

func main() {
	http.HandleFunc("/", catsRandom)
	getCategories("boxes")
	http.HandleFunc("/boxes", catsBoxes)
	http.HandleFunc("/ping/", ping)
	http.HandleFunc("/curl/", curl)
	err := http.ListenAndServe(":8088", nil)
	if err != nil {
		fmt.Println("Error: ", err)
	}
}
