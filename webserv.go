package main

//С Go особо не знаком, поэтому возможно следующие стоки кода вызовут боль в глазах .-.
import (
	"encoding/json"
	"fmt"
	"io/ioutil"
	"log"
	"net/http"
	"os"
)

// Выбор категории изображений с котиком и вывод на экран
func searchCatByCatId(w http.ResponseWriter, r *http.Request) {
	client := &http.Client{} //инициализируем клиента
	//Ввод в консоль значения для запроса

	/*
		Задаём урл запроса, добавляем ему параметр, выполняем его, и закрываем тело ответа
		для того чтобы избежать утечки памяти(в инете прочитал)
	*/
	req, err := http.NewRequest("GET", "https://api.thecatapi.com/v1/images/search", nil)
	if err != nil {
		log.Print(err)
		os.Exit(1)
	}
	q := req.URL.Query().Get("category_ids")
	fmt.Print(q)
	res, err := client.Do(req)
	if err != nil {
		fmt.Println("Err is", err)
	}
	defer res.Body.Close()

	//Считываем и парсим ответ
	resBody, _ := ioutil.ReadAll(res.Body)
	response := string(resBody)
	resBytes := []byte(response)          // Конвертируем строку ответа в массив байтов (Я так понял в golang именно так работают с JSON)
	var resArr []map[string]interface{}   // Объявляем словарь где ключи это строки а значения - интерфейсы(любой объект)
	_ = json.Unmarshal(resBytes, &resArr) // Распаковываем результат в resArr
	url := resArr[0]["url"].(string)
	fmt.Fprintf(w, "<html><body><img src=\""+url+"\"/></body></html>")
}

func main() {
	http.HandleFunc("/", searchCatByCatId)   // Устанавливаем роутер
	err := http.ListenAndServe(":7777", nil) // устанавливаем порт веб-сервера
	if err != nil {
		log.Fatal("ListenAndServe: ", err)
	}
}
