@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"> Credit Customers List </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Table</a></li>
                            <li class="breadcrumb-item active">All Credit Customers</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ route('credit.customer.print.pdf') }}" target="_blank" class="btn btn-info btn-rounded waves-effect waves-light" style="float:right"><i class="fas fa-print"> Print Credit Customer List</i></a>
                        <br>
                        <br>

                        <h4 class="card-title">Credit Customers List</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th class="text-center">SN</th>
                                <th class="text-center">Customer Name</th>
                                <th class="text-center">Invoice No</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>


                            <tbody>

                                {{-- @php($i = 1) --}}
                                @foreach ($allData as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item['customer']['name'] }}</td>
                                    <td class="text-center">#{{ $item['invoice']['invoice_no'] }}</td>
                                    <td>{{ date('d-m-Y',strtotime($item['invoice']['date'])) }}</td>
                                    <td class="text-end">$ {{ $item->due_amount }}</td>

                                    <td class="text-center">
                                        <a href="{{ route('customer.edit.invoice', $item->invoice_id) }}" class="btn btn-info sm" title="Edit Data"><i class="fas fa-edit">Edit</i> </a>
                                        <a href="{{ route('customer.invoice.details.pdf', $item->invoice_id) }}" target="_blank" class="btn btn-warning sm" title="Customer Invoice Details"><i class="fas fa-eye"> Invoice Details</i> </a>
                                    </td>

                                </tr>
                                @endforeach
                            
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        
    </div> <!-- container-fluid -->
</div>


@endsection