function countdown() {
var date = new Date("August 22, 2022");
var now = new Date();
var diff = date.getTime() - now.getTime();
var daysLeft = Math.floor(diff / (1000 * 60 * 60 * 24));
  if (daysLeft > 1) {
  document.getElementById("weddingCountdown").innerText= `August 27, 2022 | ${daysLeft} days left!`;
} else if (daysLeft > 0) {
document.getElementById("weddingCountdown").innerText= `August 27, 2022 | ${daysLeft} day left!`;
} else if
(daysLeft ==0) {
  document.getElementById("weddingCountdown").innerText= `August 27, 2022 | It's our day!`;
} else {
  document.getElementById("weddingCountdown").innerText= `August 27, 2022 | It is our ${daysLeft} day anniversary!`;
}
}
