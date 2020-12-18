function toggleMenu() {
    var x = document.getElementById("show-hide-menu");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
}

// function toggleMenu(event) {

//     if (event.target && event.target.className == 'clickable') {
//         var next = event.target.nextElementSibling;
//         if (next.style.display == "none") {
//             next.style.display = "block";

//         } else {
//             next.style.display = "none";
//         }
//     }
// }

// document.addEventListener('click', toggleMenu, true);