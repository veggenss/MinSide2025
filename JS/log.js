document.getElementById('search').addEventListener('input', filterLogs);

function filterLogs() {
    const searchInput = document.getElementById('search').value.toLowerCase();
    const logs = document.querySelectorAll('.log');

    logs.forEach(log => {
        const titleText = log.querySelector("h3").textContent.toLowerCase();
        const logDate = log.querySelector("h6").textContent.toLowerCase();

        if (titleText.includes(searchInput) || logDate.includes(searchInput)) {
            log.style.display = "block";
        } else {
            log.style.display = "none";
        }
    });
}
