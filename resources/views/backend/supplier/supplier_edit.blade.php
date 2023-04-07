@extends('admin.admin_master')
@section('admin')
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Supplier Page </h4><br><br>
                    
                        <form method="POST" id="myForm" action="{{ route('supplier.update') }}" >
                            @csrf

                            <input type="hidden" name="id" value="{{ $suppliers->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Name</label>
                                <div class="form-group col-sm-10">
                                    <input name="name" class="form-control" type="text" value="{{ $suppliers->name }}">
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Mobile No</label>
                                <div class="form-group col-sm-10">
                                    <input name="mobile_no" class="form-control" type="text" value="{{ $suppliers->mobile_no }}">
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Email</label>
                                <div class="form-group col-sm-10">
                                    <input name="email" class="form-control" type="email" value="{{ $suppliers->email }}">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Address</label>
                                <div class="form-group col-sm-10">
                                    <input name="address" class="form-control" type="text" value="{{ $suppliers->address }}">
                                </div>
                            </div>
                            <!-- end row -->
            

                            <input type="submit" class="btn waves-effect waves-light" value="Update Supplier Details" style="background-color: #c5d377">

                        </form>
                    
                    
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    


    </div>
</div>

<script type="text/javascript">

    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                },
                mobile_no: {
                    required : true,
                },
                email: {
                    required : true,
                },
                address: {
                    required : true,
                },
            },

            messages : {
                name : {
                    required : 'Supplier Name field is required',
                },
                mobile_no : {
                    required : 'Supplier Mobile Number field is required',
                },
                email : {
                    required : 'Supplier Email field is required',
                },
                address : {
                    required : 'Supplier Address field is required',
                },
            },

            errorElement : 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        })
    })

</script>

 
@endsection 