$(document).ready(function(){
  $("form[name='registration']").validate({
      rules: {
        name: "required",
        email: {
          required: true,
          // Specify that email should be validated by the built-in "email" rule
          email: true
        },
        password: { 
          required: true,
          minlength: 4,
          maxlength: 8,
          digits: true
        },
        conf_password: {
          required: true,
          equalTo: "#form3Example4c"
        },
        phone:{
          required:true,
          minlength: 10,
          digits: true
        },
        nationality: "required",
        city: "required",
        state: "required",
        address: "required",
        pin: { 
          required: true,
          minlength: 4,
          digits: true
        },
      },
      // Specify validation error messages
      messages: {
        name: "*Please enter your name",
        email: "*Please enter a valid email address",
        password:  "*enter valid password",
        conf_password: "*re-enter the password",
        phone: "*enter the phone number",
        nationality: "*enter Your country",
        state: "*enter your state",
        address: "*enter your address",
        city: "*enter your city",
        pin:" *enter your postal pincode"
      }


  });


    $('#form2Example3c').click(function() {
      if ($('#btn').is(':disabled')) {
          $('#btn').removeAttr('disabled');
      } else {
          $('#btn').attr('disabled', 'disabled');
      }
  });

  $("#btn").hover(function(){
      $(this).css("background-color", "turquoise");
  },function(){
    $(this).css("background-color","#0275d8");
  });
  
  $("form[name='changepassword']").validate({
  rules:{
    new_password: { 
      required: true,
      minlength: 4,
      maxlength: 8,
      digits: true
    },
    conf_password: {
      required: true,
      equalTo: "#pass1"
    }
  },
  messages: {
    new_password:  "*enter valid password",
    conf_password: "*re-enter the password",
     
  }

  });

$("form[name='forgotpass']").validate({
    rules: {
      email: {
        required: true,
        // Specify that email should be validated by the built-in "email" rule
        email: true
      },
      new_password: { 
        required: true,
        minlength: 4,
        maxlength: 8,
        digits: true
      },
      conf_password: {
        required: true,
        equalTo: "#pass1"
      },
    },
    // Specify validation error messages
    messages: {     
      new_password:  "*enter valid password",
      conf_password: "*re-enter the password",
      email:"*enter valid email"
    }
});

});
 