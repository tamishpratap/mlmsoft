@extends('admin.layouts.main')
@section('title', 'Project Request Details')
@section('content')
    @push('head')
        <link rel="stylesheet" href="{{ asset('adm_assets/assets/plugins/DataTables/datatables.min.css') }}">
        <style>
            .project-requests-page .card-body {
                padding: 20px;
            }

            .project-requests-page .table-responsive {
                margin: 0 -20px;
                padding: 0 20px;
            }

            .project-requests-page .table {
                margin-bottom: 0;
            }

            .project-requests-page .contact-link {
                color: #3e5569;
                font-weight: 600;
                white-space: nowrap;
            }

            .project-requests-page .contact-link:hover {
                color: #007bff;
                text-decoration: none;
            }

            .notes-view-btn {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                min-width: 72px;
                justify-content: center;
                border-radius: 4px;
                font-size: 12px;
                font-weight: 700;
                padding: 7px 12px;
                box-shadow: none;
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .notes-view-btn:hover,
            .notes-view-btn:focus {
                transform: translateY(-1px);
                box-shadow: 0 4px 12px rgba(0, 123, 255, 0.16);
            }

            .status-btn {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                border-radius: 4px;
                font-size: 12px;
                font-weight: 700;
                padding: 7px 12px;
                white-space: nowrap;
            }

            .status-btn:hover,
            .status-btn:focus {
                color: #ffffff;
                text-decoration: none;
            }

            .project-note-modal .modal-dialog {
                max-width: 680px;
            }

            .project-note-modal .modal-content {
                border: none;
                border-radius: 4px;
                box-shadow: 0 6px 0 0 rgba(0, 0, 0, 0.01), 0 15px 32px 0 rgba(0, 0, 0, 0.12);
                overflow: hidden;
            }

            .project-note-modal.fade .modal-dialog {
                transform: translate(0, 14px) scale(0.98);
                transition: transform 0.25s ease-out;
            }

            .project-note-modal.show .modal-dialog {
                transform: translate(0, 0) scale(1);
            }

            .project-note-modal .modal-header,
            .project-note-modal .modal-footer {
                padding: 20px;
            }

            .project-note-modal .modal-header {
                align-items: center;
                border-bottom: 1px solid #f1f1f1;
            }

            .project-note-modal .modal-title-wrap {
                display: flex;
                align-items: center;
                gap: 15px;
                min-width: 0;
            }

            .project-note-modal .min-w-0 {
                min-width: 0;
            }

            .project-note-modal .modal-icon {
                width: 40px;
                height: 40px;
                border-radius: 5px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                flex: 0 0 40px;
                color: #ffffff;
                font-size: 20px;
                box-shadow: 0 2px 12px -3px rgba(0, 0, 0, 0.5);
            }

            .project-note-modal .modal-title {
                color: #212121;
                font-size: 18px;
                font-weight: 700;
                line-height: 1.25;
            }

            .notes-modal-subtitle {
                color: #868e96;
                font-size: 13px;
                margin-top: 3px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            .project-note-modal .modal-body {
                padding: 20px;
                background: #f6f8fb;
            }

            .notes-modal-body {
                min-height: 150px;
                max-height: 50vh;
                overflow-y: auto;
                background: #ffffff;
                border: 1px solid #eef1f2;
                border-radius: 4px;
                color: #3e5569;
                font-size: 14px;
                line-height: 1.7;
                padding: 18px 20px;
                white-space: pre-wrap;
                word-break: break-word;
            }

            .project-note-modal .close {
                color: #4c5667;
                opacity: 1;
                text-shadow: none;
            }

            .project-note-modal .close:hover {
                color: #212121;
            }

            @media (max-width: 575.98px) {
                .project-requests-page .card-body {
                    padding: 15px;
                }

                .project-requests-page .table-responsive {
                    margin: 0 -15px;
                    padding: 0 15px;
                }

                .project-note-modal .modal-dialog {
                    margin: 10px;
                }

                .project-note-modal .modal-header,
                .project-note-modal .modal-body,
                .project-note-modal .modal-footer {
                    padding: 15px;
                }

                .notes-modal-body {
                    max-height: 56vh;
                    padding: 15px;
                }
            }
        </style>
    @endpush
    <div class="container-fluid project-requests-page">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-clipboard bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('New Project Request Details') }}</h5>
                            <span>{{ __('Manage and review project requests') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('admin/dashboard') }}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">{{ __('Admin') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Project Requests') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ __('Project Requests') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover w-100" id="project-requests-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Country</th>
                                        {{-- <th>Plan</th> --}}
                                        {{-- <th>Budget</th> --}}
                                        <th>Notes</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade project-note-modal" id="notesModal" tabindex="-1" role="dialog" aria-labelledby="notesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title-wrap">
                        <span class="modal-icon bg-blue">
                            <i class="ik ik-file-text"></i>
                        </span>
                        <div class="min-w-0">
                            <h5 class="modal-title mb-0" id="notesModalLabel">Project Note</h5>
                            <div class="notes-modal-subtitle" id="notesModalSubtitle"></div>
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="ik ik-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="notesModalBody" class="notes-modal-body"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="ik ik-x-circle"></i> {{ __('Close') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script src="{{ asset('adm_assets/assets/plugins/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('adm_assets/assets/js/datatables.js') }}"></script>
        <script>
        $(function() {
            const escapeHtml = function(value) {
                return String(value || '').replace(/[&<>"']/g, function(character) {
                    const entities = {
                        '&': '&amp;',
                        '<': '&lt;',
                        '>': '&gt;',
                        '"': '&quot;',
                        "'": '&#39;'
                    };

                    return entities[character];
                });
            };

            $('#project-requests-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,

                ajax: {
                    url: "{{ route('getProjectReqDetails') }}",
                    type: "GET"
                },

                columns: [

                    {
                        data: 'id',
                        name: 'id',
                        render: function(data) {
                            return '#' + data;
                        }
                    },

                    {
                        data: 'name',
                        name: 'name',
                        render: function(data, type) {
                            if (type !== 'display') {
                                return data;
                            }

                            return data ? escapeHtml(data) : '<span class="text-muted">N/A</span>';
                        }
                    },

                    {
                        data: 'email',
                        name: 'email',
                        render: function(data) {

                            if (data) {
                                const email = escapeHtml(data);

                                return `
                                    <a href="mailto:${email}" class="contact-link">
                                        <i class="fas fa-envelope"></i> ${email}
                                    </a>
                                `;
                            }

                            return 'N/A';
                        }
                    },

                    {
                        data: 'mobile',
                        name: 'mobile',
                        render: function(data) {

                            if (data) {
                                const mobile = escapeHtml(data);

                                return `
                                    <a href="tel:${mobile}" class="contact-link">
                                        <i class="fas fa-mobile-alt"></i> ${mobile}
                                    </a>
                                `;
                            }

                            return 'N/A';
                        }
                    },

                    {
                        data: 'country',
                        name: 'country',
                        render: function(data, type) {
                            if (type !== 'display') {
                                return data;
                            }

                            return data ? escapeHtml(data) : '<span class="text-muted">N/A</span>';
                        }
                    },

                    // {
                    //     data: 'plan',
                    //     name: 'plan',
                    //     defaultContent: 'N/A'
                    // },

                    // {
                    //     data: 'budget',
                    //     name: 'budget',
                    //     render: function(data) {
                    //         return data ? '$' + data : 'N/A';
                    //     }
                    // },

                    {
                        data: 'notes',
                        name: 'notes',
                        render: function(data, type, row) {
                            const note = data ? String(data) : '';

                            if (type !== 'display') {
                                return note;
                            }

                            if (!note.trim()) {
                                return '<span class="text-muted">N/A</span>';
                            }

                            return `
                                <button
                                    type="button"
                                    class="btn btn-primary btn-sm notes-view-btn"
                                    data-toggle="modal"
                                    data-target="#notesModal"
                                    data-request-name="${encodeURIComponent(row.name || 'Request')}"
                                    data-request-note="${encodeURIComponent(note)}"
                                >
                                    <i class="ik ik-eye"></i>
                                    View
                                </button>
                            `;
                        }
                    },

                    {
                        data: 'status',
                        name: 'status',
                        orderable: false,
                        searchable: false,

                        render: function(data, type, row) {

                            let status = data ? data : 'Unattended';

                            let statusClass =
                                status === 'Unattended' ?
                                'btn-warning' :
                                'btn-success';

                            let icon =
                                status === 'Unattended' ?
                                'ik-clock' :
                                'ik-check-circle';

                            return `
                                <button 
                                    type="button"
                                    class="btn btn-sm status-btn ${statusClass}" 
                                    data-id="${row.id}" 
                                    data-status="${status}">
                                    
                                    <i class="ik ${icon}"></i>
                                    ${status}
                                </button>
                            `;
                        }
                    }

                ],

                language: {

                    emptyTable: '<div class="text-center py-4 text-muted">No data found.</div>',

                    zeroRecords: '<div class="text-center py-4 text-muted">No matching records found.</div>'
                }

            });

            $('#notesModal').on('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                if (!button) return;

                const note = decodeURIComponent($(button).attr('data-request-note') || '');
                const requestName = decodeURIComponent($(button).attr('data-request-name') || 'Request');

                $('#notesModalLabel').text('Project Note');
                $('#notesModalSubtitle').text(requestName ? 'From ' + requestName : 'Project request note');
                $('#notesModalBody').text(note || 'N/A');
            });

            $('#project-requests-table').on('click', '.status-btn', function(e) {

                e.preventDefault();

                let btn = $(this);

                let id = btn.data('id');

                let currentStatus = btn.data('status');

                if (currentStatus === 'Attended') {
                    return;
                }

                $.ajax({

                    url: '/admin/project-request/' + id + '/update-status',

                    type: 'POST',

                    dataType: 'json',

                    data: {

                        _token: '{{ csrf_token() }}',
                        status: 'Attended'
                    },

                    success: function(response) {

                        if (response.success) {

                            let table = $('#project-requests-table').DataTable();

                            let row = btn.closest('tr');

                            table.row(row).remove().draw();
                        }
                    },

                    error: function() {

                        alert('Error updating status. Please try again.');
                    }

                });

            });

        });
        </script>
    @endpush
@endsection
