<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<style>
/* ========================================
   🌈 প্রিমিয়াম ক্যাটাগরি লিস্ট - ডার্ক/লাইট মোড
   ======================================== */

:root {
    /* Light Mode */
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --primary-color: #667eea;
    --primary-dark: #5a67d8;
    
    --bg-card: #ffffff;
    --bg-body: #f8fafc;
    --bg-header: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --bg-table-header: #f1f5f9;
    
    --text-primary: #1e293b;
    --text-secondary: #334155;
    --text-muted: #64748b;
    --text-white: #ffffff;
    
    --border-color: #e2e8f0;
    --border-light: #f1f5f9;
    
    --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.05);
    --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.08);
    --shadow-lg: 0 10px 30px rgba(0, 0, 0, 0.12);
    
    --radius-sm: 6px;
    --radius-md: 8px;
    --radius-lg: 12px;
    --radius-xl: 16px;
    
    --transition: all 0.3s ease;
}

<<<<<<< HEAD
/* Dark Mode */
body.dark-mode {
    --primary-gradient: linear-gradient(135deg, #818cf8 0%, #a78bfa 100%);
    --primary-color: #818cf8;
    --primary-dark: #6366f1;
    
    --bg-card: #1e293b;
    --bg-body: #0f172a;
    --bg-header: linear-gradient(135deg, #1e293b 0%, #2d3a4f 100%);
    --bg-table-header: #334155;
    
    --text-primary: #f1f5f9;
    --text-secondary: #cbd5e1;
    --text-muted: #94a3b8;
    --text-white: #ffffff;
    
    --border-color: #475569;
    --border-light: #334155;
    
    --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.5);
    --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.6);
    --shadow-lg: 0 10px 30px rgba(0, 0, 0, 0.7);
}

/* Base Body */
body {
    background: var(--bg-body);
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    margin: 0;
    min-height: 100vh;
    padding: 20px;
    transition: var(--transition);
}

/* ================= প্রিমিয়াম কার্ড ================= */
.premium-card {
    background: var(--bg-card);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-lg);
    overflow: hidden;
    border: 1px solid var(--border-color);
    transition: var(--transition);
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
}

.premium-card:hover {
    box-shadow: var(--shadow-lg);
    transform: translateY(-2px);
}

/* ================= কার্ড হেডার ================= */
.card-header-premium {
    background: var(--bg-header);
    padding: 20px 25px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 2px solid var(--border-color);
}

.card-header-premium h3 {
    margin: 0;
    font-size: 1.3rem;
    font-weight: 600;
    color: var(--text-white);
    display: flex;
    align-items: center;
    gap: 10px;
}

.card-header-premium h3 i {
    font-size: 1.5rem;
}

.header-badge {
    background: rgba(255, 255, 255, 0.2);
    padding: 6px 16px;
    border-radius: 50px;
    font-size: 0.9rem;
    font-weight: 500;
    color: var(--text-white);
    display: flex;
    align-items: center;
    gap: 8px;
    backdrop-filter: blur(4px);
}

/* ================= টেবিল র‍্যাপার ================= */
.table-wrapper {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: none;
    -ms-overflow-style: none;
}

.table-wrapper::-webkit-scrollbar {
    display: none;
}

/* ================= প্রিমিয়াম টেবিল ================= */
.premium-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 600px;
    background: var(--bg-card);
}

/* টেবিল হেডার */
.premium-table thead th {
    background: var(--bg-table-header);
    color: var(--text-primary);
    font-size: 0.85rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 16px 20px;
    white-space: nowrap;
    border-bottom: 2px solid var(--border-color);
    text-align: left;
}

/* টেবিল সারি */
.premium-table tbody tr {
    border-bottom: 1px solid var(--border-color);
    transition: var(--transition);
}

.premium-table tbody tr:hover {
    background: var(--border-light);
}

.premium-table tbody td {
    padding: 16px 20px;
    color: var(--text-primary);
    font-size: 0.95rem;
    vertical-align: middle;
}

/* ================= ক্যাটাগরি ব্যাজ ================= */
.category-badge {
    background: var(--primary-gradient);
    color: white;
    padding: 6px 16px;
    border-radius: 50px;
    font-size: 0.85rem;
    font-weight: 500;
    display: inline-block;
    border: 2px solid rgba(255, 255, 255, 0.2);
}

/* ================= পারসেন্টেজ ব্যাজ ================= */
.percentage-badge {
    background: rgba(16, 185, 129, 0.1);
    color: #10b981;
    padding: 6px 16px;
    border-radius: 50px;
    font-size: 0.85rem;
    font-weight: 600;
    display: inline-block;
    border: 2px solid rgba(16, 185, 129, 0.2);
}

