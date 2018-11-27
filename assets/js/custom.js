jQuery(document).ready(function(){

// валидатор формы
$('#order_form').validate({ 
        rules: {
            name: {
                required: true,
                minlength: 4,
                maxlength: 18
            },
            email: {
                required: true,
                email: email,
                maxlength: 25,
                minlength: 5 
            }
        }
    });

// модальное окно
$('.order').on('click', function(){
	$('#myModal').modal('show');
	bookName = $(this).parent().parent().find('td:eq(0)').text();
	authorName = $(this).parent().parent().find('td:eq(2)').text();

});

// постраничная навигация
$(".pagination li > a").on("click", function(e){
	e.preventDefault();
	var start = $(this).data('start');
	var url = $(this).data('target');

	$.ajax({
		url: url,
		type: "POST",
		data: {start: start},
		success: function(res){
			var all = $('<div></div>').html(res);
			var chunk = all.find('.res').parent().html();
			$('.panel-body').html(chunk);
		}


	})
});

// переменные для отправки формы аяксом
var bookName;
var authorName;
	// настройки для получения даты
	var options = {  weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false };
// отправляем форму
$("#order_form").on('submit', function(e){
	e.preventDefault();
	var userName = $('#name').val();
	var userEmail = $('#email').val();
	var currentDate = new Date($.now());
	var orderTime = new Date().toLocaleTimeString('en-us', options);
	// var orderTime = currentDate.getDay() + ' ' + currentDate.getHours() + ':' + 
	// currentDate.getMinutes() + ':' + currentDate.getSeconds();
	$.ajax({
  url: "mail.php",
  type: "POST",
  data: {	userName: userName,
			userEmail: userEmail,
			authorName: authorName,
			bookName: bookName,
			orderTime: orderTime
    },
  success: function(res){
  	console.log(res);
  }
});
});	
}) // end of code