document.addEventListener('DOMContentLoaded', function () {
    const gamesContainer = document.querySelector('.gamesinhoud');

    fetch('dbRead.php')
        .then(response => response.json())
        .then(data => {
            data.forEach((game) => {
                const gameDiv = document.createElement('div');
                gameDiv.classList.add('game');

                const gameName = document.createElement('h3');
                gameName.textContent = game.spelnaam;

                const gameDescription = document.createElement('p');
                gameDescription.textContent = game.spelbeschrijving;

                const gamePrice = document.createElement('p');
                gamePrice.textContent = 'Prijs: ' + game.spelprijs;

                const addToCartButton = document.createElement('button');
                addToCartButton.textContent = '+';
                addToCartButton.classList.add('toevoegknop');
                addToCartButton.addEventListener('click', function() {
                    addToCart(game);
                });

                gameDiv.appendChild(gameName);
                gameDiv.appendChild(gameDescription);
                gameDiv.appendChild(gamePrice);
                gameDiv.appendChild(addToCartButton);

                gamesContainer.appendChild(gameDiv);
            });
        });
});

function addToCart(game) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.push(game);
    localStorage.setItem('cart', JSON.stringify(cart));
    alert('Game toegevoegd aan winkelmandje');
}
