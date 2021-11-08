window.onload = sortTable();

function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

function search() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
  
function sortTable() {
  var table, i, switching, tr, td1, td2, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  while (switching) {
    switching = false;
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < (tr.length - 1); i++) {
      shouldSwitch = false;
      td1 = tr[i].getElementsByTagName("td")[0];
      td2 = tr[i+1].getElementsByTagName("td")[0];
      if (td1.innerHTML.toLowerCase() > td2.innerHTML.toLowerCase()) {
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      tr[i].parentNode.insertBefore(tr[i + 1], tr[i]);
      switching = true;
    }
  }
}