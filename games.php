<?php include 'header.php'; ?>

<style>
body {
    background: linear-gradient(135deg, #1a0b2e 0%, #2d1b4e 100%);
    min-height: 100vh;
}

.games-hero {
    background: linear-gradient(135deg, #7B2CBF 0%, #9D4EDD 100%);
    padding: 4rem 0;
    text-align: center;
    color: white;
    border-bottom: 5px solid #FFD700;
    margin-bottom: 3rem;
}

.games-hero h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1rem;
    text-shadow: 0 4px 10px rgba(0,0,0,0.3);
}

.games-hero p {
    font-size: 1.2rem;
    opacity: 0.95;
    max-width: 700px;
    margin: 0 auto;
}

.games-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
}

.section-title {
    color: #FFD700;
    font-size: 2rem;
    font-weight: 700;
    margin: 3rem 0 2rem 0;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.games-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.game-card {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    transition: all 0.3s ease;
    border: 3px solid transparent;
}

.game-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(123, 44, 191, 0.4);
    border-color: #FFD700;
}

.game-icon {
    font-size: 4rem;
    text-align: center;
    margin-bottom: 1rem;
}

.game-title {
    color: #7B2CBF;
    font-size: 1.8rem;
    font-weight: 700;
    text-align: center;
    margin-bottom: 1rem;
}

.game-description {
    color: #666;
    text-align: center;
    margin-bottom: 1.5rem;
    line-height: 1.6;
}

