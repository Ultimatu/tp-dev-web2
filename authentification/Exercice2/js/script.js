if (document.querySelector(".alert-danger")) {
  setTimeout(function () {
    document.querySelector(".alert-danger").classList.remove("hide");
  }, 5000);
}

if (document.querySelector(".alert-success")) {
  setTimeout(function () {
    document.querySelector(".alert-success").classList.remove("hide");
  }, 5000);
}
let i = 0;
var afficher = document.getElementById("afficher");
afficher.addEventListener("click", function () {
  console.log("click");
  document.querySelector(".table").classList.toggle("hide");
  if (i % 2 === 0) afficher.innerHTML = "Cacher";
  else afficher.innerHTML = "Afficher";
  i++;
});
