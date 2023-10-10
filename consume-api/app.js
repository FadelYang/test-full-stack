
function fetchRandomUser() {
    fetch("https://randomuser.me/api/")
        .then((response) => {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error("NETWORK RESPONSE ERROR");
            }
        })
        .then(data => {
            console.log(data.results[0]);
            displayRandomUser(data)
        })
        .catch((error) => console.error("FETCH ERROR:", error));
}

function displayRandomUser(data) {
    let resultDiv = document.querySelector(".resultApi");
    let userPicture = document.querySelector('.userPicture');

    userPicture.src = data.results[0].picture.large;

    resultDiv.appendChild(userPicture);

    let userNameDiv = document.querySelector(".userName");
    userNameDiv.textContent = `Nama: ${data.results[0].name["first"]}`
}

fetchRandomUser();

let refreshButton = document.querySelector("#refreshButton");
refreshButton.addEventListener('click', fetchRandomUser);
