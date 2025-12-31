document.getElementById("loginForm").addEventListener("submit", function (e) {
  const username = document.getElementById("username").value.trim();
  const password = document.getElementById("password").value.trim();
  let valid = true;

  if (username === "") {
    document.getElementById("userError").textContent = "Enter username!";
    valid = false;
  } else {
    document.getElementById("userError").textContent = "";
  }

  if (password === "") {
    document.getElementById("passError").textContent = "Enter password!";
    valid = false;
  } else {
    document.getElementById("passError").textContent = "";
  }

  if (!valid) e.preventDefault();
});
