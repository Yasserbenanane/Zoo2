const btnNav = document.querySelectorAll(".btnNav");

const dashboardPage = document.getElementById("dashboardPage");
const addPage = document.getElementById("addPage");
const modifyPage = document.getElementById("modifyPage");
const searchPage = document.getElementById("searchPage");

function resetShow() {
  dashboardPage.classList.remove("show");
  addPage.classList.remove("show");
  modifyPage.classList.remove("show");
  searchPage.classList.remove("show");
}

function resetActive() {
  for (let i = 0; i < btnNav.length; i++) {
    btnNav[i].classList.remove("active");
  }
}

btnNav.forEach((btn) =>
  btn.addEventListener("click", () => {
    switch (btn.getAttribute("data-nav")) {
      case "Dashbord":
        showDashbord(btn);
        break;
      case "Ajouter":
        resetShow();
        resetActive();
        btn.classList.add("active");
        addPage.classList.add("show");
        break;
      case "Modifier":
        showModify();
        break;
      case "Rechercher":
        showSearch();
        break;
      default:
        alert("ERROR bad name");
        break;
    }
  })
);

function showDashbord(btn) {
  resetShow();
  resetActive();
  btn.classList.add("active");
  dashboardPage.classList.add("show");
}

export function showModify() {
  resetShow();
  resetActive();
  document.getElementById("ModifyBtn").classList.add("active");
  modifyPage.classList.add("show");
}
export function showSearch() {
  resetShow();
  resetActive();
  document.getElementById("SearchBtn").classList.add("active");
  searchPage.classList.add("show");
}

// ----------- DASHBOARD LIST SELECT

const tableContainerAnimaux = document.getElementById(
  "tableContainerAnimauxDashBoard"
);
const tableContainerRace = document.getElementById(
  "tableContainerRaceDashBoard"
);
const showTableTitleDashBoard = document.getElementById(
  "showTableTitleDashBoard"
);

const dashboardSelectTable = document.getElementById("dashboardSelectTable");

dashboardSelectTable.addEventListener("click", (e) => {
  switch (e.target.value) {
    case "animaux":
      tableContainerRace.classList.remove("show");
      tableContainerAnimaux.classList.add("show");
      showTableTitleDashBoard.innerText = "Liste des animaux";
      break;
    case "race":
      tableContainerAnimaux.classList.remove("show");
      tableContainerRace.classList.add("show");
      showTableTitleDashBoard.innerText = "Liste des races";
      break;
  }
});

// ----------- ADD SELECT

const pageAddAnimal = document.getElementById("pageAddAnimal");
const pageAddRace = document.getElementById("pageAddRace");

const choixTypeAdd = document.getElementById("choixTypeAdd");

choixTypeAdd.addEventListener("click", (e) => {
  switch (e.target.value) {
    case "race":
      pageAddAnimal.classList.remove("show");
      pageAddRace.classList.add("show");
      break;
    case "animal":
      pageAddRace.classList.remove("show");
      pageAddAnimal.classList.add("show");
      break;
  }
});

// ----------- MODIFY SELECT

const pageModifyAnimal = document.getElementById("pageModifyAnimal");
const pageModifyRace = document.getElementById("pageModifyRace");

const choixTypeModify = document.getElementById("choixTypeModify");

const selectAnimal = document.getElementById("selectAnimal");
const selectRace = document.querySelector("#showRaceContainer #race");

selectAnimal.addEventListener("change", () => {
  document.getElementById("modifyAnimal").innerHTML = "";
});

selectRace.addEventListener("change", () => {
  document.getElementById("modifyRace").innerHTML = "";
});

choixTypeModify.addEventListener("click", (e) => {
  switch (e.target.value) {
    case "race":
      showRace();
      break;
    case "animal":
      pageModifyRace.classList.remove("show");
      pageModifyAnimal.classList.add("show");
      break;
  }
});

export function showRace() {
  pageModifyAnimal.classList.remove("show");
  pageModifyRace.classList.add("show");

  choixTypeModify.selectedIndex = 1;
}

// ----------- Search LIST SELECT

const SearchAnimauxTableContainer = document.getElementById(
  "searchAnimauxContainer"
);
const SearchRaceTableContainer = document.getElementById("searchRaceContainer");

const choixTypeSearch = document.getElementById("choixTypeSearch");

choixTypeSearch.addEventListener("click", (e) => {
  switch (e.target.value) {
    case "animal":
      SearchRaceTableContainer.classList.remove("showflex");
      SearchAnimauxTableContainer.classList.add("showflex");
      break;
    case "race":
      showSearchRace();
      break;
  }
});

export function showSearchRace() {
  SearchAnimauxTableContainer.classList.remove("showflex");
  SearchRaceTableContainer.classList.add("showflex");
  choixTypeSearch.selectedIndex = 1;
}

// ----------- HORIZONTAL MENU 

const leftNavContainer = document.querySelector('.boxLeft');
const btnBurger = document.getElementById('btnBurger')


btnBurger.addEventListener('click', () => {
  leftNavContainer.classList.toggle('navShow')
})


// ----------- SELECT SAVED

// let selectPageModifyAnimal = document.querySelector("#pageModifyAnimal #race");
// let optionsSelectPageModifyAnimal = document.querySelectorAll(
//   "#pageModifyAnimal #race option"
// );

// console.log(selectPageModifyAnimal);
// console.log(optionsSelectPageModifyAnimal);

// let indexOption;

// for (let i = 0; i < optionsSelectPageModifyAnimal.length; i++) {
//   console.log(optionsSelectPageModifyAnimal[i].getAttribute("data-race"));
//   if (
//     optionsSelectPageModifyAnimal[i].getAttribute("data-race") == "selected"
//   ) {
//     selectPageModifyAnimal.selectedIndex = i;
//     indexOption = i;
//   }
// }
// selectPageModifyAnimal.selectedIndex = i;

// window.onload = function () {
//   var selectElements = document.querySelectorAll("select");
//   for (var i = 0; i < selectElements.length; i++) {
//     selectElements[i].selectedIndex = -1; // Supprimer la sélection
//   }
//   console.log(selectElements);
// };

// ----------- SEARCH SELECT

// const dashboardSelectTable = document.getElementById("dashboardSelectTable");

// dashboardSelectTable.addEventListener("click", (e) => {
//   switch (e.target.value) {
//     case "animaux":
//       tableContainerRace.classList.remove("show");
//       tableContainerAnimaux.classList.add("show");
//       showTableTitleDashBoard.innerText = "Liste des animaux";
//       break;
//     case "race":
//       tableContainerAnimaux.classList.remove("show");
//       tableContainerRace.classList.add("show");
//       showTableTitleDashBoard.innerText = "Liste des races";
//       break;
//   }
// });
