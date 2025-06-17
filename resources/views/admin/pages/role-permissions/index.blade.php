@extends('layout.base')
<style>

</style>
@section('content')
<div class="page-content">
    {{-- @include('layouts.sidebar') --}}
    <div class="content-wrapper">
        <div class="content-inner">
            <div class="page-header page-header-light shadow">
                <div class="page-header-content d-lg-flex">
                    <div class="d-flex">
                        <h4 class="page-title mb-0">
                            Dashboard - <span class="fw-normal">Roles List</span>
                        </h4>
                        <a href="#page_header"
                            class="btn btn-light align-self-center collapsed d-lg-none border-transparent rounded-pill p-0 ms-auto"
                            data-bs-toggle="collapse">
                            <i class="ph-caret-down collapsible-indicator ph-sm m-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="card">
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form action="{{route('admin.rolepermission.save')}}" method="POST">
                            @csrf
                            <input type="hidden" name="role_id" id="role_id" value="{{$id}}">
                            <div class="row g-3 gx-2">
                                @foreach ($permissionAll as $key => $permission)                                
                                    <div class="col-lg-3 col-sm-6 border p-4">                                    
                                        <div class="form-check">
                                            <input 
                                                type="checkbox" 
                                                name="permission[]" 
                                                id="permission_{{ $permission->id }}" 
                                                value="{{ $permission->id }}"
                                                class="form-check-input"
                                                {{ in_array($permission->id, $rolePermissons->toArray()) ? 'checked' : '' }}
                                            >
                                            <label for="permission_{{ $permission->id }}" class="form-check-label" style="user-select: none; cursor: pointer;">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach

                                {{-- @foreach ($permissionAll as $key => $permission)
                                    <div class="col-lg-3 col-sm-6 border p-4">
                                        
                                    </div>                                   
                                @endforeach --}}
                            </div>
                            <hr>
                            <div class="my-3">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        var RoleTable = $('#role-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.role') }}",
                data: function (d) {
                    d.status = $('#status').val();
                }
            },
            columns: [
                {
                    data: null,
                    name: 'select',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {
                        return '<input type="checkbox" class="select-row" value="' + row.id + '">';
                    }
                },
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'action', name: 'action', orderable: false, searchable: false },                
                { data: 'role_name', name: 'role_name' },
                { data: 'created_at', name: 'created_at' },                
                { data: 'access', name: 'access', orderable: false, searchable: false },
            ],

            order: [[1, 'asc']],
            drawCallback: function (settings) {
                $('#select-all').on('click', function () {
                    var isChecked = this.checked;
                    $('#role-table .select-row').each(function () {
                        $(this).prop('checked', isChecked);
                    });
                });
    
                $('.status-toggle').on('click', function () {
                    var roleId = $(this).data('id');
                    var status = $(this).is(':checked') ? 1 : 0;
                    updateStatus(roleId, status);
                });
            }



        });

        $('#status').on('change', function () {
            RoleTable.ajax.reload();
        });

        $(document).ready(function () {
            $('#export-roles').on('click', function () {
                var status = $('#status').val();
                var url = "{{ route('admin.role.export') }}";
                if (status) {
                    url += "?status=" + status;
                }
                window.location.href = url;
            });
        });


        function updateStatus(roleId, status) {
            $.ajax({
                url: `{{ url('admin/role/update-status') }}/${roleId}`,
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: JSON.stringify({ status: status }),
                success: function (data) {
                    if (data.success) {
                        // console.log('Status Updated !!');
                        Swal.fire(
                            'Updated!',
                            'Status Updated',
                            'success'
                        );
                        // alert('Status Updated !!');

                        // location.reload(); // Refresh the page
                        RoleTable.ajax.reload();
                    } else {
                        alert('Failed to update status.');
                    }

                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        }
    });


</script>

<script>
    function editRole(element){
        var roleId = $(element).data('id');
        var roleName = $(element).data('name');

        console.log(roleId, roleName);

        $('#editrole').modal('show');
        $('#editrole').find('#roleid').val(roleId);
        $('#editrole').find('#rolename').val(roleName);
    }

    $('.close-edit-modal').on('click', function (){        
        $('#editrole').modal('hide');
    })
</script>
@endsection