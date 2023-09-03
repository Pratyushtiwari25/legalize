// Predefined login credentials
const validEmailMobile = "9129078650";
const validPassword = "tiger";

document.getElementById("loginForm").addEventListener("submit", function (e) {
    e.preventDefault();

    // Retrieve user input
    const inputEmailMobile = document.getElementById("email_mobile").value;
    const inputPassword = document.getElementById("password").value;

    // Check if input matches predefined credentials
    if (inputEmailMobile === validEmailMobile && inputPassword === validPassword) {
        // Authentication successful
        window.location.href = "dashboard.html"; // Redirect to the dashboard
    } else {
        // Authentication failed
        alert("Authentication failed. Please check your credentials.");
    }
});
