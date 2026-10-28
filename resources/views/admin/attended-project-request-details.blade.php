@extends('admin.layouts.main')
@section('title', 'Attended Project Requests')
@section('content')
    @push('head')
        <link rel="stylesheet" href="{{ asset('adm_assets/assets/plugins/DataTables/datatables.min.css') }}">
        <style>
            .attended-requests-page .card-body {
                padding: 20px;
            }

            .attended-requests-page .table-responsive {
                margin: 0 -20px;
                padding: 0 20px;
            }

            .attended-requests-page .table {
                margin-bottom: 0;
            }

            .attended-requests-page .table tbody tr {
                transition: background-color 0.2s ease, box-shadow 0.2s ease;
            }

            .attended-requests-page .table tbody tr:hover {
                background-color: #fbfcfd;
                box-shadow: inset 3px 0 0 #2dce89;
            }

            .attended-requests-page .project-title {
                color: #212121;
                display: block;
                font-weight: 700;
                line-height: 1.35;
            }

            .attended-requests-page .project-meta,
            .attended-requests-page .client-meta {
                color: #868e96;
                display: block;
                font-size: 12px;
                margin-top: 3px;
            }

            .attended-requests-page .contact-link {
                color: #3e5569;
                display: inline-flex;
                align-items: center;
                gap: 6px;
                font-weight: 600;
                white-space: nowrap;
            }

            .attended-requests-page .contact-link + .contact-link {
                margin-top: 6px;
            }

            .attended-requests-page .contact-link:hover {
                color: #007bff;
                text-decoration: none;
            }

            .attended-status-badge {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                border-radius: 4px;
                font-size: 12px;
                font-weight: 700;
                padding: 7px 12px;
                white-space: nowrap;
            }

            .request-view-btn {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                justify-content: center;
                min-width: 74px;
                border-radius: 4px;
                font-size: 12px;
                font-weight: 700;
                padding: 7px 12px;
                box-shadow: none;
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .request-view-btn:hover,
            .request-view-btn:focus {
                transform: translateY(-1px);
                box-shadow: 0 4px 12px rgba(0, 123, 255, 0.16);
            }

            .request-details-modal .modal-dialog {
                max-width: 760px;
            }

            .request-details-modal .modal-content {
                border: none;
                border-radius: 4px;
                box-shadow: 0 6px 0 0 rgba(0, 0, 0, 0.01), 0 15px 32px 0 rgba(0, 0, 0, 0.12);
                overflow: hidden;
            }

            .request-details-modal.fade .modal-dialog {
                transform: translate(0, 14px) scale(0.98);
                transition: transform 0.25s ease-out;
            }

            .request-details-modal.show .modal-dialog {
                transform: translate(0, 0) scale(1);
            }

            .request-details-modal .modal-header,
            .request-details-modal .modal-footer {
                padding: 20px;
            }

            .request-details-modal .modal-header {
                align-items: center;
                border-bottom: 1px solid #f1f1f1;
            }

            .request-details-modal .modal-title-wrap {
                display: flex;
                align-items: center;
                gap: 15px;
                min-width: 0;
            }

            .request-details-modal .min-w-0 {
                min-width: 0;
            }

            .request-details-modal .modal-icon {
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

            .request-details-modal .modal-title {
                color: #212121;
                font-size: 18px;
                font-weight: 700;
                line-height: 1.25;
            }

            .request-modal-subtitle {
                color: #868e96;
                font-size: 13px;
                margin-top: 3px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            .request-details-modal .modal-body {
                padding: 20px;
                background: #f6f8fb;
            }

            .request-detail-grid {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 12px;
                margin-bottom: 14px;
            }

            .request-detail-item {
                background: #ffffff;
                border: 1px solid #eef1f2;
                border-radius: 4px;
                padding: 14px 15px;
            }

            .request-detail-label {
                color: #879099;
                display: block;
                font-size: 12px;
                font-weight: 700;
                letter-spacing: 0.3px;
                margin-bottom: 5px;
                text-transform: uppercase;
            }

            .request-detail-value {
                color: #3e5569;
                display: block;
                font-size: 14px;
                font-weight: 600;
                line-height: 1.5;
                word-break: break-word;
            }

            .request-note-box {
                background: #ffffff;
                border: 1px solid #eef1f2;
                border-radius: 4px;
                color: #3e5569;
                font-size: 14px;
                line-height: 1.7;
                max-height: 42vh;
                min-height: 120px;
                overflow-y: auto;
                padding: 18px 20px;
                white-space: pre-wrap;
                word-break: break-word;
            }

            .request-details-modal .close {
                color: #4c5667;
                opacity: 1;
                text-shadow: none;
            }

            .request-details-modal .close:hover {
                color: #212121;
            }

            @media (max-width: 767.98px) {
                .request-detail-grid {
                    grid-template-columns: 1fr;
                }
            }

            @media (max-width: 575.98px) {
                .attended-requests-page .card-body {
                    padding: 15px;
                }

                .attended-requests-page .table-responsive {
                    margin: 0 -15px;
                    padding: 0 15px;
                }

                .request-details-modal .modal-dialog {
                    margin: 10px;
                }

                .request-details-modal .modal-header,
                .request-details-modal .modal-body,
                .request-details-modal .modal-footer {
                    padding: 15px;
                }

                .request-note-box {
                    max-height: 48vh;
                    padding: 15px;
                }
            }
        </style>
    @endpush

    <div class="container-fluid attended-requests-page">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-check-circle bg-green"></i>
                        <div class="d-inline">
                            <h5>{{ __('Attended Project Requests') }}</h5>
                            <span>{{ __('Review completed project request conversations') }}</span>
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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Attended Requests') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ __('Attended Requests') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover w-100" id="attended-project-requests-table">
                                <thead>
                                    <tr>
                                        <th>{{ __('Date') }}</th>
                                        <th>{{ __('Project Name') }}</th>
                                        <th>{{ __('Client Name') }}</th>
                                        <th>{{ __('Contact') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Actions') }}</th>
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

    <div class="modal fade request-details-modal" id="requestDetailsModal" tabindex="-1" role="dialog" aria-labelledby="requestDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title-wrap">
                        <span class="modal-icon bg-green">
                            <i class="ik ik-file-text"></i>
                        </span>
                        <div class="min-w-0">
                            <h5 class="modal-title mb-0" id="requestDetailsModalLabel">{{ __('Project Request Details') }}</h5>
                            <div class="request-modal-subtitle" id="requestModalSubtitle"></div>
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="ik ik-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="request-detail-grid">
                        <div class="request-detail-item">
                            <span class="request-detail-label">{{ __('Date') }}</span>
                            <span class="request-detail-value" id="modalDate">N/A</span>
                        </div>
                        <div class="request-detail-item">
                            <span class="request-detail-label">{{ __('Project Name') }}</span>
                            <span class="request-detail-value" id="modalProjectName">N/A</span>
                        </div>
                        <div class="request-detail-item">
                            <span class="request-detail-label">{{ __('Client Name') }}</span>
                            <span class="request-detail-value" id="modalClientName">N/A</span>
                        </div>
                        <div class="request-detail-item">
                            <span class="request-detail-label">{{ __('Email') }}</span>
                            <span class="request-detail-value" id="modalEmail">N/A</span>
                        </div>
                        <div class="request-detail-item">
                            <span class="request-detail-label">{{ __('Phone') }}</span>
                            <span class="request-detail-value" id="modalMobile">N/A</span>
                        </div>
                        <div class="request-detail-item">
                            <span class="request-detail-label">{{ __('Country') }}</span>
                            <span class="request-detail-value" id="modalCountry">N/A</span>
                        </div>
                        <div class="request-detail-item">
                            <span class="request-detail-label">{{ __('Budget') }}</span>
                            <span class="request-detail-value" id="modalBudget">N/A</span>
                        </div>
                        <div class="request-detail-item">
                            <span class="request-detail-label">{{ __('Status') }}</span>
                            <span class="request-detail-value" id="modalStatus">N/A</span>
                        </div>
                    </div>

                    <span class="request-detail-label">{{ __('Notes') }}</span>
                    <div class="request-note-box" id="modalNotes">N/A</div>
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

            const valueOrNA = function(value) {
                const text = String(value || '').trim();
                return text ? text : 'N/A';
            };

            $('#attended-project-requests-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                order: [[0, 'desc']],

                ajax: {
                    url: "{{ route('getAttendedProjectReqDetails') }}",
                    type: "GET"
                },

                columns: [
                    {
                        data: 'request_date',
                        name: 'created_at',
                        render: function(data, type) {
                            if (type !== 'display') {
                                return data;
                            }

                            return `<span class="font-weight-bold">${escapeHtml(valueOrNA(data))}</span>`;
                        }
                    },
                    {
                        data: 'project_name',
                        name: 'plan',
                        render: function(data, type, row) {
                            const projectName = valueOrNA(data);

                            if (type !== 'display') {
                                return projectName;
                            }

                            return `
                                <span class="project-title">${escapeHtml(projectName)}</span>
                                <span class="project-meta">#${escapeHtml(row.id)}</span>
                            `;
                        }
                    },
                    {
                        data: 'client_name',
                        name: 'name',
                        render: function(data, type, row) {
                            const clientName = valueOrNA(data);

                            if (type !== 'display') {
                                return clientName;
                            }

                            return `
                                <span class="project-title">${escapeHtml(clientName)}</span>
                                <span class="client-meta">${escapeHtml(valueOrNA(row.country))}</span>
                            `;
                        }
                    },
                    {
                        data: 'email',
                        name: 'email',
                        orderable: false,
                        render: function(data, type, row) {
                            if (type !== 'display') {
                                return data;
                            }

                            const email = valueOrNA(data);
                            const mobile = valueOrNA(row.mobile);
                            const emailHtml = email !== 'N/A'
                                ? `<a href="mailto:${escapeHtml(email)}" class="contact-link"><i class="fas fa-envelope"></i>${escapeHtml(email)}</a>`
                                : '<span class="text-muted">N/A</span>';
                            const mobileHtml = mobile !== 'N/A'
                                ? `<a href="tel:${escapeHtml(mobile)}" class="contact-link"><i class="fas fa-mobile-alt"></i>${escapeHtml(mobile)}</a>`
                                : '';

                            return `<div>${emailHtml}${mobileHtml ? '<br>' + mobileHtml : ''}</div>`;
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: false,
                        searchable: false,
                        render: function(data, type) {
                            const status = valueOrNA(data);

                            if (type !== 'display') {
                                return status;
                            }

                            return `
                                <span class="badge badge-success attended-status-badge">
                                    <i class="ik ik-check-circle"></i>
                                    ${escapeHtml(status)}
                                </span>
                            `;
                        }
                    },
                    {
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            if (type !== 'display') {
                                return data;
                            }

                            return `
                                <button
                                    type="button"
                                    class="btn btn-primary btn-sm request-view-btn"
                                    data-toggle="modal"
                                    data-target="#requestDetailsModal"
                                    data-project-name="${encodeURIComponent(valueOrNA(row.project_name))}"
                                    data-client-name="${encodeURIComponent(valueOrNA(row.client_name))}"
                                    data-email="${encodeURIComponent(valueOrNA(row.email))}"
                                    data-mobile="${encodeURIComponent(valueOrNA(row.mobile))}"
                                    data-country="${encodeURIComponent(valueOrNA(row.country))}"
                                    data-budget="${encodeURIComponent(valueOrNA(row.budget))}"
                                    data-status="${encodeURIComponent(valueOrNA(row.status))}"
                                    data-date="${encodeURIComponent(valueOrNA(row.request_date))}"
                                    data-notes="${encodeURIComponent(valueOrNA(row.notes))}"
                                >
                                    <i class="ik ik-eye"></i>
                                    View
                                </button>
                            `;
                        }
                    }
                ],

                language: {
                    emptyTable: '<div class="text-center py-4 text-muted">No attended project requests found.</div>',
                    zeroRecords: '<div class="text-center py-4 text-muted">No matching attended requests found.</div>'
                }
            });

            $('#requestDetailsModal').on('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                if (!button) return;

                const readData = function(name) {
                    return decodeURIComponent($(button).attr(name) || 'N/A');
                };

                const projectName = readData('data-project-name');
                const clientName = readData('data-client-name');

                $('#requestDetailsModalLabel').text('Project Request Details');
                $('#requestModalSubtitle').text(clientName !== 'N/A' ? 'Client: ' + clientName : projectName);
                $('#modalProjectName').text(projectName);
                $('#modalClientName').text(clientName);
                $('#modalEmail').text(readData('data-email'));
                $('#modalMobile').text(readData('data-mobile'));
                $('#modalCountry').text(readData('data-country'));
                $('#modalBudget').text(readData('data-budget'));
                $('#modalStatus').text(readData('data-status'));
                $('#modalDate').text(readData('data-date'));
                $('#modalNotes').text(readData('data-notes'));
            });
        });
        </script>
    @endpush
@endsection
