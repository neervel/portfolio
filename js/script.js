// let hidden = true
// $("#showMore").click(function(){
//   if(hidden==true){
//     $("#hiddenCards").slideDown("normal");
//     $(this).text("Спрятать");
//     hidden = false;
//   }else{
//     $("#hiddenCards").slideUp("normal");
//     hidden = true;
//     $('html, body').animate({scrollTop: $(".works-cards").offset().top}, 400);
//   }
// });

const moreBtn = $("#showMore"),
      hiddenCards = $("#hiddenCards")
moreBtn.on('click', function() {
  if ( $(this).hasClass('is-active') ) {
      $(this).removeClass('is-active');
      hiddenCards.slideUp(300);
      $('html, body').animate({scrollTop: $(".works-cards").offset().top}, 400);
      $(this).text("Показать еще");
  } else {
      $(this).addClass('is-active');
      hiddenCards.slideDown(400);
      $(this).text("Спрятать");
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
$('#order').click(function(){
  $('html, body').animate({scrollTop: $("#contactsBlock").offset().top}, 500);	  
  $("#contactsBlock").addClass("androidFix").scrollTop(0).removeClass("androidFix"); 
  $("#nameInput").focus();
});
$(".works-card").hover(function(){
  $(this).children(".works-card-info").toggleClass("hidden");
  $(this).children(".works-card-info").toggleClass("visible");
});