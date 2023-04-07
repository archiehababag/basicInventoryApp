@extends('admin.admin_master')
@section('admin')
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Customer Page </h4><br><br>
                    
                        <form method="POST" id="myForm" action="{{ route('customer.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Name</label>
                                <div class="form-group col-sm-10">
                                    <input name="name" class="form-control" type="text">
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Mobile No</label>
                                <div class="form-group col-sm-10">
                                    <input name="mobile_no" class="form-control" type="text">
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Email</label>
                                <div class="form-group col-sm-10">
                                    <input name="email" class="form-control" type="email">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Customer Address</label>
                                <div class="form-group col-sm-10">
                                    <input name="address" class="form-control" type="text">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="customer_image" class="col-sm-2 col-form-label">Customer Image</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" name="customer_image" type="file" id="image">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="customer_image" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}" alt="Card image cap">
                                </div>
                            </div>
                            <!-- end row -->
            

                            <input type="submit" class="btn waves-effect waves-light" value="Add Customer Details" style="background-color: #c5d377">

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
                customer_image: {
                    required : true,
                },
            },

            messages : {
                name : {
                    required : 'Customer Name field is required',
                },
                mobile_no : {
                    required : 'Customer Mobile Number field is required',
                },
                email : {
                    required : 'Customer Email field is required',
                },
                address : {
                    required : 'Customer Address field is required',
                },
                customer_image : {
                    required : 'Customer Image field is required',
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

<script type="text/javascript">

    $(document).ready(function() {
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src',e.target.result);
            };
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>
 
@endsection 
