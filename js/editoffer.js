window.onload = sortList();

function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

function search() {
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
  li = ul.getElementsByTagName("li");
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
    } else {
        li[i].style.display = "none";
    }
  }
}
  
function sortList() {
  var ul, i, switching, li, shouldSwitch;
  ul = document.getElementById("myUL");
  switching = true;
  while (switching) {
    switching = false;
    li = ul.getElementsByTagName("li");
    for (i = 0; i < (li.length - 1); i++) {
      shouldSwitch = false;
      if (li[i].innerHTML.toLowerCase() > li[i + 1].innerHTML.toLowerCase()) {
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      li[i].parentNode.insertBefore(li[i + 1], li[i]);
      switching = true;
    }
  }
}