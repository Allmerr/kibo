const allFagEl = document.querySelectorAll(".fag-el");

allFagEl.forEach((fagEl) => {
    fagEl.addEventListener("click", () => fagEl.classList.toggle("active"));
});
