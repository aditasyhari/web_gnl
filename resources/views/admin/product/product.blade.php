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
    <div class="row tm-content-row">
    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-products">
        <div class="tm-product-table-container">
            <table class="table table-hover tm-table-small tm-product-table">
            <thead>
                <tr>
                <th scope="col">&nbsp;</th>
                <th scope="col">PRODUCT NAME</th>
                <th scope="col">UNIT SOLD</th>
                <th scope="col">IN STOCK</th>
                <th scope="col">EXPIRE DATE</th>
                <th scope="col">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row"><input type="checkbox" /></th>
                <td class="tm-product-name">Lorem Ipsum Product 1</td>
                <td>1,450</td>
                <td>550</td>
                <td>28 March 2019</td>
                <td>
                    <a href="#" class="tm-product-delete-link">
                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                    </a>
                </td>
                </tr>
                <tr>
                <th scope="row"><input type="checkbox" /></th>
                <td class="tm-product-name">Lorem Ipsum Product 2</td>
                <td>1,250</td>
                <td>750</td>
                <td>21 March 2019</td>
                <td>
                    <a href="#" class="tm-product-delete-link">
                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                    </a>
                </td>
                </tr>
                <tr>
                <th scope="row"><input type="checkbox" /></th>
                <td class="tm-product-name">Lorem Ipsum Product 3</td>
                <td>1,100</td>
                <td>900</td>
                <td>18 Feb 2019</td>
                <td>
                    <a href="#" class="tm-product-delete-link">
                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                    </a>
                </td>
                </tr>
                <tr>
                <th scope="row"><input type="checkbox" /></th>
                <td class="tm-product-name">Lorem Ipsum Product 4</td>
                <td>1,400</td>
                <td>600</td>
                <td>24 Feb 2019</td>
                <td>
                    <a href="#" class="tm-product-delete-link">
                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                    </a>
                </td>
                </tr>
                
                
                <tr>
                <th scope="row"><input type="checkbox" /></th>
                <td class="tm-product-name">Lorem Ipsum Product 7</td>
                <td>500</td>
                <td>100</td>
                <td>10 Feb 2019</td>
                <td>
                    <a href="#" class="tm-product-delete-link">
                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                    </a>
                </td>
                </tr>
                
                <tr>
                <th scope="row"><input type="checkbox" /></th>
                <td class="tm-product-name">Lorem Ipsum Product 9</td>
                <td>1,200</td>
                <td>800</td>
                <td>24 Jan 2019</td>
                <td>
                    <a href="#" class="tm-product-delete-link">
                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                    </a>
                </td>
                </tr>
                <tr>
                <th scope="row"><input type="checkbox" /></th>
                <td class="tm-product-name">Lorem Ipsum Product 10</td>
                <td>1,600</td>
                <td>400</td>
                <td>22 Jan 2019</td>
                <td>
                    <a href="#" class="tm-product-delete-link">
                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                    </a>
                </td>
                </tr>
                <tr>
                <th scope="row"><input type="checkbox" /></th>
                <td class="tm-product-name">Lorem Ipsum Product 11</td>
                <td>2,000</td>
                <td>400</td>
                <td>21 Jan 2019</td>
                <td>
                    <a href="#" class="tm-product-delete-link">
                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                    </a>
                </td>
                </tr>
            </tbody>
            </table>
        </div>
        <!-- table container -->
        <a
            href="add-product.html"
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
                        Single Kategori
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
<script>
    $(function() {
    $(".tm-product-name").on("click", function() {
        window.location.href = "edit-product.html";
    });
    });
</script>
@endsection