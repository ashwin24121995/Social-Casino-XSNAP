<?php include('header.php'); ?>
<style>
body{background:linear-gradient(135deg,#1a0b2e 0%,#2d1b4e 100%);min-height:100vh}.game-container{max-width:900px;margin:2rem auto;padding:2rem}.game-card{background:#fff;border-radius:20px;padding:2rem;box-shadow:0 10px 40px rgba(0,0,0,.3)}.balance-display{background:linear-gradient(145deg,#7B2CBF,#9D4EDD);color:#fff;padding:1.5rem;border-radius:15px;text-align:center;margin-bottom:2rem;border:3px solid #FFD700}.game-table{background:linear-gradient(145deg,#0a5f0a,#064206);border:5px solid #FFD700;border-radius:20px;padding:3rem 2rem;margin:2rem 0;min-height:350px}.prediction-buttons{display:flex;gap:1rem;justify-content:center;margin:2rem 0;flex-wrap:wrap}.predict-btn{padding:1.5rem 2rem;background:linear-gradient(145deg,#7B2CBF,#9D4EDD);color:#fff;border:3px solid #FFD700;border-radius:15px;font-size:1.3rem;font-weight:700;cursor:pointer;transition:all .3s ease}.predict-btn:hover:not(:disabled){transform:translateY(-3px);box-shadow:0 10px 25px rgba(123,44,191,.5)}.predict-btn:disabled{opacity:.6;cursor:not-allowed}.bet-controls{display:flex;gap:.5rem;margin:1rem 0;flex-wrap:wrap;justify-content:center}.bet-btn{padding:.75rem 1.5rem;border:2px solid #7B2CBF;background:#fff;color:#7B2CBF;border-radius:10px;cursor:pointer;font-weight:600;transition:all .3s ease}.bet-btn:hover{background:#7B2CBF;color:#fff}.bet-btn.active{background:linear-gradient(145deg,#7B2CBF,#9D4EDD);color:#fff;border-color:#FFD700}.deal-btn{width:100%;padding:1.5rem;background:linear-gradient(145deg,#FFD700,#FFA500);border:4px solid #7B2CBF;border-radius:15px;font-size:1.5rem;font-weight:700;color:#1a0b2e;cursor:pointer;transition:all .3s ease;box-shadow:0 8px 25px rgba(255,215,0,.5);margin-top:1rem}.deal-btn:hover:not(:disabled){transform:translateY(-3px);box-shadow:0 12px 35px rgba(255,215,0,.7)}.deal-btn:disabled{opacity:.6;cursor:not-allowed}.game-stats{display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;margin-top:2rem}.stat-card{background:linear-gradient(145deg,#f8f9fa,#e9ecef);padding:1rem;border-radius:10px;text-align:center;border:2px solid #7B2CBF}.stat-value{font-size:1.5rem;font-weight:700;color:#7B2CBF}.stat-label{font-size:.9rem;color:#666;margin-top:.5rem}.result-notification{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%) scale(0);background:#fff;padding:3rem;border-radius:20px;box-shadow:0 20px 60px rgba(0,0,0,.5);z-index:1000;text-align:center;min-width:400px;transition:transform .3s ease}.result-notification.show{transform:translate(-50%,-50%) scale(1)}.result-notification.win{border:5px solid #28a745}.result-notification.lose{border:5px solid #dc3545}.overlay{position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,.7);z-index:999;display:none}.overlay.show{display:block}
</style>

<div class="game-container">
    <div class="game-card">
        <h1 class="text-center mb-4" style="color:#7B2CBF">
            ⚡ Laser 247
        </h1>
        
        <div class="balance-display">
            <h3 class="mb-0">
                <i class="bi bi-coin"></i> Balance: <span id="balance">10000</span> Coins
            </h3>
        </div>

        <div class="text-center mb-3">
            <h5 style="color:#7B2CBF">Select Bet Amount:</h5>
        </div>
        
        <div class="bet-controls">
            <button class="bet-btn active" onclick="selectBet(10)">10</button>
            <button class="bet-btn" onclick="selectBet(50)">50</button>
            <button class="bet-btn" onclick="selectBet(100)">100</button>
            <button class="bet-btn" onclick="selectBet(500)">500</button>
            <button class="bet-btn" onclick="selectBet(1000)">1000</button>
        </div>

        <div class="game-table">
            <h4 class="text-center text-white mb-4">Lightning-fast number prediction - Odd or Even!</h4>
            
            <div id="currentNumber" style="font-size:5rem;font-weight:700;color:#FFD700;text-align:center;margin:2rem 0">?</div>

            <div class="prediction-buttons" id="predictionButtons" style="display:none">
                <button class="predict-btn" onclick="predict('odd')">ODD (2x)</button>
                <button class="predict-btn" onclick="predict('even')">EVEN (2x)</button>
            </div>
        </div>

        <button class="deal-btn" id="dealBtn" onclick="startGame()">
            START GAME
        </button>

        <div class="game-stats">
            <div class="stat-card">
                <div class="stat-value" id="totalGames">0</div>
                <div class="stat-label">Games Played</div>
            </div>
            <div class="stat-card">
                <div class="stat-value" id="totalWins">0</div>
                <div class="stat-label">Wins</div>
            </div>
            <div class="stat-card">
                <div class="stat-value" id="biggestWin">0</div>
                <div class="stat-label">Biggest Win</div>
            </div>
        </div>
    </div>
</div>

<div class="overlay" id="overlay"></div>
<div class="result-notification" id="resultNotification">
    <div style="font-size:5rem;margin-bottom:1rem" id="resultIcon"></div>
    <h2 id="resultTitle"></h2>
    <p id="resultMessage"></p>
    <button class="btn btn-lg mt-3" style="background:linear-gradient(145deg,#7B2CBF,#9D4EDD);color:#fff;border:2px solid #FFD700" onclick="closeNotification()">
        Play Again
    </button>
</div>

<script>
let balance=10000,currentBet=10,stats={games:0,wins:0,biggestWin:0};const audioContext=new(window.AudioContext||window.webkitAudioContext);function playSound(e){const t=audioContext.createOscillator(),a=audioContext.createGain();t.connect(a),a.connect(audioContext.destination),"deal"===e?(t.frequency.value=500,a.gain.setValueAtTime(.2,audioContext.currentTime),a.gain.exponentialRampToValueAtTime(.01,audioContext.currentTime+.2),t.start(audioContext.currentTime),t.stop(audioContext.currentTime+.2)):"flip"===e?(t.frequency.value=700,a.gain.setValueAtTime(.2,audioContext.currentTime),a.gain.exponentialRampToValueAtTime(.01,audioContext.currentTime+.3),t.start(audioContext.currentTime),t.stop(audioContext.currentTime+.3)):"win"===e?(t.frequency.value=800,a.gain.setValueAtTime(.3,audioContext.currentTime),a.gain.exponentialRampToValueAtTime(.01,audioContext.currentTime+.5),t.start(audioContext.currentTime),t.stop(audioContext.currentTime+.5)):"lose"===e&&(t.frequency.value=200,a.gain.setValueAtTime(.2,audioContext.currentTime),a.gain.exponentialRampToValueAtTime(.01,audioContext.currentTime+.3),t.start(audioContext.currentTime),t.stop(audioContext.currentTime+.3))}function selectBet(e){playSound("deal"),currentBet=e,document.querySelectorAll(".bet-btn").forEach(e=>e.classList.remove("active")),event.target.classList.add("active")}let gameActive=!1,currentNumber=null;function startGame(){if(currentBet>balance)return void alert("Insufficient balance!");balance-=currentBet,updateBalance(),gameActive=!0,playSound("deal"),document.getElementById("currentNumber").textContent="?",document.getElementById("predictionButtons").style.display="flex",document.getElementById("dealBtn").disabled=!0}function predict(e){if(!gameActive)return;playSound("flip"),currentNumber=Math.floor(100*Math.random())+1,document.getElementById("currentNumber").textContent=currentNumber,gameActive=!1,stats.games++;let t=!1;("odd"===e&&currentNumber%2==1||"even"===e&&currentNumber%2==0)&&(t=!0);let a=0;t&&(a=2*currentBet,balance+=a,stats.wins++,a>stats.biggestWin&&(stats.biggestWin=a),playSound("win")),t||playSound("lose"),updateBalance(),updateStats(),setTimeout(()=>{showNotification(t,a,currentNumber)},500),document.getElementById("predictionButtons").style.display="none",document.getElementById("dealBtn").disabled=!1}function showNotification(e,t,a){const n=document.getElementById("resultNotification"),r=document.getElementById("overlay"),s=document.getElementById("resultIcon"),o=document.getElementById("resultTitle"),c=document.getElementById("resultMessage");e?(n.className="result-notification win show",s.textContent="🎉",o.textContent="WINNER!",o.style.color="#28a745",c.innerHTML=`<p style="font-size:2rem;color:#28a745;font-weight:700">+${t} coins</p>`):(n.className="result-notification lose show",s.textContent="😔",o.textContent="BETTER LUCK NEXT TIME",o.style.color="#dc3545",c.innerHTML="<p>Try again!</p>"),r.classList.add("show")}function closeNotification(){playSound("deal"),document.getElementById("resultNotification").classList.remove("show"),document.getElementById("overlay").classList.remove("show")}function updateBalance(){document.getElementById("balance").textContent=balance,balance<10&&(alert("Balance too low! Resetting to 10,000 coins."),balance=1e4,updateBalance())}function updateStats(){document.getElementById("totalGames").textContent=stats.games,document.getElementById("totalWins").textContent=stats.wins,document.getElementById("biggestWin").textContent=stats.biggestWin}document.getElementById("overlay").addEventListener("click",closeNotification);
</script>

<?php include('footer.php'); ?>