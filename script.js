const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});
/*FindGym*/
function searchGym() {
    const searchInput = document.getElementById("gymSearchBar").value.toLowerCase();
    console.log('Search Input:', searchInput); // Debugging line
    const gymContainers = document.querySelectorAll(".gym-container");
    const gymsList = document.getElementById("gymsList");

    let matchedGyms = [];

    gymContainers.forEach((gym) => {
        const gymName = gym.getAttribute("data-gym-name").toLowerCase();
        if (gymName.includes(searchInput)) {
            gym.style.display = "flex";
            matchedGyms.push(gym); // Add matched gyms to the array
        } else {
            gym.style.display = "none";
        }
    });

    // Move matched gyms to the top
    matchedGyms.forEach(gym => {
        gymsList.appendChild(gym); // Append matched gym to the top
    });
}
