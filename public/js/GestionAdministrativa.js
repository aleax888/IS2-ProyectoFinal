function myFunction1() {
    var c = document.getElementById("CrudComites");
    var r = document.getElementById("CrudRoles");
    if (c.style.display === "none" && r.style.display === "block") {
      c.style.display = "block";
      r.style.display = "none";
    }
}

function myFunction2() {
    var c = document.getElementById("CrudComites");
    var r = document.getElementById("CrudRoles");
    if (r.style.display === "none" && c.style.display === "block") {
      r.style.display = "block";
      c.style.display = "none";
    }
}