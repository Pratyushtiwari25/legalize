// Get the modal for updating the profile
var profileModal = document.getElementById('profileModal');

// Get the button that opens the modal
var updateProfileBtn = document.getElementById("updateProfileBtn");
var updateProfileTopBtn = document.getElementById("updateProfileTopBtn");

// Get the <span> element that closes the modal
var closeBtn = document.getElementsByClassName("close")[0];

// When the user clicks the "Update Profile" button, open the modal
updateProfileBtn.onclick = function() {
    profileModal.style.display = "block";
}

// When the user clicks the "Update Profile" button at the top, open the modal
updateProfileTopBtn.onclick = function() {
    profileModal.style.display = "block";
}

// When the user clicks the close button, close the modal
closeBtn.onclick = function() {
    profileModal.style.display = "none";
}

// When the user clicks outside the modal, close it
window.onclick = function(event) {
    if (event.target == profileModal) {
        profileModal.style.display = "none";
    }
}

// Handle the profile update form submission
var profileForm = document.getElementById("profileForm");
profileForm.addEventListener("submit", function(event) {
    event.preventDefault();

    // Collect user input data
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var mobile = document.getElementById("mobile").value;
    var address = document.getElementById("address").value;

    // You can send this data to the server using AJAX for further processing and database update.
    // Also, handle the image upload here.

    // Close the modal after submitting the form
    profileModal.style.display = "none";

    // Optionally, you can update the profile details displayed on the dashboard here.
    // For example, by fetching updated data from the server.

    // Display a success message with a "Go to Dashboard" button
    var successMessage = document.createElement("div");
    successMessage.innerHTML = "<p>Profile updated successfully!</p><button id='goToDashboardBtn'>Go to Dashboard</button>";
    successMessage.className = "success-message";
    
    // Append the success message to the dashboard section
    var dashboardSection = document.querySelector(".dashboard");
    dashboardSection.appendChild(successMessage);

    // Handle the "Go to Dashboard" button click
    var goToDashboardBtn = document.getElementById("goToDashboardBtn");
    goToDashboardBtn.onclick = function() {
        openDashboard(); // Open the dashboard
    };
});

// Function to open the dashboard
function openDashboard() {
    // Redirect to the dashboard
    window.location.href = "dashboard.html";
}

// Initially, open the dashboard by default
openDashboard();
