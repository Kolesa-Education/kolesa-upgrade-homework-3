package main

import (
	"encoding/json"
	"fmt"
	"html/template"
	"io/ioutil"
	"log"
	"net/http"
)

func home(w http.ResponseWriter, r *http.Request) {
	var responseList []Response

	tmpl, err := template.ParseFiles("./ui/index.html")
	if err != nil {
		log.Fatal(err)
	}

	resp, err := http.Get("https://api.thecatapi.com/v1/images/search/")

	defer resp.Body.Close()
	responseList = append(responseList, ErrResp)

	body, err := ioutil.ReadAll(resp.Body)

	if err != nil {
		log.Fatal(err)
	}

	json.Unmarshal(body, &responseList)
	fmt.Println(responseList)

	tmpl.Execute(w, responseList)
}
