document.addEventListener("DOMContentLoaded", function () {
    const sidebarToggle = document.createElement("button");
    sidebarToggle.innerHTML = '<i class="fas fa-bars"></i>';
    sidebarToggle.className =
        "lg:hidden fixed top-4 left-4 z-50 bg-primary text-white w-12 h-12 rounded-lg shadow-lg";
    document.body.appendChild(sidebarToggle);
    const sidebar = document.querySelector(".sidebar");
    const overlay = document.createElement("div");
    overlay.className = "overlay";
    document.body.appendChild(overlay);
    sidebarToggle.addEventListener("click", function () {
        sidebar.classList.toggle("active");
        overlay.classList.toggle("active");
    });
    overlay.addEventListener("click", function () {
        sidebar.classList.remove("active");
        overlay.classList.remove("active");
    });
});
