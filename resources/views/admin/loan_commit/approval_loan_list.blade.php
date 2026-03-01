
<style>

/* Wrapper */
.action-wrapper{
    position:relative;
    display:inline-block;
}

/* Three Dot Button */
.action-toggle{
    border-radius:50%;
    width:36px;
    height:36px;
    display:flex;
    align-items:center;
    justify-content:center;
    transition:all .3s ease;
}

.action-toggle:hover{
    background:linear-gradient(135deg,#667eea,#764ba2);
    color:#fff;
    transform:rotate(90deg);
}

/* Dropdown Box */
.action-dropdown{
    position:absolute;
    top:45px;
    right:0;
    min-width:160px;
    background:#fff;
    border-radius:12px;
    padding:8px 0;
    display:none;
    z-index:999;
    animation:fadeIn .2s ease-in-out;
}

/* Dropdown Items */
.action-dropdown .dropdown-item{
    padding:8px 15px;
    cursor:pointer;
    transition:all .2s;
    font-size:14px;
}

.action-dropdown .dropdown-item:hover{
    background:#f1f3f9;
    padding-left:20px;
}

/* Animation */
@keyframes fadeIn{
    from{opacity:0; transform:translateY(-5px);}
    to{opacity:1; transform:translateY(0);}
}

</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Loan Request
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatablesSimple" class="data-table table table-bordered " width="100%">
                <thead class="thead-dark">
                    <tr>
                        <th>SL#</th>
                        <th>Serial Number</th>
                        <th>User Name</th>
                        <th>Loan amount</th>
                        <th>Payment Month</th>
                        <th>Payment Year</th>
                                   <th>Status</th>
                        {{-- <th>Add Deposit</th> --}}
                        <th>Loan Terms</th>
                        @if (auth()->user()->user_type == 'admin')
                            <th>Payment Schedule</th>
                            <th>Documents</th>
                        @endif
                        <th>Email</th>
                        <th>Date</th>
             
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if (!empty($data))
                        @foreach ($data as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->loan_commit_id }}</td>
                                <td>{{ $value->user_name }}</td>
                                
                                <td>{{ $value->payment_amount }}</td>
                                <td>{{ $value->payment_month }}</td>
                                <td>{{ $value->loan_year }}</td>

                                 <!-- Status Update -->
                                <td class="text-center">

                                    @if (auth()->user()->user_type == 'admin')
                                        <!-- Admin can change status -->
                                        <select id="statusDropdown{{ $value->id }}"
                                            onchange="updateStatus({{ $value->id }})"
                                            class="form-control 
                @if ($value->status == 'pending') text-danger 
                @elseif($value->status == 'approved') text-success 
                @elseif($value->status == 'rejected') text-danger @endif">

                                            <option value="pending"
                                                {{ $value->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="approved"
                                                {{ $value->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                            <option value="rejected"
                                                {{ $value->status == 'rejected' ? 'selected' : '' }}>Rejected</option>

                                        </select>
                                    @else
                                        <!-- Other users can only see status -->
                                        <span
                                            class="
                                            @if ($value->status == 'pending') text-danger 
                                            @elseif($value->status == 'approved') text-success 
                                            @elseif($value->status == 'rejected') text-danger @endif">

                                            {{ ucfirst($value->status) }}

                                        </span>
                                    @endif

                                </td>

                                <td>
                                    @if ($value->loan_term == 30)
                                        <span class="badge bg-success">Yearly</span>
                                    @elseif($value->loan_term == 7)
                                        <span class="badge bg-primary">Weekly</span>
                                    @else
                                        <span class="badge bg-secondary">Custom</span>
                                    @endif
                                </td>
                                @if (auth()->user()->user_type == 'admin')
                                    <td>{{ $value->payment_schedule }}</td>
                                    <td>
                                        <img src="{{ $value->other_documents
                                            ? asset('images/loan_documents/' . $value->other_documents)
                                            : asset('default/default.jpg') }}"
                                            width="80" style="object-fit:cover; border-radius:6px;">
                                    </td>
                                @endif
                                <td>{{ $value->user ? $value->user->email : 'no email' }}</td>
                                <td>{{ $value->created_at->format('Y-m-d H:i:s') }}</td>

                               


                                {{-- <td>
                                    <a href="#" target="_blank" rel="noopener noreferrer"><i
                                            class="fas fa-user"></i></a>
                                    @if (auth()->user()->user_type == 'admin')
                                        <span class="btn btn-sm open-modal btnView"
                                            data-action="{{ url('show-edit', $value->loan_ide) }}"
                                            data-modal="common-modal-md" data-title=" Member Edit" title="Edit"
                                            data-id="{{ $value->loan_ide }}">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                    @endif
                                </td> --}}

                                <td style="position:relative;">

    <!-- Modern Three Dot Button -->
    <div class="action-wrapper">
        <button type="button" class="btn btn-light btn-sm action-toggle">
            <i class="fas fa-ellipsis-v"></i>
        </button>

        <!-- Dropdown Action Box -->
        <div class="action-dropdown shadow-lg">

            <a href="{{ url('show-view', $value->loan_ide) }}" 
               class="dropdown-item text-info">
                <i class="fas fa-eye me-2"></i> View
            </a>

            @if (auth()->user()->user_type == 'admin')

                <span class="dropdown-item text-warning open-modal btnView"
                      data-action="{{ url('show-edit', $value->loan_ide) }}"
                      data-modal="common-modal-md"
                      data-title="Member Edit"
                      data-id="{{ $value->loan_ide }}">
                    <i class="fas fa-edit me-2"></i> Edit
                </span>

                <button type="button"
                        class="dropdown-item text-danger btnDelete"
                        data-id="{{ $value->loan_ide }}">
                    <i class="fas fa-trash me-2"></i> Delete
                </button>

            @endif
        </div>
    </div>

</td>

                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>


<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script>
    $(document).ready(function() {
        $(".data-table").DataTable({
            "ordering": true,
            "bAutoWidth": true,
        });
    });


    function updateStatus(loan_ide) {
        let statuschange = $("#statusDropdown" + loan_ide).val();

        $.ajax({
            url: "{{ route('update-approval-status') }}",
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token for security
                loan_ide: loan_ide, // The ID of the loan
                status: statuschange, // The new status selected
            },

            success: function(response) {
                // On success, you could show a message, update the UI, etc.
                if (response.success) {
                    if (statuschange === 'pending') {
                        $("#statusDropdown" + loan_ide).removeClass('text-success text-danger').addClass(
                            'text-danger');
                    } else if (statuschange === 'approved') {
                        $("#statusDropdown" + loan_ide).removeClass('text-danger text-success').addClass(
                            'text-success');
                    } else if (statuschange === 'rejected') {
                        $("#statusDropdown" + loan_ide).removeClass('text-success text-danger').addClass(
                            'text-danger');
                    }
                } else {
                    alert(response.message || 'Error updating status');
                }
            },
            error: function() {
                // Handle any AJAX errors
                alert('An error occurred while updating the status');
            }
        });

    }
</script>

<script>
  $(document).on('click', '.action-toggle', function(e){
    e.stopPropagation();

    $(".action-dropdown").not($(this).next()).hide(); // close others
    $(this).next('.action-dropdown').toggle();
});

// click outside to close
$(document).on('click', function(){
    $(".action-dropdown").hide();
});
</script>
