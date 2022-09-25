package main

type Response struct {
	Id     string
	Url    string
	Width  int
	Height int
}

var ErrResp = Response{
	Id:     "_",
	Url:    "https://dontgetserious.com/wp-content/uploads/2021/12/cat-coughing-meme.jpeg",
	Width:  640,
	Height: 230,
}
