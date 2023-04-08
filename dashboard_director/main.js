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
        resetShow();
        resetActive();
        btn.classList.add("active");
        dashboardPage.classList.add("show");
        break;
      case "Ajouter":
        resetShow();
        resetActive();
        btn.classList.add("active");
        addPage.classList.add("show");
        break;
      case "Modifier":
        resetShow();
        resetActive();
        btn.classList.add("active");
        modifyPage.classList.add("show");
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

const tableContainerEmployee = document.getElementById(
  "tableContainerEmployeeDashBoard"
);
const tableContainerDirector = document.getElementById(
  "tableContainerDirectorDashBoard"
);
const showTableTitleDashBoard = document.getElementById(
  "showTableTitleDashBoard"
);

const dashboardSelectTable = document.getElementById("dashboardSelectTable");

dashboardSelectTable.addEventListener("click", (e) => {
  switch (e.target.value) {
    case "employee":
      tableContainerDirector.classList.remove("show");
      tableContainerEmployee.classList.add("show");
      showTableTitleDashBoard.innerText = "Liste des Employés";
      break;
    case "director":
      tableContainerEmployee.classList.remove("show");
      tableContainerDirector.classList.add("show");
      showTableTitleDashBoard.innerText = "Liste des Directeurs";
      break;
  }
});

// ----------- ADD SELECT

// ----------- MODIFY SELECT

const selectPersonnal = document.querySelector(".selectPersonnal");

selectPersonnal.addEventListener("change", () => {
  document.getElementById("ModifyValueContainer").innerHTML = "";
});

// ----------- HORIZONTAL MENU 

const leftNavContainer = document.querySelector('.boxLeft');
const btnMB = document.getElementById('btnMB')


btnMB.addEventListener('click', () => {
  leftNavContainer.classList.toggle('navShow')
})

// ----------- DASHBOARD LIST SELECT

// const SearchAnimauxTableContainer = document.getElementById(
//   "SearchAnimauxTableContainer"
// );
// const SearchRaceTableContainer = document.getElementById(
//   "SearchRaceTableContainer"
// );

// const choixTypeSearch = document.getElementById("choixTypeSearch");

// choixTypeSearch.addEventListener("click", (e) => {
//   switch (e.target.value) {
//     case "animal":
//       SearchRaceTableContainer.classList.remove("show");
//       SearchAnimauxTableContainer.classList.add("show");
//       break;
//     case "race":
//       SearchAnimauxTableContainer.classList.remove("show");
//       SearchRaceTableContainer.classList.add("show");
//       break;
//   }
// });
