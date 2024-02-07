// Get the login button
const loginBtn = document.getElementById("login-btn");
const profileModal = document.getElementById("profile-modal");
const closeModalBtn = document.getElementById("profile-modal-close");

loginBtn.addEventListener("click", () => {
    profileModal.style.display = "block";
    document.body.style.overflow = "hidden";
    document.documentElement.style.overflowY = "scroll";
});

closeModalBtn.addEventListener("click", () => {
    profileModal.style.display = "none";
    document.body.style.overflow = "auto";
    document.documentElement.style.overflowY = "scroll";
});