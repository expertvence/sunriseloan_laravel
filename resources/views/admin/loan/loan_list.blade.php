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
                        <th>Name</th>
                        {{-- <th>Id</th> --}}
                        <th>Loan amount</th>
                        <th>Monthly Income</th>
                        <th>Add Deposit</th>
                        <th>Loan Terms</th>
                        @if (auth()->user()->user_type == 'admin')
                            <th>Payment Schedule</th>
                            <th>Documents</th>
                        @endif
                        <th>Email</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if (!empty($data))
                        @foreach ($data as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->user ? $value->user->name : 'no user' }}</td>
                                {{-- <td>{{ $value->loan_ide }}</td> --}}
                                <td>{{ $value->loan_amount }}</td>
                                <td>{{ $value->monthly_income }}</td>
                                <td>

                                    {{-- Display Button --}}
                                    <button class="btn btn-sm btn-success editAmountBtn">
                                        {{ number_format($value->deposit, 2) }}
                                    </button>

                                    {{-- Hidden Input Section --}}
                                    <div class="amountEditBox d-none mt-2">
                                        <input type="number" step="0.01"
                                            class="form-control form-control-sm amountInput"
                                            value="{{ $value->deposit }}">

                                        <button class="btn btn-sm btn-primary mt-1 saveAmountBtn"
                                            data-id="{{ $value->id }}">
                                            Save
                                        </button>
                                    </div>

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

                                <!-- Status Update -->
                                <td class="text-center">

                                    @if (auth()->user()->user_type == 'admin')
                                        <!-- Admin can change status -->
                                        <select id="statusDropdown{{ $value->loan_ide }}"
                                            onchange="updateStatus({{ $value->loan_ide }})"
                                            class="form-control 
                @if ($value->status == 'pending') text-danger 
                @elseif($value->status == 'complete') text-success 
                @elseif($value->status == 'rejected') text-danger @endif">

                                            <option value="pending"
                                                {{ $value->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="complete"
                                                {{ $value->status == 'complete' ? 'selected' : '' }}>Accepted</option>
                                            <option value="rejected"
                                                {{ $value->status == 'rejected' ? 'selected' : '' }}>Rejected</option>

                                        </select>
                                    @else
                                        <!-- Other users can only see status -->
                                        <span
                                            class="
                                            @if ($value->status == 'pending') text-danger 
                                            @elseif($value->status == 'complete') text-success 
                                            @elseif($value->status == 'rejected') text-danger @endif">

                                            {{ ucfirst($value->status) }}

                                        </span>
                                    @endif

                                </td>


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

                                    {{-- Main Toggle Button --}}
                                    <button type="button" class="btn btn-sm btn-primary toggleAction">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>

                                    {{-- Hidden Action Buttons --}}
                                    <div class="actionBox d-none mt-2">

                                        {{-- View --}}
                                        <a href="{{ url('show-view', $value->loan_ide) }}" class="btn btn-sm btn-info"
                                            title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        @if (auth()->user()->user_type == 'admin')
                                            {{-- Edit --}}
                                            <span class="btn btn-sm btn-warning open-modal btnView"
                                                data-action="{{ url('show-edit', $value->loan_ide) }}"
                                                data-modal="common-modal-md" data-title="Member Edit"
                                                data-id="{{ $value->loan_ide }}" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </span>

                                            {{-- Delete --}}
                                            <button type="button" class="btn btn-sm btn-danger btnDelete"
                                                data-id="{{ $value->loan_ide }}" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        @endif
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
            url: "{{ route('update-status') }}",
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
                    } else if (statuschange === 'complete') {
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
    $(document).on('click', '.toggleAction', function() {
        $(this).closest('td').find('.actionBox').toggleClass('d-none');
    });

    $(document).on('click', '.editAmountBtn', function() {
        $(this).hide();
        $(this).closest('td').find('.amountEditBox').removeClass('d-none');
    });
</script>
