<!-- Theme Toggle Button - Sticky/Floating across all pages -->
<div class="theme-toggle-container">
    <button class="theme-toggle-btn" id="globalThemeToggle" onclick="toggleGlobalTheme()">
        <i class="fas fa-moon" id="globalThemeIcon"></i>
        <span id="globalThemeText">Dark Mode</span>
    </button>
</div>

<style>
:root {
    /* Light mode variables */
    --primary-color: #4361ee;
    --primary-hover: #3730a3;
    --secondary-color: #64748b;
    --success-color: #10b981;
    --danger-color: #ef4444;
    --warning-color: #f59e0b;
    --bg-primary: #ffffff;
    --bg-secondary: #f8fafc;
    --bg-tertiary: #f1f5f9;
    --text-primary: #0f172a;
    --text-secondary: #334155;
    --text-muted: #475569;
    --border-color: #e2e8f0;
    --card-bg: #ffffff;
    --header-bg: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --table-header-bg: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
    --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
    --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
    --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1);
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Dark mode variables - applied when dark-mode class is on body */
body.dark-mode {
    --primary-color: #818cf8;
    --primary-hover: #a5b4fc;
    --secondary-color: #94a3b8;
    --success-color: #34d399;
    --danger-color: #f87171;
    --warning-color: #fbbf24;
    --bg-primary: #0f172a;
    --bg-secondary: #1e293b;
    --bg-tertiary: #2d3a4f;
    --text-primary: #ffffff;
    --text-secondary: #e2e8f0;
    --text-muted: #cbd5e1;
    --border-color: #334155;
    --card-bg: #1e293b;
    --header-bg: linear-gradient(135deg, #1e293b 0%, #2d3a4f 100%);
    --table-header-bg: linear-gradient(135deg, #2d3a4f 0%, #1e293b 100%);
}

/* Apply theme variables to body */
body {
    background-color: var(--bg-primary);
    color: var(--text-primary);
    transition: var(--transition);
    margin: 0;
    padding: 0;
    min-height: 100vh;
}

/* Floating Theme Toggle Button */
.theme-toggle-container {
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 9999;
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

.theme-toggle-btn {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 60px;
    padding: 16px 32px;
    color: white;
    font-weight: 700;
    font-size: 1.1rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 12px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.3), 0 0 0 2px rgba(255,255,255,0.5);
    transition: all 0.3s ease;
    border: 2px solid rgba(255,255,255,0.3);
    backdrop-filter: blur(10px);
    letter-spacing: 0.5px;
}

.theme-toggle-btn:hover {
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 15px 50px rgba(0,0,0,0.4), 0 0 0 4px rgba(255,255,255,0.5);
}

.theme-toggle-btn i {
    font-size: 1.4rem;
}

body.dark-mode .theme-toggle-btn {
    background: linear-gradient(135deg, #4361ee 0%, #6b4ba2 100%);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .theme-toggle-container {
        bottom: 20px;
        right: 20px;
    }
    
    .theme-toggle-btn {
        padding: 12px 24px;
        font-size: 1rem;
        gap: 8px;
    }
    
    .theme-toggle-btn i {
        font-size: 1.2rem;
    }
}

@media (max-width: 480px) {
    .theme-toggle-container {
        bottom: 15px;
        right: 15px;
    }
    
    .theme-toggle-btn {
        padding: 10px 20px;
        font-size: 0.9rem;
        gap: 6px;
    }
    
    .theme-toggle-btn i {
        font-size: 1rem;
    }
}

/* Loading animation for theme switch */
.theme-switching {
    position: relative;
    overflow: hidden;
}

.theme-switching::after {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(5px);
    z-index: 10000;
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}
</style>

<script>
// Global theme manager
(function() {
    // Check for saved theme preference on page load
    const savedTheme = localStorage.getItem('global_theme');
    const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    
    // Set initial theme
    if (savedTheme === 'dark' || (!savedTheme && systemPrefersDark)) {
        document.body.classList.add('dark-mode');
        updateGlobalThemeButton(true);
    } else {
        document.body.classList.remove('dark-mode');
        updateGlobalThemeButton(false);
    }
    
    // Listen for system theme changes
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
        if (!localStorage.getItem('global_theme')) {
            if (e.matches) {
                document.body.classList.add('dark-mode');
                updateGlobalThemeButton(true);
            } else {
                document.body.classList.remove('dark-mode');
                updateGlobalThemeButton(false);
            }
        }
    });
})();

// Global theme toggle function
function toggleGlobalTheme() {
    // Add loading animation
    document.body.classList.add('theme-switching');
    
    setTimeout(() => {
        if (document.body.classList.contains('dark-mode')) {
            document.body.classList.remove('dark-mode');
            localStorage.setItem('global_theme', 'light');
            updateGlobalThemeButton(false);
        } else {
            document.body.classList.add('dark-mode');
            localStorage.setItem('global_theme', 'dark');
            updateGlobalThemeButton(true);
        }
        
        // Remove loading animation
        document.body.classList.remove('theme-switching');
        
        // Dispatch custom event for other scripts to listen
        window.dispatchEvent(new CustomEvent('themeChanged', {
            detail: { theme: localStorage.getItem('global_theme') }
        }));
    }, 300);
}

// Update theme button appearance
function updateGlobalThemeButton(isDark) {
    const icon = document.getElementById('globalThemeIcon');
    const text = document.getElementById('globalThemeText');
    
    if (icon && text) {
        if (isDark) {
            icon.className = 'fas fa-sun';
            text.textContent = 'Light Mode';
        } else {
            icon.className = 'fas fa-moon';
            text.textContent = 'Dark Mode';
        }
    }
}

// Listen for theme changes from other tabs/windows
window.addEventListener('storage', function(e) {
    if (e.key === 'global_theme') {
        if (e.newValue === 'dark') {
            document.body.classList.add('dark-mode');
            updateGlobalThemeButton(true);
        } else {
            document.body.classList.remove('dark-mode');
            updateGlobalThemeButton(false);
        }
    }
});

// Re-initialize button if it exists in DOM
document.addEventListener('DOMContentLoaded', function() {
    const isDark = document.body.classList.contains('dark-mode');
    updateGlobalThemeButton(isDark);
});
</script>