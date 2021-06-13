// Button view profile detail handler
const btnViewProfile = document.getElementById("profile-view");
btnViewProfile.addEventListener("click", () => {
    const profileDetail = document.getElementById("profile-detail");
    if (btnViewProfile.innerHTML === "Xem chi tiết") {
        profileDetail.style.display = "block";
        profileDetail.style.animation = "slide-down 0.5s ease-out";
        btnViewProfile.innerHTML = "Thu gọn";
    }
    else {
        profileDetail.style.display = "none";
        btnViewProfile.innerHTML = "Xem chi tiết";
    }
});