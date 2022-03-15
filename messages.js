const post1 = document.getElementById('post1');
const post2 = document.getElementById('post2');
const post3 = document.getElementById('post3');
const post4 = document.getElementById('post4');
const msgbtn1 = document.getElementById('msgbtn1');
const msgbtn2 = document.getElementById('msgbtn2');
const msgbtn3 = document.getElementById('msgbtn3');
const msgbtn4 = document.getElementById('msgbtn4');
post1.style.display = "block";
post2.style.display = "none";
post3.style.display = "none";
post4.style.display = "none";

const clearmsg = ()=>{
    msgbtn1.classList.remove('active');
    msgbtn2.classList.remove('active');
    msgbtn3.classList.remove('active');
    msgbtn4.classList.remove('active');
    post1.style.display = "none";
    post2.style.display = "none";
    post3.style.display = "none";
    post4.style.display = "none";
}
msgbtn1.addEventListener('click',()=>{
    clearmsg();
    post1.style.display = "block";
    msgbtn1.classList.add('active');
})
msgbtn2.addEventListener('click',()=>{
    clearmsg();
    post2.style.display = "block";
    msgbtn2.classList.add('active');
})
msgbtn3.addEventListener('click',()=>{
    clearmsg();
    post3.style.display = "block";
    msgbtn3.classList.add('active');
})
msgbtn4.addEventListener('click',()=>{
    clearmsg();
    post4.style.display = "block";
    msgbtn4.classList.add('active');
})
