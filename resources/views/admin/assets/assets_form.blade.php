@php
    $id = isset($data) && !empty($data) ? $data->id : '';
    $assets = isset($data) && !empty($data) ? $data->assets : '';
@endphp

<style>
/* ========================================
   💎 ULTRA PREMIUM ASSETS FORM
   ======================================== */

:root {
    /* Light Mode - Elegant */
    --primary-gradient: linear-gradient(135deg, #0f172a, #1e293b, #334155);
    --primary-color: #0f172a;
    --primary-soft: #f1f5f9;
    
    --card-bg: #ffffff;
    --body-bg: linear-gradient(145deg, #f8fafc 0%, #f1f5f9 100%);
    
    --text-primary: #0f172a;
    --text-secondary: #334155;
    --text-muted: #64748b;
    --text-light: #94a3b8;
    
    --border-color: #e2e8f0;
    --border-focus: #0f172a;
    
    --input-bg: #ffffff;
    --input-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
    
    --success: #059669;
    --warning: #d97706;
    --danger: #dc2626;
    
    --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.03);
    --shadow-md: 0 8px 24px rgba(0, 0, 0, 0.06);
    --shadow-lg: 0 20px 40px rgba(0, 0, 0, 0.08);
    --shadow-xl: 0 30px 60px rgba(0, 0, 0, 0.12);
    
    --radius-sm: 12px;
    --radius-md: 18px;
    --radius-lg: 24px;
    --radius-xl: 32px;
    
    --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Dark Mode - Mysterious */
body.dark-mode {
    --primary-gradient: linear-gradient(135deg, #334155, #1e293b, #0f172a);
    --primary-color: #e2e8f0;
    --primary-soft: #1e293b;
    
    --card-bg: #0f172a;
    --body-bg: linear-gradient(145deg, #020617 0%, #0f172a 100%);
    
    --text-primary: #f1f5f9;
    --text-secondary: #cbd5e1;
    --text-muted: #94a3b8;
    --text-light: #64748b;
    
    --border-color: #334155;
    --border-focus: #94a3b8;
    
    --input-bg: #1e293b;
    --input-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);
    
    --shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.4);
    --shadow-md: 0 8px 24px rgba(0, 0, 0, 0.5);
    --shadow-lg: 0 20px 40px rgba(0, 0, 0, 0.6);
    --shadow-xl: 0 30px 60px rgba(0, 0, 0, 0.7);
}

/* Base Styles */
body {
    background: var(--body-bg);
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    margin: 0;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    transition: var(--transition);
}

/* ================= PREMIUM CONTAINER ================= */
.premium-container {
    width: 100%;
    margin: 0 auto;
    position: relative;
}

/* ================= ULTRA PREMIUM CARD ================= */
.assets-card {
    background: var(--card-bg);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-xl);
    overflow: hidden;
    border: 1px solid var(--border-color);
    transition: var(--transition);
    position: relative;
    backdrop-filter: blur(10px);
    transform: translateY(0);
    animation: floatIn 0.8s ease-out;
    
}

@keyframes floatIn {
    0% {
        opacity: 0;
        transform: translateY(30px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.assets-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl), 0 40px 80px rgba(0, 0, 0, 0.15);
}

/* Premium Decorative Elements */
.assets-card::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 300px;
    height: 300px;
    background: radial-gradient(circle, rgba(79, 70, 229, 0.1) 0%, transparent 70%);
    border-radius: 50%;
    animation: rotate 20s linear infinite;
    pointer-events: none;
}

.assets-card::after {
    content: '';
    position: absolute;
    bottom: -50%;
    left: -50%;
    width: 300px;
    height: 300px;
    background: radial-gradient(circle, rgba(99, 102, 241, 0.1) 0%, transparent 70%);
    border-radius: 50%;
    animation: rotate 25s linear infinite reverse;
    pointer-events: none;
}

@keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* ================= CARD HEADER ================= */
.card-header-premium {
    background: var(--primary-gradient);
    padding: 35px 30px 25px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.card-header-premium::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 100%;
    background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.1) 50%, transparent 70%);
    animation: shimmer 3s infinite;
    transform: translateX(-100%);
}

@keyframes shimmer {
    100% { transform: translateX(100%); }
}

.header-icon {
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    border: 3px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    animation: bounce 3s ease-in-out infinite;
}

.header-icon i {
    font-size: 40px;
    color: white;
    filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.2));
}

@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
}

.card-header-premium h1 {
    color: white;
    font-size: 2.5rem;
    font-weight: 800;
    margin: 0 0 5px;
    letter-spacing: -1px;
    text-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    position: relative;
    display: inline-block;
}

