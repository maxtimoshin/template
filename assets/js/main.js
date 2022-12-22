const applyButtons = document.querySelectorAll('.apply-button')
const applyPopUp = document.querySelector('.apply-pop-up')
const closeCross = document.querySelector('.close-cross')
const hiddenTitle = document.querySelector('.hidden-title')

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        this.classList.toggle("activem");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
    });
}
applyButtons.forEach(e => {
    e.addEventListener('click', () => {
        hiddenTitle.value = e.dataset.value.toString()
        applyPopUp.style.display = "block"
        console.log(hiddenTitle.value)
    })
})
closeCross.addEventListener('click', () => {
    applyPopUp.style.display = "none"
})