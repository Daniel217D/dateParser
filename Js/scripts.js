//=======================Variables=======================\\
var date = new Date();
var firstDayMonth = new Date(date.getFullYear(), date.getMonth(), 1).getDay();
firstDayMonth = firstDayMonth === 0 ? 7 : firstDayMonth; //Change Sunday from 0 to 7
var daysInMonth = 33 - new Date(date.getFullYear(), date.getMonth(), 33).getDate();//Learning how many days is in month

var months = [
    'Январь',
    'Февраль',
    'Март',
    'Апрель',
    'Май',
    'Июнь',
    'Июль',
    'Август',
    'Сентябрь',
    'Ноябрь',
    'Декабрь'
];
var data = 'data='+JSON.stringify({
    "date": date.getDate(),
    "month": (date.getMonth()) + 1
});
//=======================Text Today=======================\\
takeText(data,"#page-today");

$('body').on('click', '.textToggle', function () { //Code for opening-closing text on all pages
    $(this).toggleClass('textToggle__underline');
    $(this).children().toggleClass('fa-rotate-180');
    $(this).next().slideToggle();
});
//=======================Calendar=======================\\
$('.calendar-head').html("<span class='calendar-month'>" + months[date.getMonth() - 1] + "</span><span class='calendar-year'>" + date.getFullYear() + "</span>");

$('.calendar-date:first-child').css("margin-left", 5 + (45 * (firstDayMonth - 1)) + "px");//Calculation of offset the first day in the calendar

if (daysInMonth < 31) {//Hiding excess days in the calendar
    for (var i = daysInMonth + 1; i <= 32; i++) {
        $(".calendar-date:nth-child(" + i + ")").css("display", "none");
    }
}

$(".calendar-date:nth-child(" + date.getDate() + ")").addClass("calendar-date__today");//Mark up today in the caledar
//=======================Pages=======================\\
$('.menu-item').click(function () {
    $(".menu-item").removeClass("menu-item__active");
    $(this).addClass("menu-item__active");

    $(".wrapper").addClass('wrapper__hidden');
    switch ($(this).attr("id")) {
        case "btn-today":
            $("#page-today").removeClass('wrapper__hidden');
            break;
        case "btn-anotherDay":
            $("#page-anotherDay").removeClass('wrapper__hidden');
            break;
        // case "btn-submit": TODO
        //     $("#page-submit").removeClass('wrapper__hidden');
        //     break;
        case "btn-about":
            $("#page-about").removeClass('wrapper__hidden');
            break;
        default:
            alert('Ой, чтото пошло не так. Страница будет перезагружена.');
            location.reload();
    }
});

//=======================Page Another day=======================\\
$(".dateInput input").on('input', function () {
    $('#dateInput-loader').removeClass('events__hidden'); //Do loader visible
    $('#page-anotherDay .events div').addClass('events__hidden'); //Hide text

    var inputMonth = parseInt($('#dateInput-month').val());
    var inputDay = $('#dateInput-day').val();
    var daysInMonth = 33 - new Date(2012, inputMonth, 33).getDate();//Learning how many days is in month
    if (inputMonth > 0 && inputMonth < 13) {// Watching in errors in month
        if (inputDay > 0 && inputDay < daysInMonth) {//And in days
            var data = 'data='+JSON.stringify({
                "date": inputDay,
                "month": inputMonth
            });
            takeText(data,"#page-anotherDay");
        } else {
            if (inputDay < 1) $('#dateInput-day').val("1");
            else $('#dateInput-day').val(daysInMonth);
        }
    } else {
        if (inputMonth < 1) $('.dateInput #dateInput-month').val("1");
        else $('#dateInput-month').val("12")
    }
});

//=======================Functions======================\\

function takeText(data, selector) { //data: JSON string with day and month, selector: id of page, where is div for text
    $.ajax({
        url: "http://dateparser.ru/php/getData.php",
        //url: "http://daniil217.site/dateParser/php/getData.php",
        type: 'POST',
        data: data,
        success: function (res) {
            res = JSON.parse(res);

            //==TODO arrow inactive
            if (res['strNational'] !="" && res['strNational'] != null) $(selector + ' .events-national').html(" <h2 class='textToggle '>Национальные праздники <i class=\"fa fa-caret-square-o-down\" aria-hidden=\"true\"></i></h2>" + res['strNational']);
            else $(selector + ' .events-national').html("");

            if (res['strProfessional'] != "" && res['strProfessional'] != null) $(selector + ' .events-professional').html("<h2 class='textToggle '>Профессиональные праздники <i class=\"fa fa-caret-square-o-down\" aria-hidden=\"true\"></i></h2>" + res['strProfessional']);
            else $(selector + ' .events-professional').html("");

            if (res['strInternational'] != "" && res['strInternational'] != null) $(selector + ' .events-international').html("<h2 class='textToggle '>Профессиональные праздники <i class=\"fa fa-caret-square-o-down\" aria-hidden=\"true\"></i></h2> " + res['strInternational']);
            else $(selector + ' .events-international').html("");

            $(selector + ' .events-history').html("<h2 class='textToggle'>Исторические события <i class=\"fa fa-caret-square-o-down\" aria-hidden=\"true\"></i></h2><div class='events-history-text'>" + res['strEvents'] + "</div>");

            $(selector + ' .textToggle').next().slideUp(1);//Hide text

            $(selector + ' .events').contents().toggleClass('events__hidden')//Hide loader and do visible text
        }
    });
}
