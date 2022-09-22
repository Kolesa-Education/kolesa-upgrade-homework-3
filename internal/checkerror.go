package internal

import (
	"fmt"
	"html/template"
	"net/http"
)

func CheckErrors(w http.ResponseWriter, status int) {
	Msg := fmt.Sprintf("%d %s\n", status, http.StatusText(status))

	tmpl, err := template.ParseFiles("web/templates/error.html")
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}
	err = tmpl.Execute(w, Msg)
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}
}
