package main

import (
	"hw3/internal/delivery"
	"log"
	"net/http"
)

const port = ":8088"

func main() {
	mux := http.NewServeMux()

	handler := delivery.NewHandler()
	handler.SetEndpoints(mux)

	log.Printf("Starting server...\nhttp://localhost%v/\n", port)
	if err := http.ListenAndServe(port, mux); err != nil {
		log.Println(err)
		return
	}
}
