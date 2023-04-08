let valueDisplays = document.querySelectorAll(".num");
let interval = 250;

toggle = true;

window.addEventListener("scroll", (e) => {
  if (window.scrollY > 2000) {
    if (toggle) {
      toggle = false;
      valueDisplays.forEach((valueDisplay) => {
        let startValue = 0;
        let endValue = parseInt(valueDisplay.getAttribute("data-val"));
        let duration = Math.floor(interval / endValue);
        let counter = setInterval(() => {
          startValue += Math.floor(endValue / interval);
          valueDisplay.textContent = startValue;
          if (startValue >= endValue) {
            clearInterval(counter);
            valueDisplay.textContent = endValue;
          }
        }, duration);
      });
    }
  }
});

const header = document.querySelector('header');
const btnBurger = document.getElementById('btnBurger');
const buttonHeaderContainer = document.querySelector('.buttonHeader')

btnBurger.addEventListener('click', () => {
  header.classList.toggle('activeBurger')
  buttonHeaderContainer.classList.toggle('activeBtn')
})

window.addEventListener('resize', () => {
  if(innerWidth >= 1168){
    header.classList.remove('activeBurger')
    buttonHeaderContainer.classList.remove('activeBtn')
  }
})