.game-features {
    background: linear-gradient(145deg, #f8f9fa, #e9ecef);
    border-radius: 10px;
    padding: 1rem;
    margin-bottom: 1.5rem;
}

.game-features ul {
    margin: 0;
    padding-left: 1.5rem;
    color: #333;
}

.game-features li {
    margin-bottom: 0.5rem;
}

.play-btn {
    display: block;
    width: 100%;
    padding: 1rem;
    background: linear-gradient(145deg, #7B2CBF, #9D4EDD);
    color: white;
    text-decoration: none;
    text-align: center;
    border-radius: 10px;
    font-weight: 700;
    font-size: 1.1rem;
    border: 3px solid #FFD700;
    transition: all 0.3s ease;
}

.play-btn:hover {
    background: linear-gradient(145deg, #FFD700, #FFA500);
    color: #1a0b2e;
    transform: scale(1.05);
}

.coming-soon-badge {
    display: inline-block;
    background: linear-gradient(145deg, #FFD700, #FFA500);
    color: #1a0b2e;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-weight: 700;
    font-size: 0.9rem;
    margin-bottom: 1rem;
}

@media (max-width: 768px) {
    .games-hero h1 {
        font-size: 2rem;
    }
    
    .games-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="games-hero">
    <div class="container">
        <h1>🎰 All Casino Games 🎰</h1>
        <p>Explore our complete collection of exciting social casino games. Play for fun with virtual coins - no real money involved!</p>
    </div>
</div>

<div class="games-container">
    
    <!-- Featured Games Section -->
    <h2 class="section-title">⭐ Featured Games</h2>
    
    <div class="games-grid">
        
        <!-- Slots -->
        <div class="game-card">
            <div class="game-icon">🎰</div>
            <h3 class="game-title">Slots Machine</h3>
            <p class="game-description">Classic 3-reel slot machine with exciting symbols and a progressive jackpot system!</p>
            <div class="game-features">
                <ul>
                    <li>3 spinning reels</li>
                    <li>6 colorful symbols</li>
                    <li>Progressive jackpot</li>
                    <li>Payouts up to 50x</li>
                </ul>
            </div>
            <a href="slots.php" class="play-btn">Play Now</a>
        </div>

        <!-- Poker -->
        <div class="game-card">
            <div class="game-icon">🃏</div>
            <h3 class="game-title">Video Poker</h3>
            <p class="game-description">5-card draw poker with professional hand evaluation and big payouts!</p>
            <div class="game-features">
                <ul>
                    <li>5-card draw gameplay</li>
                    <li>Hold & draw strategy</li>
                    <li>Royal Flush: 250x</li>
                    <li>9 winning hands</li>
                </ul>
            </div>
            <a href="poker.php" class="play-btn">Play Now</a>
        </div>

        <!-- Roulette -->
        <div class="game-card">
            <div class="game-icon">🎡</div>
            <h3 class="game-title">Roulette</h3>
            <p class="game-description">Spin the wheel and bet on numbers, colors, or odds/evens in this classic casino game!</p>
            <div class="game-features">
                <ul>
                    <li>European roulette (0-36)</li>
                    <li>Multiple bet types</li>
                    <li>Animated wheel spin</li>
                    <li>Up to 35x payout</li>
                </ul>
            </div>
            <a href="roulette.php" class="play-btn">Play Now</a>
        </div>

    </div>

    <!-- Classic Games Section -->
    <h2 class="section-title">🎲 Classic Games</h2>
    
    <div class="games-grid">
        
        <!-- Dice -->
        <div class="game-card">
            <div class="game-icon">🎲</div>
            <h3 class="game-title">Dice</h3>
            <p class="game-description">Roll two dice and predict the outcome - Under 7, Lucky 7, or Over 7!</p>
            <div class="game-features">
                <ul>
                    <li>Two animated dice</li>
                    <li>3 prediction options</li>
                    <li>Lucky 7: 5x payout</li>
                    <li>Fast-paced gameplay</li>
                </ul>
            </div>
            <a href="dice.php" class="play-btn">Play Now</a>
        </div>

        <!-- Mines -->
        <div class="game-card">
            <div class="game-icon">💎</div>
            <h3 class="game-title">Mines</h3>
            <p class="game-description">Navigate a 5x5 grid to find gems while avoiding hidden mines!</p>
            <div class="game-features">
                <ul>
                    <li>5x5 grid with 3 mines</li>
                    <li>22 gems to discover</li>
                    <li>Progressive multiplier</li>
                    <li>Cash out anytime</li>
                </ul>
            </div>
            <a href="mines.php" class="play-btn">Play Now</a>
        </div>

        <!-- Chicken -->
        <div class="game-card">
            <div class="game-icon">🐔</div>
            <h3 class="game-title">Chicken</h3>
            <p class="game-description">Find chickens in the grid while avoiding bones in this exciting reveal game!</p>
            <div class="game-features">
                <ul>
                    <li>5x5 grid with 5 bones</li>
                    <li>20 chickens to find</li>
                    <li>Progressive rewards</li>
                    <li>Risk management</li>
                </ul>
            </div>
            <a href="chicken.php" class="play-btn">Play Now</a>
        </div>

    </div>

    <!-- New Games Section -->
    <h2 class="section-title">🆕 New Games</h2>
    
    <div class="games-grid">
        
        <!-- Winadda -->
        <div class="game-card">
            <div class="game-icon">🎯</div>
            <h3 class="game-title">Winadda</h3>

            <p class="game-description">An exciting new target-based game where precision meets luck!</p>
            <div class="game-features">
                <ul>
                    <li>Target shooting gameplay</li>
                    <li>Multiple difficulty levels</li>
                    <li>Bonus multipliers</li>
                    <li>Skill-based rewards</li>
                </ul>
            </div>
            <a href="winadda.php" class="play-btn">Play Now</a>
        </div>

        <!-- Fairdeal -->
        <div class="game-card">
            <div class="game-icon">🎴</div>
            <h3 class="game-title">Fairdeal</h3>

            <p class="game-description">A fair card dealing game where strategy and luck combine!</p>
            <div class="game-features">
                <ul>
                    <li>Strategic card selection</li>
                    <li>Fair dealing system</li>
                    <li>Multiple betting options</li>
                    <li>High payout potential</li>
                </ul>
            </div>
            <a href="fairdeal.php" class="play-btn">Play Now</a>
        </div>

        <!-- 99exch -->
        <div class="game-card">
            <div class="game-icon">💰</div>
            <h3 class="game-title">99exch</h3>

            <p class="game-description">Exchange and multiply your coins in this fast-paced trading game!</p>
            <div class="game-features">
                <ul>
                    <li>Coin exchange mechanics</li>
                    <li>Market-style gameplay</li>
                    <li>Quick rounds</li>
                    <li>High volatility rewards</li>
                </ul>
            </div>
            <a href="99exch.php" class="play-btn">Play Now</a>
        </div>

        <!-- Laser 247 -->
        <div class="game-card">
            <div class="game-icon">⚡</div>
            <h3 class="game-title">Laser 247</h3>

            <p class="game-description">24/7 action with laser-fast gameplay and instant results!</p>
            <div class="game-features">
                <ul>
                    <li>Lightning-fast rounds</li>
                    <li>Instant payouts</li>
                    <li>Multiple bet types</li>
                    <li>Non-stop action</li>
                </ul>
            </div>
            <a href="laser247.php" class="play-btn">Play Now</a>
        </div>

        <!-- 11xplay -->
        <div class="game-card">
            <div class="game-icon">🔥</div>
            <h3 class="game-title">11xplay</h3>

            <p class="game-description">Multiply your bets up to 11x in this high-stakes multiplier game!</p>
            <div class="game-features">
                <ul>
                    <li>11x multiplier potential</li>
                    <li>Progressive betting</li>
                    <li>Risk vs reward</li>
                    <li>Big win potential</li>
                </ul>
            </div>
            <a href="11xplay.php" class="play-btn">Play Now</a>
        </div>

    </div>

    <!-- Info Section -->
    <div class="text-center mt-5 mb-4">
        <div class="p-4 rounded-3" style="background: rgba(255,255,255,0.1); border: 2px solid #FFD700;">
            <h4 style="color: #FFD700; margin-bottom: 1rem;">🎮 How to Play</h4>
            <p style="color: white; opacity: 0.9; margin-bottom: 0;">
                All games use <strong>virtual coins</strong> with no real-world value. Start with 10,000 free coins and play for entertainment only. 
                Choose your bet amount, play the game, and enjoy risk-free gaming! <strong>18+ only.</strong>
            </p>
        </div>
    </div>

</div>

<?php include 'footer.php'; ?>
