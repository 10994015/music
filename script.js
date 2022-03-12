const menu = document.getElementById('menu');
const nav = document.getElementById('nav');

menu.addEventListener("click", ()=>{
    nav.classList.toggle('active');
    menu.src="./images/menu.png";
    if(nav.classList[0] == "active"){
        menu.src = "./images/close.png";
        return;
    }
})


const imgArr = [
    {src:"./images/card/001.png"},
    {src:"./images/card/002.png"},
    {src:"./images/card/003.png"},
    {src:"./images/card/004.png"},
    {src:"./images/card/005.png"},
    {src:"./images/card/006.png"},
    {src:"./images/card/007.png"},
    {src:"./images/card/008.png"},
];
let randomNum = Math.floor(Math.random()*8);
const ordersBtn = document.getElementById('ordersBtn');
const orderModule = document.getElementById('orderModule');
const orderClose = document.getElementsByClassName('orderClose');
const taskModule = document.getElementById('taskModule');
const urlModule = document.getElementById('urlModule');
const otherModule = document.getElementById('otherModule');
const otherBtn = document.getElementById('otherBtn');
const otherClassBtn = document.getElementsByClassName('otherClassBtn');
const task = document.getElementsByClassName('task');
const taskBtn = document.getElementById('taskBtn');
const orderBtn = document.getElementById('orderBtn');
const alreadyModule = document.getElementById('alreadyModule');
const cardModule = document.getElementById('cardModule');
const cardBtn = document.getElementById('cardBtn');
const taskchkbox = document.getElementById('taskchkbox');
const card = document.getElementById('card');
const alreadyBtn = document.getElementById('alreadyBtn');
const cardContent = document.getElementById('cardContent');
const storeModule = document.getElementById('storeModule');
const storeBtn = document.getElementById('storeBtn');
const moneyyyyy = document.getElementById('moneyyyyy');
let storemoney = moneyyyyy.innerText;

cardContent.src = imgArr[randomNum].src;
const orderCloseFn = ()=>{
    orderModule.style.display = "none";
    taskModule.style.display = "none";
    urlModule.style.display = "none";
    otherModule.style.display = "none";
    alreadyModule.style.display = "none";
    cardModule.style.display = "none";
    storeModule.style.display = "none";
    // clearBorder();
    // taskBtn.classList.add('disable');
    taskBtn.removeEventListener('click',taskBtnfn);
}
const clearBorder = ()=>{
    for(let t=0;t<task.length;t++){
        task[t].style.border = "none";
    }
}
const handtaskFn = (e)=>{
    clearBorder();
    taskBtn.addEventListener('click',taskBtnfn);
    taskBtn.classList.remove('disable');
    e.target.style.border = "2px #000 solid";
}
const taskBtnfn = ()=>{
    taskModule.style.display = "none";
    cardModule.style.display = "block";
    taskchkbox.checked = true;
}
ordersBtn.addEventListener('click',()=>{
    if(taskchkbox.checked){
        cardModule.style.display = "block";
        return;
    }
    if(storemoney <= 0){
        storeModule.style.display = "block";
        return;
    }
    taskModule.style.display = "block";
});
taskBtn.addEventListener('click',taskBtnfn);
taskBtn.removeEventListener('click',taskBtnfn);
orderBtn.addEventListener('click',()=>{
    orderModule.style.display = "none";
    urlModule.style.display = "block";
});
for(let t=0;t<task.length;t++){
    task[t].addEventListener('click',handtaskFn);
}
for(let i=0;i<orderClose.length;i++){
    orderClose[i].addEventListener('click',orderCloseFn);
}

const handotherFn = ()=>{
    if(taskBtn.classList[0] == "disable"){
        otherModule.style.display = "block";
        return;
    }
    alreadyModule.style.display = "block";
}
for(let h=0;h<otherClassBtn.length;h++){
    otherClassBtn[h].addEventListener('click',handotherFn);
}
otherBtn.addEventListener("click",()=>{
    otherModule.style.display = "none";
});
cardBtn.addEventListener('click',()=>{
    cardModule.style.display = "none";
    orderModule.style.display = "block";
});
alreadyBtn.addEventListener('click',()=>{
    alreadyModule.style.display = "none";
});



storeBtn.addEventListener('click',()=>{
    storeModule.style.display = "none";
})