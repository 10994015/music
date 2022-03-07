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

const ordersBtn = document.getElementById('ordersBtn');
const orderModule = document.getElementById('orderModule');
const orderClose = document.getElementsByClassName('orderClose');
const orderCloseFn = ()=>{
    orderModule.style.display = "none";
}
ordersBtn.addEventListener('click',()=>{
    orderModule.style.display = "block";
})

for(let i=0;i<orderClose.length;i++){
    orderClose[i].addEventListener('click',orderCloseFn);
}
