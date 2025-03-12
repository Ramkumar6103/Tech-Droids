document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("registerForm");

  form.addEventListener("submit", function (event) {
    const username = document.getElementById("username").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();
    const confirmPassword = document
      .getElementById("confirm_password")
      .value.trim();

    if (
      username === "" ||
      email === "" ||
      password === "" ||
      confirmPassword === ""
    ) {
      event.preventDefault();
      alert("Please fill in all fields.");
      return;
    }

    if (!validateEmail(email)) {
      event.preventDefault();
      alert("Please enter a valid email address.");
      return;
    }

    if (password.length < 6) {
      event.preventDefault();
      alert("Password must be at least 6 characters long.");
      return;
    }

    if (password !== confirmPassword) {
      event.preventDefault();
      alert("Passwords do not match.");
    }
  });

  function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
  }
});
