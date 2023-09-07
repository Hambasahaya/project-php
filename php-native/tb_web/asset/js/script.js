// modal
const btn_modal = document.getElementById("btn-modal");
const modal = document.getElementById("modal");
const close_modal = document.getElementById("batal");

btn_modal.addEventListener("click", function() {
  modal.style.display = "block"
})
close_modal.addEventListener("click", function() {
  modal.style.display = "none"
})
// end modal

const flash = document.getElementById('flash');
const btn_flash = document.getElementById("close-flash");
btn_flash.addEventListener("click",function(){
    flash.style.display ="none"
})

const pw = document.getElementById('pw');
function show() {
  if (pw.type === "password") {
      pw.type = "text";
  } else {
      pw.type = "password";
  }

}