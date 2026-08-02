
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page - Dark Theme</title>
    <link rel="stylesheet" href="style.css">

    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #0a0a0a;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    cursor: none;
}

#animatedBg {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
}

.mouse-tracker {
    position: fixed;
    width: 30px;
    height: 30px;
    border: 2px solid rgba(102, 126, 234, 0.5);
    border-radius: 50%;
    pointer-events: none;
    z-index: 999;
    box-shadow: 0 0 20px rgba(102, 126, 234, 0.3),
                inset 0 0 20px rgba(102, 126, 234, 0.2);
    transform: translate(-50%, -50%);
    transition: 0.1s ease-out;
}

.mouse-tracker::before {
    content: '';
    position: absolute;
    width: 6px;
    height: 6px;
    background: rgba(102, 126, 234, 0.8);
    border-radius: 50%;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.login-container {
    width: 100%;
    max-width: 400px;
    padding: 20px;
    position: relative;
    z-index: 10;
}

.login-box {
    background: rgba(20, 20, 30, 0.8);
    backdrop-filter: blur(15px);
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(102, 126, 234, 0.2);
    animation: slideUp 0.6s ease-out;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.login-box h1 {
    text-align: center;
    color: #ffffff;
    margin-bottom: 10px;
    font-size: 28px;
    text-shadow: 0 0 20px rgba(102, 126, 234, 0.3);
}

.subtitle {
    text-align: center;
    color: #a0a0a0;
    margin-bottom: 30px;
    font-size: 14px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #ffffff;
    font-weight: 600;
    font-size: 14px;
    text-shadow: 0 0 10px rgba(102, 126, 234, 0.2);
}

.form-group input {
    width: 100%;
    padding: 12px;
    border: 2px solid rgba(102, 126, 234, 0.2);
    border-radius: 8px;
    font-size: 14px;
    transition: all 0.3s;
    background: rgba(30, 30, 50, 0.6);
    color: #ffffff;
}

.form-group input::placeholder {
    color: #666666;
}

.form-group input:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 15px rgba(102, 126, 234, 0.4),
                inset 0 0 10px rgba(102, 126, 234, 0.1);
    background: rgba(30, 30, 50, 0.8);
}

.remember-forgot {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    font-size: 14px;
}

.remember {
    display: flex;
    align-items: center;
    color: #a0a0a0;
    cursor: pointer;
    transition: color 0.3s;
}

.remember:hover {
    color: #667eea;
}

.remember input[type="checkbox"] {
    width: auto;
    margin-right: 6px;
    cursor: pointer;
    accent-color: #667eea;
}

.forgot-password {
    color: #667eea;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s;
}

.forgot-password:hover {
    color: #764ba2;
    text-shadow: 0 0 10px rgba(102, 126, 234, 0.5);
}

.login-btn {
    width: 100%;
    padding: 12px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    text-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.login-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 25px rgba(102, 126, 234, 0.6);
}

.login-btn:active {
    transform: translateY(-1px);
}

.signup-link {
    text-align: center;
    margin-top: 20px;
    color: #a0a0a0;
    font-size: 14px;
}

.signup-link a {
    color: #667eea;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s;
}

.signup-link a:hover {
    color: #764ba2;
    text-shadow: 0 0 10px rgba(102, 126, 234, 0.5);
}

/* Responsive Design */
@media (max-width: 480px) {
    .login-box {
        padding: 30px 20px;
    }

    .login-box h1 {
        font-size: 24px;
    }
}
    </style>
</head>

<body>
    <!-- Animated Background Canvas -->
    <canvas id="animatedBg"></canvas>

    <!-- Mouse tracker circle -->
    <div class="mouse-tracker"></div>

    <div class="login-container">
        <div class="login-box">
            <h1>Welcome Back</h1>
            <p class="subtitle">Sign in to your account</p>

            <form class="login-form" method="POST"
                action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email"
                    value="{{ old('email') }}" required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required
                autocomplete="current-password"
                    >
                    <x-input-error :messages="$errors->get('password')"
            class="mt-2" />
        </div>

        <div class="remember-forgot">
            <label class="remember" for="remember_me">
                <input type="checkbox" id="remember_me" name="remember"> {{ __('Remember me') }}
            </label>
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <button type="submit" class="login-btn">{{ __('Log in') }}</button>
        </form>
    </div>
    </div>

    <script src="script.js"></script>

    <script>
        // Get canvas element
const canvas = document.getElementById('animatedBg');
const ctx = canvas.getContext('2d');
const mouseTracker = document.querySelector('.mouse-tracker');

// Set canvas size
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

// Mouse position
const mouse = {
    x: canvas.width / 2,
    y: canvas.height / 2
};

// Particle array
let particles = [];
let trailParticles = [];

// Grid for spatial partitioning
let grid = [];
const GRID_SIZE = 150;
const MAX_CONNECTIONS = 5; // Limit connections per particle
const TRAIL_SPAWN_CHANCE = 0.3; // Reduced from 0.4
const CONNECTION_DISTANCE = 120;

// Particle class - OPTIMIZED
class Particle {
    constructor(x, y) {
        this.x = x || Math.random() * canvas.width;
        this.y = y || Math.random() * canvas.height;
        this.vx = (Math.random() - 0.5) * 0.4;
        this.vy = (Math.random() - 0.5) * 0.4;
        this.size = Math.random() * 2 + 1;
        this.distToMouse = 0;
    }

    update() {
        // Distance from mouse (squared - no sqrt needed)
        const dx = mouse.x - this.x;
        const dy = mouse.y - this.y;
        const distSq = dx * dx + dy * dy;
        this.distToMouse = distSq;

        // Mouse repulsion effect (optimized)
        const maxDistSq = 150 * 150;
        if (distSq < maxDistSq) {
            const dist = Math.sqrt(distSq);
            const force = (150 - dist) / 150 * 0.15;
            this.vx -= (dx / dist) * force;
            this.vy -= (dy / dist) * force;
        }

        // Apply velocity with friction
        this.vx *= 0.96;
        this.vy *= 0.96;

        // Update position
        this.x += this.vx;
        this.y += this.vy;

        // Wrap around edges
        if (this.x > canvas.width) this.x = 0;
        if (this.x < 0) this.x = canvas.width;
        if (this.y > canvas.height) this.y = 0;
        if (this.y < 0) this.y = canvas.height;
    }

    draw() {
        ctx.fillStyle = `rgba(102, 126, 234, 0.4)`;
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        ctx.fill();
    }
}

// Trail particle class - OPTIMIZED
class TrailParticle {
    constructor(x, y) {
        this.x = x;
        this.y = y;
        this.size = Math.random() * 2 + 1;
        this.opacity = 0.5;
    }

    update() {
        this.opacity -= 0.025; // Faster decay
        this.size *= 0.97;
    }

    draw() {
        ctx.fillStyle = `rgba(102, 126, 234, ${this.opacity})`;
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        ctx.fill();
    }
}

// Initialize particles - REDUCED COUNT
function initParticles() {
    particles = [];
    // Reduced particle count based on screen size
    const particleCount = Math.min(50, Math.floor((canvas.width * canvas.height) / 40000));
    for (let i = 0; i < particleCount; i++) {
        particles.push(new Particle());
    }
}

// Build spatial grid - OPTIMIZED
function buildGrid() {
    const cols = Math.ceil(canvas.width / GRID_SIZE);
    const rows = Math.ceil(canvas.height / GRID_SIZE);
    grid = Array(cols * rows).fill(null).map(() => []);

    for (let i = 0; i < particles.length; i++) {
        const col = Math.floor(particles[i].x / GRID_SIZE);
        const row = Math.floor(particles[i].y / GRID_SIZE);
        const cols_count = Math.ceil(canvas.width / GRID_SIZE);
        const index = row * cols_count + col;

        if (index >= 0 && index < grid.length) {
            grid[index].push(i);
        }
    }
}

// Draw connections - HEAVILY OPTIMIZED
function drawConnections() {
    // Connection distance squared (avoid sqrt)
    const connectionDistSq = CONNECTION_DISTANCE * CONNECTION_DISTANCE;
    const cols = Math.ceil(canvas.width / GRID_SIZE);

    for (let i = 0; i < particles.length; i++) {
        const p = particles[i];
        const col = Math.floor(p.x / GRID_SIZE);
        const row = Math.floor(p.y / GRID_SIZE);

        let connectionCount = 0;

        // Check only nearby grid cells (8 adjacent + center = 9 cells)
        for (let dc = -1; dc <= 1; dc++) {
            for (let dr = -1; dr <= 1; dr++) {
                const checkCol = col + dc;
                const checkRow = row + dr;

                if (checkCol >= 0 && checkRow >= 0 && checkCol < Math.ceil(canvas.width / GRID_SIZE)) {
                    const index = checkRow * cols + checkCol;

                    if (index >= 0 && index < grid.length) {
                        const cellParticles = grid[index];

                        for (let j = 0; j < cellParticles.length && connectionCount < MAX_CONNECTIONS; j++) {
                            const k = cellParticles[j];
                            if (k > i) {
                                const dx = particles[k].x - p.x;
                                const dy = particles[k].y - p.y;
                                const distSq = dx * dx + dy * dy;

                                if (distSq < connectionDistSq) {
                                    const dist = Math.sqrt(distSq);
                                    const opacity = (1 - dist / CONNECTION_DISTANCE) * 0.25;
                                    ctx.strokeStyle = `rgba(102, 126, 234, ${opacity})`;
                                    ctx.lineWidth = 1;
                                    ctx.beginPath();
                                    ctx.moveTo(p.x, p.y);
                                    ctx.lineTo(particles[k].x, particles[k].y);
                                    ctx.stroke();
                                    connectionCount++;
                                }
                            }
                        }
                    }
                }
            }
        }

        // Connect to mouse - SIMPLIFIED
        if (p.distToMouse < 150 * 150) {
            const dist = Math.sqrt(p.distToMouse);
            const opacity = (1 - dist / 150) * 0.35;
            ctx.strokeStyle = `rgba(147, 112, 219, ${opacity})`;
            ctx.lineWidth = 1.2;
            ctx.beginPath();
            ctx.moveTo(p.x, p.y);
            ctx.lineTo(mouse.x, mouse.y);
            ctx.stroke();
        }
    }
}

// Draw background - OPTIMIZED
function drawBackground() {
    ctx.fillStyle = '#0a0a0a';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
}

// Animation loop - OPTIMIZED
function animate() {
    drawBackground();

    // Update and draw trail particles
    for (let i = trailParticles.length - 1; i >= 0; i--) {
        trailParticles[i].update();

        if (trailParticles[i].opacity > 0) {
            trailParticles[i].draw();
        } else {
            trailParticles.splice(i, 1);
        }
    }

    // Update particles
    for (let i = 0; i < particles.length; i++) {
        particles[i].update();
    }

    // Build spatial grid
    buildGrid();

    // Draw particles
    for (let i = 0; i < particles.length; i++) {
        particles[i].draw();
    }

    // Draw connections
    drawConnections();

    requestAnimationFrame(animate);
}

// Mouse move event - OPTIMIZED
let lastTrailTime = 0;
window.addEventListener('mousemove', (e) => {
    mouse.x = e.clientX;
    mouse.y = e.clientY;

    mouseTracker.style.left = e.clientX + 'px';
    mouseTracker.style.top = e.clientY + 'px';

    // Create trail particles with throttling
    const now = Date.now();
    if (now - lastTrailTime > 16) { // ~60fps throttle
        if (Math.random() < TRAIL_SPAWN_CHANCE) {
            for (let i = 0; i < 2; i++) {
                trailParticles.push(new TrailParticle(
                    mouse.x + (Math.random() - 0.5) * 15,
                    mouse.y + (Math.random() - 0.5) * 15
                ));
            }
        }
        lastTrailTime = now;
    }
});

// Handle window resize
let resizeTimeout;
window.addEventListener('resize', () => {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(() => {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        initParticles();
    }, 250);
});

// Mouse leave event
window.addEventListener('mouseleave', () => {
    mouseTracker.style.display = 'none';
});

window.addEventListener('mouseenter', () => {
    mouseTracker.style.display = 'block';
});

// Start animation
initParticles();
animate();
    </script>
</body>

</html>
