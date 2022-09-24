package delivery

import "net/http"

func (h *Handler) SetEndpoints(mux *http.ServeMux) {
	mux.HandleFunc("/", h.handleMainPage)
	mux.HandleFunc("/categories/", h.handleByCategory)
	mux.Handle("/templates/", http.StripPrefix("/templates/", http.FileServer(http.Dir("templates/"))))
}
