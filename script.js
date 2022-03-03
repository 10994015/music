const menu = document.getElementById('menu');
const nav = document.getElementById('nav');
menu.addEventListener("click", ()=>{
    nav.classList.toggle('active');
    console.log(nav.classList[0] == "active");
    menu.src="./images/menu.png";
    if(nav.classList[0] == "active"){
        menu.src = "./images/close.png";
        return;
    }
})