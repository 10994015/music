const middlelist = document.getElementsByClassName('middlelist');
const middleusername = document.getElementsByClassName('middleusername');
function openminul(){
    let minul = this.parentElement.querySelector('.min');
   if(minul !== null){
        if(minul.style.display == "block"){
            minul.style.display = "none";
        }else{
            minul.style.display = "block";
        }
   }
}
for(let i=0;i<middlelist.length;i++){
    let ul = middlelist[i].getElementsByTagName("ul");
    if(ul.length>0){
        // console.log(middlelist[i],"有ul");
        middlelist[i].getElementsByTagName("i")[0].style.display = "block";
    }
    middlelist[i].querySelector('.middleusername').addEventListener('click',openminul);
}

