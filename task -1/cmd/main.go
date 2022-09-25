package main

import (
	"apiserver"
	"apiserver/pkg/handler"
	"log"
)

func main() {
	h := handler.NewHandler()
	srv := new(apiserver.Server)

	if err := srv.Run("8080", h.InitRoutes()); err != nil {
		log.Fatal("error occured while running http server: %s", err.Error())
	}
}
