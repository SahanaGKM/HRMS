@extends('main.layouts.main-page')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Menu Details</h3>
            </div>
            <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                    <button id="createNew" class="btn btn-primary btn-round ms-auto" ><i class="fa fa-plus"></i>Add Menu</button>
                  </div>
                </div>
                <div class="card-body">
                  <!-- Modal -->
                <div class="modal fade" id="menuModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Menu Add/Edit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="menuForm">
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
                                        <label for="menuName" class="form-label">Menu Name</label>
                                        <input type="text" name='menuName' id="menuName" class="form-control" placeholder="Enter Menu Name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="menuUrl" class="form-label">Menu Url</label>
                                        <input type="text" name='menuUrl' id="menuUrl" class="form-control" placeholder="Enter Menu Url">
                                    </div>
                                    <div class="mb-3">
                                        <label for="menuIcon" class="form-label">Menu Icon</label>
                                        <input type="text" name='menuIcon' id="menuIcon" class="form-control" placeholder="Enter Menu Icon">
                                    </div>
                                    <div class="mb-3">
                                        <label for="groupId" class="form-label">Group</label>
                                        <select name="groupId" id="groupId">
                                            <option value="">Select Group</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ParentId" class="form-label">Parents</label>
                                        <select name="ParentId" id="ParentId">
                                            <option value="">Select Parent</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="orderBy" class="form-label">Order By</label>
                                        <input type="text" name="orderBy" id="orderBy" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Active/Inactive</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="status" name="status" >
                                            <label class="form-check-label" for="status">Active</label>
                                        </div>
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
                    <table id="menuTable" class="display table table-striped table-hover" >
                      <thead>
                        <tr>
                          <th>Menu</th>
                          <th>By Group Menu</th>
                          <th>By Parent Menu</th>
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
