let img = document.querySelector("#displayImg");
let btn1 = document.querySelector("#btn1");
let btn2 = document.querySelector("#btn2");
let btn3 = document.querySelector("#btn3");
let btnR = document.querySelector("#btnR");
let btnS = document.querySelector("#btnS");
let rPic = document.querySelector("#displayImg").getAttribute('src');
let sCurr = btnS.value;

btn1.addEventListener('click', () => {
  if( sCurr == 'B1'){
    img.src = './imgcDisplay2/21.png';
  }
  else if( sCurr == 'B2'){
    img.src = './imgcDisplay2/24.png';
  }
  else if( sCurr == 'B3'){
    img.src = './imgcDisplay2/27.png';
  }
  btnR.style.visibility = "visible";
  btnS.style.visibility = "visible";
  btnS.value = sCurr + "F1";
  imgpath.value = img.getAttribute('src');
})

btn2.addEventListener('click', () => {
  if( sCurr == 'B1'){
    img.src = './imgcDisplay2/22.png';
  }
  else if( sCurr == 'B2'){
    img.src = './imgcDisplay2/25.png';
  }
  else if( sCurr == 'B3'){
    img.src = './imgcDisplay2/28.png';
  }
  btnR.style.visibility = "visible";
  btnS.style.visibility = "visible";
  btnS.value = sCurr + "F2";
  imgpath.value = img.getAttribute('src');
})

btn3.addEventListener('click', () => {
  if( sCurr == 'B1'){
    img.src = './imgcDisplay2/23.png';
  }
  else if( sCurr == 'B2'){
    img.src = './imgcDisplay2/26.png';
  }
  else if( sCurr == 'B3'){
    img.src = './imgcDisplay2/29.png';
  }
  btnR.style.visibility = "visible";
  btnS.style.visibility = "visible";
  btnS.value = sCurr + "F3";
  imgpath.value = img.getAttribute('src');
})

btnR.addEventListener('click', () => {
  img.src = rPic;
  btnR.style.visibility = "hidden";
  btnS.style.visibility = "hidden";
})