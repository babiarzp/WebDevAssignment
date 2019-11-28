function formSubmit(){
  var formResult = '';
  var errors = '';

  var name = document.getElementById('name').value;
  var email = document.getElementById('email').value;
  var phone = document.getElementById('phone').value;
  var address = document.getElementById('address').value;
  var city = document.getElementById('city').value;
  var postalcode = document.getElementById('postalcode').value;
  var durAA = document.getElementById('durAA').value;
  var durAAA = document.getElementById('durAAA').value;
  var enerAA = document.getElementById('enerAA').value;
  var durAACost = document.getElementById('durAACost');
  var durAAACost = document.getElementById('durAAACost');
  var enerAACost = document.getElementById('enerAACost');
  var tax = document.getElementById('tax');
  var shippingCost = document.getElementById('shippingCost');
  var totalCost = document.getElementById('totalCost');
  var subTotal = document.getElementById('subTotal');
  var password = document.getElementById('password').value;

  durAA = parseInt(durAA);
  durAAA = parseInt(durAAA);
  enerAA = parseInt(enerAA);

  //Error Checking
  if(!name){
    errors += 'Please enter your name <br/>';
  }

  if(!email){
    errors += 'Please enter your email <br/>';
  }

  if(!address){
    errors += 'Please enter your address <br/>';
  }

  if(!password){
    errors += 'You need to enter a password! </br>';
  }

  var phoneFormat = /^\(?(\d{3})\)?[\.\-\/\s]?(\d{3})[\.\-\/\s]?(\d{4})$/;

  if(!phoneFormat.test(phone)){
    errors += 'Please enter Phone Number in correct format <br/>';
  }

  if(!city){
    errors += 'Please enter your city <br/>';
  }

  var postFormat = /^[A-Z][0-9][A-Z]\s[0-9][A-Z][0-9]$/;

  postalcode = postalcode.toUpperCase();

  if(!postFormat.test(postalcode)){
      errors += 'Please enter postal code in correct format <br/>';
  }

  if(!durAA){
    durAA = 0;
  }
  if(!durAAA){
    durAAA = 0;
  }
  if(!enerAA){
    enerAA =0;
  }

  if((durAA==0) && (durAAA==0) && (enerAA==0)){
    errors += 'Please select an item to purchase <br/>';
  }

  if(province.value == ""){
    errors += 'Please select your province <br/>';
  }

  if(shipping.value == ""){
    errors += 'Please select your shipping method <br/>';
  }

  if(errors.trim() != ''){
      document.getElementById('errors').innerHTML = errors + '***Fix Above Errors To continue***';
      document.getElementById('errors').style.border = '2px dashed white';
  }
  else{

    document.getElementById('errors').innerHTML = '';
    document.getElementById('errors').style.border = '0px dashed white';

  }


  if(errors != ''){

      return false;

  }
  else{
      
      return true;
  }

}
