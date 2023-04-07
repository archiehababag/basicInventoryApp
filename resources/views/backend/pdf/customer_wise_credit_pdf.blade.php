@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Credit Customer Wise Report</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                            <li class="breadcrumb-item active">Credit Customer List</li>
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

                        <div class="row">
                            <div class="col-12">
                                <div class="invoice-title">
                                    <h3>
                                        <img src="{{ asset('logo/inventoryLogo2.png') }}" alt="logo" height="24"/> POS by Archie
                                    </h3>
                                </div>
                                <hr>
                                
                                <div class="row">
                                    <div class="col-6 mt-4">
                                        <address>
                                            <strong>POS by Archie Online Store</strong>
                                            <br>
                                            Cavite, Philippines 4104
                                            <br>
                                            POSbyarchie@archiedev.com
                                        </address>
                                    </div>
                                    <div class="col-6 mt-4 text-end">
                                        <address>

                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>

                      

                        <div class="row">
                            <div class="col-12">
                                <div>

                                    <div class="">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <td><strong>SN</strong></td>
                                                    <td class="text-center"><strong>Customer Name</strong></td>
                                                    <td class="text-center"><strong>Invoice No</strong></td>
                                                    <td class="text-center"><strong>Date</strong></td>
                                                    <td class="text-center"><strong>Amount</strong></td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $total_due = '0';
                                                    @endphp
            
                                                    @foreach ($allData as $key => $item)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td class="text-center">{{ $item['customer']['name'] }}</td>
                                                        <td class="text-center">{{ $item['invoice']['invoice_no'] }}</td>
                                                        <td class="text-center">{{ date('d-m-Y',strtotime($item['invoice']['date'])) }}</td>
                                                        <td class="text-end">${{ $item->due_amount }}</td>
                                                    </tr>
                                                    @php
                                                    $total_due += $item->due_amount;
                                                    @endphp
                                                    @endforeach
                                                    
                                                    <tr>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line text-center">
                                                            <strong>Grand Total</strong></td>
                                                        <td class="no-line text-end"><h4 class="m-0">${{ $total_due }}</h4></td>
                                                    </tr>
                                                </tbody>
                                            </table>


                                            @php
                                            $date = new DateTime('now', new DateTimeZone('Asia/Manila'));
                                            @endphp
                                             <i>Printing Time : {{ $date->format('F j, Y, g:i a') }}</i>
                                        </div>

                                        <div class="d-print-none">
                                            <div class="float-end">
                                                <a href="javascript:window.print()" class="btn btn-light waves-effect waves-light"><i class="fas fa-print">  Print</i></a>
                                                <a href="#" class="btn btn-info waves-effect waves-light ms-2"><i class="ri-download-2-line"> Download</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- end row -->

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->




@endsection