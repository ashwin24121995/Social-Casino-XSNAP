<?php include('header.php'); ?>

<style>
body {
  background: linear-gradient(135deg, #1a0b2e 0%, #2d1b4e 100%);
  min-height: 100vh;
}

.game-container {
  max-width: 800px;
  margin: 2rem auto;
  padding: 2rem;
}

.game-card {
  background: white;
  border-radius: 20px;
  padding: 2rem;
  box-shadow: 0 10px 40px rgba(0,0,0,0.3);
}

.balance-display {
  background: linear-gradient(145deg, #7B2CBF, #9D4EDD);
  color: white;
  padding: 1.5rem;
  border-radius: 15px;
  text-align: center;
  margin-bottom: 2rem;
  border: 3px solid #FFD700;
}

.dice-container {
  display: flex;
  justify-content: center;
  gap: 2rem;
  margin: 3rem 0;
  min-height: 150px;
  align-items: center;
}

.dice {
  width: 120px;
  height: 120px;
  background: linear-gradient(145deg, #ffffff, #f0f0f0);
  border-radius: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 4rem;
  box-shadow: 0 8px 20px rgba(0,0,0,0.2);
  transition: transform 0.3s ease;
  border: 3px solid #FFD700;
}

.dice.rolling {
  animation: roll 0.5s ease-in-out infinite;
}

@keyframes roll {
  0%, 100% { transform: rotate(0deg) scale(1); }
  25% { transform: rotate(90deg) scale(1.1); }
  50% { transform: rotate(180deg) scale(1); }
  75% { transform: rotate(270deg) scale(1.1); }
}

.bet-controls {
  display: flex;
  gap: 1rem;
  margin-bottom: 2rem;
  flex-wrap: wrap;
  justify-content: center;
}

.bet-btn {
  padding: 0.75rem 1.5rem;
  border: 2px solid #7B2CBF;
  background: white;
  color: #7B2CBF;
  border-radius: 10px;
  cursor: pointer;
  font-weight: 600;
  transition: all 0.3s ease;
}

.bet-btn:hover {
  background: #7B2CBF;
  color: white;
  transform: translateY(-2px);
}

.bet-btn.active {
  background: linear-gradient(145deg, #7B2CBF, #9D4EDD);
  color: white;
  border-color: #FFD700;
}

.roll-btn {
  width: 100%;
  padding: 1.5rem;
  background: linear-gradient(145deg, #7B2CBF, #9D4EDD);
  color: white;
  border: 3px solid #FFD700;
  border-radius: 15px;
  font-size: 1.5rem;
  font-weight: 700;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 6px 20px rgba(123, 44, 191, 0.4);
}

.roll-btn:hover:not(:disabled) {
  transform: translateY(-3px);
  box-shadow: 0 10px 30px rgba(123, 44, 191, 0.6);
}

.roll-btn:disabled {
  opacity: 0.6;
  cursor: not-allowed;
}

.result-notification {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) scale(0);
  background: white;
  padding: 3rem;
  border-radius: 20px;
  box-shadow: 0 20px 60px rgba(0,0,0,0.5);
  z-index: 1000;
  text-align: center;
  min-width: 300px;
  transition: transform 0.3s ease;
}

.result-notification.show {
  transform: translate(-50%, -50%) scale(1);
}

.result-notification.win {
  border: 5px solid #28a745;
}

.result-notification.lose {
  border: 5px solid #dc3545;
}

.result-icon {
  font-size: 5rem;
  margin-bottom: 1rem;
}

.overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.7);
  z-index: 999;
  display: none;
}

.overlay.show {
  display: block;
}

.prediction-section {
  margin: 2rem 0;
  text-align: center;
}

.prediction-btn {
  padding: 1rem 2rem;
  margin: 0.5rem;
  background: white;
  border: 3px solid #7B2CBF;
  border-radius: 15px;
  font-size: 1.2rem;
  font-weight: 600;
  color: #7B2CBF;
  cursor: pointer;
  transition: all 0.3s ease;
}

.prediction-btn:hover {
  background: #7B2CBF;
  color: white;
  transform: scale(1.05);
}

.prediction-btn.selected {
  background: linear-gradient(145deg, #7B2CBF, #9D4EDD);
  color: white;
  border-color: #FFD700;
}

.game-stats {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1rem;
  margin-top: 2rem;
}

.stat-card {
  background: linear-gradient(145deg, #f8f9fa, #e9ecef);
  padding: 1rem;
  border-radius: 10px;
  text-align: center;
  border: 2px solid #7B2CBF;
}

.stat-value {
  font-size: 1.5rem;
  font-weight: 700;
  color: #7B2CBF;
}

.stat-label {
  font-size: 0.9rem;
  color: #666;
  margin-top: 0.5rem;
}
</style>

<div class="game-container">
  <div class="game-card">
    <h1 class="text-center mb-4" style="color: #7B2CBF;">
      <i class="bi bi-dice-5"></i> Dice Game
    </h1>
    
    <div class="balance-display">
      <h3 class="mb-0">
        <i class="bi bi-coin"></i> Balance: <span id="balance">10000</span> Coins
      </h3>
    </div>
    
    <div class="text-center mb-3">
      <h5 style="color: #7B2CBF;">Select Bet Amount:</h5>
    </div>
    <div class="bet-controls">
      <button class="bet-btn active" onclick="selectBet(10)">10 Coins</button>
      <button class="bet-btn" onclick="selectBet(50)">50 Coins</button>
      <button class="bet-btn" onclick="selectBet(100)">100 Coins</button>
      <button class="bet-btn" onclick="selectBet(500)">500 Coins</button>
      <button class="bet-btn" onclick="selectBet(1000)">1000 Coins</button>
    </div>
    
    <div class="prediction-section">
      <h5 style="color: #7B2CBF; margin-bottom: 1rem;">Predict the Total:</h5>
      <button class="prediction-btn" onclick="selectPrediction('under7')" id="pred-under7">
        Under 7 (2x)
      </button>
      <button class="prediction-btn" onclick="selectPrediction('seven')" id="pred-seven">
        Lucky 7 (5x)
      </button>
      <button class="prediction-btn" onclick="selectPrediction('over7')" id="pred-over7">
        Over 7 (2x)
      </button>
    </div>
    
    <div class="dice-container">
      <div class="dice" id="dice1">🎲</div>
      <div class="dice" id="dice2">🎲</div>
    </div>
    
    <button class="roll-btn" id="rollBtn" onclick="rollDice()" disabled>
      <i class="bi bi-play-circle-fill"></i> Roll the Dice!
    </button>
    
    <div class="game-stats">
      <div class="stat-card">
        <div class="stat-value" id="totalGames">0</div>
        <div class="stat-label">Total Games</div>
      </div>
      <div class="stat-card">
        <div class="stat-value" id="totalWins">0</div>
        <div class="stat-label">Wins</div>
      </div>
      <div class="stat-card">
        <div class="stat-value" id="totalLosses">0</div>
        <div class="stat-label">Losses</div>
      </div>
    </div>
  </div>
</div>

<div class="overlay" id="overlay"></div>
<div class="result-notification" id="resultNotification">
  <div class="result-icon" id="resultIcon"></div>
  <h2 id="resultTitle"></h2>
  <p id="resultMessage"></p>
  <button class="btn btn-lg mt-3" style="background: linear-gradient(145deg, #7B2CBF, #9D4EDD); color: white; border: 2px solid #FFD700;" onclick="closeNotification()">
    Play Again
  </button>
</div>

<script>
let balance = 10000;
let currentBet = 10;
let currentPrediction = null;
let isRolling = false;
let stats = { games: 0, wins: 0, losses: 0 };

const diceFaces = ['⚀', '⚁', '⚂', '⚃', '⚄', '⚅'];

const audioContext = new (window.AudioContext || window.webkitAudioContext)();

function playSound(type) {
  const oscillator = audioContext.createOscillator();
  const gainNode = audioContext.createGain();
  
  oscillator.connect(gainNode);
  gainNode.connect(audioContext.destination);
  
  if (type === 'roll') {
    oscillator.frequency.value = 400;
    gainNode.gain.setValueAtTime(0.3, audioContext.currentTime);
    gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.1);
    oscillator.start(audioContext.currentTime);
    oscillator.stop(audioContext.currentTime + 0.1);
  } else if (type === 'win') {
    oscillator.frequency.value = 800;
    gainNode.gain.setValueAtTime(0.3, audioContext.currentTime);
    gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.5);
    oscillator.start(audioContext.currentTime);
    oscillator.stop(audioContext.currentTime + 0.5);
  } else if (type === 'lose') {
    oscillator.frequency.value = 200;
    gainNode.gain.setValueAtTime(0.3, audioContext.currentTime);
    gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.3);
    oscillator.start(audioContext.currentTime);
    oscillator.stop(audioContext.currentTime + 0.3);
  } else if (type === 'click') {
    oscillator.frequency.value = 600;
    gainNode.gain.setValueAtTime(0.2, audioContext.currentTime);
    gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.05);
    oscillator.start(audioContext.currentTime);
    oscillator.stop(audioContext.currentTime + 0.05);
  }
}

