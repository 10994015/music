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

const orderCloseFn = ()=>{
    orderModule.style.display = "none";
    taskModule.style.display = "none";
    urlModule.style.display = "none";
    otherModule.style.display = "none";
    alreadyModule.style.display = "none";
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
    orderModule.style.display = "block";
}
ordersBtn.addEventListener('click',()=>{
    taskModule.style.display = "block";
})
taskBtn.addEventListener('click',taskBtnfn);
taskBtn.removeEventListener('click',taskBtnfn);
orderBtn.addEventListener('click',()=>{
    orderModule.style.display = "none";
    urlModule.style.display = "block";
})
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
})



