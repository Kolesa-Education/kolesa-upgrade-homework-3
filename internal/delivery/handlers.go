package delivery

import (
	"errors"
	"fmt"
	"html/template"
	"hw3/internal/models"
	"log"
	"net/http"
	"strings"
)

const (
	templateIndex = "templates/index.html"
	templateError = "templates/error.html"
	catsURL       = "https://api.thecatapi.com/v1/images/search"
)

type Handler struct {
}

func NewHandler() *Handler {
	return &Handler{}
}

func (h *Handler) handleMainPage(w http.ResponseWriter, r *http.Request) {
	if r.Method != http.MethodGet {
		h.handleErrorPage(w, http.StatusMethodNotAllowed, nil)
		return
	}

	if r.URL.Path != "/" {
		fmt.Println(r.URL.Path)
		h.handleErrorPage(w, http.StatusNotFound, nil)
		return
	}

	var catImg []models.CatImg
	if err := getDataFromAPI(catsURL, &catImg); err != nil {
		h.handleErrorPage(w, http.StatusInternalServerError, err)
		return
	}

	if len(catImg) < 1 {
		h.handleErrorPage(w, http.StatusInternalServerError, errors.New("empty response from the API"))
		return
	}

	tmp, err := template.ParseFiles(templateIndex)
	if err != nil {
		h.handleErrorPage(w, http.StatusInternalServerError, err)
		return
	}

	if err := tmp.Execute(w, catImg[0]); err != nil {
		h.handleErrorPage(w, http.StatusInternalServerError, err)
	}
}

func (h *Handler) handleByCategory(w http.ResponseWriter, r *http.Request) {
	if r.Method != http.MethodGet {
		h.handleErrorPage(w, http.StatusMethodNotAllowed, nil)
		return
	}

	id := strings.TrimPrefix(r.URL.Path, "/categories/")

	url := fmt.Sprintf("%s?category_ids=%s", catsURL, id)

	var catImg []models.CatImg
	if err := getDataFromAPI(url, &catImg); err != nil {
		h.handleErrorPage(w, http.StatusInternalServerError, err)
		return
	}

	if len(catImg) < 1 {
		h.handleErrorPage(w, http.StatusInternalServerError, errors.New("empty response from the API"))
		return
	}

	tmp, err := template.ParseFiles(templateIndex)
	if err != nil {
		h.handleErrorPage(w, http.StatusInternalServerError, err)
		return
	}

	if err := tmp.Execute(w, catImg[0]); err != nil {
		h.handleErrorPage(w, http.StatusInternalServerError, err)
	}
}

type errorHTTP struct {
	Status  int
	Message string
}

// handleErrorPage is a handler for the error page
func (h *Handler) handleErrorPage(w http.ResponseWriter, status int, serverError error) {
	if status >= http.StatusInternalServerError {
		log.Printf("something went wrong: %s", serverError)
	}

	errHTTP := errorHTTP{
		Status:  status,
		Message: http.StatusText(status),
	}

	w.WriteHeader(status)
	tmp, err := template.ParseFiles(templateError)
	if err != nil {
		http.Error(w, http.StatusText(http.StatusInternalServerError), http.StatusInternalServerError)
		return
	}

	if err := tmp.Execute(w, errHTTP); err != nil {
		http.Error(w, http.StatusText(http.StatusInternalServerError), http.StatusInternalServerError)
	}
}
