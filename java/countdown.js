function countdown() {
var date = new Date("August 28, 2022");
var now = new Date();
var diff = date.getTime() - now.getTime();
var daysLeft = Math.floor(diff / (1000 * 60 * 60 * 24));
  if (daysLeft > 1) {
    if (daysLeft == 365){
      document.getElementById("weddingCountdown").innerText= `We're celebrating our -1!`;
    } else {
      document.getElementById("weddingCountdown").innerText= `${daysLeft} days left!`;
    }  
} else if (daysLeft > 0) {
document.getElementById("weddingCountdown").innerText= `${daysLeft} day left!`;
} else if
(daysLeft ==0) {
  document.getElementById("weddingCountdown").innerText= `It's our day!`;
} else {
  document.getElementById("weddingCountdown").innerText= `It is our ${daysLeft} day anniversary!`;
}
}
