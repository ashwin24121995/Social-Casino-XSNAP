<?php include('header.php'); ?>
<style>
body{background:linear-gradient(135deg,#1a0b2e 0%,#2d1b4e 100%);min-height:100vh}.game-container{max-width:1000px;margin:2rem auto;padding:2rem}.game-card{background:#fff;border-radius:20px;padding:2rem;box-shadow:0 10px 40px rgba(0,0,0,.3)}.balance-display{background:linear-gradient(145deg,#7B2CBF,#9D4EDD);color:#fff;padding:1.5rem;border-radius:15px;text-align:center;margin-bottom:2rem;border:3px solid #FFD700}.game-area{background:linear-gradient(145deg,#0a5f0a,#064206);border:5px solid #FFD700;border-radius:20px;padding:2rem;margin:2rem 0;min-height:500px;position:relative;overflow:hidden}.target-board{width:400px;height:400px;margin:2rem auto;position:relative;border-radius:50%;background:radial-gradient(circle,#fff 0%,#fff 15%,#FFD700 15%,#FFD700 30%,#dc3545 30%,#dc3545 50%,#FFD700 50%,#FFD700 70%,#000 70%,#000 100%);box-shadow:0 10px 40px rgba(0,0,0,.5);cursor:crosshair}.target-center{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:60px;height:60px;background:#FFD700;border-radius:50%;border:3px solid #000;z-index:10}.hit-marker{position:absolute;width:20px;height:20px;background:#fff;border:2px solid #000;border-radius:50%;transform:translate(-50%,-50%);animation:hitPulse .5s ease;pointer-events:none}@keyframes hitPulse{0%{transform:translate(-50%,-50%) scale(0);opacity:1}100%{transform:translate(-50%,-50%) scale(1);opacity:.5}}.score-display{background:linear-gradient(145deg,#FFD700,#FFA500);padding:1rem;border-radius:10px;text-align:center;font-size:1.5rem;font-weight:700;color:#1a0b2e;margin:1rem 0;border:3px solid #7B2CBF}.bet-controls{display:flex;gap:.5rem;margin:1rem 0;flex-wrap:wrap;justify-content:center}.bet-btn{padding:.75rem 1.5rem;border:2px solid #7B2CBF;background:#fff;color:#7B2CBF;border-radius:10px;cursor:pointer;font-weight:600;transition:all .3s ease}.bet-btn:hover{background:#7B2CBF;color:#fff}.bet-btn.active{background:linear-gradient(145deg,#7B2CBF,#9D4EDD);color:#fff;border-color:#FFD700}.shoot-btn{width:100%;padding:1.5rem;background:linear-gradient(145deg,#FFD700,#FFA500);border:4px solid #7B2CBF;border-radius:15px;font-size:1.5rem;font-weight:700;color:#1a0b2e;cursor:pointer;transition:all .3s ease;box-shadow:0 8px 25px rgba(255,215,0,.5)}.shoot-btn:hover:not(:disabled){transform:translateY(-3px);box-shadow:0 12px 35px rgba(255,215,0,.7)}.shoot-btn:disabled{opacity:.6;cursor:not-allowed}.game-stats{display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;margin-top:2rem}.stat-card{background:linear-gradient(145deg,#f8f9fa,#e9ecef);padding:1rem;border-radius:10px;text-align:center;border:2px solid #7B2CBF}.stat-value{font-size:1.5rem;font-weight:700;color:#7B2CBF}.stat-label{font-size:.9rem;color:#666;margin-top:.5rem}.result-notification{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%) scale(0);background:#fff;padding:3rem;border-radius:20px;box-shadow:0 20px 60px rgba(0,0,0,.5);z-index:1000;text-align:center;min-width:400px;transition:transform .3s ease}.result-notification.show{transform:translate(-50%,-50%) scale(1)}.result-notification.win{border:5px solid #28a745}.result-notification.lose{border:5px solid #dc3545}.overlay{position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,.7);z-index:999;display:none}.overlay.show{display:block}
</style>

<div class="game-container">
    <div class="game-card">
        <h1 class="text-center mb-4" style="color:#7B2CBF">
            <i class="bi bi-bullseye"></i> Winadda
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

        <div class="score-display">
            Shots Remaining: <span id="shotsLeft">5</span> | Current Score: <span id="currentScore">0</span>
        </div>

        <div class="game-area">
            <div class="target-board" id="targetBoard" onclick="shoot(event)">
                <div class="target-center"></div>
            </div>
        </div>

        <button class="shoot-btn" id="startBtn" onclick="startGame()">
            START GAME (5 Shots)
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
let balance=10000,currentBet=10,gameActive=!1,shotsLeft=0,currentScore=0,stats={games:0,wins:0,biggestWin:0};const audioContext=new(window.AudioContext||window.webkitAudioContext);function playSound(e){const t=audioContext.createOscillator(),a=audioContext.createGain();t.connect(a),a.connect(audioContext.destination),"shoot"===e?(t.frequency.value=800,a.gain.setValueAtTime(.3,audioContext.currentTime),a.gain.exponentialRampToValueAtTime(.01,audioContext.currentTime+.1),t.start(audioContext.currentTime),t.stop(audioContext.currentTime+.1)):"hit"===e?(t.frequency.value=1e3,a.gain.setValueAtTime(.3,audioContext.currentTime),a.gain.exponentialRampToValueAtTime(.01,audioContext.currentTime+.2),t.start(audioContext.currentTime),t.stop(audioContext.currentTime+.2)):"win"===e?(t.frequency.value=800,a.gain.setValueAtTime(.3,audioContext.currentTime),a.gain.exponentialRampToValueAtTime(.01,audioContext.currentTime+.5),t.start(audioContext.currentTime),t.stop(audioContext.currentTime+.5)):"lose"===e&&(t.frequency.value=200,a.gain.setValueAtTime(.2,audioContext.currentTime),a.gain.exponentialRampToValueAtTime(.01,audioContext.currentTime+.3),t.start(audioContext.currentTime),t.stop(audioContext.currentTime+.3))}function selectBet(e){gameActive||(playSound("shoot"),currentBet=e,document.querySelectorAll(".bet-btn").forEach(e=>e.classList.remove("active")),event.target.classList.add("active"))}function startGame(){if(currentBet>balance)return void alert("Insufficient balance!");gameActive=!0,balance-=currentBet,shotsLeft=5,currentScore=0,updateBalance(),updateDisplay(),document.getElementById("startBtn").disabled=!0,document.getElementById("targetBoard").style.cursor="crosshair"}function shoot(e){if(!gameActive)return;playSound("shoot");const t=e.currentTarget.getBoundingClientRect(),a=e.clientX-t.left,n=e.clientY-t.top,o=t.width/2,r=t.height/2,s=Math.sqrt(Math.pow(a-o,2)+Math.pow(n-r,2)),c=o,u=document.createElement("div");u.className="hit-marker",u.style.left=a+"px",u.style.top=n+"px",e.currentTarget.appendChild(u),setTimeout(()=>u.remove(),500);let d=0;s<30?(d=10,playSound("hit")):s<60?(d=8,playSound("hit")):s<100?(d=5,playSound("hit")):s<150?(d=3,playSound("hit")):s<c&&(d=1,playSound("hit")),currentScore+=d,shotsLeft--,updateDisplay(),0===shotsLeft&&endGame()}function endGame(){gameActive=!1,stats.games++;const e=Math.floor(currentScore/5);let t=0;e>=8?(t=currentBet*5,playSound("win")):e>=6?(t=currentBet*3,playSound("win")):e>=4?(t=currentBet*2,playSound("win")):e>=2?(t=currentBet,playSound("win")):playSound("lose"),t>0&&(balance+=t,stats.wins++,t>stats.biggestWin&&(stats.biggestWin=t)),updateBalance(),updateStats(),showNotification(t>0,currentScore,t),document.getElementById("startBtn").disabled=!1,document.getElementById("targetBoard").style.cursor="not-allowed",document.querySelectorAll(".hit-marker").forEach(e=>e.remove())}function showNotification(e,t,a){const n=document.getElementById("resultNotification"),o=document.getElementById("overlay"),r=document.getElementById("resultIcon"),s=document.getElementById("resultTitle"),c=document.getElementById("resultMessage");e?(n.className="result-notification win show",r.textContent="🎯",s.textContent="GREAT SHOOTING!",s.style.color="#28a745",c.innerHTML=`<h3>Total Score: ${t} points</h3><p style="font-size:2rem;color:#28a745;font-weight:700">+${a} coins</p>`):(n.className="result-notification lose show",r.textContent="😔",s.textContent="BETTER LUCK NEXT TIME",s.style.color="#dc3545",c.innerHTML=`<p>Score: ${t} points<br>Try again to win!</p>`),o.classList.add("show")}function closeNotification(){playSound("shoot"),document.getElementById("resultNotification").classList.remove("show"),document.getElementById("overlay").classList.remove("show")}function updateDisplay(){document.getElementById("shotsLeft").textContent=shotsLeft,document.getElementById("currentScore").textContent=currentScore}function updateBalance(){document.getElementById("balance").textContent=balance,balance<10&&(alert("Balance too low! Resetting to 10,000 coins."),balance=1e4,updateBalance())}function updateStats(){document.getElementById("totalGames").textContent=stats.games,document.getElementById("totalWins").textContent=stats.wins,document.getElementById("biggestWin").textContent=stats.biggestWin}document.getElementById("overlay").addEventListener("click",closeNotification);
</script>

<?php include('footer.php'); ?>