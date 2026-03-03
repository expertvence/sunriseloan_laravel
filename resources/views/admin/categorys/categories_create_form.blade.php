@php
$id = isset($datas) && !empty($datas) ? $datas->id : '';
$categories = isset($datas) && !empty($datas) ? $datas->loan_category : '';
$percentage = isset($datas) && !empty($datas) ? $datas->percentage : '';
@endphp

<style>
/* ========================================
   🌈 মডার্ন ফর্ম - ডার্ক/লাইট মোড সহ
   ======================================== */

/* ========================================
   ফুল-উইডথ ফর্ম - সাইডবার লেআউটের সাথে মিল রেখে
   ======================================== */

:root {
    /* Light Mode */
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --primary-color: #667eea;
    --primary-dark: #5a67d8;
    
    --bg-card: #ffffff;
    --bg-body: #f0f2f5;
    --bg-input: #f8f9fa;
    --bg-checkbox: #f8f9fa;
    
    --text-primary: #333333;
    --text-secondary: #555555;
    --text-muted: #718096;
    
    --border-color: #e0e0e0;
    --border-focus: #667eea;
    
    --shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    --shadow-hover: 0 8px 25px rgba(102, 126, 234, 0.3);
    
    --transition: all 0.3s ease;
}

/* Dark Mode */
body.dark-mode {
    --primary-gradient: linear-gradient(135deg, #818cf8 0%, #a78bfa 100%);
    --primary-color: #818cf8;
    --primary-dark: #6366f1;
    
    --bg-card: #1e293b;
    --bg-body: #0f172a;
    --bg-input: #334155;
    --bg-checkbox: #1e293b;
    
    --text-primary: #f1f5f9;
    --text-secondary: #cbd5e1;
    --text-muted: #94a3b8;
    
    --border-color: #475569;
    --border-focus: #818cf8;
    
    --shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
    --shadow-hover: 0 8px 25px rgba(129, 140, 248, 0.3);
}

/* Base Body - modified for full width */
body {
    background: var(--bg-body);
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    margin: 0;
    min-height: 100vh;
    display: block;  /* changed from flex to block */
    padding: 0;  /* removed padding */
    transition: var(--transition);
}

/* Modern Form Styling - full width card */
.card {
    border: none;
    border-radius: 0;  /* no border radius for full width look */
    box-shadow: none;  /* removed shadow for cleaner look */
    background: var(--bg-card);
    width: 100%;
    margin: 0;  /* no margin */
    overflow: hidden;
    transition: var(--transition);
    margin-top: 40px;  /* added top margin for spacing */
}

/* Remove hover effect */
.card:hover {
    box-shadow: none;
    transform: none;
}

/* Card Header - exactly like screenshot */
.card-header {
    background: ;
    padding: 15px 25px;  /* adjusted padding */
    text-align: left;  /* left align like screenshot */
    border-bottom: 1px solid rgba(255,255,255,0.1);
}

.card-header h1 {
    margin: 0;
    color: rgb(42, 179, 156);
    font-size: 20px;  /* smaller font like screenshot */
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 10px;
}

/* Card Body - adjusted padding */
.card-body {
    padding: 25px;  /* reduced padding */
    background: var(--bg-card);
}

/* Form Elements */
.form-group {
    margin-bottom: 20px;
}

.form-label {
    display: block;
    margin-bottom: 8px;
    color: var(--text-primary);
    font-weight: 600;
    font-size: 13px;  /* smaller font */
    text-transform: uppercase;  /* uppercase like screenshot */
    letter-spacing: 0.3px;
    transition: var(--transition);
}

/* Dark mode form control */
body.dark-mode .form-control {
    color: #ffffff;
    background: var(--bg-input);
}

/* Form Control - both inputs same style */
.form-control {
    width: 100%;
    padding: 12px 15px;
    font-size: 14px;
    border: 1px solid var(--border-color);  /* thinner border */
    border-radius: 4px;  /* smaller border radius */
    transition: var(--transition);
    background: var(--bg-input);
    color: #000000;  /* black text */
    box-sizing: border-box;
}

/* Both inputs exactly same */
#loan_category, #percentage {
    height: 42px;  /* same height */
}

.form-control:focus {
    border-color: var(--primary-color);
    outline: none;
    background: var(--bg-card);
    box-shadow: 0 0 0 2px rgba(102, 126, 234, 0.1);
}

.form-control:hover {
    border-color: var(--primary-color);
}

.form-control::placeholder {
    color: #999;  /* darker placeholder */
    opacity: 1;
    font-size: 13px;
}

/* Checkbox Styling - exactly like screenshot */
.form-check {
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 20px 0;
    padding: 12px 15px;
    background: var(--bg-checkbox);
    border: 1px solid var(--border-color);
    border-radius: 4px;
    transition: var(--transition);
    cursor: pointer;
}

.form-check:hover {
    border-color: var(--primary-color);
    background: var(--bg-card);
}

.form-check-input {
    width: 16px;
    height: 16px;
    cursor: pointer;
    accent-color: var(--primary-color);
    margin: 0;
}

.form-check-label {
    color: var(--text-primary);
    font-size: 13px;
    cursor: pointer;
    transition: var(--transition);
}

.form-check-label i {
    display: none;  /* hide icon to match screenshot */
}

/* Button Styling - exactly like screenshot */
.btn {
    width: 100%;
    padding: 12px 20px;
    font-size: 14px;
    font-weight: 600;
    color: white;
    background: rgb(42, 179, 156);
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: var(--transition);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    margin-top: 15px;
}

