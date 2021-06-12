const btnViewProfile = document.getElementById("profile-view");
btnViewProfile.addEventListener("click", () => {
    const profileDetail = document.getElementById("profile-detail");
    if (btnViewProfile.innerHTML === "Xem chi tiết") {
        profileDetail.style.display = "block";
        btnViewProfile.innerHTML = "Thu gọn";
    }
    else {
        profileDetail.style.display = "none";
        btnViewProfile.innerHTML = "Xem chi tiết";
    }
});