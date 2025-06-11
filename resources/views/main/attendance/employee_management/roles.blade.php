@extends('main.layouts.main-page')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Role Details</h3>
            </div>
            <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                    <button id="createNew" class="btn btn-primary btn-round ms-auto" ><i class="fa fa-plus"></i>Add Role</button>
                  </div>
                </div>
                <div class="card-body">
                  <!-- Modal -->
                <div class="modal fade" id="roleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Role Add/Edit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="roleForm">
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
                                        <input type="text" name='roleName' id="roleName" class="form-control" placeholder="Enter Role Name">
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
                    <table id="roleTable" class="display table table-striped table-hover" >
                      <thead>
                        <tr>
                          <th>Company</th>
                          <th>Branch</th>
                          <th>Role</th>
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
                const companyId   = $(this).val();
                const $branchSel  = $('#branchName');

                $branchSel.html('<option value="">Loading...</option>');

                if (companyId) {
                    $.getJSON(`/roles/get-branches/${companyId}`, function (branches) {
                        let options = '<option value="">Select Branch</option>';
                        $.each(branches, function (_, br) {
                            options += `<option value="${br.id}">${br.name}</option>`;
                        });
                        $branchSel.html(options);
                    })
                    .fail(function (jqXHR, textStatus) {
                        console.error('AJAX error:', textStatus);
                        $branchSel.html('<option value="">Select Branch</option>');
                    });
                } else {
                    $branchSel.html('<option value="">Select Branch</option>');
                }
            });

            let table = $('#roleTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/roles/list',
                columns: [
                    { data: 'company_name' },
                    { data: 'branch_name'},
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
                $('#roleModal').modal('show');
            });

            $('#roleTable').on('click', '.edit', function () {
                let id = $(this).data('id');
                $.get(`/roles/edit/${id}`, function (data) {
                    $('#id').val(data.id);
                    $('#companyName').val(data.company_id);
                    $('#branchName').val(data.branch_id);
                    $('#roleName').val(data.name);
                    $('#roleModal').modal('show');
                });
            });

            $('#saveBtn').click(function () {
                let formData = {
                    id: $('#id').val(),
                    c_name: $('#companyName').val(),
                    b_name: $('#branchName').val(),
                    name: $('#roleName').val(),
                    _token: $('input[name="_token"]').val()
                };
                $.ajax({
                    url: '/roles/store',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        $('#roleModal').modal('hide');
                        table.ajax.reload();
                    },
                    error: function(xhr) {
                        console.log(error);
                    }
                });
            });

            $('#roleTable').on('click', '.delete', function () {
                if (confirm("Are you sure?")) {
                    let id = $(this).data('id');
                    $.ajax({
                        url: `/roles/delete/${id}`,
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