function selectBet(amount) {
  if (isRolling) return;
  playSound('click');
  currentBet = amount;
  
  document.querySelectorAll('.bet-btn').forEach(btn => {
    btn.classList.remove('active');
  });
  event.target.classList.add('active');
  
  updateRollButton();
}

function selectPrediction(type) {
  if (isRolling) return;
  playSound('click');
  currentPrediction = type;
  
  document.querySelectorAll('.prediction-btn').forEach(btn => {
    btn.classList.remove('selected');
  });
  document.getElementById('pred-' + type).classList.add('selected');
  
  updateRollButton();
}

function updateRollButton() {
  const rollBtn = document.getElementById('rollBtn');
  if (currentPrediction && currentBet <= balance) {
    rollBtn.disabled = false;
  } else {
    rollBtn.disabled = true;
  }
}

async function rollDice() {
  if (isRolling || !currentPrediction || currentBet > balance) return;
  
  isRolling = true;
  document.getElementById('rollBtn').disabled = true;
  
  balance -= currentBet;
  updateBalance();
  
  const dice1 = document.getElementById('dice1');
  const dice2 = document.getElementById('dice2');
  
  dice1.classList.add('rolling');
  dice2.classList.add('rolling');
  
  playSound('roll');
  
  let rollCount = 0;
  const rollInterval = setInterval(() => {
    dice1.textContent = diceFaces[Math.floor(Math.random() * 6)];
    dice2.textContent = diceFaces[Math.floor(Math.random() * 6)];
    playSound('roll');
    rollCount++;
    
    if (rollCount >= 10) {
      clearInterval(rollInterval);
      finishRoll();
    }
  }, 100);
}

