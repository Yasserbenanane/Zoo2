const leftPart = document.getElementById("part_left");
const rightPart = document.getElementById("part_right");
const zooTitle = document.getElementById("zooTitle");
const leftSideImage = document.getElementById("leftSideImage");

const menuFonction = document.getElementById("menuFonction");

const passwordInput = document.querySelector(".password");
const passwordInfoContainer = document.querySelector(".password_securise");

const lengthCondition = document.querySelector(
  ".password_securise li:nth-child(1)"
);
const upperCondition = document.querySelector(
  ".password_securise li:nth-child(2)"
);
const numberCondition = document.querySelector(
  ".password_securise li:nth-child(3)"
);

const spaceCondition = document.querySelector(
  ".password_securise li:nth-child(4)"
);

let tabUpperLetter = []; // ABCDEFGHIJKLMOPQRSTUWXYZ
for (let i = 65; i <= 90; i++) {
  tabUpperLetter.push(String.fromCharCode(i));
}
let tabNumber = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"]; // 0123456789

menuFonction.addEventListener("click", (e) => {
  if (e.target.value == "Directeur") {
    leftPart.classList.add("patron");
    rightPart.classList.add("patronbg");
    zooTitle.innerText = "Patron";
    leftSideImage.src = "../img/img_for_inscription/Patron.png";
  } else {
    leftPart.classList.remove("patron");
    rightPart.classList.remove("patronbg");
    zooTitle.innerText = "Employé";
    leftSideImage.src = "../img/img_for_inscription/emplo.png";
  }
});

passwordInput.addEventListener("input", (e) => {
  passwordInfoContainer.classList.add("show");

  let passwordvalue = e.target.value;

  // lengthCondition
  if (passwordvalue.length > 4 && passwordvalue.length < 19) {
    lengthCondition.classList.add("checked");
  } else {
    lengthCondition.classList.remove("checked");
  }

  // upperCondition
  upperCondition.classList.remove("checked");
  for (let i = 0; i < passwordvalue.length; i++) {
    if (tabUpperLetter.includes(passwordvalue[i])) {
      upperCondition.classList.add("checked");
      break;
    } else {
      upperCondition.classList.remove("checked");
    }
  }

  // numberCondition
  numberCondition.classList.remove("checked");
  for (let i = 0; i < passwordvalue.length; i++) {
    if (tabNumber.includes(passwordvalue[i])) {
      numberCondition.classList.add("checked");
      break;
    } else {
      numberCondition.classList.remove("checked");
    }
  }

  if (!passwordvalue.includes(" ")) {
    spaceCondition.classList.add("checked");
  } else {
    spaceCondition.classList.remove("checked");
  }
});