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
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Religion</th>
                            <th>Father's Name</th>
                            <th>Motherd's Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (!empty($data))
                        @foreach ($data as $value)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$value->Uid}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->age}}</td>
                            <td>{{$value->gender}}</td>
                            <td>{{$value->religion}}</td>
                            <td>{{$value->fathers_mane}}</td>
                            <td>{{$value->mothers_mane}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->address}}</td>
                            <td class="text-center">{{$value->is_publish == 1 ? 'Active' : 'Diactive'}}</td>
                            <td>
                                <a href="{{route('member_profile',$value->id)}}" target="_blank" rel="noopener noreferrer"><i class="fas fa-user"></i></a>
                                <span class="btn btn-sm  open-modal btnView" data-action="{{route('member-register-form', $value->id)}}" data-modal="common-modal-md" data-title=" Member Edit" title="Edit" data-id="{{$value->id}}"><i class="fas fa-edit"></i></span>

                            </td>
                        </tr>
                        @endforeach
                        @endif


                    </tbody>

                </table>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function() {

        $(".data-table").DataTable({
            "ordering": true,
            "bAutoWidth": true,

        });
    });
</script>