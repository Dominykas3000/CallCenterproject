window.onload = function () {
  console.log("Page loaded");
  document.getElementById("submit").addEventListener("click", callTo);
};

function callTo() {
  console.log("Will try to get number");
  var number = document.getElementById("userPhone").value;
  console.log("Will ask to call on number " + number);
  params = "num=" + number;
  params = params.toString();
  var xml = new XMLHttpRequest();
  xml.open("POST", "main.php?num=" + number, true);
  xml.status = function () {
    console.log("response" + this.responseText);
  };
  xml.send(params);
}
