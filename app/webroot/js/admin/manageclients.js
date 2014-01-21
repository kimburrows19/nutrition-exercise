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
        str+="<tr><td>"+ val['users']['first_name']+"</td>"+
                  "<td>"+val['users']['last_name']+"</td>"+
                  "<td>"+val['users']['phone_primary']+"</td>"+
                  "<td>"+val['users']['email_address']+"</td>"+
                  "</tr>";
      });
  str+="</tbody>"+
      "</table>";
      alert(str);
      return str;


}

