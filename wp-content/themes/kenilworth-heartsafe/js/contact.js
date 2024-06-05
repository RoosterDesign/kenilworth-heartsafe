
//= Show "other" input field

function showOtherInput(el) {
  el.querySelector('input').setAttribute("required", "");
  el.classList.add('js-form-other--visible');
}


//= Hide "other" input field

function hideOtherInput(el) {
  el.classList.remove('js-form-other--visible');
  el.querySelector('input').value = "";
  el.querySelector('input').removeAttribute("required", "");
}


//= Show/hide other input depeding on subject select option

function otherSubjectInput() {
  let subjetSelect = document.querySelector('.js-form-subject select');
  let otherInput = document.querySelector('.js-form-other');
  subjetSelect.addEventListener('change', function(e) {
    if(this.value === 'select_or_other') {
      showOtherInput(otherInput);
    } else {
      hideOtherInput(otherInput);
    }
  });
}


//= On Document Load

document.addEventListener("DOMContentLoaded", function() {

  if (document.querySelector('.wpforms-form')) {
    otherSubjectInput();
  };

});