.card-header-premium h1::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background: white;
    border-radius: 3px;
    opacity: 0.5;
}

.card-header-premium p {
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.9rem;
    margin: 15px 0 0;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.card-header-premium p i {
    font-size: 0.8rem;
    animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

/* ================= CARD BODY ================= */
.card-body-premium {
    padding: 40px 35px;
    position: relative;
    z-index: 1;
}

/* ================= PREMIUM FORM GROUP ================= */
.premium-form-group {
    margin-bottom: 30px;
    position: relative;
}

.premium-form-group label {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 12px;
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--text-secondary);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: var(--transition);
}

.premium-form-group label i {
    color: var(--primary-color);
    font-size: 1rem;
    opacity: 0.8;
}

/* ================= ULTRA PREMIUM INPUT ================= */
.premium-input-wrapper {
    position: relative;
    display: flex;
    align-items: center;
}

.premium-input-icon {
    position: absolute;
    left: 18px;
    color: var(--text-muted);
    font-size: 1.2rem;
    transition: var(--transition);
    z-index: 2;
}

.premium-input {
    width: 100%;
    padding: 18px 20px 18px 55px;
    font-size: 1.1rem;
    font-weight: 500;
    color: var(--text-primary);
    background: var(--input-bg);
    border: 2px solid var(--border-color);
    border-radius: var(--radius-lg);
    transition: var(--transition);
    font-family: 'Inter', sans-serif;
    box-shadow: var(--input-shadow);
}

.premium-input:hover {
    border-color: var(--primary-color);
    background: var(--card-bg);
}

.premium-input:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 6px rgba(15, 23, 42, 0.1);
    background: var(--card-bg);
    transform: translateY(-2px);
}

/* Dark mode input focus */
body.dark-mode .premium-input:focus {
    box-shadow: 0 0 0 6px rgba(226, 232, 240, 0.1);
}

/* Input counter/badge */
.premium-input-counter {
    position: absolute;
    right: 18px;
    background: var(--primary-soft);
    padding: 4px 12px;
    border-radius: 40px;
    font-size: 0.8rem;
    font-weight: 600;
    color: var(--text-secondary);
    border: 1px solid var(--border-color);
    pointer-events: none;
    z-index: 2;
}

/* ================= PREMIUM INPUT HINT ================= */
.premium-input-hint {
    margin-top: 8px;
    margin-left: 18px;
    font-size: 0.8rem;
    color: var(--text-muted);
    display: flex;
    align-items: center;
    gap: 6px;
}

.premium-input-hint i {
    color: var(--primary-color);
    font-size: 0.75rem;
}

/* ================= ULTRA PREMIUM BUTTON ================= */
.btn-premium-container {
    position: relative;
    margin-top: 35px;
}

.btn-premium {
    background: var(--primary-gradient);
    color: white;
    border: none;
    border-radius: var(--radius-lg);
    padding: 18px 30px;
    font-size: 1.1rem;
    font-weight: 700;
    width: 100%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    transition: var(--transition);
    position: relative;
    overflow: hidden;
    border: 2px solid rgba(255, 255, 255, 0.2);
    box-shadow: var(--shadow-lg);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.btn-premium::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.6s ease;
}

.btn-premium:hover::before {
    left: 100%;
}

.btn-premium:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl), 0 10px 30px rgba(0, 0, 0, 0.3);
}

.btn-premium:active {
    transform: translateY(-2px);
}

.btn-premium i {
    font-size: 1.2rem;
    transition: all 0.3s ease;
}

.btn-premium:hover i {
    transform: translateX(5px) scale(1.2);
}

/* Button loading state */
.btn-premium.loading {
    opacity: 0.8;
    cursor: wait;
}

.btn-premium.loading i {
    animation: spin 1s linear infinite;
}

@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* ================= ANIMATED BACKGROUND ================= */
.floating-elements {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 0;
}

.floating-elements span {
    position: absolute;
    width: 20px;
    height: 20px;
    background: rgba(79, 70, 229, 0.1);
    border-radius: 50%;
    animation: floating 20s linear infinite;
}

.floating-elements span:nth-child(1) {
    top: 10%;
    left: 10%;
    width: 40px;
    height: 40px;
    animation-delay: 0s;
}

.floating-elements span:nth-child(2) {
    bottom: 10%;
    right: 10%;
    width: 60px;
    height: 60px;
    animation-delay: 5s;
}

@keyframes floating {
    0% { transform: translateY(0) rotate(0deg); opacity: 0; }
    50% { opacity: 1; }
    100% { transform: translateY(-100px) rotate(360deg); opacity: 0; }
}

/* ================= RESPONSIVE DESIGN ================= */

