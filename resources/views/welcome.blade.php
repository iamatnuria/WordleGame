<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Wordle Game</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/css/app.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="/js/app.js"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>

</head>
<body>
    <main x-data="game"
          @keyup.window="onKeyPress($event.key)"
    >

        <h1 aria-label="TryCat">
            <img class="logo" src="/images/trycat-logo.svg" alt="">
        </h1>
        
        <div id="game">
            <template x-for="(row, index) in board">
                <div class="row" :class="{'current' : currentRowIndex === index, 'invalid' : currentRowIndex === index && errors}">
                    <template x-for="tile in row">
                        <div class="tile" :class="tile.status" x-text="tile.letter"></div>
                    </template>
                </div>
            </template>
        </div>

        <output x-text="message"></output>
        

        <div id="keyboard" @click.stop="$event.target.matches('button') && onKeyPress($event.target.textContent)">
            <template x-for="row in letters">
                <div class="row">
                    <template x-for="key in row">
                        <button 
                            class="key"
                            :class="matchingTileForKey(key)?.status" 
                            type="button" 
                            x-text="key">
                        </button>
                    </template>
                </div>
            </template>
            
        </div>
    </main>
    <footer>
        <div class="footer-container">
            <p>Made with &hearts; by <a class="author-link" href="http://www.ignathedev.com" target="_blank" rel="noopener noreferrer">Ignacio Amat</a></p>
        </div>
        <div class="coffe-button">
            <script type="text/javascript" src="https://cdnjs.buymeacoffee.com/1.0.0/button.prod.min.js" data-name="bmc-button" data-slug="ignasiamatz" data-color="#5F7FFF" data-emoji=""  data-font="Cookie" data-text="Buy me a coffee" data-outline-color="#000000" data-font-color="#ffffff" data-coffee-color="#FFDD00" ></script>
        </div>
    </footer>
</body>
</html>
