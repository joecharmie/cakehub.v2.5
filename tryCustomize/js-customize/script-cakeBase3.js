let img = document.querySelector("#displayImg");
let btn1 = document.querySelector("#btn1");
let btn2 = document.querySelector("#btn2");
let btn3 = document.querySelector("#btn3");
let btnR = document.querySelector("#btnR");
let btnS = document.querySelector("#btnS");
let imgpath = document.querySelector("#imgpath");

btn1.addEventListener('click', () => {
  img.src = './imgcDisplay/12.png';
  btnR.style.visibility = "visible";
  btnS.style.visibility = "visible";
  btnS.value = "B1";
  imgpath.value = './imgcDisplay/12.png';
})

btn2.addEventListener('click', () => {
  img.src = './imgcDisplay/13.png';
  btnR.style.visibility = "visible";
  btnS.style.visibility = "visible";
  btnS.value = "B2";
  imgpath.value = './imgcDisplay/13.png';
})

btn3.addEventListener('click', () => {
  img.src = './imgcDisplay/14.png';
  btnR.style.visibility = "visible";
  btnS.style.visibility = "visible";
  btnS.value = "B3";
  imgpath.value = './imgcDisplay/14.png';
})

btnR.addEventListener('click', () => {
  img.src = './imgcDisplay/11.png'; 
  btnR.style.visibility = "hidden";
  btnS.style.visibility = "hidden";
})