/* ডার্ক মোডে পারসেন্টেজ */
body.dark-mode .percentage-badge {
    background: rgba(16, 185, 129, 0.2);
    color: #4ade80;
}

/* ================= অ্যাকশন বাটন ================= */
.action-buttons {
    display: flex;
    align-items: center;
    gap: 12px;
}

/* এডিট বাটন */
.edit-btn {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: rgba(102, 126, 234, 0.1);
    color: var(--primary-color);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: var(--transition);
    border: 1px solid var(--border-color);
}

.edit-btn:hover {
    background: var(--primary-gradient);
    color: white;
    transform: rotate(15deg) scale(1.1);
    border-color: transparent;
}

.edit-btn i {
    font-size: 1rem;
}

/* ডিলিট বাটন */
.delete-btn {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: rgba(220, 38, 38, 0.1);
    color: #dc2626;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: var(--transition);
    border: 1px solid rgba(220, 38, 38, 0.2);
    border: none;
    padding: 0;
}

.delete-btn:hover {
    background: linear-gradient(135deg, #dc2626, #b91c1c);
    color: white;
    transform: translateY(-3px) scale(1.1);
    box-shadow: 0 5px 15px rgba(220, 38, 38, 0.3);
}

.delete-btn i {
    font-size: 1rem;
}

/* ================= সিরিয়াল নাম্বার ================= */
.serial-number {
    font-weight: 600;
    color: var(--primary-color);
    background: var(--bg-table-header);
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.85rem;
    border: 2px solid var(--border-color);
}

/* ================= মোড টগল বাটন ================= */
.mode-toggle {
    position: fixed;
    bottom: 30px;
    right: 30px;
    background: var(--bg-card);
    border: 2px solid var(--border-color);
    border-radius: 50px;
    padding: 12px 24px;
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    z-index: 1000;
    box-shadow: var(--shadow-lg);
    transition: var(--transition);
}

.mode-toggle:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-lg);
}

.mode-toggle i {
    font-size: 1.2rem;
    color: var(--primary-color);
}

.mode-toggle span {
    color: var(--text-primary);
    font-weight: 500;
}

/* ================= এম্পটি স্টেট ================= */
.empty-state {
    text-align: center;
    padding: 60px 20px;
}

.empty-state i {
    font-size: 64px;
    color: var(--text-muted);
    opacity: 0.5;
    margin-bottom: 16px;
}

.empty-state h4 {
    color: var(--text-primary);
    font-size: 1.2rem;
    margin-bottom: 8px;
}

.empty-state p {
    color: var(--text-secondary);
    font-size: 0.9rem;
}

/* ================= ডাটা টেবল কাস্টমাইজেশন ================= */
.dataTables_wrapper {
    padding: 20px;
}

.dataTables_length,
.dataTables_filter {
    margin-bottom: 20px;
    color: var(--text-primary);
}

.dataTables_length select,
.dataTables_filter input {
    padding: 8px 14px;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-md);
    background: var(--bg-card);
    color: var(--text-primary);
    font-size: 0.9rem;
    margin: 0 5px;
    transition: var(--transition);
}

.dataTables_length select:focus,
.dataTables_filter input:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
}

.dataTables_filter input {
    min-width: 250px;
}

.dataTables_info {
    color: var(--text-secondary);
    font-size: 0.9rem;
    padding: 16px 0;
}

.dataTables_paginate {
    padding: 16px 0;
}

.dataTables_paginate .paginate_button {
    padding: 8px 16px;
    margin: 0 4px;
    border-radius: var(--radius-md);
    border: 2px solid var(--border-color);
    background: var(--bg-card);
    color: var(--text-primary) !important;
    font-weight: 600;
    font-size: 0.9rem;
    transition: var(--transition);
    cursor: pointer;
    display: inline-block;
}

