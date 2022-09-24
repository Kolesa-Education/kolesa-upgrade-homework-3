package server

import (
	"log"
	"net/http"
)

func Routes() {
	mux := http.NewServeMux()
	mux.HandleFunc("/", Homepage)
	mux.Handle("/ui/", http.StripPrefix("/ui/", http.FileServer(http.Dir("./ui/"))))

	log.Println("Run the server http://127.0.0.1:8080")
	http.ListenAndServe(":8080", mux)
}
