package server

import (
	"html/template"
	"net/http"
)

type Data struct {
	Info interface{}
}

func Homepage(w http.ResponseWriter, r *http.Request) {
	if r.URL.Path != "/" {
		PrintErrors(w, "Page not found", http.StatusNotFound)
		return
	}

	html, err := template.ParseFiles("./ui/index.html")
	if err != nil {
		PrintErrors(w, "Page not found", http.StatusNotFound)
		return
	}

	picture := GetsPicture()

	data := &Data{
		Info: picture,
	}

	html.Execute(w, data)
}
