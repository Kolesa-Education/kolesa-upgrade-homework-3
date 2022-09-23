package utils

import (
	"net/http"
	"time"
)

type Server struct {
	mux *http.ServeMux
}

func New() *Server {
	return &Server{
		mux: http.NewServeMux(),
	}
}

var httpClient = &http.Client{
	Timeout: time.Second * 10,
}
