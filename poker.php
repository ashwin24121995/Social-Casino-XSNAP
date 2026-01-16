<?php include('header.php'); ?>
<style>
body{background:linear-gradient(135deg,#1a0b2e 0%,#2d1b4e 100%);min-height:100vh}.game-container{max-width:1100px;margin:2rem auto;padding:2rem}.game-card{background:#fff;border-radius:20px;padding:2rem;box-shadow:0 10px 40px rgba(0,0,0,.3)}.balance-display{background:linear-gradient(145deg,#7B2CBF,#9D4EDD);color:#fff;padding:1.5rem;border-radius:15px;text-align:center;margin-bottom:2rem;border:3px solid #FFD700}.poker-table{background:linear-gradient(145deg,#0a5f0a,#064206);border:5px solid #FFD700;border-radius:20px;padding:3rem;margin:2rem auto;box-shadow:0 20px 60px rgba(0,0,0,.5),inset 0 0 30px rgba(0,0,0,.3)}.cards-container{display:flex;gap:1rem;justify-content:center;margin:2rem 0;flex-wrap:wrap}.card{width:120px;height:170px;background:#fff;border:3px solid #333;border-radius:10px;display:flex;flex-direction:column;align-items:center;justify-content:space-between;padding:1rem;cursor:pointer;transition:all .3s ease;box-shadow:0 5px 15px rgba(0,0,0,.3);position:relative}.card:hover{transform:translateY(-10px);box-shadow:0 10px 25px rgba(0,0,0,.5)}.card.held{border-color:#FFD700;background:linear-gradient(145deg,#FFF9E6,#fff);transform:translateY(-15px);box-shadow:0 15px 30px rgba(255,215,0,.5)}.card.held::after{content:"HELD";position:absolute;top:-25px;left:50%;transform:translateX(-50%);background:#FFD700;color:#1a0b2e;padding:.3rem .8rem;border-radius:5px;font-weight:700;font-size:.8rem}.card-rank{font-size:2rem;font-weight:700}.card-suit{font-size:3rem}.card.red{color:#dc3545}.card.black{color:#000}.bet-controls{display:flex;gap:.5rem;margin:2rem 0;flex-wrap:wrap;justify-content:center}.bet-btn{padding:.75rem 1.5rem;border:2px solid #7B2CBF;background:#fff;color:#7B2CBF;border-radius:10px;cursor:pointer;font-weight:600;transition:all .3s ease}.bet-btn:hover{background:#7B2CBF;color:#fff}.bet-btn.active{background:linear-gradient(145deg,#7B2CBF,#9D4EDD);color:#fff;border-color:#FFD700}.deal-btn{padding:1.5rem 3rem;background:linear-gradient(145deg,#FFD700,#FFA500);border:4px solid #7B2CBF;border-radius:15px;font-size:1.5rem;font-weight:700;color:#1a0b2e;cursor:pointer;transition:all .3s ease;box-shadow:0 8px 25px rgba(255,215,0,.5);margin:1rem auto;display:block}.deal-btn:hover:not(:disabled){transform:translateY(-3px);box-shadow:0 12px 35px rgba(255,215,0,.7)}.deal-btn:disabled{opacity:.6;cursor:not-allowed}.hand-display{background:linear-gradient(145deg,#7B2CBF,#9D4EDD);color:#fff;padding:1rem;border-radius:10px;text-align:center;margin:1rem 0;font-size:1.5rem;font-weight:700;border:3px solid #FFD700}.paytable{background:linear-gradient(145deg,#f8f9fa,#e9ecef);border:3px solid #7B2CBF;border-radius:15px;padding:1.5rem;margin-top:2rem}.paytable-title{color:#7B2CBF;font-size:1.5rem;font-weight:700;text-align:center;margin-bottom:1rem}.paytable-row{display:flex;justify-content:space-between;padding:.5rem 1rem;border-bottom:1px solid #ddd}.paytable-row:last-child{border-bottom:none}.paytable-hand{font-weight:600}.paytable-payout{font-weight:700;color:#28a745}.game-stats{display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;margin-top:2rem}.stat-card{background:linear-gradient(145deg,#f8f9fa,#e9ecef);padding:1rem;border-radius:10px;text-align:center;border:2px solid #7B2CBF}.stat-value{font-size:1.5rem;font-weight:700;color:#7B2CBF}.stat-label{font-size:.9rem;color:#666;margin-top:.5rem}.result-notification{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%) scale(0);background:#fff;padding:3rem;border-radius:20px;box-shadow:0 20px 60px rgba(0,0,0,.5);z-index:1000;text-align:center;min-width:400px;transition:transform .3s ease}.result-notification.show{transform:translate(-50%,-50%) scale(1)}.result-notification.win{border:5px solid #28a745}.result-notification.lose{border:5px solid #dc3545}.overlay{position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,.7);z-index:999;display:none}.overlay.show{display:block}
</style>

<div class="game-container">
    <div class="game-card">
        <h1 class="text-center mb-4" style="color:#7B2CBF">
            <i class="bi bi-suit-spade-fill"></i> Video Poker
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

        <div class="poker-table">
            <div class="hand-display" id="handDisplay">Click DEAL to start!</div>
            
            <div class="cards-container" id="cardsContainer"></div>

            <button class="deal-btn" id="dealBtn" onclick="deal()">DEAL</button>
        </div>

        <div class="paytable">
            <div class="paytable-title">🃏 PAYTABLE 🃏</div>
            <div class="paytable-row">
                <div class="paytable-hand">Royal Flush</div>
                <div class="paytable-payout">250x</div>
            </div>
            <div class="paytable-row">
                <div class="paytable-hand">Straight Flush</div>
                <div class="paytable-payout">50x</div>
            </div>
            <div class="paytable-row">
                <div class="paytable-hand">Four of a Kind</div>
                <div class="paytable-payout">25x</div>
            </div>
            <div class="paytable-row">
                <div class="paytable-hand">Full House</div>
                <div class="paytable-payout">9x</div>
            </div>
            <div class="paytable-row">
                <div class="paytable-hand">Flush</div>
                <div class="paytable-payout">6x</div>
            </div>
            <div class="paytable-row">
                <div class="paytable-hand">Straight</div>
                <div class="paytable-payout">4x</div>
            </div>
            <div class="paytable-row">
                <div class="paytable-hand">Three of a Kind</div>
                <div class="paytable-payout">3x</div>
            </div>
            <div class="paytable-row">
                <div class="paytable-hand">Two Pair</div>
                <div class="paytable-payout">2x</div>
            </div>
            <div class="paytable-row">
                <div class="paytable-hand">Jacks or Better</div>
                <div class="paytable-payout">1x</div>
            </div>
        </div>

        <div class="game-stats">
            <div class="stat-card">
                <div class="stat-value" id="totalHands">0</div>
                <div class="stat-label">Total Hands</div>
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
let balance=10000,currentBet=10,gameState="deal",hand=[],heldCards=[],stats={hands:0,wins:0,biggestWin:0};const suits=["♠","♥","♦","♣"],ranks=["2","3","4","5","6","7","8","9","10","J","Q","K","A"],rankValues={2:2,3:3,4:4,5:5,6:6,7:7,8:8,9:9,10:10,J:11,Q:12,K:13,A:14},audioContext=new(window.AudioContext||window.webkitAudioContext);function playSound(e){const t=audioContext.createOscillator(),a=audioContext.createGain();t.connect(a),a.connect(audioContext.destination),"deal"===e?(t.frequency.value=500,a.gain.setValueAtTime(.2,audioContext.currentTime),a.gain.exponentialRampToValueAtTime(.01,audioContext.currentTime+.2),t.start(audioContext.currentTime),t.stop(audioContext.currentTime+.2)):"hold"===e?(t.frequency.value=600,a.gain.setValueAtTime(.2,audioContext.currentTime),a.gain.exponentialRampToValueAtTime(.01,audioContext.currentTime+.1),t.start(audioContext.currentTime),t.stop(audioContext.currentTime+.1)):"win"===e?(t.frequency.value=800,a.gain.setValueAtTime(.3,audioContext.currentTime),a.gain.exponentialRampToValueAtTime(.01,audioContext.currentTime+.5),t.start(audioContext.currentTime),t.stop(audioContext.currentTime+.5)):"lose"===e&&(t.frequency.value=200,a.gain.setValueAtTime(.2,audioContext.currentTime),a.gain.exponentialRampToValueAtTime(.01,audioContext.currentTime+.3),t.start(audioContext.currentTime),t.stop(audioContext.currentTime+.3))}function selectBet(e){"deal"===gameState&&(playSound("hold"),currentBet=e,document.querySelectorAll(".bet-btn").forEach(e=>e.classList.remove("active")),event.target.classList.add("active"))}function createDeck(){const e=[];for(const t of suits)for(const a of ranks)e.push({rank:a,suit:t});return e}function shuffleDeck(e){for(let t=e.length-1;t>0;t--){const a=Math.floor(Math.random()*(t+1));[e[t],e[a]]=[e[a],e[t]]}return e}function deal(){if("deal"===gameState){if(currentBet>balance)return void alert("Insufficient balance!");balance-=currentBet,updateBalance(),playSound("deal");const e=shuffleDeck(createDeck());hand=e.slice(0,5),heldCards=[],gameState="draw",document.getElementById("dealBtn").textContent="DRAW",document.getElementById("handDisplay").textContent="Select cards to HOLD, then click DRAW",displayHand()}else if("draw"===gameState){playSound("deal");const e=shuffleDeck(createDeck());let t=0;for(let a=0;a<5;a++)heldCards.includes(a)||(hand[a]=e[t++]);const a=evaluateHand(hand);stats.hands++,a.payout>0?(playSound("win"),balance+=currentBet*a.payout,stats.wins++,currentBet*a.payout>stats.biggestWin&&(stats.biggestWin=currentBet*a.payout),showNotification(!0,a.hand,currentBet*a.payout)):(playSound("lose"),showNotification(!1,a.hand,0)),updateBalance(),updateStats(),gameState="deal",heldCards=[],document.getElementById("dealBtn").textContent="DEAL"}}function displayHand(){const e=document.getElementById("cardsContainer");e.innerHTML="",hand.forEach((t,a)=>{const n=document.createElement("div");n.className="card "+("♥"===t.suit||"♦"===t.suit?"red":"black"),heldCards.includes(a)&&n.classList.add("held"),n.innerHTML=`<div class="card-rank">${t.rank}</div><div class="card-suit">${t.suit}</div><div class="card-rank">${t.rank}</div>`,n.onclick=()=>toggleHold(a),e.appendChild(n)})}function toggleHold(e){"draw"===gameState&&(playSound("hold"),heldCards.includes(e)?heldCards=heldCards.filter(t=>t!==e):heldCards.push(e),displayHand())}function evaluateHand(e){const t=e.map(e=>rankValues[e.rank]).sort((e,t)=>e-t),a=e.map(e=>e.suit),n=new Set(a).size===1,s=t.every((e,a)=>0===a||e===t[a-1]+1),d={};t.forEach(e=>{d[e]=(d[e]||0)+1});const r=Object.values(d).sort((e,t)=>t-e);if(n&&14===t[4]&&10===t[0])return{hand:"Royal Flush",payout:250};if(n&&s)return{hand:"Straight Flush",payout:50};if(4===r[0])return{hand:"Four of a Kind",payout:25};if(3===r[0]&&2===r[1])return{hand:"Full House",payout:9};if(n)return{hand:"Flush",payout:6};if(s)return{hand:"Straight",payout:4};if(3===r[0])return{hand:"Three of a Kind",payout:3};if(2===r[0]&&2===r[1])return{hand:"Two Pair",payout:2};if(2===r[0]){const e=Object.keys(d).find(e=>2===d[e]);if(e>=11)return{hand:"Jacks or Better",payout:1}}return{hand:"No Win",payout:0}}function showNotification(e,t,a){const n=document.getElementById("resultNotification"),s=document.getElementById("overlay"),d=document.getElementById("resultIcon"),r=document.getElementById("resultTitle"),o=document.getElementById("resultMessage");e?(n.className="result-notification win show",d.textContent="🎉",r.textContent="WINNER!",r.style.color="#28a745",o.innerHTML=`<h3>${t}</h3><p style="font-size:2rem;color:#28a745;font-weight:700">+${a} coins</p>`):(n.className="result-notification lose show",d.textContent="😔",r.textContent="NO WIN",r.style.color="#dc3545",o.innerHTML=`<p>${t}<br>Better luck next time!</p>`),s.classList.add("show"),displayHand()}function closeNotification(){playSound("hold"),document.getElementById("resultNotification").classList.remove("show"),document.getElementById("overlay").classList.remove("show"),document.getElementById("handDisplay").textContent="Click DEAL to start!",document.getElementById("cardsContainer").innerHTML=""}function updateBalance(){document.getElementById("balance").textContent=balance,balance<10&&(alert("Balance too low! Resetting to 10,000 coins."),balance=1e4,updateBalance())}function updateStats(){document.getElementById("totalHands").textContent=stats.hands,document.getElementById("totalWins").textContent=stats.wins,document.getElementById("biggestWin").textContent=stats.biggestWin}document.getElementById("overlay").addEventListener("click",closeNotification);
</script>

<?php include('footer.php'); ?>