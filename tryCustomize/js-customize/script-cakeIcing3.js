let img = document.querySelector("#displayImg");
let btn1 = document.querySelector("#btn1");
let btn2 = document.querySelector("#btn2");
let btn3 = document.querySelector("#btn3");
let btnR = document.querySelector("#btnR");
let btnS = document.querySelector("#btnS");
let imgpath = document.querySelector("#imgpath");
let rPic = document.querySelector("#displayImg").getAttribute('src');
let sCurr = btnS.value;

btn1.addEventListener('click', () => {
  img.src = './imgDisplay3/30.png';
  btnR.style.visibility = "visible";
  btnS.style.visibility = "visible";
  btnS.value = sCurr + "I1";
  imgpath.value = "./imgDisplay3/30.png";
})

btn2.addEventListener('click', () => {
  img.src = './imgDisplay3/31.png';
  btnR.style.visibility = "visible";
  btnS.style.visibility = "visible";
  btnS.value = sCurr + "I2";
  imgpath.value = './imgDisplay3/31.png';
})

btn3.addEventListener('click', () => {
  img.src = './imgDisplay3/32.png';
  btnR.style.visibility = "visible";
  btnS.style.visibility = "visible";
  btnS.value = sCurr + "I3";
  imgpath.value = './imgDisplay3/32.png';
})

btnR.addEventListener('click', () => {
  img.src = rPic; 
  btnR.style.visibility = "hidden";
  btnS.style.visibility = "hidden";
})