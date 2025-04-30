//Checks if there is an input in the search bar
const searchInputCheck = document.getElementById('search').value.toLowerCase();
if (searchInputCheck.length()<1) {
    console.log("WORKS");
}
else {
    document.getElementById('search').addEventListener('input', filterLogs);
}

// Add event listener for month filter
document.getElementById('monthFilterSelect').addEventListener('change', filterByMonth);

//add eventlistener to day filter
document.getElementById('dayFilterSelect').addEventListener('change', filterByDay);

function filterByMonth() {
    const selectedMonth = document.getElementById('monthFilterSelect').value.toLowerCase();
    const logs = document.querySelectorAll('.log');

    logs.forEach(log => {
        if (selectedMonth === 'all' || log.classList.contains(selectedMonth)) {
            log.style.display = 'block';
        } 
        else {
            log.style.display = 'none';
            }
    })
}


function filterByDay() {
    const selectedDay = document.getElementById('dayFilterSelect').value.toLowerCase();
    const logs = document.querySelectorAll('.log');

    logs.forEach(log => {
        if (selectedDay === 'all' || log.classList.contains(selectedDay)) {
            log.style.display = 'block';
        }
        else {
            const dayId = log.id.toLowerCase();

            if (dayId.includes(selectedDay)) {
                log.style.display = 'block';
            }
            else {
                log.style.display = 'none';
            }
        }
    })
    
}

function filterLogs() {
    const searchInput = document.getElementById('search').value.toLowerCase();
    const logs = document.querySelectorAll('.log');

    //Searches through all the logs and checks if the search input matches the title or content of the log
    logs.forEach(log => {
        const titleElement = log.querySelector("h3", "h6");
        const title = titleElement.textContent.toLowerCase();

        // Check if search input matches either title or content
        if (title.includes(searchInput)) {
            log.style.display = "block"; // Show matching log
        } else {
            log.style.display = "none"; // Hide non-matching log
        }
    });
}
