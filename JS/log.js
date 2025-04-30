//Checks if there is an input in the search bar
document.getElementById('search').addEventListener('input', filterLogs);

// Add event listener for month filter
document.getElementById('filterSelect').addEventListener('change', filterByMonth);

function filterByMonth() {
    const selectedMonth = document.getElementById('filterSelect').value.toLowerCase();
    const logs = document.querySelectorAll('.log');

    logs.forEach(log => {
        if (selectedMonth === 'all') {
            log.style.display = 'block';
        } 
        else {
            const monthId = log.id.toLowerCase();
            
            if (monthId.includes(selectedMonth)) {
                log.style.display = 'block';
            } else {
                log.style.display = 'none';
            }
        }
    });
}

function filterLogs() {
    const searchInput = document.getElementById('search').value.toLowerCase();
    const logs = document.querySelectorAll('.log');
    
    //Searches through all the logs and checks if the search input matches the title or content of the log
    logs.forEach(log => {
        const titleElement = log.querySelector('h3', "h6");
        const title = titleElement.textContent.toLowerCase();

        // Check if search input matches either title or content
        if (title.includes(searchInput)) {
            log.style.display = "block"; // Show matching log
        } else {
            log.style.display = "none"; // Hide non-matching log
        }
    });
}