.dataTables_paginate .paginate_button.current,
.dataTables_paginate .paginate_button:hover {
    background: var(--primary-gradient);
    color: white !important;
    border-color: transparent;
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

/* ================= রেস্পন্সিভ ================= */
@media (max-width: 768px) {
    body {
        padding: 15px;
    }
    
    .card-header-premium {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
    
    .header-badge {
        align-self: flex-start;
    }
    
    .premium-table thead th {
        padding: 14px 16px;
        font-size: 0.8rem;
    }
    
    .premium-table tbody td {
        padding: 14px 16px;
        font-size: 0.9rem;
    }
    
    .dataTables_filter input {
        min-width: 180px;
    }
    
    .mode-toggle {
        bottom: 20px;
        right: 20px;
        padding: 10px 20px;
    }
}

@media (max-width: 576px) {
    .card-header-premium {
        padding: 16px 18px;
    }
    
    .card-header-premium h3 {
        font-size: 1.1rem;
    }
    
    .premium-table thead th {
        padding: 12px 14px;
    }
    
    .premium-table tbody td {
        padding: 12px 14px;
    }
    
    .category-badge,
    .percentage-badge {
        padding: 4px 12px;
        font-size: 0.8rem;
    }
    
    .edit-btn,
    .delete-btn {
        width: 32px;
        height: 32px;
    }
    
    .dataTables_length,
    .dataTables_filter {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    
    .dataTables_filter input {
        width: 100%;
        margin-left: 0;
    }
    
    .dataTables_paginate .paginate_button {
        padding: 6px 12px;
        font-size: 0.8rem;
        margin: 0 2px;
    }
    
    .mode-toggle {
        bottom: 15px;
        right: 15px;
        padding: 8px 16px;
    }
    
    .mode-toggle i {
        font-size: 1rem;
    }
    
    .mode-toggle span {
        font-size: 0.85rem;
    }
}

/* হাইড স্ক্রলবার */
* {
    scrollbar-width: none;
    -ms-overflow-style: none;
}

*::-webkit-scrollbar {
    display: none;
}
</style>

<!-- ================= মেইন কন্টেইনার ================= -->
<div class="premium-card">
    <!-- কার্ড হেডার -->
    <div class="card-header-premium">
        <h3>
            <i class="fas fa-tags"></i>
            Loan Categories
        </h3>
        <div class="header-badge">
            <i class="fas fa-database"></i>
            Total: {{ count($data) }} Categories
=======
                        <td>

                            <span class="btn btn-sm  open-modal btnView" data-action="{{route('show-categories-form', $value->id)}}" data-modal="common-modal-md" data-title=" Member Edit" title="Edit" data-id="{{$value->id}}"><i class="fas fa-edit"></i></span> 
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
>>>>>>> f6f83e1344b366a9f2a80543e9004aa96a99037f
        </div>
    </div>

    <!-- টেবিল র‍্যাপার -->
    <div class="table-wrapper">
        <table id="datatablesSimple" class="premium-table" width="100%">
            <thead>
                <tr>
                    <th>SL#</th>
                    <th>Category Name</th>
                    <th>Interest Rate</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($data) && count($data) > 0)
                    @foreach ($data as $value)
                        <tr>
                            <td>
                                <span class="serial-number">{{ $loop->iteration }}</span>
                            </td>
                            <td>
                                <span class="category-badge">
                                    <i class="fas fa-tag me-1"></i>
                                    {{ $value->loan_category }}
                                </span>
                            </td>
                            <td>
                                <span class="percentage-badge">
                                    <i class="fas fa-percent me-1"></i>
                                    {{ number_format($value->percentage, 2) }}%
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <!-- এডিট বাটন -->
                                    <span class="edit-btn open-modal btnView" 
                                          data-action="{{ route('edit-category', $value->id) }}" 
                                          data-modal="common-modal-md" 
                                          data-title="Edit Category" 
                                          title="Edit"
                                          data-id="{{ $value->id }}">
                                        <i class="fas fa-edit"></i>
                                    </span>

                                    <!-- ডিলিট ফর্ম -->
                                    <form action="{{ route('delete', $value->id) }}" method="POST" style="display: inline-block; margin:0; padding:0; background:none;">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this category?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="empty-state">
                            <i class="fas fa-tags"></i>
                            <h4>No Categories Found</h4>
                            <p>Click the button above to add your first category</p>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<!-- ফন্ট অওসাম -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- ডাটা টেবল লিংক -->
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

<script>
$(document).ready(function() {
    $(".premium-table").DataTable({
        "ordering": true,
        "bAutoWidth": true,
        "responsive": false,
        "language": {
            "search": "🔍 Search:",
            "lengthMenu": "Show _MENU_ entries",
            "info": "Showing _START_ to _END_ of _TOTAL_ categories",
            "infoEmpty": "Showing 0 to 0 of 0 categories",
            "infoFiltered": "(filtered from _MAX_ total categories)",
            "paginate": {
                "first": "«",
                "last": "»",
                "next": "›",
                "previous": "‹"
            }
        }
    });
});

// ================= মোড টগল ফাংশন =================
const modeToggle = document.getElementById('modeToggle');
const modeIcon = document.getElementById('modeIcon');
const modeText = document.getElementById('modeText');

// চেক করা আগের মোড
const savedMode = localStorage.getItem('theme');
if (savedMode === 'dark') {
    document.body.classList.add('dark-mode');
    modeIcon.className = 'fas fa-sun';
    modeText.textContent = 'Light Mode';
}

// টগল ফাংশন
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

// সিস্টেম থিম চেঞ্জ শোনা
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

// ডিলিট কনফার্মেশন
function confirmDelete() {
    return confirm('Are you sure you want to delete this category?');
}
</script>