<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=960, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Date Parser</title>
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="Libs/font-awesome/font-awesome.min.css">
</head>
<body>
<ul class="menu clearfix">
    <li class="menu-item menu-item__active" id="btn-today">Сегодняшние события</li>
    <li class="menu-item" id="btn-anotherDay">Выбрать другую дату</li>
    <!--<li class="menu-item" id="btn-submit" style="display: none">Рассылка</li> TODO-->
<!--    <li class="menu-item" id="btn-about">О проекте</li> TODO-->
</ul>
<div class="wrapper wrapper-today" id="page-today">

    <div class="calendar clearfix">
        <div class="calendar-head">Календарь</div>
        <ul class="calendar-daysOfWeek">
            <li class="daysOfWeek-day">пн</li>
            <li class="daysOfWeek-day">вт</li>
            <li class="daysOfWeek-day">ср</li>
            <li class="daysOfWeek-day">чт</li>
            <li class="daysOfWeek-day">пт</li>
            <li class="daysOfWeek-day">сб</li>
            <li class="daysOfWeek-day">вс</li>
        </ul>
        <ul class="calendar-body">
            <li class="calendar-date" data-day="1">1</li>
            <li class="calendar-date" data-day="2">2</li>
            <li class="calendar-date" data-day="3">3</li>
            <li class="calendar-date" data-day="4">4</li>
            <li class="calendar-date" data-day="5">5</li>
            <li class="calendar-date" data-day="6">6</li>
            <li class="calendar-date" data-day="7">7</li>
            <li class="calendar-date" data-day="8">8</li>
            <li class="calendar-date" data-day="9">9</li>
            <li class="calendar-date" data-day="10">10</li>
            <li class="calendar-date" data-day="11">11</li>
            <li class="calendar-date" data-day="12">12</li>
            <li class="calendar-date" data-day="13">13</li>
            <li class="calendar-date" data-day="14">14</li>
            <li class="calendar-date" data-day="15">15</li>
            <li class="calendar-date" data-day="16">16</li>
            <li class="calendar-date" data-day="17">17</li>
            <li class="calendar-date" data-day="18">18</li>
            <li class="calendar-date" data-day="19">19</li>
            <li class="calendar-date" data-day="20">20</li>
            <li class="calendar-date" data-day="21">21</li>
            <li class="calendar-date" data-day="22">22</li>
            <li class="calendar-date" data-day="23">23</li>
            <li class="calendar-date" data-day="24">24</li>
            <li class="calendar-date" data-day="25">25</li>
            <li class="calendar-date" data-day="26">26</li>
            <li class="calendar-date" data-day="27">27</li>
            <li class="calendar-date" data-day="28">28</li>
            <li class="calendar-date" data-day="29">29</li>
            <li class="calendar-date" data-day="30">30</li>
            <li class="calendar-date" data-day="31">31</li>
        </ul>
    </div>
    <div class="events">
        <img src="Img/loader.svg" alt="preloader" class="loader " id="events-loader">
        <div class="events-national events__hidden "></div>
        <div class="events-professional events__hidden"></div>
        <div class="events-international events__hidden"></div>
        <div class="events-history events__hidden"></div>
    </div>
</div>
<div class="wrapper wrapper__anotherDay wrapper__hidden" id="page-anotherDay">

    <form class="dateInput">
        <label for="dateInput-day" class="dateInput-day__label">Введите день: </label>
        <input type="number" class="dateInput-day" id="dateInput-day" name="dateInput-day" value="1"  min="1"
               maxlength="2">
        <label for="dateInput-month" class="dateInput-month__label">Введите месяц: </label>
        <input type="number" class="dateInput-month" id="dateInput-month" name="dateInput-month" value="1"
               min="1" maxlength="2">
    </form>
    <div class="events">
        <img src="Img/loader.svg" alt="preloader" class="loader events__hidden" id="dateInput-loader">
        <div class="events-national events__hidden "></div>
        <div class="events-professional events__hidden"></div>
        <div class="events-international events__hidden"></div>
        <div class="events-history events__hidden"></div>
    </div>
</div>
<!-- <div class="wrapper wrapper__hidden" id="page-submit">3</div> TODO -->
<!--<div class="wrapper wrapper__hidden" id="page-about">
    <h2>Страница о проекте</h2>
</div>TODO-->
<script type="text/javascript" src="Libs/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="Js/scripts.js"></script>
</body>
</html>