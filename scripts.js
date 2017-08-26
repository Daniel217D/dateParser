var date = new Date();
var firstDayMonth = new Date(date.getFullYear(), date.getMonth(), 1).getDay();
firstDayMonth = firstDayMonth === 0 ? 7 : firstDayMonth;
var daysInMonth = 33 - new Date(date.getFullYear(), date.getMonth(), 33).getDate();

var months = [
    'январь',
    'февраль',
    'иарт',
    'апрель',
    'май',
    'июнь',
    'июль',
    'август',
    'сентябрь',
    'ноябрь',
    'декабрь',
];

var data = JSON.stringify({
    // "date": date.getDate(),
    "date": 30,
    "month": (date.getMonth()) + 1
});
$.ajax({
    url: "http://dateparser.ru/getData.php",
    /*url: "http://lucky-gadget.ru/dateParser/",*/
    type: 'POST',
    data: 'data=' + data,
    success: function (res) {
        var res = JSON.parse(res);

        if (res['strNational'] !== "") $('.events-national').html(" <h2>Национальные праздники</h2>"+res['strNational']);

        if (res['strProfessional'] !== "") $('.events-professional').html("<h2>Профессиональные праздники</h2>" + res['strProfessional']);

        if (res['strInternational'] !== "") $('.events-international').html("<h2>Профессиональные праздники</h2>" + res['strInternational']);

        $('.events-history h2').after(res['strEvents']);
    }
});
$('.calendar-head').html("Каледарь " + months[date.getMonth() - 1] + " " + date.getFullYear());

$('.calendar-date:first-child').css("margin-left", 5 + (45 * (firstDayMonth - 1)) + "px");

if (daysInMonth < 31) {
    for (var i = daysInMonth + 1; i <= 32; i++) {
        $(".calendar-date:nth-child(" + i + ")").css("display", "none");
    }
}

$(".calendar-date:nth-child(" + date.getDate() + ")").addClass("calendar-date__today");