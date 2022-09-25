package handler

import (
	"apiserver/internal"
	"apiserver/models"
	"html/template"
	"net/http"
)

type Handler struct {
	storage *models.Image
}

func NewHandler() *Handler {
	return &Handler{
		storage: &models.Image{},
	}
}

func (h *Handler) InitRoutes() *http.ServeMux {
	router := http.NewServeMux()
	router.Handle("/static/", http.StripPrefix("/static/", http.FileServer(http.Dir("./web/static"))))
	router.HandleFunc("/", indexPge)
	router.HandleFunc("/images", getImage)

	return router
}

func indexPge(w http.ResponseWriter, r *http.Request) {
	if r.URL.Path != "/" {
		internal.CheckErrors(w, http.StatusNotFound)
		return
	}

	if r.Method != http.MethodGet {
		internal.CheckErrors(w, http.StatusMethodNotAllowed)
		return
	}

	tmpl, err := template.ParseFiles("web/templates/index.html")
	if err != nil {
		internal.CheckErrors(w, http.StatusInternalServerError)
		return
	}

	if err := tmpl.Execute(w, nil); err != nil {
		internal.CheckErrors(w, http.StatusInternalServerError)
		return
	}
}

func getImage(w http.ResponseWriter, r *http.Request) {
	if r.Method != http.MethodPost {
		internal.CheckErrors(w, http.StatusMethodNotAllowed)
		return
	}

	tmpl, err := template.ParseFiles("web/templates/cats.html")
	if err != nil {
		internal.CheckErrors(w, http.StatusInternalServerError)
	}

	s, err := internal.GetJson()
	if err != nil {
		internal.CheckErrors(w, http.StatusInternalServerError)
		return
	}

	tmpl.Execute(w, s)
}
