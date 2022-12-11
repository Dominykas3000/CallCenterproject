window.onload = function () {
  console.log("Page is loaded");
  document.getElementById("submit").addEventListener("click", callTo);
};

function callTo() {
  console.log("function is called trying to get the number");
  var number = document.getElementById("userPhone").value;
  console.log("Users phone number is here and we are thryint to contact : " + number);
  params = "num=" + number;
  params = params.toString();
  var xml = new XMLHttpRequest();
  xml.open("POST", "main.php?num=" + number, true);
  xml.status = function () {
    console.log("response of xmlHTTP request is :" + this.responseText);
  };
  xml.send();
}
