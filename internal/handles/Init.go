package handles

import (
	"fmt"
	"net/http"

	"task3/internal/utils"
)

func Init() {
	server := utils.New()
	fmt.Print("http://localhost:8888\n")
	if err := http.ListenAndServe(":8888", server.Router()); err != nil {
		fmt.Println(err)
		return
	}
}
