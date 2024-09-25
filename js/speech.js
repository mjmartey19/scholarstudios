
const say = text => speechSynthesis.speak(new SpeechSynthesisUtterance(text));
const logo = document.querySelector('#speech');


window.onload = ()=>{
say("Hi, Welcome to Scholar Studio");
}
