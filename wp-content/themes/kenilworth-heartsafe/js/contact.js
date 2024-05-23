// // Passive event listeners
// jQuery.event.special.touchstart = {
//   setup: function( _, ns, handle ) {
//       this.addEventListener("touchstart", handle, { passive: !ns.includes("noPreventDefault") });
//   }
// };
// jQuery.event.special.touchmove = {
//   setup: function( _, ns, handle ) {
//       this.addEventListener("touchmove", handle, { passive: !ns.includes("noPreventDefault") });
//   }
// };


// //== Custom Select Arrow
// function formSelectArrow() {
//   let select = document.querySelector('.wpforms-field-select');

//   function openSelect() {
//     select.classList.toggle('wpforms-field-select--open');
//   }

//   function closeSelect() {
//     select.classList.remove('wpforms-field-select--open');
//   }

//   select.addEventListener('click', function(e) {
//     e.stopPropagation();
//     openSelect();
//   });

//   document.body.addEventListener('click', function() {
//     closeSelect();
//   })

// };


// //== On Document Load

// document.addEventListener("DOMContentLoaded", function() {
//   formSelectArrow();
// });