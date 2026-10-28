@extends('admin.layouts.main')
@section('title', 'Referral Income')
@section('content')
 @push('head')
 <link rel="stylesheet" href="{{ asset('adm_assets/assets/plugins/DataTables/datatables.min.css') }}">
 @endpush
 <div class="container-fluid">
 <div class="page-header">
 <div class="row align-items-end">
 <div class="col-lg-8">
 <div class="page-header-title">
 <i class="ik ik-edit bg-blue"></i>
 <div class="d-inline">
 <h5>{{ __('Referral Income')}}</h5>
 <span>{{ __('Referral Income details')}}</span>
 </div>
 </div>
 </div>
 <div class="col-lg-4">
 <nav class="breadcrumb-container" aria-label="breadcrumb">
 <ol class="breadcrumb">
 <li class="breadcrumb-item">
 <a href="#"><i class="ik ik-home"></i></a>
 </li>
 <li class="breadcrumb-item"><a href="#">{{ __('Admin')}}</a></li>
 <li class="breadcrumb-item active" aria-current="page">{{ __('Referral Income')}}</li>
 </ol>
 </nav>
 </div>
 </div>
 </div>


 <div class="row">
 <div class="col-md-12">
 @if (session()->has('wMessage'))
 <div class="alert alert-primary">{{session('wMessage')}}</div>
 @endif
 <div class="card">
 <div class="card-header">
 <h3>{{ __('Referral Income')}}</h3>
 </div>
 <div class="card-body px-5 " style="overflow: auto">
 <div class="responsive">
 <table id="data_table" class="table">
 <thead>
 <tr>
 <th>{{ __('ID') }}</th>
 <th>{{ __('Memberid') }}</th>
 <th>{{ __('Left Forwarded') }}</th>
 <th>{{ __('Left New') }}</th>
 <th>{{ __('Total Left') }}</th>
 <th>{{ __('Right Forwarded') }}</th>
 <th>{{ __('Right New') }}</th>
 <th>{{ __('Total Right') }}</th>
 <th>{{ __('Matching') }}</th>
 <th>{{ __('Total Amount') }}</th>
 <th>{{ __('Flushout') }}</th>
 <th>{{ __('Amount') }}</th>
 <th>{{ __('Forward Left') }}</th>
 <th>{{ __('Forward Right') }}</th>
 <!--<th>{{ __('Installments') }}</th>-->
 <th>{{ __('Status') }}</th>
 </tr>
 </thead>
 <tbody>
 @php $i = 1; @endphp
 @foreach ($bdata as $list)
 <tr>
 <td>{{ $list['id'] }}</td>
 <td>{{ $list['memberid'] }}</td>
 <td>{{ $list['left_forwarded'] }}</td>
 <td>{{ $list['left_new'] }}</td>
 <td>{{ $list['total_left'] }}</td>
 <td>{{ $list['right_forwarded'] }}</td>
 <td>{{ $list['right_new'] }}</td>
 <td>{{ $list['total_right'] }}</td>
 <td>{{ $list['matching'] }}</td>
 <td>{{ $list['total_amount'] }}</td>
 <td>{{ $list['flushout'] }}</td>
 <td>{{ $list['amount'] }} </td>
 <td>{{ $list['forward_left'] }}</td>
 <td>{{ $list['forward_right'] }}</td>
 <!--<td>{{ $list['installments'] }}</td>-->
 <td>
 @if ($list['status'] == 'Unpaid')
 <div class="badge badge-danger">{{ $list['status'] }}</div>
 @elseif ($list['status'] == 'Paid')
 <div class="badge badge-success">{{ $list['status'] }}</div>
 @else
 <div class="badge badge-warning">{{ $list['status'] }}</div>
 @endif
 </td>
 </tr>
 @php $i++; @endphp
 @endforeach
 </tbody>
 </table>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>

 @push('script')
 <script src="{{ asset('adm_assets/assets/plugins/DataTables/datatables.min.js') }}"></script>
 <script src="{{ asset('adm_assets/assets/js/datatables.js') }}"></script>
 @endpush
@endsection
