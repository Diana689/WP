const form = document.querySelector('.js-form');
const formInputs = document.querySelectorAll('.js-input');
const inputEmail = document.querySelector('.js-input-email');
const iconEmail = document.querySelector('.js-email_icon');
const inputNumber = document.querySelector('.js-input-number');
const iconPhone = document.querySelector('.js-icon_phone');

function validateEmail(email){
  let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toUpperCase());
}

function validateNumber(number){
  let re = /^[0-9\s]*$/;
  return re.test(String(number));
}

form.onsubmit = function (){
  let emailVal = inputEmail.value;
  let numberVal = inputNumber.value;
  let emptyInputs = Array.from(formInputs).filter(input => input.value === '');

  formInputs.forEach(function(input){
    if (input.value === ''){
      input.classList.add('error');
    } else{
      input.classList.remove('error');
    }
  });

  if (emptyInputs.length !== 0){
    return false;
  }

  if(!validateEmail(emailVal)){
    inputEmail.classList.add('error');
    iconEmail.classList.add('error');
    return false;
  } else{
    inputEmail.classList.remove('error');
    iconEmail.classList.remove('error');
  }

  if(!validateNumber(numberVal)){
    inputNumber.classList.add('error');
    iconPhone.classList.add('error');
    return false;
  } else{
    inputNumber.classList.remove('error');
    iconPhone.classList.remove('error');
  }
}

