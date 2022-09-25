var buttons = document.getElementsByClassName("cat-button");
for (var i = 0; i < buttons.length; i++) {
    buttons[i].onclick = function () {
        document.getElementById("price").scrollIntoView({behavior: "smooth"});
    }
}

document.getElementById("price-action").onclick = function () {
    if (document.getElementById("name").value === "") {
        alert("Заполните поле имя!");
    } else if (document.getElementById("phone").value === "") {
        alert("Заполните поле телефон!");
    } else if (document.getElementById("cat").value === "") {
        alert("Заполните поле котенок!");
    } else {
        alert("Спасибо за заявку, мы свяжемся с Вами в ближайшее время!");
    }
}