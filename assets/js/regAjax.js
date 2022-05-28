
$(document).ready(function() {
$('#btn_reg').on('click', function(e){

var firstNameReg = $('#firstNameReg').val();
var lastNameReg = $('#lastNameReg').val();
var birthdayDateReg = $('#birthdayDateReg').val();
var maleReg = $('#maleReg').val();
var emailReg = $('#emailReg').val();
var phoneNumberReg = $('#phoneNumberReg').val();
var universityReg = $('#universityReg').val();
var passwordReg = $('#passwordReg').val();



$.ajax({
    type: 'POST',
    cache: false,
    url: '../../assets/php/reg.php',
    data: {firstNameReg : firstNameReg, 
        lastNameReg: lastNameReg, 
      birthdayDateReg: birthdayDateReg, 
      maleReg: maleReg, 
      emailReg: emailReg, 
      phoneNumberReg: phoneNumberReg, 
      universityReg: universityReg, 
      passwordReg: passwordReg
    },
    
    success: function(data){ 
      alert(data);
    },

    error: function(req, text, error) {
        alert('Ошибка AJAX: ' + text + ' | ' + error);
    }
    
});
});
});

