<!-- resources/views/layouts/theme-manager.blade.php -->
<style>
:root {
    /* Light mode variables */
    --bg-primary: #ffffff;
    --bg-secondary: #f8fafc;
    --bg-tertiary: #f1f5f9;
    --text-primary: #0f172a;
    --text-secondary: #334155;
    --border-color: #e2e8f0;
    --card-bg: #ffffff;
    
    /* Header colors */
    --header-bg-light: linear-gradient(90deg, #0a0c10 0%, #0f1217 100%);
    --header-bg-dark: linear-gradient(90deg, #1a1f2e 0%, #232837 100%);
    
    /* Sidebar colors */
    --sidebar-bg-light: linear-gradient(165deg, #0a0c15 0%, #0f1220 50%, #1a1f2f 100%);
    --sidebar-bg-dark: linear-gradient(165deg, #1a1f2e 0%, #232837 50%, #2d3447 100%);
    
    /* Footer colors */
    --footer-bg-light: #0a0c10;
    --footer-bg-dark: #1a1f2e;
}

body.dark-mode {
    --bg-primary: #0f172a;
    --bg-secondary: #1e293b;
    --bg-tertiary: #2d3a4f;
    --text-primary: #ffffff;
    --text-secondary: #e2e8f0;
    --border-color: #334155;
    --card-bg: #1e293b;
}
</style>

<!-- Theme Toggle Button - Sticky/Floating -->
<div class="theme-toggle-container">
    <button class="theme-toggle-btn" id="globalThemeToggle" onclick="toggleGlobalTheme()">
        <i class="fas fa-moon" id="globalThemeIcon"></i>
        <span id="globalThemeText">Dark Mode</span>
    </button>
</div>

<script>
// Global theme manager
(function() {
    // Check for saved theme preference on page load
    const savedTheme = localStorage.getItem('global_theme');
    const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    
    // Set initial theme
    if (savedTheme === 'dark' || (!savedTheme && systemPrefersDark)) {
        document.body.classList.add('dark-mode');
        updateAllThemeElements(true);
    } else {
        document.body.classList.remove('dark-mode');
        updateAllThemeElements(false);
    }
    
    // Listen for system theme changes
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
        if (!localStorage.getItem('global_theme')) {
            if (e.matches) {
                document.body.classList.add('dark-mode');
                updateAllThemeElements(true);
            } else {
                document.body.classList.remove('dark-mode');
                updateAllThemeElements(false);
            }
        }
    });
})();

// Update all theme elements
function updateAllThemeElements(isDark) {
    // Update header if exists
    const header = document.querySelector('.sb-topnav');
    if (header) {
        if (isDark) {
            header.style.background = 'linear-gradient(90deg, #1a1f2e 0%, #232837 100%)';
        } else {
            header.style.background = 'linear-gradient(90deg, #0a0c10 0%, #0f1217 100%)';
        }
    }
    
    // Update sidebar if exists
    const sidebar = document.querySelector('.sb-sidenav');
    if (sidebar) {
        if (isDark) {
            sidebar.style.background = 'linear-gradient(165deg, #1a1f2e 0%, #232837 50%, #2d3447 100%)';
        } else {
            sidebar.style.background = 'linear-gradient(165deg, #0a0c15 0%, #0f1220 50%, #1a1f2f 100%)';
        }
    }
    
    // Update footer if exists
    const footer = document.querySelector('.app-footer');
    if (footer) {
        if (isDark) {
            footer.style.background = '#1a1f2e';
        } else {
            footer.style.background = '#0a0c10';
        }
    }
    
    // Update theme toggle buttons
    updateThemeButton(isDark);
    updateHeaderThemeIcon(isDark);
}

// Global theme toggle function
function toggleGlobalTheme() {
    const isDark = document.body.classList.contains('dark-mode');
    
    if (isDark) {
        document.body.classList.remove('dark-mode');
        localStorage.setItem('global_theme', 'light');
        updateAllThemeElements(false);
    } else {
        document.body.classList.add('dark-mode');
        localStorage.setItem('global_theme', 'dark');
        updateAllThemeElements(true);
    }
    
    // Dispatch event
    window.dispatchEvent(new CustomEvent('themeChanged', {
        detail: { theme: localStorage.getItem('global_theme') }
    }));
}

// Update floating theme button
function updateThemeButton(isDark) {
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

// Update header theme icon
function updateHeaderThemeIcon(isDark) {
    const headerIcon = document.getElementById('headerThemeIcon');
    if (headerIcon) {
        if (isDark) {
            headerIcon.className = 'fas fa-moon';
        } else {
            headerIcon.className = 'fas fa-sun';
        }
    }
}

// Listen for storage changes (other tabs)
window.addEventListener('storage', function(e) {
    if (e.key === 'global_theme') {
        if (e.newValue === 'dark') {
            document.body.classList.add('dark-mode');
            updateAllThemeElements(true);
        } else {
            document.body.classList.remove('dark-mode');
            updateAllThemeElements(false);
        }
    }
});

// DOM Content Loaded
document.addEventListener('DOMContentLoaded', function() {
    const isDark = document.body.classList.contains('dark-mode');
    updateAllThemeElements(isDark);
});
</script>

<style>
/* Floating Theme Toggle Button Styles */
.theme-toggle-container {
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 9999;
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
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
    box-shadow: 0 10px 40px rgba(0,0,0,0.3);
    transition: all 0.3s ease;
    border: 2px solid rgba(255,255,255,0.3);
}

.theme-toggle-btn:hover {
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 15px 50px rgba(0,0,0,0.4);
}

.theme-toggle-btn i {
    font-size: 1.4rem;
}

@media (max-width: 768px) {
    .theme-toggle-container {
        bottom: 20px;
        right: 20px;
    }
    .theme-toggle-btn {
        padding: 12px 24px;
        font-size: 1rem;
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
    }
}
</style>