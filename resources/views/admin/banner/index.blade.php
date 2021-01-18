@extends('admin.layout.master')
@section('css')
<style>
.tm-product-name img{
    height : 150px;
}
.tm-product-delete-link button{
    margin-left : -2.5px;
    cursor : pointer;
}
</style>
@endsection
@section('content')
<div class="container mt-5">
    <div class="row tm-content-row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-products">
        <div class="tm-product-table-container">
            <table class="table table-hover tm-table-small tm-product-table">
            <thead>
                <tr>
                <th scope="col">NO</th>
                <th scope="col">FOTO</th>
                <th scope="col">HEADLINE</th>
                <th scope="col">HAPUS</th>
                </tr>
            </thead>
            <tbody>


            @foreach($Banner as $banner)
                <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td class="tm-product-name">
                    <img src="{{asset('img/banner/'.$banner->photo)}}" alt="">
                </td>
                <td>{{$banner->headline}}</td>
                <td>
                    <form action="{{url('admin/settings/banner/'.$banner->id)}}" method="post" class="tm-product-delete-link">
                    @method('delete')
                    @csrf
                            <a href="#" title="Delete" onclick="clicked()">
                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                            </a>

                            <script type="text/javascript">
                                var form = document.querySelector('form');
                                function clicked() {
                                    if (confirm('Do you want to delete ?')) {
                                        form.submit();
                                    } else {
                                        return false;
                                    }
                                }
                            </script>
                    </form>

                    </a>
                </td>
                </tr>
            @endforeach


            </tbody>
            </table>
        </div>
        <!-- table container -->
        

            <button type="button" class="btn btn-primary btn-block text-uppercase mb-3" data-toggle="modal" data-target="#exampleModal">
            Tambah Banner
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content tm-bg-primary-dark">
                <div class="modal-body">
                
                <form action="{{url('/admin/settings/banner')}}" method="post" class="tm-edit-product-form" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label
                      for="name">
                      Headline
                    </label>
                    <input
                      id="name"
                      name="name"
                      type="text"
                      class="form-control validate"
                      required
                    />
                  </div>

                <label class="text-white">Foto</label>
                <div class="col-xl-8 col-lg-8 col-md-12 mx-auto mb-4">
                
                    <div class="tm-product-img-dummy mx-auto">
                    <i
                        class="fas fa-cloud-upload-alt tm-upload-icon"
                        onclick="document.getElementById('fileInput').click();"></i>
                    </div>
                    <div class="custom-file mt-3 mb-3">
                    <input id="fileInput" name="file" type="file" style="display:none;" />
                    </div>
                </div>

                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

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