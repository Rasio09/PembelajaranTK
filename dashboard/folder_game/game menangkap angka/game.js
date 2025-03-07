const canvas = document.getElementById("gameCanvas");
        const ctx = canvas.getContext("2d");
        let playerImage = new Image();

        const player1Image = "satu.png";
        const player2Image = "dua.png";

        let player = { x: 300, y: 250, size: 70 };
        let numbers = [
            { x: 70, y: 160, value: 1 },
            { x: 350, y: 120, value: 2 },
            { x: 580, y: 200, value: 3 },
            { x: 580, y: 420, value: 4 },
            { x: 200, y: 440, value: 5 }
        ];
        let collectedNumbers = [];
        let playerName = "";

        function drawPlayer() {
            ctx.drawImage(playerImage, player.x, player.y, player.size, player.size);
        }

        function drawNumbers() {
            ctx.font = "40px Arial";
            ctx.fillStyle = "red";
            numbers.forEach(num => {
                if (!collectedNumbers.includes(num.value)) {
                    ctx.fillText(num.value, num.x, num.y);
                }
            });
        }

        function movePlayer(e) {
            if (e.key === "ArrowUp") player.y = Math.max(0, player.y - 10);
            if (e.key === "ArrowDown") player.y = Math.min(canvas.height - player.size, player.y + 10);
            if (e.key === "ArrowLeft") player.x = Math.max(0, player.x - 10);
            if (e.key === "ArrowRight") player.x = Math.min(canvas.width - player.size, player.x + 10);
            checkCollision();
        }

        function checkCollision() {
            numbers.forEach(num => {
                if (
                    !collectedNumbers.includes(num.value) &&
                    player.x < num.x + 20 &&
                    player.x + player.size > num.x &&
                    player.y < num.y + 20 &&
                    player.y + player.size > num.y
                ) {
                    collectedNumbers.push(num.value);
                    document.getElementById("message").innerText = `Anda mengumpulkan angka ${num.value}!`;

                    if (collectedNumbers.length === numbers.length) {
                        document.getElementById("message").innerText = "";
                        showWinPopup();
                    }
                }
            });
        }

        function showWinPopup() {
            const winPopup = document.getElementById("winPopup");
            const winMessage = document.getElementById("winMessage");
            winMessage.innerHTML = `${playerName} Menang!`;
            winPopup.style.display = "block";
        }

        function resetGame() {
            collectedNumbers = [];
            player.x = 300;
            player.y = 250;
            document.getElementById("message").innerText = "";
            document.getElementById("winPopup").style.display = "none";
            document.getElementById("namePopup").style.display = "flex";
            document.getElementById("playerName").value = "";
        }

        function gameLoop() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            drawPlayer();
            drawNumbers();
            requestAnimationFrame(gameLoop);
        }

        document.addEventListener("keydown", movePlayer);
        playerImage.onload = gameLoop;

        document.getElementById("retryButton").addEventListener("click", resetGame);

        document.getElementById("startButton").addEventListener("click", () => {
            playerName = document.getElementById("playerName").value.trim();
            if (playerName) {
                document.getElementById("namePopup").style.display = "none";
                document.getElementById("message").innerText = `${playerName}, ayo mulai permainan!`;
            } else {
                alert("Nama tidak boleh kosong!");
            }
        });

        document.querySelectorAll(".player-option").forEach(option => {
            option.addEventListener("click", (e) => {
                document.querySelectorAll(".player-option").forEach(opt => opt.classList.remove("selected"));
                e.target.classList.add("selected");
                playerImage.src = e.target.id === "player1" ? player1Image : player2Image;
            });
        });

        playerImage.src = player1Image; // Default player image