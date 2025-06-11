@extends('main.layouts.main-page')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Branch Details</h3>
            </div>
            <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                    <button id="createNew" class="btn btn-primary btn-round ms-auto" ><i class="fa fa-plus"></i>Add Branch</button>
                  </div>
                </div>
                <div class="card-body">
                  <!-- Modal -->
                <div class="modal fade" id="branchModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Branch Add/Edit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="companyForm">
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
                                        <input type="text" name='branchName' id="branchName" class="form-control" placeholder="Enter Branch Name">
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
                    <table id="branchTable" class="display table table-striped table-hover" >
                      <thead>
                        <tr>
                          <th>Company</th>
                          <th>Branch</th>
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

            let table = $('#branchTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/branch/list',
                columns: [
                    { data: 'company_name' },
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
                $('#status').val('');
                $('#branchModal').modal('show');
            });

            $('#branchTable').on('click', '.edit', function () {
                let id = $(this).data('id');
                $.get(`/branch/edit/${id}`, function (data) {
                    $('#id').val(data.id);
                    $('#companyName').val(data.company_id);
                    $('#branchName').val(data.name);
                    $('#status').prop('checked', data.status == 1);
                    $('#branchModal').modal('show');
                });
            });

            $('#saveBtn').click(function () {
                let formData = {
                    id: $('#id').val(),
                    c_name: $('#companyName').val(),
                    name: $('#branchName').val(),
                    status: $('#status').is(':checked') ? 1 : 0, // <- Important
                    _token: $('input[name="_token"]').val()
                };
                $.ajax({
                    url: '/branch/store',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        $('#branchModal').modal('hide');
                        table.ajax.reload();
                    },
                    error: function(xhr) {
                        console.log(error);
                    }
                });
            });

            $('#branchTable').on('click', '.delete', function () {
                if (confirm("Are you sure?")) {
                    let id = $(this).data('id');
                    $.ajax({
                        url: `/branch/delete/${id}`,
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