.btn:hover {
    background: rgb(150, 199, 191);
    transform: translateY(-1px);
    box-shadow: var(--shadow-hover);
}

.btn:active {
    transform: translateY(0);
}

/* Hide icons from labels to match screenshot */
.form-label i {
    display: none;
}

/* Mode Toggle Button - repositioned */
.mode-toggle {
    position: fixed;
    top: 15px;
    right: 25px;
    background: var(--bg-card);
    border: 1px solid var(--border-color);
    border-radius: 30px;
    padding: 8px 16px;
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    z-index: 1000;
    box-shadow: var(--shadow);
    transition: var(--transition);
}

.mode-toggle:hover {
    transform: translateY(-1px);
    box-shadow: var(--shadow-hover);
}

.mode-toggle i {
    font-size: 14px;
    color: var(--primary-color);
}

.mode-toggle span {
    color: var(--text-primary);
    font-weight: 500;
    font-size: 13px;
}

/* Responsive */
@media (max-width: 768px) {
    .card-body {
        padding: 20px;
    }
    
    .card-header h1 {
        font-size: 18px;
    }
    
    .btn {
        padding: 10px 16px;
        font-size: 13px;
    }
    
    .mode-toggle {
        top: 10px;
        right: 15px;
        padding: 6px 12px;
    }
}

/* Remove any extra spacing */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
</style>

<!-- Main Form -->
<div>
    <div class="card-header">
        <h1>
            <i class="fas fa-tags"></i>
            Loan Categories
        </h1>
    </div>
    
    <div class="card-body">
        <form method="POST" id="categories_create" action="{{ url('insert-category') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="categories_id" id="categories_id" value="{{ $id }}">
            
            <div class="form-group">
                <label for="loan_category" class="form-label">
                    <i class="fas fa-tag"></i> Category Name
                </label>
                <input 
                    type="text" 
                    name="loan_category" 
                    class="form-control" 
                    id="loan_category" 
                    placeholder="e.g., Personal Loan, Home Loan" 
                    required 
                    value="{{ $categories }}"
                >
            </div>

            <div class="form-group">
                <label for="percentage" class="form-label">
                    <i class="fas fa-percent"></i> Interest Rate (%)
                </label>
                <input 
                    type="number" 
                    name="percentage" 
                    class="form-control" 
                    id="percentage" 
                    placeholder="Enter percentage (0-100)" 
                    required 
                    value="{{ $percentage }}"
                    step="0.01"
                    min="0"
                    max="100"
                >
            </div>
            
            <div class="form-check">
                <input 
                    type="checkbox" 
                    class="form-check-input" 
                    id="infoAgreement" 
                    required 
                    {{ $percentage !== '' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="infoAgreement">
                    <i class="fas fa-check-circle"></i>
                    I confirm that the information provided is true and accurate
                </label>
            </div>

            <button type="submit" onclick="save(this)" class="btn">
                <i class="fas fa-save"></i>
                {{ $id ? 'Update Category' : 'Save Category' }}
            </button>
        </form>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<script>
// Mode Toggle Functionality
const modeToggle = document.getElementById('modeToggle');
const modeIcon = document.getElementById('modeIcon');
const modeText = document.getElementById('modeText');

// Check for saved preference
const savedMode = localStorage.getItem('theme');
if (savedMode === 'dark') {
    document.body.classList.add('dark-mode');
    modeIcon.className = 'fas fa-sun';
    modeText.textContent = 'Light Mode';
}

// Toggle mode function
modeToggle.addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
    
    if (document.body.classList.contains('dark-mode')) {
        localStorage.setItem('theme', 'dark');
        modeIcon.className = 'fas fa-sun';
        modeText.textContent = 'Light Mode';
    } else {
        localStorage.setItem('theme', 'light');
        modeIcon.className = 'fas fa-moon';
        modeText.textContent = 'Dark Mode';
    }
});

// Form validation
document.getElementById('categories_create').addEventListener('submit', function(e) {
    const category = document.getElementById('loan_category');
    const percentage = document.getElementById('percentage');
    const agreement = document.getElementById('infoAgreement');
    
    if (!category.value.trim()) {
        e.preventDefault();
        alert('Please enter a category name');
        category.focus();
        return;
    }
    
    if (!percentage.value || percentage.value <= 0) {
        e.preventDefault();
        alert('Please enter a valid percentage');
        percentage.focus();
        return;
    }
    
    if (percentage.value > 100) {
        e.preventDefault();
        alert('Percentage cannot exceed 100%');
        percentage.focus();
        return;
    }
    
    if (!agreement.checked) {
        e.preventDefault();
        alert('Please confirm that the information is true');
        return;
    }
});

// Save button effect
function save(button) {
    button.style.transform = 'scale(0.95)';
    setTimeout(() => {
        button.style.transform = 'scale(1)';
    }, 200);
}

// Auto-hide success message if exists
document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('success')) {
        alert('Category saved successfully!');
    }
});

// Listen for system theme changes
if (window.matchMedia) {
    const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
    
    mediaQuery.addEventListener('change', (e) => {
        if (!localStorage.getItem('theme')) {
            if (e.matches) {
                document.body.classList.add('dark-mode');
                modeIcon.className = 'fas fa-sun';
                modeText.textContent = 'Light Mode';
            } else {
                document.body.classList.remove('dark-mode');
                modeIcon.className = 'fas fa-moon';
                modeText.textContent = 'Dark Mode';
            }
        }
    });
}
</script>