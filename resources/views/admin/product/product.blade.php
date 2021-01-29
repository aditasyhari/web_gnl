@extends('admin.layout.master')
@section('css')
<style>
.tm-category-table-container {
  max-height: 232px;
  margin-bottom: 10px;
  overflow-y: scroll;
}
</style>
@endsection
@section('content')
<div class="container mt-5">
    @if (session('gagal'))
        <div class="alert alert-danger">
            {{ session('gagal') }}
        </div>
    @endif
    <div class="row tm-content-row">
    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-products">
        <div class="tm-product-table-container">
            <table class="table table-hover tm-table-small tm-product-table">
            <thead>
                <tr>
                <th scope="col">&nbsp;</th>
                <th scope="col">Nama Prdduct</th>
                <th scope="col">Harga</th>
                <th scope="col">Category</th>
                <th scope="col">Sub Category</th>
                <th scope="col">&nbsp;</th>
                </tr>
            </thead>
            <tbody>



            @foreach($product1 as $produk1)
                <tr>
                    <th scope="row"><input type="checkbox" class="check-delete" value="{{$produk1->id}}" name='check[]'/></th>
                    <td class="tm-product-name">{{$produk1->name}}</td>
                    <td>{{$produk1->price}}</td>
                    <td>{{$produk1->category}}</td>
                    <td>{{$produk1->subcategory}}</td>
                    <td>
                        <a href='{{url("/admin/product/".$produk1->id."/edit")}}' class="tm-product-delete-link">
                            <i class="fas fa-pen text-white"></i>
                        </a>
                        <form action="{{url('admin/product/'.$produk1->id)}}" class="tm-product-delete-link"  method="post">
                        @method('delete')
                        @csrf
                            <button type="submit" style="border:none;background:none;padding:0;margin:0;">
                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                            </button>
                        </form>

                        </button>
                        
                    </td>
                </tr>
            @endforeach

            @foreach($product2 as $produk2)
                <tr>
                    <th scope="row"><input type="checkbox" class="check-delete" value="{{$produk2->id}}" name='check[]'/></th>
                    <td class="tm-product-name">{{$produk2->name}}</td>
                    <td>{{$produk2->price}}</td>
                    <td>{{$produk2->singlecategory}}</td>
                    <td>-</td>
                    <td>
                        <a href='{{url("/admin/product/".$produk2->id."/edit")}}' class="tm-product-delete-link">
                            <i class="fas fa-pen text-white"></i>
                        </a>
                        <form action="{{url('admin/product/'.$produk2->id)}}" class="tm-product-delete-link"  method="post">
                        @method('delete')
                        @csrf
                            <button type="submit" style="border:none;background:none;padding:0;margin:0;">
                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach

            </tbody>
            </table>
        </div>
        <!-- table container -->
        <a
            href="{{url('/admin/product/create')}}"
            class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
        <button class="btn btn-primary btn-block text-uppercase">
            Delete selected products
        </button>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
            <h2 class="tm-block-title mb-2">Kategori</h2>
            <div class="tm-category-table-container">
                <table class="table tm-table-small tm-product-table">
                <tbody>
                    <tr>
                        <td>
                            <div class="text-warning text-uppercase">Multiple Kategori</div>
                        </td>
                    </tr>
                @foreach($categories as $category)
                    <tr>
                    <td class="tm-product-name">{{ $category->name }}</td>
                    <td class="text-center">
                        <form action="<?= url("/admin/product/category/{$category->id}") ?>" method="post" class="d-inline" id="category">
                        @method('delete')
                        @csrf
                            <a href="#" class="tm-product-delete-link" title="Delete" onclick="clickcategory()">
                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                            </a>
                            <!-- <input type="text" name="name" value="0" class="d-none" id=""> -->
                            <script type="text/javascript">
                                var mult = document.querySelector('#category');
                                function clickcategory() {
                                    if (confirm('Do you want to delete ?')) {
                                        mult.submit();
                                    } else {
                                        return false;
                                    }
                                }
                            </script>

                        </form>
                    </td>
                    </tr>
                @endforeach
                <tr>
                    <td>
                        <div class="text-warning text-uppercase">Single Kategori</div>
                    </td>
                </tr>
                @foreach($singlecategories as $singlecategory)
                    <tr>
                    <td class="tm-product-name">{{ $singlecategory->name }}</td>
                    <td class="text-center">
                        <form action="<?= url("/admin/product/singlecategory/{$singlecategory->id}") ?>" method="post" class="d-inline" id="singlecategory">
                        @method('delete')
                        @csrf
                            <a href="#" class="tm-product-delete-link" title="Delete" onclick="clicksingle()">
                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                            </a>

                            <script type="text/javascript">
                                var sing = document.querySelector('#singlecategory');
                                function clicksingle() {
                                    if (confirm('Do you want to delete ?')) {
                                        sing.submit();
                                    } else {
                                        return false;
                                    }
                                }
                            </script>

                        </form>
                    </td>
                    </tr>
                @endforeach
                    
                </tbody>
                </table>
            </div>
            <!-- table container -->
            <button class="btn btn-primary btn-block text-uppercase mb-3" data-toggle="modal" data-target="#add-kategori">
                Tambah Kategory
            </button>

            <!-- Sub Kategory -->
            <h2 class="tm-block-title mb-2">Sub Kategori</h2>
            <div class="tm-category-table-container">
                <table class="table tm-table-small tm-product-table">
                <tbody>

                @foreach($subcategories as $subcategory)
                    <tr>
                    <td class="tm-product-name">{{ $subcategory->name }}</td>
                    <td class="text-center">
                        <form action="<?= url("/admin/product/subcategory/{$subcategory->id}") ?>" method="post" class="d-inline" id="subcategory">
                        @method('delete')
                        @csrf
                            <a href="#" class="tm-product-delete-link" title="Delete" onclick="clicksub()">
                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                            </a>

                            <script type="text/javascript">
                                var form = document.querySelector('#subcategory');
                                function clicksub() {
                                    if (confirm('Do you want to delete ?')) {
                                        form.submit();
                                    } else {
                                        return false;
                                    }
                                }
                            </script>

                        </form>
                    </td>
                    </tr>
                @endforeach
                    
                </tbody>
                </table>
            </div>            

            <button class="btn btn-primary btn-block text-uppercase mb-3" data-toggle="modal" data-target="#add-sub-kategori">
                Tambah Sub Kategory
            </button>
            
            <!-- Sub kategori -->

         
            <!-- Modal -->
            <div class="modal fade" id="add-kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content tm-bg-primary-dark">

                <div class="modal-body">
                
                <form action="{{ url('admin/product/category') }}" method="post" class="tm-edit-product-form">
                @csrf
                    <div class="form-group mb-3">
                        <label for="category" >Jenis Kategori</label>
                        <select class="custom-select tm-select-accounts"  id="category" name=jenis_kategori >
                        <option value="1">Multiple Kategori</option>
                        <option value="2">Single Kategori</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="name" >Nama Kategori</label>
                        <input id="name" name="name" type="text" class="form-control validate" required />
                    </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>    
                </div>
            </div>
            </div>                

            <!-- Modal -->
            <div class="modal fade" id="add-sub-kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content tm-bg-primary-dark">

                <div class="modal-body">
                
                <form action="{{url('admin/product/subcategory')}}" method="post" class="tm-edit-product-form">
                    @csrf
                  <div class="form-group mb-3">
                    <label for="name" >Nama Sub Kategori</label>
                    <input id="name" name="name" type="text" class="form-control validate" required />
                  </div>

                  <div class="form-group mb-3">
                    <label for="category" >Kategori</label>
                    <select class="custom-select tm-select-accounts" name="category_id" id="category">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                  </div>

                </div>

                    <button type="submit" class="btn btn-primary">Tambah Sub Kategori</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>    
                </div>
            </div>
            </div>  
                
        </div>
    </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{asset('assets/admin/js/axios.min.js')}}"></script>
<script>
    $(function() {
    $(".tm-product-name").on("click", function() {
        window.location.href = "edit-product.html";
    });
    });


    // Check Yang didelete
    function lisDelete(){
        var listdelete = []
        $('.check-delete').each(function () {
            if(this.checked){
                listdelete.push($(this).val())
            };
        });

        axios.post('{{ url('/admin/product/multipledelete') }}', {listdata: listdelete})
            .then(function (response) {
                console.log(response) 

            });

    }
</script>
@endsection