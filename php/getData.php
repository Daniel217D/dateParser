<?php
if (!$_POST['data'] == "") {
    $data = json_decode($_POST["data"], true);

//    print_r($data);
    include_once ("../pages/" . $data['date'] . "_" . $data['month'] . ".php");
} else {
    echo "Выйди и зайди нормально";
}



//=============Old code for reforming code=================

/*
 //Удаляем head
$str = preg_replace("'<head>.*?</head>'si", " ", $str);
// Удаляет все элементы до блока с ссобытиями
$str = $str = preg_replace("'<body.*?<h2>Содержание.*?</div>.*?</div>'si", "<body>", $str);
// Удаляет все элементы после блока с ссобытиями
$str = substr($str, 0, 0 - (strlen($str) - strpos($str, "<h2><span class=\"mw-headline\" id=\".D0.A1.D0.BC._.D1.82.D0.B0.D0.BA.D0.B6.D0.B5\">")));
// Делаем нерабочие ссылки на статьи в википедии рабочими
$str = str_replace("href=\"/wiki", "href=\"https://ru.wikipedia.org/wiki", $str);
$str = str_replace("href=\"/w/", "href=\"https://ru.wikipedia.org/w/", $str);
// Удаляем ссылки для правки статей
$str = preg_replace("'<span class=\"mw-editsection\">.*?</span>.*?</span>.*?</span>'si", " ", $str);
// Удаляем  лишние пробелы через <p>
$str = preg_replace("'<p>.*?</p>'si", " ", $str);
// Удаляем [справка]
$str = preg_replace("'<sup.*?>.*?</sup>'si", " ", $str);
// Удаляем блоки "См. также"
$str = preg_replace("'<div class=\"dablink\">.*?</div>'si", " ", $str);
// Удаляем блоки с фотографиями
$str = preg_replace("'<div class=\"thumb tright\">.*?</div>.*?</div>'si", " ", $str);
//Делаем файл в одну строку чтобы можно было искать регуляркой по несколько строк.
$str = str_replace(array("\r", "\n"), "", $str);
 */