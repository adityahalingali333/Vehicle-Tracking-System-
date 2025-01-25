document.getElementById("leaveForm").addEventListener("submit", function(event) {
    event.preventDefault();
    const formData = new FormData(this);
    const data = Object.fromEntries(formData.entries());
    fetch("submit_leaves.php", {
        method: "POST",
        body: JSON.stringify(data),
        headers: {
            "Content-Type": "application/json"
        }
    })
    .then(response => response.text())
    .then(result => {
        document.getElementById("output").textContent = result;
        document.getElementById("leaveForm").reset();
    })
    .catch(error => console.error('Error:', error));
});
// Function to fetch and display leaves
function fetchLeaves() {
    fetch("get_leaves.php")
    .then(response => response.json())
    .then(data => {
        const output = document.getElementById("output");
        output.innerHTML = ""; // Clear previous output
        data.forEach(leave => {
            const leaveDiv = document.createElement("div");
            leaveDiv.classList.add("leave");
            leaveDiv.innerHTML = `<p><strong>Name:</strong> ${leave.name}</p>
                                   <p><strong>Start Date:</strong> ${leave.start_date}</p>
                                   <p><strong>End Date:</strong> ${leave.end_date}</p>
                                   <p><strong>Status:</strong> ${leave.status}</p>
                                   <p><strong>No of Days:</strong> ${leave.days}</p>`;
            output.appendChild(leaveDiv);
        });
    })
    .catch(error => console.error('Error:', error));
}

// Fetch leaves on page load
document.addEventListener("DOMContentLoaded", fetchLeaves);

// Submit leave form
document.getElementById("leaveForm").addEventListener("submit", function(event) {
    event.preventDefault();
    const formData = new FormData(this);
    const data = Object.fromEntries(formData.entries());
    fetch("submit_leave.php", {
        method: "POST",
        body: JSON.stringify(data),
        headers: {
            "Content-Type": "application/json"
        }
    })
    .then(response => response.text())
    .then(result => {
        document.getElementById("output").textContent = result;
        document.getElementById("leaveForm").reset();
        // Fetch and display leaves again after submission
        fetchLeaves();
    })
    .catch(error => console.error('Error:', error));
});
