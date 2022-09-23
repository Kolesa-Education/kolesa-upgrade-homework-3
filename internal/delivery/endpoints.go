package delivery

import "net/http"

func SetEndpoints(mux *http.ServeMux) {
	mux.HandleFunc("/", handleMainPage)
	mux.HandleFunc("/categories/", handleByCategory)

	mux.Handle("/templates/", http.StripPrefix("/templates/", http.FileServer(http.Dir("templates/"))))
}
