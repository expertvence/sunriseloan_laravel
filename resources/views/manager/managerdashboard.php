<style>
.dashboard-card{
    border-radius:18px;
    padding:25px;
    color:white;
    position:relative;
    overflow:hidden;
    transition:all .4s ease;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
}

.dashboard-card:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 40px rgba(0,0,0,0.15);
}

.card-icon{
    width:55px;
    height:55px;
    border-radius:50%;
    background:rgba(255,255,255,0.2);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:22px;
    margin-bottom:15px;
}

.card-title{
    font-size:15px;
    font-weight:500;
    opacity:.9;
}

.card-value{
    font-size:32px;
    font-weight:700;
    margin-top:5px;
}

/* GRADIENTS */
.bg-loan{
    background:linear-gradient(135deg,#0f766e,#14b8a6);
}

.bg-reject{
    background:linear-gradient(135deg,#b45309,#facc15);
}

.bg-pending{
    background:linear-gradient(135deg,#dc2626,#f87171);
}

.bg-info{
    background:linear-gradient(135deg,#2563eb,#60a5fa);
}

</style>


<div class="container mt-4">
    <h2 class="mb-4">Dashboard</h2>

    <div class="row">

        <!-- TOTAL LOAN -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="dashboard-card bg-loan">
                <div class="card-icon">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <div class="card-title">Total Loan</div>
                <div class="card-value">400</div>
            </div>
        </div>

        <!-- REJECTED -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="dashboard-card bg-reject">
                <div class="card-icon">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="card-title">Rejected Loan</div>
                <div class="card-value">80</div>
            </div>
        </div>

        <!-- PENDING -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="dashboard-card bg-pending">
                <div class="card-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="card-title">Pending Loan</div>
                <div class="card-value">90</div>
            </div>
        </div>

        <!-- OTHER -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="dashboard-card bg-info">
                <div class="card-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="card-title">Total Members</div>
                <div class="card-value">120</div>
            </div>
        </div>

    </div>
</div>