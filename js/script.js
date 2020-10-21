let hidden = true
$("#showMore").click(function(){
  if(hidden==true){
    $("#hiddenCards").slideDown("normal");
    $("#hiddenCards").css("display", "flex");
    $(this).text("Показать меньше");
    hidden = false;
  }else{
    $("#hiddenCards").slideUp("normal");
    $(this).text("Посмотреть ещё");
    hidden = true;
    $('html, body').animate({scrollTop: $(".works-cards").offset().top}, 400);
  }
});

$('#form').validate({
  rules: {
    name: {
      required: true,
      minlength: 2
    },
    email: {
      required: true,
      email: true
    },
    message: {
      required: true
    }
  },
  messages: {
    name: {
      required: "Укажите ваше имя",
      minlength: "Имя должно быть не короче 2-х символов"
    },
    email: {
      required: "Укажите ваш e-mail",
      email: "Укажите корректный e-mail"
    },
    message: "Введите ваше сообщение"
  }
});
$('#works').click(function(){
  $('html, body').animate({scrollTop: $("#worksBlock").offset().top}, 500);
  $("#worksBlock").addClass("androidFix").scrollTop(0).removeClass("androidFix");
});
$('#order').click(function(){
  $('html, body').animate({scrollTop: $("#contactsBlock").offset().top}, 500);
  $("#contactsBlock").addClass("androidFix").scrollTop(0).removeClass("androidFix");      
  $("#nameInput").focus();
});
$(".works-card").hover(function(){
  $(this).children(".works-card-info").toggleClass("hidden");
  $(this).children(".works-card-info").toggleClass("visible");
});