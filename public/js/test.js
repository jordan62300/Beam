var imagess = document.getElementsByClassName('programme-manga-item');

console.log(imagess)
for (var i = 0 ; i < imagess.length; i++) {
    imagess[i].addEventListener('click' , () => {
        alert("hhhhhhh");
    }) ; 
 }


imagess.addEventListener('click', () => {
    alert("hhhhhhh");
})

