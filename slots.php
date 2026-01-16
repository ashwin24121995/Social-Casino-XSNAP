<?php include('header.php'); ?>
<style>
body{background:linear-gradient(135deg,#1a0b2e 0%,#2d1b4e 100%);min-height:100vh}
.game-container{max-width:1000px;margin:2rem auto;padding:2rem}
.game-card{background:#fff;border-radius:20px;padding:2rem;box-shadow:0 10px 40px rgba(0,0,0,.3)}
.balance-display{background:linear-gradient(145deg,#7B2CBF,#9D4EDD);color:#fff;padding:1.5rem;border-radius:15px;text-align:center;margin-bottom:2rem;border:3px solid #FFD700}
.slot-machine{background:linear-gradient(145deg,#2d1b4e,#1a0b2e);border:5px solid #FFD700;border-radius:20px;padding:3rem 2rem;margin:2rem auto;max-width:700px;box-shadow:0 20px 60px rgba(0,0,0,.5),inset 0 0 30px rgba(255,215,0,.2)}
.slot-header{text-align:center;color:#FFD700;font-size:2rem;font-weight:700;margin-bottom:2rem;text-shadow:0 0 20px rgba(255,215,0,.5)}
.reels-container{display:flex;gap:1rem;justify-content:center;margin:2rem 0;background:linear-gradient(145deg,#000,#1a0b2e);padding:2rem;border-radius:15px;border:3px solid #7B2CBF}
.reel{width:150px;height:450px;background:#fff;border:4px solid #FFD700;border-radius:10px;overflow:hidden;position:relative;box-shadow:inset 0 0 20px rgba(0,0,0,.3)}
.reel-strip{position:absolute;top:0;left:0;width:100%;transition:top 0.1s linear}
.reel.spinning .reel-strip{animation:spin 0.1s linear infinite}
@keyframes spin{from{top:0}to{top:-150px}}
.symbol{width:150px;height:150px;display:flex;align-items:center;justify-content:center;font-size:5rem;background:linear-gradient(145deg,#f8f9fa,#fff);border-bottom:2px solid #ddd;position:relative}
.symbol.winning{animation:symbolWin 0.5s ease infinite;background:linear-gradient(145deg,#FFD700,#FFA500)}
@keyframes symbolWin{0%,100%{transform:scale(1);box-shadow:0 0 20px #FFD700}50%{transform:scale(1.1);box-shadow:0 0 40px #FFD700}}
.reel-window{position:absolute;top:50%;left:0;right:0;transform:translateY(-50%);height:150px;border:4px solid #FF0000;pointer-events:none;z-index:10;box-shadow:0 0 30px rgba(255,0,0,.5)}
.payline{position:absolute;top:50%;left:-10px;right:-10px;height:4px;background:linear-gradient(90deg,transparent,#FF0000,#FF0000,transparent);transform:translateY(-50%);z-index:11;box-shadow:0 0 10px #FF0000}
.bet-controls{display:flex;gap:.5rem;margin:2rem 0;flex-wrap:wrap;justify-content:center}
.bet-btn{padding:.75rem 1.5rem;border:2px solid #7B2CBF;background:#fff;color:#7B2CBF;border-radius:10px;cursor:pointer;font-weight:600;transition:all .3s ease}
.bet-btn:hover{background:#7B2CBF;color:#fff;transform:translateY(-2px)}
.bet-btn.active{background:linear-gradient(145deg,#7B2CBF,#9D4EDD);color:#fff;border-color:#FFD700}
.spin-btn{width:200px;height:200px;border-radius:50%;background:linear-gradient(145deg,#FFD700,#FFA500);border:8px solid #7B2CBF;font-size:2rem;font-weight:700;color:#1a0b2e;cursor:pointer;transition:all .3s ease;box-shadow:0 10px 40px rgba(255,215,0,.5);margin:2rem auto;display:flex;align-items:center;justify-content:center;position:relative}
.spin-btn:hover:not(:disabled){transform:scale(1.05);box-shadow:0 15px 50px rgba(255,215,0,.7)}
.spin-btn:active:not(:disabled){transform:scale(0.95)}
.spin-btn:disabled{opacity:.6;cursor:not-allowed}
.spin-btn::before{content:'';position:absolute;inset:-15px;border-radius:50%;border:4px dashed #FFD700;animation:rotate 10s linear infinite}
@keyframes rotate{from{transform:rotate(0deg)}to{transform:rotate(360deg)}}
.paytable{background:linear-gradient(145deg,#f8f9fa,#e9ecef);border:3px solid #7B2CBF;border-radius:15px;padding:1.5rem;margin-top:2rem}
.paytable-title{color:#7B2CBF;font-size:1.5rem;font-weight:700;text-align:center;margin-bottom:1rem}
.paytable-row{display:flex;justify-content:space-between;padding:.5rem 1rem;border-bottom:1px solid #ddd}
.paytable-row:last-child{border-bottom:none}
.paytable-symbols{font-size:1.5rem}
.paytable-payout{font-weight:700;color:#28a745}
.game-stats{display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;margin-top:2rem}
.stat-card{background:linear-gradient(145deg,#f8f9fa,#e9ecef);padding:1rem;border-radius:10px;text-align:center;border:2px solid #7B2CBF}
.stat-value{font-size:1.5rem;font-weight:700;color:#7B2CBF}
.stat-label{font-size:.9rem;color:#666;margin-top:.5rem}
.result-notification{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%) scale(0);background:#fff;padding:3rem;border-radius:20px;box-shadow:0 20px 60px rgba(0,0,0,.5);z-index:1000;text-align:center;min-width:400px;transition:transform .3s ease}
.result-notification.show{transform:translate(-50%,-50%) scale(1)}
.result-notification.win{border:5px solid #28a745}
.result-notification.lose{border:5px solid #dc3545}
.overlay{position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,.7);z-index:999;display:none}
.overlay.show{display:block}
.jackpot-display{background:linear-gradient(145deg,#FF0000,#FF6B00);color:#fff;padding:1rem;border-radius:10px;text-align:center;margin-bottom:1rem;font-size:1.8rem;font-weight:700;border:3px solid #FFD700;animation:jackpotPulse 2s ease infinite}
@keyframes jackpotPulse{0%,100%{box-shadow:0 0 20px #FF0000}50%{box-shadow:0 0 40px #FF0000,0 0 60px #FFD700}}
.win-amount{font-size:3rem;color:#28a745;font-weight:700;text-shadow:0 0 20px rgba(40,167,69,.5);animation:winPulse 1s ease infinite}
@keyframes winPulse{0%,100%{transform:scale(1)}50%{transform:scale(1.1)}}
</style>

<div class="game-container">
    <div class="game-card">
        <h1 class="text-center mb-4" style="color:#7B2CBF">
            <i class="bi bi-dice-5-fill"></i> Slot Machine
        </h1>
        
        <div class="balance-display">
            <h3 class="mb-0">
                <i class="bi bi-coin"></i> Balance: <span id="balance">10000</span> Coins
            </h3>
        </div>

        <div class="jackpot-display">
            🎰 JACKPOT: <span id="jackpot">50000</span> COINS 🎰
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

        <div class="slot-machine">
            <div class="slot-header">🎰 LUCKY SLOTS 🎰</div>
            
            <div class="reels-container">
                <div class="reel" id="reel1">
                    <div class="reel-strip" id="strip1"></div>
                    <div class="reel-window"></div>
                    <div class="payline"></div>
                </div>
                <div class="reel" id="reel2">
                    <div class="reel-strip" id="strip2"></div>
                    <div class="reel-window"></div>
                    <div class="payline"></div>
                </div>
                <div class="reel" id="reel3">
                    <div class="reel-strip" id="strip3"></div>
                    <div class="reel-window"></div>
                    <div class="payline"></div>
                </div>
            </div>

            <button class="spin-btn" id="spinBtn" onclick="spin()">
                <span>SPIN</span>
            </button>
        </div>

        <div class="paytable">
            <div class="paytable-title">💰 PAYTABLE 💰</div>
            <div class="paytable-row">
                <div class="paytable-symbols">🍒 🍒 🍒</div>
                <div class="paytable-payout">5x Bet</div>
            </div>
            <div class="paytable-row">
                <div class="paytable-symbols">🍋 🍋 🍋</div>
                <div class="paytable-payout">10x Bet</div>
            </div>
            <div class="paytable-row">
                <div class="paytable-symbols">🍊 🍊 🍊</div>
                <div class="paytable-payout">15x Bet</div>
            </div>
            <div class="paytable-row">
                <div class="paytable-symbols">🍇 🍇 🍇</div>
                <div class="paytable-payout">20x Bet</div>
            </div>
            <div class="paytable-row">
                <div class="paytable-symbols">💎 💎 💎</div>
                <div class="paytable-payout">50x Bet</div>
            </div>
            <div class="paytable-row">
                <div class="paytable-symbols">🎰 🎰 🎰</div>
                <div class="paytable-payout">JACKPOT!</div>
            </div>
        </div>

        <div class="game-stats">
            <div class="stat-card">
                <div class="stat-value" id="totalSpins">0</div>
                <div class="stat-label">Total Spins</div>
            </div>
            <div class="stat-card">
                <div class="stat-value" id="totalWins">0</div>
                <div class="stat-label">Wins</div>
            </div>
            <div class="stat-card">
                <div class="stat-value" id="biggestWin">0</div>
                <div class="stat-label">Biggest Win</div>
            </div>
            <div class="stat-card">
                <div class="stat-value" id="jackpotHits">0</div>
                <div class="stat-label">Jackpots</div>
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
        Spin Again
    </button>
</div>

<script>
let balance=10000,currentBet=10,isSpinning=!1,jackpotAmount=5e4,stats={spins:0,wins:0,biggestWin:0,jackpots:0};const symbols=["🍒","🍋","🍊","🍇","💎","🎰"],payouts={🍒:5,🍋:10,🍊:15,🍇:20,💎:50,🎰:"JACKPOT"},audioContext=new(window.AudioContext||window.webkitAudioContext);function playSound(e){const t=audioContext.createOscillator(),a=audioContext.createGain();t.connect(a),a.connect(audioContext.destination),"spin"===e?(t.frequency.value=400,a.gain.setValueAtTime(.1,audioContext.currentTime),a.gain.exponentialRampToValueAtTime(.01,audioContext.currentTime+.3),t.start(audioContext.currentTime),t.stop(audioContext.currentTime+.3)):"stop"===e?(t.frequency.value=600,a.gain.setValueAtTime(.2,audioContext.currentTime),a.gain.exponentialRampToValueAtTime(.01,audioContext.currentTime+.1),t.start(audioContext.currentTime),t.stop(audioContext.currentTime+.1)):"win"===e?(t.frequency.value=800,a.gain.setValueAtTime(.3,audioContext.currentTime),a.gain.exponentialRampToValueAtTime(.01,audioContext.currentTime+.5),t.start(audioContext.currentTime),t.stop(audioContext.currentTime+.5)):"jackpot"===e?[0,1,2,3,4].forEach(e=>{const t=audioContext.createOscillator(),n=audioContext.createGain();t.connect(n),n.connect(audioContext.destination),t.frequency.value=800+200*e,n.gain.setValueAtTime(.2,audioContext.currentTime+.1*e),n.gain.exponentialRampToValueAtTime(.01,audioContext.currentTime+.1*e+.3),t.start(audioContext.currentTime+.1*e),t.stop(audioContext.currentTime+.1*e+.3)}):"lose"===e&&(t.frequency.value=200,a.gain.setValueAtTime(.2,audioContext.currentTime),a.gain.exponentialRampToValueAtTime(.01,audioContext.currentTime+.3),t.start(audioContext.currentTime),t.stop(audioContext.currentTime+.3))}function selectBet(e){isSpinning||(playSound("stop"),currentBet=e,document.querySelectorAll(".bet-btn").forEach(e=>e.classList.remove("active")),event.target.classList.add("active"))}function initializeReels(){for(let e=1;e<=3;e++){const t=document.getElementById(`strip${e}`);t.innerHTML="";for(let e=0;e<20;e++){const e=document.createElement("div");e.className="symbol",e.textContent=symbols[Math.floor(Math.random()*symbols.length)],t.appendChild(e)}}}async function spin(){if(isSpinning||currentBet>balance)return void(currentBet>balance&&alert("Insufficient balance!"));isSpinning=!0,document.getElementById("spinBtn").disabled=!0,balance-=currentBet,updateBalance(),stats.spins++,playSound("spin");for(let e=1;e<=3;e++)document.getElementById(`reel${e}`).classList.add("spinning");const e=[symbols[Math.floor(Math.random()*symbols.length)],symbols[Math.floor(Math.random()*symbols.length)],symbols[Math.floor(Math.random()*symbols.length)]];for(let t=1;t<=3;t++)await new Promise(e=>setTimeout(e,1e3+500*t)),stopReel(t,e[t-1]),playSound("stop");await new Promise(e=>setTimeout(e,500)),checkWin(e)}function stopReel(e,t){const a=document.getElementById(`reel${e}`),n=document.getElementById(`strip${e}`);a.classList.remove("spinning"),n.innerHTML="";for(let e=0;e<7;e++){const e=document.createElement("div");e.className="symbol",e.textContent=symbols[Math.floor(Math.random()*symbols.length)],n.appendChild(e)}const o=document.createElement("div");o.className="symbol",o.textContent=t,o.dataset.target="true",n.appendChild(o);for(let e=0;e<12;e++){const e=document.createElement("div");e.className="symbol",e.textContent=symbols[Math.floor(Math.random()*symbols.length)],n.appendChild(e)}n.style.top="-1050px"}function checkWin(e){const[t,a,n]=e;if(t===a&&a===n){document.querySelectorAll('[data-target="true"]').forEach(e=>{e.classList.add("winning")});const e=payouts[t];if("JACKPOT"===e){playSound("jackpot");const e=jackpotAmount;balance+=e,stats.jackpots++,jackpotAmount=5e4,document.getElementById("jackpot").textContent=jackpotAmount,showNotification(!0,e,!0)}else{playSound("win");const a=currentBet*e;balance+=a,stats.wins++,a>stats.biggestWin&&(stats.biggestWin=a),jackpotAmount+=Math.floor(.1*currentBet),document.getElementById("jackpot").textContent=jackpotAmount,showNotification(!0,a,!1)}}else playSound("lose"),jackpotAmount+=Math.floor(.1*currentBet),document.getElementById("jackpot").textContent=jackpotAmount,showNotification(!1,0,!1);updateBalance(),updateStats()}function showNotification(e,t,a){const n=document.getElementById("resultNotification"),o=document.getElementById("overlay"),s=document.getElementById("resultIcon"),i=document.getElementById("resultTitle"),c=document.getElementById("resultMessage");e?(n.className="result-notification win show",a?(s.textContent="🎰",i.textContent="🎉 JACKPOT! 🎉",i.style.color="#FF0000",c.innerHTML=`<div class="win-amount">💰 ${t} COINS 💰</div><p>YOU HIT THE JACKPOT!</p>`):(s.textContent="🎉",i.textContent="BIG WIN!",i.style.color="#28a745",c.innerHTML=`<div class="win-amount">+${t} coins</div><p>Three of a kind!</p>`)):(n.className="result-notification lose show",s.textContent="😔",i.textContent="TRY AGAIN",i.style.color="#dc3545",c.innerHTML="<p>No match this time.<br>Keep spinning!</p>"),o.classList.add("show")}function closeNotification(){playSound("stop"),document.getElementById("resultNotification").classList.remove("show"),document.getElementById("overlay").classList.remove("show"),document.querySelectorAll(".symbol").forEach(e=>e.classList.remove("winning")),isSpinning=!1,document.getElementById("spinBtn").disabled=!1}function updateBalance(){document.getElementById("balance").textContent=balance,balance<10&&(alert("Balance too low! Resetting to 10,000 coins."),balance=1e4,updateBalance())}function updateStats(){document.getElementById("totalSpins").textContent=stats.spins,document.getElementById("totalWins").textContent=stats.wins,document.getElementById("biggestWin").textContent=stats.biggestWin,document.getElementById("jackpotHits").textContent=stats.jackpots}initializeReels(),document.getElementById("overlay").addEventListener("click",closeNotification);
</script>

<?php include('footer.php'); ?>
