@extends('main.layouts.main-page')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">User Details</h3>
            </div>
            <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                    <button id="createNew" class="btn btn-primary btn-round ms-auto" ><i class="fa fa-plus"></i>Add User</button>
                  </div>
                </div>
                <div class="card-body">
                  <!-- Modal -->
                <div class="modal fade" id="userModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">User Add/Edit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="userForm">
                                    @csrf
                                    <input type="hidden" name="id" id="id">
                                    <div class="mb-3">
                                        <label for="companyName" class="form-label">Company Name</label>
                                        <select name="companyName" id="companyName" class="form-select">
                                            <option value="">Select Company</option>
                                            @php
                                                $company = App\Models\Company::all();
                                            @endphp
                                            @foreach ($company as $com)
                                                <option value="{{$com->id}}">{{$com->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="branchName" class="form-label">Branch Name</label>
                                        <select name="branchName" id="branchName" class="form-select">
                                            <option value="">Select Branch</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="roleName" class="form-label">Role Name</label>
                                        <select name="roleName" id="roleName" class="form-select">
                                            <option value="">Select Role</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userName" class="form-label">User Name</label>
                                        <input type="text" name='userName' id="userName" class="form-control" placeholder="Enter User Name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name='password' id="password" class="form-control" placeholder="Enter Password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="userEmail" class="form-label">Email</label>
                                        <input type="email" name='userEmail' id="userEmail" class="form-control" placeholder="Enter Password">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="saveBtn" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>

                  <div class="table-responsive">
                    <table id="userTable" class="display table table-striped table-hover" >
                      <thead>
                        <tr>
                          <th>Company</th>
                          <th>Branch</th>
                          <th>Role</th>
                          <th>User Name</th>
                          <th style="width: 10%">Action</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#companyName').on('change', function () {
                let companyId = $(this).val();
                loadBranches(companyId); // 🔁 for Add mode
            });
            $('#branchName').on('change', function () {
                let companyId = $('#companyName').val();
                let branchId = $(this).val();
                loadRoles(companyId, branchId); // 🔁 for Add mode
            });

            function loadBranches(companyId, selectedBranchId = null) {
                const $branchSel = $('#branchName');

                $branchSel.html('<option value="">Loading...</option>');

                if (companyId) {
                    $.getJSON(`users/get-branches/${companyId}`, function (branches) {
                        let options = '<option value="">Select Branch</option>';
                        $.each(branches, function (_, br) {
                            options += `<option value="${br.id}">${br.name}</option>`;
                        });
                        $branchSel.html(options);

                        if (selectedBranchId) {
                            $branchSel.val(selectedBranchId); // ✅ Set selected branch during edit
                        }
                    });
                } else {
                    $branchSel.html('<option value="">Select Branch</option>');
                }
            }


            function loadRoles(companyId, branchId, selectedRoleId = null) {
                const $roleSel = $('#roleName');

                $roleSel.html('<option value="">Loading...</option>');

                if (companyId && branchId) {
                    $.getJSON(`/users/get-roles/${companyId}/${branchId}`, function (roles) {
                        let options = '<option value="">Select Role</option>';
                        $.each(roles, function (_, rl) {
                            options += `<option value="${rl.id}">${rl.name}</option>`;
                        });
                        $roleSel.html(options);

                        if (selectedRoleId) {
                            $roleSel.val(selectedRoleId); // ✅ Set selected role during edit
                        }
                    });
                } else {
                    $roleSel.html('<option value="">Select Role</option>');
                }
            }


            let table = $('#userTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/users/list',
                columns: [
                    { data: 'company_name' },
                    { data: 'branch_name'},
                    { data: 'role_name'},
                    { data: 'name'},
                    {
                        data: 'id',
                        render: function (data) {
                            return `
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-primary edit" data-id="${data}">
                                        <i class="fa fa-edit"></i>
                                    </button> &nbsp
                                    <button class="btn btn-sm btn-danger delete" data-id="${data}">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            `;
                        }
                    }
                ]
            });
            $('#createNew').click(function () {
                $('#id').val('');
                $('#companyName').val('');
                $('#branchName').val('');
                $('#roleName').val('');
                $('#userName').val('');
                $('#password').val('');
                $('#userEmail').val('');
                $('#userModal').modal('show');
            });

            $('#userTable').on('click', '.edit', function () {
                let id = $(this).data('id');
                $.get(`/users/edit/${id}`, function (data) {
                    $('#id').val(data.id);
                    $('#userName').val(data.name);
                    $('#userEmail').val(data.email);
                    $('#password').val(data.password);
                    $('#companyName').val(data.company_id);

                    // ✅ Now call reusable functions
                    loadBranches(data.company_id, data.branch_id);
                    loadRoles(data.company_id, data.branch_id, data.role_id);

                    $('#userModal').modal('show');
                });
            });

            $('#saveBtn').click(function () {
                let formData = {
                    id: $('#id').val(),
                    c_name: $('#companyName').val(),
                    b_name: $('#branchName').val(),
                    r_name: $('#roleName').val(),
                    name: $('#userName').val(),
                    password: $('#password').val(),
                    email: $('#userEmail').val(),
                    _token: $('input[name="_token"]').val()
                };
                $.ajax({
                    url: '/users/store',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        $('#userModal').modal('hide');
                        table.ajax.reload();
                    },
                    error: function(xhr) {
                        console.log(error);
                    }
                });
            });

            $('#userTable').on('click', '.delete', function () {
                if (confirm("Are you sure?")) {
                    let id = $(this).data('id');
                    $.ajax({
                        url: `/users/delete/${id}`,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function () {
                            table.ajax.reload();
                        }
                    });
                }
            });
        });

    </script>
@endsection
