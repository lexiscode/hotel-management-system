document.addEventListener("DOMContentLoaded", function () {
    const statusFilter = document.getElementById("statusFilter");
    const tableRows = document.querySelectorAll(".table tbody tr");

    statusFilter.addEventListener("change", function () {
        const selectedStatus = statusFilter.value;

        tableRows.forEach(function (row) {
            const rowStatus = row.querySelector(".check-status").textContent.trim(); // Get the check status text
            if (selectedStatus === "All" || selectedStatus === rowStatus) {
                row.style.display = ""; // Show the row
            } else {
                row.style.display = "none"; // Hide the row
            }
        });
    });
});
