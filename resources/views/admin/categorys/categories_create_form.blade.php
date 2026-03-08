@php
    $id = isset($data) && !empty($data) ? $data->id : '';
    $loan_category = isset($data) && !empty($data) ? $data->loan_category : '';
    $percentage = isset($data) && !empty($data) ? $data->percentage : '';
@endphp

<style>
/* Premium Form Styling - Theme Aware with Full Dark Mode */
.premium-form-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 4px;
    border-radius: 24px;
    box-shadow: var(--shadow-xl, 0 20px 25px -5px rgba(0,0,0,0.1));
    margin-bottom: 2rem;
    transition: all 0.3s ease;
    margin-top: 1.2rem;
}

.form-inner {
    background: var(--card-bg, #ffffff);
    border-radius: 22px;
    padding: 2rem;
    transition: all 0.3s ease;
}

/* Page Header */
.page-header-custom {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 2rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid var(--border-color, #e2e8f0);
}

.page-header-custom h1 {
    font-size: 2rem;
    font-weight: 700;
    color: var(--text-primary, #0f172a);
    margin: 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.page-header-custom i {
    font-size: 2.5rem;
    color: var(--primary-color, #4361ee);
    background: rgba(67, 97, 238, 0.1);
    padding: 12px;
    border-radius: 15px;
}

/* Premium Input Groups - Fixed Text Visibility */
.premium-input-group {
    margin-bottom: 1.5rem;
    position: relative;
}

.premium-input-group .form-floating {
    transition: all 0.3s ease;
}

.premium-input-group .form-floating:hover {
    transform: translateY(-2px);
}

.premium-input-group .form-control,
.premium-input-group .form-select {
    border: 2px solid var(--border-color, #e2e8f0);
    border-radius: 16px;
    padding: 0.75rem 1rem;
    height: auto;
    min-height: 60px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: var(--input-bg, #ffffff);
    color: var(--text-primary, #0f172a) !important; /* Force text color */
    box-shadow: var(--shadow-sm, 0 1px 2px 0 rgba(0,0,0,0.05));
}

/* Fix for input text visibility while typing */
.premium-input-group .form-control:focus,
.premium-input-group .form-control:active,
.premium-input-group .form-control:not(:placeholder-shown) {
    color: var(--text-primary, #0f172a) !important;
    background: var(--input-bg, #ffffff);
}

.premium-input-group .form-select {
    color: var(--text-primary, #0f172a) !important;
}

.premium-input-group .form-control::placeholder {
    color: transparent;
}

.premium-input-group .form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    outline: none;
}

/* Label styles */
.premium-input-group .form-floating > label {
    padding: 1rem 1rem;
    color: var(--text-secondary, #64748b);
    font-weight: 500;
    font-size: 0.95rem;
    transition: all 0.2s ease;
    background: transparent;
    z-index: 1;
}

.premium-input-group .form-floating > .form-control:focus ~ label,
.premium-input-group .form-floating > .form-control:not(:placeholder-shown) ~ label,
.premium-input-group .form-floating > .form-select ~ label {
    color: #667eea;
    transform: scale(0.85) translateY(-0.75rem) translateX(0.15rem);
    background: var(--card-bg, #ffffff);
    padding: 0 0.5rem;
    font-weight: 600;
    z-index: 2;
}

/* Agreement Checkbox Styling */
.agreement-wrapper {
    background: var(--bg-secondary, #f8fafc);
    border-radius: 16px;
    padding: 1.5rem;
    margin: 1.5rem 0;
    border: 2px solid var(--border-color, #e2e8f0);
    transition: all 0.3s ease;
}

.agreement-wrapper:hover {
    border-color: #667eea;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
}

.premium-checkbox {
    display: flex;
    align-items: center;
    gap: 12px;
    cursor: pointer;
}

.premium-checkbox input[type="checkbox"] {
    width: 22px;
    height: 22px;
    cursor: pointer;
    accent-color: #667eea;
    transition: all 0.3s ease;
}

.premium-checkbox input[type="checkbox"]:hover {
    transform: scale(1.1);
}

.premium-checkbox .checkbox-label {
    color: var(--text-primary, #0f172a);
    font-size: 1rem;
    cursor: pointer;
    user-select: none;
    font-weight: 500;
}

.premium-checkbox .checkbox-label i {
    color: #667eea;
    margin-right: 8px;
}

.premium-checkbox .checkbox-label strong {
    color: #667eea;
    font-weight: 700;
}

/* Submit Button */
.btn-premium-submit {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 16px;
    padding: 1rem 2rem;
    font-weight: 700;
    font-size: 1.1rem;
    color: white;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    width: 100%;
    box-shadow: var(--shadow-lg, 0 10px 15px -3px rgba(0,0,0,0.1));
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    border: 2px solid rgba(255, 255, 255, 0.2);
}

.btn-premium-submit:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-xl, 0 20px 25px -5px rgba(0,0,0,0.1));
}

.btn-premium-submit i {
    font-size: 1.2rem;
    transition: transform 0.3s ease;
}

.btn-premium-submit:hover i {
    transform: translateX(5px);
}

/* ===== DARK MODE FIXES - Full Page Dark ===== */
body.dark-mode {
    background-color: var(--dark-bg-primary, #0f172a) !important;
}

body.dark-mode .mainContant,
body.dark-mode #layoutSidenav,
body.dark-mode #layoutSidenav_content,
body.dark-mode .content-wrapper {
    background-color: var(--dark-bg-primary, #0f172a) !important;
}

/* Dark mode input fixes */
body.dark-mode .premium-input-group .form-control,
body.dark-mode .premium-input-group .form-select {
    background: var(--dark-input-bg, #0f172a) !important;
    border-color: var(--dark-border, #334155) !important;
    color: var(--dark-text-primary, #f1f5f9) !important;
}

/* Fix for text visibility while typing in dark mode */
body.dark-mode .premium-input-group .form-control:focus,
body.dark-mode .premium-input-group .form-control:active,
body.dark-mode .premium-input-group .form-control:not(:placeholder-shown) {
    color: var(--dark-text-primary, #f1f5f9) !important;
    background: var(--dark-input-bg, #0f172a) !important;
}

body.dark-mode .premium-input-group .form-select {
    color: var(--dark-text-primary, #f1f5f9) !important;
    background: var(--dark-input-bg, #0f172a) !important;
}

/* Dark mode agreement wrapper */
body.dark-mode .agreement-wrapper {
    background: var(--dark-bg-secondary, #1e293b) !important;
    border-color: var(--dark-border, #334155) !important;
}

body.dark-mode .premium-checkbox .checkbox-label {
    color: var(--dark-text-primary, #f1f5f9) !important;
}

body.dark-mode .premium-checkbox .checkbox-label strong {
    color: #a5b4fc !important;
}

/* Dark mode labels */
body.dark-mode .premium-input-group .form-floating > label {
    color: var(--dark-text-secondary, #cbd5e1) !important;
}

body.dark-mode .premium-input-group .form-floating > .form-control:focus ~ label,
body.dark-mode .premium-input-group .form-floating > .form-control:not(:placeholder-shown) ~ label,
body.dark-mode .premium-input-group .form-floating > .form-select ~ label {
    background: var(--dark-card-bg, #1e293b) !important;
    color: #a5b4fc !important;
}

/* Dark mode card inner */
body.dark-mode .form-inner {
    background: var(--dark-card-bg, #1e293b) !important;
}

/* Dark mode page header */
body.dark-mode .page-header-custom {
    border-bottom-color: var(--dark-border, #334155) !important;
}

body.dark-mode .page-header-custom h1 {
    background: linear-gradient(135deg, #a5b4fc 0%, #c084fc 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Dark mode icons */
body.dark-mode .premium-input-group i,
body.dark-mode .page-header-custom i {
    color: var(--dark-text-secondary, #cbd5e1) !important;
}

/* Responsive Design */
@media (max-width: 768px) {
    .form-inner {
        padding: 1.5rem;
    }
    
    .page-header-custom {
        flex-direction: column;
        text-align: center;
        gap: 10px;
    }
    
    .page-header-custom h1 {
        font-size: 1.8rem;
    }
    
    .page-header-custom i {
        font-size: 2rem;
        padding: 10px;
    }
    
    .premium-input-group .form-control,
    .premium-input-group .form-select {
        min-height: 55px;
        font-size: 0.95rem;
    }
    
    .btn-premium-submit {
        padding: 0.875rem 1.5rem;
        font-size: 1rem;
    }
    
    .agreement-wrapper {
        padding: 1.2rem;
    }
}

@media (max-width: 576px) {
    .form-inner {
        padding: 1rem;
    }
    
    .page-header-custom h1 {
        font-size: 1.5rem;
    }
    
    .page-header-custom i {
        font-size: 1.8rem;
        padding: 8px;
    }
    
    .premium-input-group .form-floating > label {
        font-size: 0.9rem;
    }
    
    .premium-checkbox {
        align-items: flex-start;
    }
    
    .premium-checkbox input[type="checkbox"] {
        margin-top: 3px;
    }
    
    .premium-checkbox .checkbox-label {
        font-size: 0.95rem;
    }
}

/* Animation */
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.premium-form-card {
    animation: slideIn 0.5s ease-out;
}

/* Icons positioning */
.premium-input-group {
    position: relative;
}

.premium-input-group i {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-secondary, #64748b);
    z-index: 3;
    pointer-events: none;
    font-size: 1.2rem;
}

/* Two column grid for form rows */
.form-row-custom {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
    margin-bottom: 1rem;
}

@media (max-width: 640px) {
    .form-row-custom {
        grid-template-columns: 1fr;
        gap: 0;
    }
}
</style>

<div class="premium-form-card">
    <div class="form-inner">
        <!-- Page Header -->
        <div class="page-header-custom">
            <i class="fas fa-tags"></i>
            <h1>{{ $id ? 'Edit Loan Category' : 'Loan Category Entry' }}</h1>
        </div>

        <form action="{{ route('save-category') }}" method="POST" id="categories_create">
            @csrf

            <!-- Hidden ID for Edit -->
            <input type="hidden" name="categories_id" id="categories_id" value="{{ $id }}">

            <!-- Form Row - Two Columns -->
            <div class="form-row-custom">
                <!-- Category Name -->
                <div class="premium-input-group">
                    <div class="form-floating">
                        <input type="text" 
                               class="form-control" 
                               id="loan_category" 
                               name="loan_category"
                               placeholder="Enter category name" 
                               value="{{ $loan_category }}" 
                               required />
                        <label for="loan_category">
                            <i class="fas fa-tag me-2"></i>Category Name <span class="text-danger">*</span>
                        </label>
                    </div>
                </div>

                <!-- Percentage -->
                <div class="premium-input-group">
                    <div class="form-floating">
                        <input type="number" 
                               step="0.01" 
                               min="0" 
                               max="100" 
                               class="form-control" 
                               id="percentage" 
                               name="percentage"
                               value="{{ $percentage }}" 
                               placeholder="Enter percentage" 
                               required />
                        <label for="percentage">
                            <i class="fas fa-percent me-2"></i>Percentage (%) <span class="text-danger">*</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Agreement Checkbox -->
            <div class="agreement-wrapper">
                <label class="premium-checkbox">
                    <input type="checkbox" class="form-check-input" id="infoAgreement" required
                        {{ $id ? 'checked' : '' }}>
                    <span class="checkbox-label">
                        <i class="fas fa-check-circle"></i>
                        I agree that the <strong>information provided</strong> is true and accurate.
                    </span>
                </label>
            </div>

            <!-- Submit Button -->
            <div class="mt-4">
                <button type="button" onclick="saveFile(this)" class="btn-premium-submit" redirect="">
                    <i class="fas fa-save me-2"></i> 
                    {{ $id ? 'Update Category' : 'Save Category' }}
                    <i class="fas fa-arrow-right ms-2"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">