<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestel Pagina</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="navbar">
        <img src="123.jpeg" alt="Logo">
        <a href="home.php">Home</a>
        <a href="bestellen.php">Bestellen</a>
    </div>

    <div class="titelinhoud">
        <div class="paginatitel">
            Games Bestellen
        </div>
        <div class="paginabeschrijving">
            Hier kun je bekijken wat er in je winkelmandje zit.
        </div>
    </div>

    <div class="winkelmandje-inhoud">

    </div>

    <div class="totaal-prijs">

    </div>


    <button id="bestel-knop">Bestel nu</button>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let winkelmandjeContainer = document.querySelector('.winkelmandje-inhoud');
            let totaalPrijsElement = document.querySelector('.totaal-prijs');

            cart.forEach(game => {
                let gameDiv = document.createElement('div');
                gameDiv.classList.add('game');

                let gameName = document.createElement('h3');
                gameName.textContent = game.spelnaam;

                let gameDescription = document.createElement('p');
                gameDescription.textContent = game.spelbeschrijving;

                let gamePrice = document.createElement('p');
                gamePrice.textContent = 'Prijs: ' + game.spelprijs;

                gameDiv.appendChild(gameName);
                gameDiv.appendChild(gameDescription);
                gameDiv.appendChild(gamePrice);
                winkelmandjeContainer.appendChild(gameDiv);
            });

            let totaalPrijs = cart.reduce((total, game) => total + parseFloat(game.spelprijs), 0);
            totaalPrijsElement.textContent = 'Totaal Prijs: ' + totaalPrijs.toFixed(2);
        });
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const bestelKnop = document.getElementById('bestel-knop');
        bestelKnop.addEventListener('click', function() {
            // Haal de items in het winkelmandje op uit de lokale opslag
            const cart = JSON.parse(localStorage.getItem('cart'));

            // Verstuur de bestelling naar de server (in dit voorbeeld via een POST-verzoek)
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'bestel.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
            xhr.send(JSON.stringify(cart));

            // Eventuele verdere acties, zoals het legen van het winkelmandje
            // localStorage.removeItem('cart');
            // ...

            // Geef een bevestiging aan de gebruiker
            alert('Bestelling geplaatst!');
        });
    });
</script>
</body>
</html>
