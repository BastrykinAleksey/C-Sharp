function initMap() {
  console.log('initMap');
  var cntr;
  if(window.innerWidth < 700)
       cntr = {lat: 59.990759, lng: 30.241427};
  else cntr = {lat:59.991354, lng:30.234946};
  var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: cntr 
  });
  var marker = new google.maps.Marker({
          position: {lat: 59.990759, lng: 30.241427},
          map: map
  });
}

$(document).ready(function(){
  $('.navbar-nav a').on('click', function(){
    var id = $(this).attr('href');
    $('html, body').animate({
       scrollTop: $(id).offset().top-50
    }, 500);
    $('.navbar-collapse').collapse('hide');
  });
  $(".owl-carousel").owlCarousel({items:1,dots:true,nav:true,loop:true});
  $.validate();
  $('#m-login').on('show.bs.modal', function(e){
    var tp = $(e.relatedTarget).data('tp') || '';
    //console.log(e);
    if(tp == 'login') {
      $('#m-login-tab a:last').tab('show');
    } else {
      $('#m-login-tab a:first').tab('show');
    }
  });

  $('#form-pre').on('submit', function(){
    $.ajax({
      type:'post',
      dataType:'json',
      url:'reqpre.php',
      data:$(this).serialize()
    }).done(function(data){
      if(typeof data.ok != 'undefined') {
        $('#m-demo-msg').html('<div class="green-block">Мы отправили вам презентацию</div>');
        $('#m-demo-email').val($('#pre-email').val());
        $('#m-demo-fio').val($('#pre-fio').val());
        $('#m-demo').modal();
      } else {
        var err = typeof data.error != 'undefined' ? data.error : 'Ошибка сервера, попробуйте позже';
        alert(err);
      }
    }).fail(function(){
      alert('Ошибка при отправке запроса. Попробуйте позже');
    });
    return false;
  });
  $('#form-req-demo').on('submit', function(){
    $('#m-login-msg').html('<div class="form-sending">Отправка формы...</div>');
    $.ajax({
      type:'post',
      dataType:'json',
      url:'reqdemo.php',
      data:$(this).serialize()
    }).done(function(data){
      if(typeof data.ok != 'undefined') {
        $('#m-login-msg').html('<div class="green-block">Спасибо, мы свяжемся с вами в ближайшее время</div>');
      } else {
        $('#m-login-msg').html('Ошибка при отправке');
        var err = typeof data.error != 'undefined' ? data.error : 'Ошибка сервера, попробуйте позже';
        alert(err);
      }
    }).fail(function(){
      $('#m-login-msg').html('Ошибка при отправке');
      alert('Ошибка при отправке запроса. Попробуйте позже');
    });
    return false;
  });
  $('#form-demo').on('submit', function(){
    $('#m-demo-msg').html('<div class="form-sending">Отправка формы...</div>');
    $.ajax({
      type:'post',
      dataType:'json',
      url:'reqdemonstration.php',
      data:$(this).serialize()
    }).done(function(data){
      if(typeof data.ok != 'undefined') {
        $('#m-demo-msg').html('<div class="green-block">Спасибо, мы свяжемся с вами в ближайшее время</div>');
      } else {
        $('#m-demo-msg').html('Ошибка при отправке');
        var err = typeof data.error != 'undefined' ? data.error : 'Ошибка сервера, попробуйте позже';
        alert('<div class="error">'+err+'</div>');
      }
    }).fail(function(){
      $('#m-demo-msg').html('<div class="error">Ошибка при отправке</div>');
      alert('Ошибка при отправке запроса. Попробуйте позже');
    });
    return false;
  });
});