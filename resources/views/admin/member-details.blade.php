@extends('admin.layouts.main')
@section('title', 'Member Details')
@section('content')
    <!-- Datatables css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-edit bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Member Details') }}</h5>
                            <p class="mb-0">{{ __('All Member Details') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-end">
                    <a href="{{ route('resetStatus') }}" id="reset_status_btn" class="btn btn-warning btn-sm mb-2">
                        {{ __('Reset Status') }}
                    </a>
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item">
                                <a href="#"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">{{ __('Admin') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Member Details') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @if (session('succMsg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('succMsg') }}
            </div>
        @endif
        @if (session('errMsg'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('errMsg') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ __('Data Table') }}</h3>
                    </div>
                    <div class="card-body px-3">
                        <div class="row mb-4 align-items-end px-4">
                            <div class="col-md-4">
                                <label for="from_date"><b>{{ __('From Date') }}</b></label>
                                <input type="date" id="from_date" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="to_date"><b>{{ __('To Date') }}</b></label>
                                <input type="date" id="to_date" class="form-control">
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <button type="button" id="filter_btn" class="btn btn-primary me-2 mr-2">
                                    {{ __('Search') }}
                                </button>
                                <button type="button" id="reset_btn" class="btn btn-secondary">
                                    {{ __('Reset') }}
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive px-4 text-center">
                            <table id="db_tab" class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('S.No') }}</th>
                                        <th>{{ __('Joining') }}</th>
                                        <th>{{ __('MemberId') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Email') }}</th>
                                        <th>{{ __('Mobile') }}</th>
                                        <th>{{ __('Status') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1;  @endphp
                                    {{-- @foreach ($data as $list)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ date('d-m-Y', strtotime($list['created_at'])) }}<br>{{ date('h:i:s',
                                            strtotime($list['created_at'])) }}
                                        </td>
                                        <td>
                                            @if ($list['activated_at'] != null)
                                            {{ date('d-m-Y', strtotime($list['activated_at'])) }}<br>{{ date('h:i:s',
                                            strtotime($list['activated_at'])) }}
                                            @else
                                            -- / -- / ----
                                            @endif

                                        </td>
                                        <td>
                                            @if ($list['profile_image'] == '')
                                            <img src="{{ asset('uploads/avatar.jpg') }}" class="table-user-thumb" alt="">
                                            @else
                                            <img src="{{ asset('uploads') }}/{{ $list['profile_image'] }}"
                                                class="table-user-thumb" alt="">
                                            @endif
                                        </td>
                                        <td>{{ $list['memberid'] }}</td>
                                        <td>{{ $list['name'] }}</td>
                                        <td>{{ $list['email'] }}</td>
                                        <td>{{ $list['mobile'] }}</td>
                                        <td>{{ $list['location'] }}</td>
                                        <td>{{ $list['sponsorid'] }}</td>
                                        <td>{{ $list['sponsor_name'] }}</td>
                                        <td>{{ $list['account_blocked_date'] ?? '--' }}</td>
                                        <td>{{ $list['blockage_reason'] ?? '--' }}</td>
                                        <td>{{ $list['wallet_address'] }}</td>
                                        <td>$ {{ $list['package'] }}</td>
                                        <td>$ {{ $list['investment'] }}</td>
                                        <td>$ {{ $list['p2p_wallet'] }}</td>
                                        <td>$ {{ $list['wallet'] }}</td>
                                        <td>{{ $list['rank'] }}</td>
                                        <td>{{ $list['status'] }}</td>
                                        <td>
                                            <div class="text-white text-center badge badge-primary">
                                                <a class="text-white"
                                                    href="{{ url('admin/member-login') }}/{{ $list['id'] }}"
                                                    target="_blank"><i class="ik ik-eye"></i> View</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


    <!-- Buttons Extension -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>


    <script>
        var token = "{{ csrf_token() }}";
        var table = $('#db_tab').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            pageLength: 10,
            dom: '<"row mb-3"' +
                '<"col-sm-6"l>' +
                '<"col-sm-6 text-end"f>' +
                '>' +
                '<"row mb-3"' +
                '<"col-sm-12"B>' +
                '>' +
                'rtip',
            buttons: [{
                    extend: 'copy',
                    className: 'btn btn-rounded px-3 text-white bg-secondary'
                },
                {
                    extend: 'csv',
                    className: 'btn btn-rounded px-3 text-white bg-info'
                },
                {
                    extend: 'excel',
                    className: 'btn btn-rounded px-3 text-white bg-success'
                },
                {
                    extend: 'pdf',
                    className: 'btn btn-rounded px-3 text-white bg-danger'
                },
                {
                    extend: 'print',
                    className: 'btn btn-rounded px-3 text-white bg-primary'
                }
            ],
            responsive: true,
            ajax: {
                url: "{{ route('getMemberDetails') }}",
                method: 'POST',
                data: function(d) {
                    d._token = token;
                    d.from_date = $('#from_date').val();
                    d.to_date = $('#to_date').val();
                },
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    title: 'S.No.',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'date',
                    name: 'date',
                },
                {
                    data: 'memberid',
                    name: 'memberid',
                },
                {
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'email',
                    name: 'email',
                    render: function(data) {
                        if (data == null || data == '') {
                            return '--';
                        }
                        return data;
                    }
                },
                {
                    data: 'mobile',
                    name: 'mobile',
                    render: function(data) {
                        if (data == null || data == '') {
                            return '--';
                        }
                        return data;
                    }
                },
                {
                    data: 'email_status',
                    name: 'email_status',
                    render: function(data) {
                        var statusText = $('<div>').html(data || '').text().trim() || String(data || '')
                            .trim();
                        if (statusText == 0) {
                            return '<span class="btn btn-sm btn-danger">' + 'Not Send' +
                                '</span>';
                        } else if (statusText == 1) {
                            return '<span class="btn btn-sm btn-success mt-1">' + 'Sent' +
                                '</span>';
                        } else {
                            return '<span class="btn btn-sm btn-secondary mt-1">' +
                                (statusText || '--') +
                                '</span>';
                        }

                    }
                },
            ]
        });

        $('#filter_btn').on('click', function() {
            table.ajax.reload();
        });

        $('#reset_btn').on('click', function() {
            $('#from_date').val('');
            $('#to_date').val('');
            table.ajax.reload();
        });
    </script>

    <!-- Reason Modal -->
    <div class="modal" id="reasonModal" style="display: none; background-color: rgba(0,0,0,0.5);">
        <div class="modal-dialog" style="margin-top: 100px;">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #17a2b8; color: rgb(5, 5, 5); border: none;">
                    <h5 class="modal-title">Blockage Reason</h5>
                    <button type="button" class="btn-close btn-close-warning close-reason-modal"
                        style="cursor: pointer;">X</button>
                </div>
                <div class="modal-body">
                    <p><strong id="reasonContent">-</strong></p>
                </div>
                <div class="modal-footer" style="border-top: 1px solid #dee2e6;">
                    <button type="button" class="btn btn-secondary close-reason-modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // View button click handler
        $(document).on('click', '.view-reason', function(e) {
            e.preventDefault();
            var reason = $(this).data('reason');
            $('#reasonContent').text(reason);
            $('#reasonModal').show();
        });

        // Close button handler
        $(document).on('click', '.close-reason-modal', function(e) {
            e.preventDefault();
            $('#reasonModal').hide();
        });

        // Close when clicking outside modal
        $(document).on('click', '#reasonModal', function(e) {
            if (e.target === this) {
                $(this).hide();
            }
        });
    </script>

@endsection
