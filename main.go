package main

import (
	"log"
	"main/web"
	"net/http"
)

func main() {
	log.Printf("Tap to link http://localhost:3000")
	http.HandleFunc("/", web.IndexHandler)
	http.HandleFunc("/cats", web.CatHandler)
	if err := http.ListenAndServe(":3000", nil); err != nil {
		log.Fatal("ListenAndServe: ", err)
	}
}
