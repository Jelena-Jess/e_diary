function message() {
  alert("Your record is successfully saved.");
  return true;
}

function msg_password() {
  alert("You have changed your password successfully.");
  return true;
}

function request(id) {
  var id_user = id;
  document.getElementById(id).style.display = "none";

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    }
  };
  xmlhttp.open("GET", "Ajax/ajaxs&id=" + id_user, true);
  xmlhttp.send();
}

function accepted() {
  alert("You have accepted the request.");
  return true;
}

function declined() {
  alert("You have declined the request.");
  return true;
}

var d = new Date();
var n = d.getFullYear();
var m = d.getMonth();
var r = d.getDay();
dycalendar.draw({
  target: "#calendar",
  type: "month",
  year: n,
  month: m,
  date: r,
  highlighttargetdate: true
});

