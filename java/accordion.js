var acc = document.getElementsByClassName("accordion-link");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active");
    console.log(this)
    /* Toggle between hiding and showing the active panel */
    var answer = this.nextElementSibling;
    // console.log(answer);
    if (answer.style.maxHeight) {
      answer.style.maxHeight = null;
      this.getElementsByClassName("fa-minus")[0].style.display = "none";
      this.getElementsByClassName("fa-plus")[0].style.display = "block";
    } else {
      answer.style.maxHeight = answer.scrollHeight + "px";
      this.getElementsByClassName("fa-plus")[0].style.display = "none";
      this.getElementsByClassName("fa-minus")[0].style.display = "block";
    }
  });
}

//
// .accordion-link:active .fa-minus{
// 	display: block;
// }
//
// .accordion-link:active .fa-plus{
// 	display: none;
// }