function finishRoll() {
  const result1 = Math.floor(Math.random() * 6) + 1;
  const result2 = Math.floor(Math.random() * 6) + 1;
  const total = result1 + result2;
  
  const dice1 = document.getElementById('dice1');
  const dice2 = document.getElementById('dice2');
  
  dice1.textContent = diceFaces[result1 - 1];
  dice2.textContent = diceFaces[result2 - 1];
  
  dice1.classList.remove('rolling');
  dice2.classList.remove('rolling');
  
  let won = false;
  let multiplier = 0;
  
  if (currentPrediction === 'under7' && total < 7) {
    won = true;
    multiplier = 2;
  } else if (currentPrediction === 'seven' && total === 7) {
    won = true;
    multiplier = 5;
  } else if (currentPrediction === 'over7' && total > 7) {
    won = true;
    multiplier = 2;
  }
  
  stats.games++;
  if (won) {
    stats.wins++;
    const winAmount = currentBet * multiplier;
    balance += winAmount;
    playSound('win');
    showNotification(true, total, winAmount);
  } else {
    stats.losses++;
    playSound('lose');
    showNotification(false, total, currentBet);
  }
  
  updateBalance();
  updateStats();
  
  setTimeout(() => {
    isRolling = false;
    updateRollButton();
  }, 500);
}

function showNotification(won, total, amount) {
  const notification = document.getElementById('resultNotification');
  const overlay = document.getElementById('overlay');
  const icon = document.getElementById('resultIcon');
  const title = document.getElementById('resultTitle');
  const message = document.getElementById('resultMessage');
  
  if (won) {
    notification.className = 'result-notification win show';
    icon.textContent = '🎉';
    title.textContent = 'YOU WON!';
    title.style.color = '#28a745';
    message.innerHTML = `<strong>Dice Total: ${total}</strong><br>You won <strong>${amount} coins</strong>!`;
  } else {
    notification.className = 'result-notification lose show';
    icon.textContent = '😔';
    title.textContent = 'YOU LOST';
    title.style.color = '#dc3545';
    message.innerHTML = `<strong>Dice Total: ${total}</strong><br>You lost <strong>${amount} coins</strong>`;
  }
  
  overlay.classList.add('show');
}

function closeNotification() {
  playSound('click');
  document.getElementById('resultNotification').classList.remove('show');
  document.getElementById('overlay').classList.remove('show');
}

function updateBalance() {
  document.getElementById('balance').textContent = balance;
  
  if (balance < currentBet) {
    alert('Insufficient balance! Resetting to 10,000 coins.');
    balance = 10000;
    updateBalance();
  }
}

function updateStats() {
  document.getElementById('totalGames').textContent = stats.games;
  document.getElementById('totalWins').textContent = stats.wins;
  document.getElementById('totalLosses').textContent = stats.losses;
}

document.getElementById('overlay').addEventListener('click', closeNotification);
</script>

<?php include('footer.php'); ?>
