const canvas = document.getElementById("gameCanvas");
const ctx = canvas.getContext("2d");

let player = { x: 50, y: 50, size: 20, color: "blue" };
let numbers = [{ x: 100, y: 100, value: 1 }, { x: 200, y: 150, value: 2 }, { x: 300, y: 200, value: 3 },
               { x: 400, y: 250, value: 4 }, { x: 450, y: 350, value: 5 }];
let collectedNumbers = [];

function drawPlayer() {
    ctx.fillStyle = player.color;
    ctx.fillRect(player.x, player.y, player.size, player.size);
}

function drawNumbers() {
    numbers.forEach(num => {
        if (!collectedNumbers.includes(num.value)) {
            ctx.fillStyle = "red";
            ctx.fillText(num.value, num.x, num.y);
        }
    });
}

function movePlayer(e) {
    if (e.key === "ArrowUp") player.y -= 10;
    if (e.key === "ArrowDown") player.y += 10;
    if (e.key === "ArrowLeft") player.x -= 10;
    if (e.key === "ArrowRight") player.x += 10;

    checkCollision();
}

function checkCollision() {
    numbers.forEach(num => {
        if (!collectedNumbers.includes(num.value) && player.x < num.x + 20 && player.x + player.size > num.x &&
            player.y < num.y + 20 && player.y + player.size > num.y) {
            collectedNumbers.push(num.value);
            if (collectedNumbers.length === numbers.length) {
                document.getElementById("message").innerText = "You Win!";
            }
        }
    });
}

function gameLoop() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    drawPlayer();
    drawNumbers();
}

document.addEventListener("keydown", movePlayer);
setInterval(gameLoop, 100);
