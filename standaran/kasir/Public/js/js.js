const btn_modal = document.getElementById("btn-modal");
const modal = document.getElementById("modal");
const close_modal=document.getElementById("batal");
const btn_flash=document.getElementById('btn-fls');
const flash=document.getElementById('flash');
btn_modal.addEventListener("click",function() {
    modal.style.display="block"
})
close_modal.addEventListener("click",function() {
    modal.style.display="none"
})
btn_flash.addEventListener('click',function(){
    flash.style.display="none";
})