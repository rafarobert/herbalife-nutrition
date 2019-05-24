var oTwilio = {
  send: function(obj) {
    var cellphone = $(obj).closest('div').find('input').val();
    $.post('/twilio/send',{number:cellphone},function(response){
      if (response.error != undefined){
        if (response.error == 'ok'){
          console.log(response.data)
        }
      } else{
        location.reload();
      }
    });
  }
}
