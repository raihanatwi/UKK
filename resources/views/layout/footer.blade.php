
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const popupBtn = document.getElementById("PopupBtn");
        const profilePopup = document.getElementById("Profile");

        popupBtn.addEventListener("click", function () {
            if (profilePopup.classList.contains("hidden")) {
                profilePopup.classList.remove("hidden", "opacity-0");
                profilePopup.classList.add("opacity-100");
            } else {
                profilePopup.classList.add("opacity-0");
                setTimeout(() => {
                    profilePopup.classList.add("hidden");
                }, 300);
            }
        });

        // Menutup popover jika klik di luar
        document.addEventListener("click", function (event) {
            if (!popupBtn.contains(event.target) && !profilePopup.contains(event.target)) {
                profilePopup.classList.add("opacity-0");
                setTimeout(() => {
                    profilePopup.classList.add("hidden");
                }, 300);
            }
        });
    });
</script>
</body>


</html>


