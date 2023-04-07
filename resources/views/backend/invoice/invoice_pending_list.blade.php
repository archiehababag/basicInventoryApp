@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"> Pending Invoice List </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Table</a></li>
                            <li class="breadcrumb-item active">All Pending Invoices</li>
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

                        <a href="{{ route('invoice.add') }}" class="btn btn-info btn-rounded waves-effect waves-light" style="float:right"><i class="fas fa-plus-circle"> Add New Invoice</i></a>
                        <br>
                        <br>

                        <h4 class="card-title">Invoice List</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Customer Name</th>
                                <th>Invoice No</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>

                                {{-- @php($i = 1) --}}
                                @foreach ($allData as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item['payment']['customer']['name'] }}</td>
                                    <td> # {{ $item->invoice_no }}</td>
                                    <td>{{ date('d-m-Y',strtotime($item->date)) }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td> $ {{ $item['payment']['total_amount'] }}</td>
                                    <td>
                                        @if ($item->status == '0')
                                            <span class="btn btn-warning">Pending</span>
                                        @elseif ($item->status == '1')
                                            <span class="btn btn-success">Approved</span>
                                        @endif    
                                    </td>
                                    <td>
                                        @if ($item->status == '0')
                                        <a href="{{ route('invoice.approve', $item->id) }}" class="btn btn-success sm" title="Approve Data"><i class="fas fa-check-circle">Approve</i> </a>
                                        <a href="{{ route('invoice.delete', $item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i class="fas fa-trash alt">Delete</i> </a>
                                        @endif
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