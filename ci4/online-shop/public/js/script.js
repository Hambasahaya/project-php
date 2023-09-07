const navbar = document.querySelector('.navbar');  
const navLink = navbar.querySelector('#nav-link'); 
const NavBtn = navbar.querySelector('#toggle');
const serachbar=document.querySelector('.search-form');
let chekclik=0;
const btnserch=document.getElementById('search');
NavBtn.addEventListener('click', () => {
chekclik++;
    if (chekclik%2!=0) {
        navbar.style.marginBottom="100px";
    navLink.style.display = "flex";
    navLink.classList.add("responsive-nav");
    }else{
        navLink.classList.remove('responsive-nav');
        navLink.style.display="none";
        navbar.style.marginBottom="0";
        chekclik=0;
    }
});
// btn serach
btnserch.addEventListener('click',()=>{
    chekclik++;
    if (chekclik%2!=0) {
        serachbar.style.display="flex";
    }
    else{
        serachbar.style.display="none";
    chekclik=0;
    }
})
