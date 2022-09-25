<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css">
    <title>PHP Form Demo</title>
</head>
<body>
    <main>
        <form action="main.php" method="post">
            <div>
                <label for="name">Введите номер Вашей категории</label>
                <input type="number" name="CategoryID" required="required" placeholder="Номер категории" />
            </div>
            <button type="submit">Отправить</button>
        </form>
    </main>
</body>
</html>
