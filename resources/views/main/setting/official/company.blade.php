@extends('main.layouts.main-page')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Company Details</h3>
            </div>
            <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                    <button id="createNew" class="btn btn-primary btn-round ms-auto" ><i class="fa fa-plus"></i>Add Company</button>
                  </div>
                </div>
                <div class="card-body">
                  <!-- Modal -->
                <div class="modal fade" id="companyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Company Add/Edit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="companyForm">
                                    @csrf
                                    <input type="hidden" name="id" id="id">
                                    <div class="mb-3">
                                        <label for="companyName" class="form-label">Company Name</label>
                                        <input type="text" name='companyName' id="companyName" class="form-control" placeholder="Enter Company Name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="companyEmail" class="form-label">Company Email</label>
                                        <input type="email" name='companyEmail' id="companyEmail" class="form-control" placeholder="Enter Company Email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="companyWeb" class="form-label">Company Website</label>
                                        <input type="text" name='companyWeb' id="companyWeb" class="form-control" placeholder="Enter Company Website">
                                    </div>
                                    <div class="mb-3">
                                        <label for="companyAddress" class="form-label">Company Address</label>
                                        <input type="text" name="companyAddress" id="companyAddress" class="form-control" placeholder="Enter Company Address">
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
                    <table id="companyTable" class="display table table-striped table-hover" >
                      <thead>
                        <tr>
                          <th>Company Name</th>
                          <th>Website</th>
                          <th>Email</th>
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

            let table = $('#companyTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/company/list',
                columns: [
                    { data: 'name' },
                    { data: 'website' },
                    { data: 'email' },
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
                $('#companyEmail').val('');
                $('#companyWeb').val('');
                $('#companyAddress').val('');
                $('#status').val('');
                $('#companyModal').modal('show');
            });

            $('#companyTable').on('click', '.edit', function () {
                let id = $(this).data('id');
                $.get(`/company/edit/${id}`, function (data) {
                    $('#id').val(data.id);
                    $('#companyName').val(data.name);
                    $('#companyEmail').val(data.email);
                    $('#companyWeb').val(data.website);
                    $('#companyAddress').val(data.address);
                    // $('#status').val(data.status);
                    $('#status').prop('checked', data.status == 1);
                    $('#companyModal').modal('show');
                });
            });

            $('#saveBtn').click(function () {
                let formData = {
                    id: $('#id').val(),
                    name: $('#companyName').val(),
                    email: $('#companyEmail').val(),
                    website: $('#companyWeb').val(),
                    address: $('#companyAddress').val(),
                    status: $('#status').is(':checked') ? 1 : 0, // <- Important
                    _token: $('input[name="_token"]').val()
                };
                $.ajax({
                    url: '/company/store',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        $('#companyModal').modal('hide');
                        table.ajax.reload();
                    },
                    error: function(xhr) {
                        console.log(error);
                    }
                });
            });

            $('#companyTable').on('click', '.delete', function () {
                if (confirm("Are you sure?")) {
                    let id = $(this).data('id');
                    $.ajax({
                        url: `/company/delete/${id}`,
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
