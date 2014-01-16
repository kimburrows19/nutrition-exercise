$(document).ready(function(){
  $('#add-newuser').hide();
  $('#btn-adduser').click(function(){
      $('#add-newuser').toggle('slow',function(){});
  });
  $('#form-add-new-user').submit(function(){
    //then we build the data that will be submitted through the form ... I will call these variables X and Y
    var data = $(this).serialize();
    $.ajax({
      url: "manageClients",
      type: "POST",
      data: data,
      cache: false,
      success: function (html) {
        if (html!=='0') {
        //we say thank you because it's polite and the we can append the html... or do whatever we like with the returned html
        alert('Thank you!');
        }
        else {
        alert('An error has occured');
        }
      }
    });
    //this is important if you don't use this the form will be submitted using normal POST:
    return false;
  });

});