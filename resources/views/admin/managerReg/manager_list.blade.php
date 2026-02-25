    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <style>
        td {
            padding: 5px;
        }
    </style>
    <style>
        .status-active {
            background-color: #198754 !important;
            color: #fff !important;
        }

        .status-inactive {
            background-color: #6c757d !important;
            color: #fff !important;
        }

        .status-rejected {
            background-color: #dc3545 !important;
            color: #fff !important;
        }
    </style>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Member List
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatablesSimple" class="data-table table table-bordered " width="100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>SL#</th>
                            <th>Code</th>
                            <th>Name</th>
                            {{-- <th>Age</th>
                             <th>Gender</th>
                            <th>Religion</th> --}}
                            <th>Father's Name</th>
                            <th>Motherd's Name</th>
                            <th>Email</th>
                            {{-- <th>Address</th> --}}
                            <th>Status</th>
                            <th>Created by</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (!empty($data))
                            @foreach ($data as $value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $value->Uid }}</td>
                                    <td>{{ $value->name }}</td>
                                    {{-- <td>{{ $value->age }}</td>
                                     <td>{{ $value->gender }}</td>
                                    <td>{{ $value->religion }}</td> --}}
                                    <td>{{ $value->fathers_mane }}</td>
                                    <td>{{ $value->mothers_mane }}</td>
                                    <td>{{ $value->email }}</td>
                                    {{-- <td>{{ $value->address }}</td> --}}
                                    <td class="text-center">
                                        @if (Auth::user()->user_type == 'admin')
                                            <select class="form-control status-change" data-id="{{ $value->id }}">
                                                <option value="active"
                                                    {{ $value->status == 'active' ? 'selected' : '' }}>Active</option>
                                                <option value="inactive"
                                                    {{ $value->status == 'inactive' ? 'selected' : '' }}>Inactive
                                                </option>
                                                <option value="rejected"
                                                    {{ $value->status == 'rejected' ? 'selected' : '' }}>Rejected
                                                </option>
                                            </select>
                                        @else
                                            @if ($value->status == 'active')
                                                <span class="badge bg-success">Active</span>
                                            @elseif($value->status == 'inactive')
                                                <span class="badge bg-secondary">Inactive</span>
                                            @else
                                                <span class="badge bg-danger">Rejected</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td>{{ $value->created_by }}</td>
                                    <td>
                                        <a href="{{ route('member_profile', $value->id) }}" target="_blank"
                                            rel="noopener noreferrer"><i class="fas fa-user"></i></a>
                                        <span class="btn btn-sm  open-modal btnView"
                                            data-action="{{ route('member-register-form', $value->id) }}"
                                            data-modal="common-modal-md" data-title=" Member Edit" title="Edit"
                                            data-id="{{ $value->id }}"><i class="fas fa-edit"></i></span>

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
                "ordering": false,
                "bAutoWidth": false,
            });
        });

        $(document).on('change', '.status-change', function() {

            let memberId = $(this).data('id');
            let status = $(this).val();

            $.ajax({
                url: "{{ route('member-status-update') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: memberId,
                    status: status
                },
                success: function(response) {
                    console.log(response);
                }
            });

        });

        function updateStatusColor(element) {
            element.removeClass('status-active status-inactive status-rejected');

            if (element.val() === 'active') {
                element.addClass('status-active');
            } else if (element.val() === 'inactive') {
                element.addClass('status-inactive');
            } else if (element.val() === 'rejected') {
                element.addClass('status-rejected');
            }
        }

        // Page load e color set korar jonno
        $('.status-change').each(function() {
            updateStatusColor($(this));
        });

        // Status change korle color change hobe
        $(document).on('change', '.status-change', function() {
            updateStatusColor($(this));

            let memberId = $(this).data('id');
            let status = $(this).val();

            $.ajax({
                url: "{{ route('member-status-update') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: memberId,
                    status: status
                },
                success: function(response) {
                    console.log(response);
                }
            });
        });
    </script>
