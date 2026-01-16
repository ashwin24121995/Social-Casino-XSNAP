<?php include('header.php'); ?>
<style>
body{background:linear-gradient(135deg,#1a0b2e 0%,#2d1b4e 100%);min-height:100vh}.game-container{max-width:1200px;margin:2rem auto;padding:2rem}.game-card{background:#fff;border-radius:20px;padding:2rem;box-shadow:0 10px 40px rgba(0,0,0,.3)}.balance-display{background:linear-gradient(145deg,#7B2CBF,#9D4EDD);color:#fff;padding:1.5rem;border-radius:15px;text-align:center;margin-bottom:2rem;border:3px solid #FFD700}.roulette-container{display:grid;grid-template-columns:1fr 1fr;gap:2rem;margin:2rem 0}@media(max-width:768px){.roulette-container{grid-template-columns:1fr}}.wheel-section{background:linear-gradient(145deg,#0a5f0a,#064206);border:5px solid #FFD700;border-radius:20px;padding:2rem;box-shadow:0 20px 60px rgba(0,0,0,.5)}.wheel-container{width:400px;height:400px;margin:2rem auto;position:relative}.wheel{width:100%;height:100%;border-radius:50%;border:10px solid #FFD700;position:relative;transition:transform 4s cubic-bezier(.17,.67,.12,.99);box-shadow:0 0 40px rgba(255,215,0,.5),inset 0 0 30px rgba(0,0,0,.5)}.wheel.spinning{animation:spin 4s cubic-bezier(.17,.67,.12,.99) forwards}@keyframes spin{0%{transform:rotate(0deg)}100%{transform:rotate(1800deg)}}.wheel-number{position:absolute;width:30px;height:60px;top:50%;left:50%;transform-origin:center 200px;display:flex;align-items:flex-start;justify-content:center;font-weight:700;color:#fff;font-size:.9rem;text-shadow:0 0 5px rgba(0,0,0,.8)}.wheel-number.red{background:linear-gradient(180deg,#dc3545,#c82333)}.wheel-number.black{background:linear-gradient(180deg,#000,#1a1a1a)}.wheel-number.green{background:linear-gradient(180deg,#28a745,#1e7e34)}.wheel-center{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:80px;height:80px;background:linear-gradient(145deg,#FFD700,#FFA500);border-radius:50%;border:5px solid #7B2CBF;display:flex;align-items:center;justify-content:center;font-size:1.5rem;font-weight:700;color:#1a0b2e;box-shadow:0 5px 20px rgba(0,0,0,.5)}.wheel-pointer{position:absolute;top:-20px;left:50%;transform:translateX(-50%);width:0;height:0;border-left:15px solid transparent;border-right:15px solid transparent;border-top:30px solid #FFD700;z-index:10;filter:drop-shadow(0 5px 10px rgba(0,0,0,.5))}.betting-section{background:linear-gradient(145deg,#f8f9fa,#e9ecef);border:3px solid #7B2CBF;border-radius:20px;padding:2rem}.betting-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:.5rem;margin:1rem 0}.bet-number{padding:1rem;background:#fff;border:2px solid #7B2CBF;border-radius:10px;text-align:center;font-weight:700;cursor:pointer;transition:all .3s ease}.bet-number:hover{transform:scale(1.05);box-shadow:0 5px 15px rgba(123,44,191,.3)}.bet-number.red{color:#dc3545;border-color:#dc3545}.bet-number.black{color:#000;border-color:#000}.bet-number.green{color:#28a745;border-color:#28a745}.bet-number.selected{background:linear-gradient(145deg,#FFD700,#FFA500);transform:scale(1.05);box-shadow:0 5px 20px rgba(255,215,0,.5)}.special-bets{display:grid;grid-template-columns:repeat(2,1fr);gap:.5rem;margin-top:1rem}.special-bet{padding:1rem;background:linear-gradient(145deg,#7B2CBF,#9D4EDD);color:#fff;border:2px solid #FFD700;border-radius:10px;text-align:center;font-weight:700;cursor:pointer;transition:all .3s ease}.special-bet:hover{transform:translateY(-3px);box-shadow:0 8px 20px rgba(123,44,191,.5)}.special-bet.selected{background:linear-gradient(145deg,#FFD700,#FFA500);color:#1a0b2e}.bet-controls{display:flex;gap:.5rem;margin:1rem 0;flex-wrap:wrap}.bet-btn{padding:.75rem 1.5rem;border:2px solid #7B2CBF;background:#fff;color:#7B2CBF;border-radius:10px;cursor:pointer;font-weight:600;transition:all .3s ease}.bet-btn:hover{background:#7B2CBF;color:#fff}.bet-btn.active{background:linear-gradient(145deg,#7B2CBF,#9D4EDD);color:#fff;border-color:#FFD700}.spin-btn{width:100%;padding:1.5rem;background:linear-gradient(145deg,#FFD700,#FFA500);border:4px solid #7B2CBF;border-radius:15px;font-size:1.5rem;font-weight:700;color:#1a0b2e;cursor:pointer;transition:all .3s ease;box-shadow:0 8px 25px rgba(255,215,0,.5);margin-top:1rem}.spin-btn:hover:not(:disabled){transform:translateY(-3px);box-shadow:0 12px 35px rgba(255,215,0,.7)}.spin-btn:disabled{opacity:.6;cursor:not-allowed}.current-bet-display{background:linear-gradient(145deg,#7B2CBF,#9D4EDD);color:#fff;padding:1rem;border-radius:10px;text-align:center;margin:1rem 0;font-size:1.2rem;font-weight:700;border:3px solid #FFD700}.game-stats{display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;margin-top:2rem}.stat-card{background:linear-gradient(145deg,#f8f9fa,#e9ecef);padding:1rem;border-radius:10px;text-align:center;border:2px solid #7B2CBF}.stat-value{font-size:1.5rem;font-weight:700;color:#7B2CBF}.stat-label{font-size:.9rem;color:#666;margin-top:.5rem}.result-notification{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%) scale(0);background:#fff;padding:3rem;border-radius:20px;box-shadow:0 20px 60px rgba(0,0,0,.5);z-index:1000;text-align:center;min-width:400px;transition:transform .3s ease}.result-notification.show{transform:translate(-50%,-50%) scale(1)}.result-notification.win{border:5px solid #28a745}.result-notification.lose{border:5px solid #dc3545}.overlay{position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,.7);z-index:999;display:none}.overlay.show{display:block}.winning-number{font-size:4rem;font-weight:700;margin:1rem 0;text-shadow:0 0 20px rgba(0,0,0,.3)}
</style>

<div class="game-container">
    <div class="game-card">
        <h1 class="text-center mb-4" style="color:#7B2CBF">
            <i class="bi bi-circle-fill"></i> Roulette
        </h1>
        
        <div class="balance-display">
            <h3 class="mb-0">
                <i class="bi bi-coin"></i> Balance: <span id="balance">10000</span> Coins
            </h3>
        </div>

        <div class="roulette-container">
            <div class="wheel-section">
                <h4 class="text-center text-white mb-3">🎡 ROULETTE WHEEL 🎡</h4>
                <div class="wheel-container">
                    <div class="wheel-pointer"></div>
                    <div class="wheel" id="wheel">
                        <div class="wheel-center">XSNAP</div>
                    </div>
                </div>
            </div>

            <div class="betting-section">
                <h4 class="text-center mb-3" style="color:#7B2CBF">Place Your Bets</h4>
                
                <div class="text-center mb-2">
                    <strong>Bet Amount:</strong>
                </div>
                <div class="bet-controls">
                    <button class="bet-btn active" onclick="selectBetAmount(10)">10</button>
                    <button class="bet-btn" onclick="selectBetAmount(50)">50</button>
                    <button class="bet-btn" onclick="selectBetAmount(100)">100</button>
                    <button class="bet-btn" onclick="selectBetAmount(500)">500</button>
                </div>

                <div class="current-bet-display">
                    Current Bet: <span id="currentBetDisplay">0</span> coins
                </div>

                <div class="special-bets">
                    <div class="special-bet" onclick="placeBet('red')">🔴 RED (2x)</div>
                    <div class="special-bet" onclick="placeBet('black')">⚫ BLACK (2x)</div>
                    <div class="special-bet" onclick="placeBet('odd')">ODD (2x)</div>
                    <div class="special-bet" onclick="placeBet('even')">EVEN (2x)</div>
                    <div class="special-bet" onclick="placeBet('low')">1-18 (2x)</div>
                    <div class="special-bet" onclick="placeBet('high')">19-36 (2x)</div>
                </div>

                <div style="margin-top:1rem">
                    <strong class="d-block text-center mb-2">Or Pick a Number (35x):</strong>
                    <div class="betting-grid" id="numberGrid"></div>
                </div>

                <button class="spin-btn" id="spinBtn" onclick="spinWheel()">
                    <i class="bi bi-arrow-clockwise"></i> SPIN THE WHEEL
                </button>

                <button class="btn btn-danger w-100 mt-2" onclick="clearBets()">
                    Clear Bets
                </button>
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
        </div>
    </div>
</div>

<div class="overlay" id="overlay"></div>
<div class="result-notification" id="resultNotification">
    <div style="font-size:5rem;margin-bottom:1rem" id="resultIcon"></div>
    <h2 id="resultTitle"></h2>
    <div class="winning-number" id="winningNumber"></div>
    <p id="resultMessage"></p>
    <button class="btn btn-lg mt-3" style="background:linear-gradient(145deg,#7B2CBF,#9D4EDD);color:#fff;border:2px solid #FFD700" onclick="closeNotification()">
        Spin Again
    </button>
</div>

<script>
let balance=10000,betAmount=10,currentBets={},totalBet=0,isSpinning=!1,stats={spins:0,wins:0,biggestWin:0};const redNumbers=[1,3,5,7,9,12,14,16,18,19,21,23,25,27,30,32,34,36],numbers=[0,32,15,19,4,21,2,25,17,34,6,27,13,36,11,30,8,23,10,5,24,16,33,1,20,14,31,9,22,18,29,7,28,12,35,3,26],audioContext=new(window.AudioContext||window.webkitAudioContext);function playSound(e){const t=audioContext.createOscillator(),a=audioContext.createGain();t.connect(a),a.connect(audioContext.destination),"spin"===e?(t.frequency.value=300,a.gain.setValueAtTime(.1,audioContext.currentTime),a.gain.exponentialRampToValueAtTime(.01,audioContext.currentTime+.5),t.start(audioContext.currentTime),t.stop(audioContext.currentTime+.5)):"click"===e?(t.frequency.value=600,a.gain.setValueAtTime(.2,audioContext.currentTime),a.gain.exponentialRampToValueAtTime(.01,audioContext.currentTime+.05),t.start(audioContext.currentTime),t.stop(audioContext.currentTime+.05)):"win"===e?(t.frequency.value=800,a.gain.setValueAtTime(.3,audioContext.currentTime),a.gain.exponentialRampToValueAtTime(.01,audioContext.currentTime+.6),t.start(audioContext.currentTime),t.stop(audioContext.currentTime+.6)):"lose"===e&&(t.frequency.value=200,a.gain.setValueAtTime(.2,audioContext.currentTime),a.gain.exponentialRampToValueAtTime(.01,audioContext.currentTime+.4),t.start(audioContext.currentTime),t.stop(audioContext.currentTime+.4))}function initializeWheel(){const e=document.getElementById("wheel");for(let t=0;t<numbers.length;t++){const a=document.createElement("div");a.className="wheel-number "+(0===numbers[t]?"green":redNumbers.includes(numbers[t])?"red":"black"),a.textContent=numbers[t],a.style.transform=`rotate(${360/numbers.length*t}deg)`,e.appendChild(a)}}function initializeNumberGrid(){const e=document.getElementById("numberGrid");for(let t=0;t<=36;t++){const a=document.createElement("div");a.className="bet-number "+(0===t?"green":redNumbers.includes(t)?"red":"black"),a.textContent=t,a.onclick=()=>placeBet(t),e.appendChild(a)}}function selectBetAmount(e){isSpinning||(playSound("click"),betAmount=e,document.querySelectorAll(".bet-btn").forEach(e=>e.classList.remove("active")),event.target.classList.add("active"))}function placeBet(e){if(isSpinning)return;playSound("click"),currentBets[e]?(currentBets[e]+=betAmount,totalBet+=betAmount):(currentBets[e]=betAmount,totalBet+=betAmount),updateBetDisplay()}function clearBets(){isSpinning||(playSound("click"),currentBets={},totalBet=0,updateBetDisplay())}function updateBetDisplay(){document.getElementById("currentBetDisplay").textContent=totalBet,document.querySelectorAll(".bet-number, .special-bet").forEach(e=>{e.classList.remove("selected")});for(const e in currentBets){const t=document.querySelector(`[onclick*="${e}"]`);t&&t.classList.add("selected")}}async function spinWheel(){if(isSpinning||0===totalBet)return void(0===totalBet&&alert("Please place a bet first!"));if(totalBet>balance)return void alert("Insufficient balance!");isSpinning=!0,balance-=totalBet,updateBalance(),document.getElementById("spinBtn").disabled=!0,playSound("spin");const e=numbers[Math.floor(Math.random()*numbers.length)],t=numbers.indexOf(e),a=360/numbers.length*t+1800+Math.random()*10-5,n=document.getElementById("wheel");n.style.transform=`rotate(${a}deg)`,await new Promise(e=>setTimeout(e,4e3)),stats.spins++;let s=0;for(const t in currentBets){const a=currentBets[t];if(t==e)s+=35*a;else if("red"===t&&redNumbers.includes(e))s+=2*a;else if("black"===t&&!redNumbers.includes(e)&&0!==e)s+=2*a;else if("odd"===t&&e%2==1)s+=2*a;else if("even"===t&&e%2==0&&0!==e)s+=2*a;else if("low"===t&&e>=1&&e<=18)s+=2*a;else if("high"===t&&e>=19&&e<=36)s+=2*a}s>0?(playSound("win"),balance+=s,stats.wins++,s>stats.biggestWin&&(stats.biggestWin=s),showNotification(!0,e,s)):playSound("lose"),showNotification(!1,e,s),updateBalance(),updateStats(),currentBets={},totalBet=0,updateBetDisplay(),n.style.transform="rotate(0deg)",isSpinning=!1,document.getElementById("spinBtn").disabled=!1}function showNotification(e,t,a){const n=document.getElementById("resultNotification"),s=document.getElementById("overlay"),o=document.getElementById("resultIcon"),i=document.getElementById("resultTitle"),r=document.getElementById("winningNumber"),d=document.getElementById("resultMessage");r.textContent=t,r.style.color=0===t?"#28a745":redNumbers.includes(t)?"#dc3545":"#000",e?(n.className="result-notification win show",o.textContent="🎉",i.textContent="WINNER!",i.style.color="#28a745",d.innerHTML=`<p style="font-size:2rem;color:#28a745;font-weight:700">+${a} coins</p>`):(n.className="result-notification lose show",o.textContent="😔",i.textContent="NO WIN",i.style.color="#dc3545",d.innerHTML="<p>Better luck next time!</p>"),s.classList.add("show")}function closeNotification(){playSound("click"),document.getElementById("resultNotification").classList.remove("show"),document.getElementById("overlay").classList.remove("show")}function updateBalance(){document.getElementById("balance").textContent=balance,balance<10&&(alert("Balance too low! Resetting to 10,000 coins."),balance=1e4,updateBalance())}function updateStats(){document.getElementById("totalSpins").textContent=stats.spins,document.getElementById("totalWins").textContent=stats.wins,document.getElementById("biggestWin").textContent=stats.biggestWin}initializeWheel(),initializeNumberGrid(),document.getElementById("overlay").addEventListener("click",closeNotification);
</script>

<?php include('footer.php'); ?>