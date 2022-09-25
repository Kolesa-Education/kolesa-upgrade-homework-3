<?php
$url = "https://api.thecatapi.com/v1/images/search";
$content = file_get_contents("https://api.thecatapi.com/v1/images/search");
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_REFERER, $content);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

$json = curl_exec($ch);

if(!$json) {
    echo "Error with server or incorrect link";
    echo curl_error($ch);
}
curl_close($ch);
$arr = json_decode($json, true);
// print_r( $arr);
// echo $arr[0]['url'];
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Cat image</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,400;0,500;0,531;0,600;0,700;0,800;0,900;1,400;1,500;1,531;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="h-screen bg-white flex items-center justify-center font-sans text-gray-700" style="font-family: 'Jost', sans-serif">
    <div class="font-medium items-center text-center flex flex-col justify-center h-full">
        <h1>Cat image</h1>
        <div class="flex flex-col justify-center items-center">
            <img src="<?php echo $arr[0]['url']; ?>" alt="Cat image">
        </div>
    </div>
</div>
</body>
</html>