package utils

import (
	"net/http"
)

func (s *Server) Router() *http.ServeMux {
	s.mux.Handle("/ui/", http.StripPrefix("/ui", http.FileServer(http.Dir("./ui"))))
	s.mux.HandleFunc("/", s.home)
	return s.mux
}
