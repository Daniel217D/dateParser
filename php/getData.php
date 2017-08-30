<?php
if (!$_POST['data'] == "") {
    $data = json_decode($_POST["data"], true);

    $str = file_get_contents("../pages/" . $data['date'] . "_" . $data['month'] . ".php", true);
    preg_match("'<h3>.*?Национальные.*?</h3>.*?</ul>'", $str, $strNational);
    preg_match_all("'<ul>.*?</ul>'", $strNational[0], $strNational);
    $strNational = $strNational[0][count($strNational[0]) - 1]; //BUGFIX

    preg_match("'<h3>.*?Профессиональные.*?</h3>.*?</ul>'", $str, $strProfessional);
    preg_match_all("'<ul>.*?</ul>'", $strProfessional[0], $strProfessional);
    $strProfessional = preg_replace("'<>'", "<>", $strProfessional[0][count($strProfessional[0]) - 1]); //BUGFIX

    preg_match("'<h3>.*?Международные.*?</h3>.*?</ul>'", $str, $strInternational);
    preg_match_all("'<ul>.*?</ul>'", $strInternational[0], $strInternational);
    $strInternational = preg_replace("'<>'", "<>", $strInternational[0][count($strInternational[0]) - 1]); //BUGFIX

    $str = strip_tags($str,'<h1><h2><h3><h4><h5><h6><ul><li><a><img>');
    preg_match("'</ul><h2>.*?События.*?</h2>.*?<h2>'", $str, $strEvents);
    $strEvents = $strEvents[0]; //BUGFIX
    $strEvents = preg_replace("'<h2>.*?</h2>'", "", $strEvents); // Full deleting h2 tags

    $returnArray = array(
        "strNational" => $strNational,
        "strProfessional" => $strProfessional,
        "strInternational" => $strInternational,
        "strEvents" => $strEvents
    );
    echo json_encode($returnArray);
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