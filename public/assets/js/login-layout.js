// Example of how you might handle Laravel validation errors
document.addEventListener("DOMContentLoaded", function () {
    // This would be populated by Laravel's validation errors
    const emailError = document.querySelector("#email + .error-message");
    const passwordError = document.querySelector("#password + .error-message");

    // Example of showing success message
    const sessionStatus = "{{ session('status') }}";
    if (sessionStatus) {
        const successDiv = document.querySelector(".success-message");
        successDiv.textContent = sessionStatus;
        successDiv.style.display = "block";
    }
});
