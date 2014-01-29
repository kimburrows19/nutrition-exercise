$(document).ready(function(){ 
  $('.btn-expand-collapse').next('.panel-body').hide();
  $('.btn-expand-collapse').click(function(){
      $(this).next('.panel-body').toggle('slow',function(){});
  });

  $('#form-add-new-user').submit(function(){
    //then we build the data that will be submitted through the form ... I will call these variables X and Y
    var data = $(this).serialize();
    $.ajax({
      url: "manageClients",
      type: "POST",
      dataType:'json',
      data: data,
      cache: false,
      success: function (jsondata) {
        if (jsondata!=='0') {
          $('#tbl_clients').html(getClientListHTML(jsondata['client_list']));
        }
        else {
          alert('An error has occured');
        }
      }
    });
    //this is important if you don't use this the form will be submitted using normal POST:
    return false;
  });
  $('#form-update-user').submit(function(){
    
    var url="../manageClients";
    var data = $(this).serialize();
    $.ajax({
        url: url,
        type:"POST",
        dataType:"json",
        data:data,
        cache:false,
        success:function(jsondata){
          if(jsondata!=='0'){
            alert(jsondata);
          }
          else{alert('An error has occured');}
        }

    });
    return false;
  });
  $('.btn-edit-user').click(function(){
      var id = $(this).val();
      window.location.href="updateUserView/?id="+id; //cakephp already know what controller we are in so only need to specify action
  });
  $('#form-program-calc').submit(function(){
      var url="../manageClients";
      var data=$(this).serialize();
      $.ajax({
        url:url,
        type:"POST",
        dataType:"json",
        data:data,
        cache:false,
        success:function(jsondata){
            if(jsondata!=='0'){

            }
            else{alert('An error occured, unable to calculate goals.');}
        }
      });
      return false;
  });

});

function getClientListHTML(data){
var str = "<table>"+
        "<tbody>"+
          "<tr><td>First</td>"+
              "<td>Last</td>"+
              "<td>Phone</td>"+
              "<td>Email</td>"+
          "</tr>"+
        "</tbody>"+
        "<tbody id='list_clients'>";
      $.each(data,function(index,val){
        str+="<tr><td>"+ val['User']['first_name']+"</td>"+
                  "<td>"+val['User']['last_name']+"</td>"+
                  "<td>"+val['User']['phone_primary']+"</td>"+
                  "<td>"+val['User']['email_address']+"</td>"+
                  "</tr>";
      });
  str+="</tbody>"+
      "</table>";
      alert(str);
      return str;


}

