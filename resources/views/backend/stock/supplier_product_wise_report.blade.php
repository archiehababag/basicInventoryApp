@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Supplier | Product Inventory List </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Table</a></li>
                            <li class="breadcrumb-item active">Supplier | Products</li>
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
                            <div class="col-md-12 text-center">
                                <strong>Supplier Report</strong>
                                <input type="radio" name="supplier_product_wise" value="supplier_wise" class="search_value">
                                &nbsp;
                                &nbsp;
                                &nbsp;

                                <strong>Product Report</strong>
                                <input type="radio" name="supplier_product_wise" value="product_wise" class="search_value">
                            </div>
                        </div> <!-- end row -->
                        <br>
                        

                        <!-- supplier start -->
                        <div class="show_supplier" style="display: none">
                             <form method="GET" action="{{ route('supplier.wise.pdf') }}" id="myForm" target="_blank">
                                <div class="row">

                                    <div class="col-sm-8 form-group">
                                        <label for="">Supplier Name</label>
                                        <select name="supplier_id" class="form-select select2" aria-label="Default select example">
                                            <option value="">Select Supplier</option>
    
                                            @foreach ($supplier as $supp)
                                                <option value="{{ $supp->id }}">{{ $supp->name }}</option>
                                            @endforeach

                                        </select> 
                                    </div>

                                    <div class="col-sm-4" style="padding-top: 28px">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>

                                </div>
                             </form>
                        </div>
                        <!-- supplier end -->

                        <!-- product start -->
                        <div class="show_product" style="display: none">
                            <form method="GET" action="{{ route('product.wise.pdf') }}" id="myForm" target="_blank">
                               <div class="row">

                                    <div class="col-md-4">
                                        <div class="md-3">
                                            <label for="example-text-input" class="form-label">Category Name</label>
                                            <select name="category_id" id="category_id" class="form-select select2" aria-label="Default select example">
                                                <option selected="">Open this select menu</option>
        
                                                @foreach ($category as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
        
                                    <div class="col-md-4">
                                        <div class="md-3">
                                            <label for="example-text-input" class="form-label">Product Name</label>
                                            <select name="product_id" id="product_id" class="form-select select2" aria-label="Default select example">
                                                <option selected="">Open this select menu</option>
        
                                                
                                            
                                            </select>
                                        </div>
                                    </div>

                                   <div class="col-sm-4" style="padding-top: 28px">
                                       <button type="submit" class="btn btn-primary">Search</button>
                                   </div>

                               </div>
                            </form>
                       </div>
                        <!-- product end -->


                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        
    </div> <!-- container-fluid -->
</div>


<script type="text/javascript">

    $(function(){
       $(document).on('change','#category_id',function(){
            var category_id = $(this).val();
            $.ajax({
                url:"{{ route('get-product') }}",
                type: "GET",
                data:{category_id:category_id},
                success:function(data){
                    var html = '<option value="">Select Product</option>';
                    $.each(data,function(key,v){
                        html += '<option value=" '+v.id+' "> '+v.name+' </option>';
                    });
                    $('#product_id').html(html);
                }
            })
       }); 
    });

</script>


<script type="text/javascript">
    
    $(document).on('change','.search_value',function(){
        var search_value = $(this).val();
        if(search_value == 'supplier_wise'){
            $('.show_supplier').show();
        }else{
            $('.show_supplier').hide();
        }
    });

</script>

<script type="text/javascript">
    
    $(document).on('change','.search_value',function(){
        var search_value = $(this).val();
        if(search_value == 'product_wise'){
            $('.show_product').show();
        }else{
            $('.show_product').hide();
        }
    });

</script>

<script type="text/javascript">

    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                supplier_id: {
                    required : true,
                },
            },

            messages : {
                supplier_id : {
                    required : 'Supplier Name field is required',
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