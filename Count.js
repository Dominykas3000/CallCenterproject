window.onload = function () {
  console.log("Page loaded");
  getResult();
};

function getResult() {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var result = xhr.responseText;
      document.getElementById("result").innerHTML = result;
    }
  };
  xhr.open("GET", "Count.php", true);
  xhr.send();
}
