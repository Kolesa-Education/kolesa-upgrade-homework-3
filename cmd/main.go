package main

import (
	"net/http"
)

func main() {
	http.HandleFunc("/", home)
	http.ListenAndServe(":5000", nil)
}