/* Tablet Landscape */
@media (max-width: 768px) {
    .premium-container {
        max-width: 500px;
    }
    
    .card-header-premium h1 {
        font-size: 2rem;
    }
    
    .header-icon {
        width: 70px;
        height: 70px;
    }
    
    .header-icon i {
        font-size: 35px;
    }
    
    .card-body-premium {
        padding: 30px 25px;
    }
    
    .premium-input {
        padding: 16px 18px 16px 50px;
        font-size: 1rem;
    }
    
    .premium-input-icon {
        font-size: 1.1rem;
    }
    
    .btn-premium {
        padding: 16px 25px;
        font-size: 1rem;
    }
}

/* Mobile Landscape */
@media (max-width: 576px) {
    body {
        padding: 15px;
    }
    
    .card-header-premium {
        padding: 25px 20px 20px;
    }
    
    .card-header-premium h1 {
        font-size: 1.8rem;
    }
    
    .header-icon {
        width: 60px;
        height: 60px;
        margin-bottom: 15px;
    }
    
    .header-icon i {
        font-size: 30px;
    }
    
    .card-body-premium {
        padding: 25px 20px;
    }
    
    .premium-form-group {
        margin-bottom: 25px;
    }
    
    .premium-form-group label {
        font-size: 0.8rem;
        margin-bottom: 8px;
    }
    
    .premium-input {
        padding: 14px 16px 14px 45px;
        font-size: 0.95rem;
    }
    
    .premium-input-icon {
        left: 15px;
        font-size: 1rem;
    }
    
    .premium-input-counter {
        right: 15px;
        font-size: 0.75rem;
        padding: 3px 10px;
    }
    
    .btn-premium {
        padding: 14px 20px;
        font-size: 0.95rem;
    }
    
    .btn-premium i {
        font-size: 1.1rem;
    }
}

/* Mobile Portrait */
@media (max-width: 400px) {
    body {
        padding: 10px;
    }
    
    .card-header-premium h1 {
        font-size: 1.5rem;
    }
    
    .header-icon {
        width: 50px;
        height: 50px;
    }
    
    .header-icon i {
        font-size: 25px;
    }
    
    .card-body-premium {
        padding: 20px 15px;
    }
    
    .premium-form-group label {
        font-size: 0.75rem;
    }
    
    .premium-input {
        padding: 12px 14px 12px 40px;
        font-size: 0.9rem;
    }
    
    .premium-input-icon {
        left: 12px;
        font-size: 0.9rem;
    }
    
    .premium-input-counter {
        padding: 2px 8px;
        font-size: 0.7rem;
    }
    
    .btn-premium {
        padding: 12px 18px;
        font-size: 0.9rem;
    }
}

/* Hide scrollbar but keep functionality */
* {
    scrollbar-width: none;
    -ms-overflow-style: none;
}

*::-webkit-scrollbar {
    display: none;
}
</style>

<!-- ================= MAIN CONTAINER ================= -->
<div class="premium-container">
    <!-- Floating Background Elements -->
    <div class="floating-elements">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <!-- Ultra Premium Card -->
    <div class="assets-card">
        <!-- Card Header -->
        <div class="card-header-premium">
            <div class="header-icon">
                <i class="fas fa-chart-pie"></i>
            </div>
            <h1>Assets</h1>
            <p>
                <i class="fas fa-circle"></i>
                Manage your financial assets
                <i class="fas fa-circle"></i>
            </p>
        </div>

        <!-- Card Body -->
        <div class="card-body-premium">
            <form method="POST" id="categories_create" action="{{ url('store-assets') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="assets_id" id="assets_id" value="{{ $id }}">

                <!-- Premium Form Group -->
                <div class="premium-form-group">
                    <label>
                        <i class="fas fa-coins"></i>
                        Assets Amount
                    </label>
                    
                    <div class="premium-input-wrapper">
                        <i class="fas fa-bangladeshi-taka-sign premium-input-icon"></i>
                        <input type="number" 
                               name="assets" 
                               value="{{ $assets }}" 
                               id="assets" 
                               class="premium-input" 
                               placeholder="0.00"
                               min="0"
                               step="0.01"
                               autocomplete="off">
                        <span class="premium-input-counter">BDT</span>
                    </div>
                    
                    <div class="premium-input-hint">
                        <i class="fas fa-info-circle"></i>
                        Enter the total asset amount in BDT
                    </div>
                </div>

                <!-- Premium Button -->
                <div class="btn-premium-container">
                    <button type="submit" onclick="save(this)" class="btn-premium" redirect="{{ route('show-assets') }}">
                        <i class="fas fa-save"></i>
                        Save Assets
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Optional: Add Inter Font -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">