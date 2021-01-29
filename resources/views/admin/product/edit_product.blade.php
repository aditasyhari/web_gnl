@extends('admin.layout.master')
@section('css')
<style>
.tm-category-table-container {
  max-height: 232px;
  margin-bottom: 10px;
  overflow-y: scroll;
}
.img-upload{
    width : 100%;
    height : 100%;
}

.add-image-plus,
.remove-image-min
{
  width : 30px;
  height : 30px;
  padding :0;
  
}

.add-image-plus i,
.remove-image-min i
{
  margin:0;
}

.hide {
  display: none;
}


</style>
@endsection
@section('content')
<div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Add Product</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form action='{{url("/admin/product/".$product->id)}}' method="post" class="tm-edit-product-form" enctype="multipart/form-data">
                  @method('put')
                  @csrf
                  <div class="form-group mb-3">
                    <label
                      for="name"
                      >Nama Product
                    </label>
                    <input
                      id="name"
                      name="name"
                      type="text"
                      class="form-control validate"
                      value="{{$product->name}}"
                      required
                    />
                  </div>
                  
                  <div class="form-group mb-3">
                    <label
                      for="price"
                      >Harga
                    </label>
                    <input
                      id="price"
                      name="price"
                      type="text"
                      class="form-control validate"
                      value="{{$product->price}}"
                      required
                    />
                  </div>

                  <div class="form-group mb-3">
                    <label
                      for="category"
                      >Category</label>


                    @if($product->sub_category_id == null)
                      
                    
                    <select
                      class="custom-select tm-select-accounts"
                      id="category"
                      name="category"
                      value="{{$product->single_category_id}}"
                    >
                    @foreach($singlecategories as $singlecategory)
                    <option value={{$singlecategory->id}}>{{$singlecategory->name}}</option>
                    @endforeach
                    @foreach($categories as $category)
                    <option value={{$category->id}} class="multiple-category">{{$category->name}}</option>
                    @endforeach
                   

                    </select>
                    @else
                    <select
                      class="custom-select tm-select-accounts"
                      id="category"
                      name="category"
                      value="{{$multicategori->category_id}}"
                    >
                    @foreach($categories as $category)
                    <option value={{$category->id}} class="multiple-category">{{$category->name}}</option>
                    @endforeach
                    @foreach($singlecategories as $singlecategory)
                    <option value={{$singlecategory->id}}>{{$singlecategory->name}}</option>
                    @endforeach

                   

                    </select>
                    @endif

                  </div>

                  <div class="form-group mb-3">
                    <label
                      for="category"
                      >Sub Category</label
                    >
                    <select
                      class="custom-select tm-select-accounts"
                      id="sub-category"
                      name="sub_category"
                    >
                      <option >Select sub category</option>

                    </select>
                  </div>

                  <div class="form-group mb-3">
                    <label
                      for="description"
                      >Description</label
                    >
                    <textarea
                      class="form-control validate"
                      rows="3"
                      name="desc"
                      style="height: 100px;"
                      required
                    >{{$product->desc}}</textarea>
                  </div>
              </div>

              <!-- <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
               
                <div class="col-xl-12 col-lg-12 col-md-12 mx-auto image-multiple">
                  <div class="tm-product-img-dummy mx-auto">
                    <img id="img-upload" src='' alt="" class="img-upload">
                  </div>
                  <div class="custom-file mt-3 mb-3">
                    <input id="fileInput" name="images[]" type="file" onchange="readURL(this);" style="display:none;" oninvalid="console.log('a')" multiple required>
                    <input
                      type="button"
                      class="btn btn-primary btn-block mx-auto"
                      value="UPLOAD PRODUCT IMAGE"
                      onclick="document.getElementById('fileInput').click();"
                    >
                  </div>
                </div>

                <div class="float-right mt-2 btn btn-primary add-image-plus" onclick="addImage()"> 
                    <i class="fas fa-plus mx-auto"></i>
                </div>

                <div class="float-right mt-2 btn btn-primary remove-image-min"> 
                  <i class="fas fa-minus mx-auto"></i>
                </div>
                
              </div> -->

              <div class="col-md-6 form-group">
              <div class="row col-md-12 mb-3">
              <label class="col-md-12" >Gambar</label>
              @foreach($product->images as $images)
                <div class="col-md-6 mx-auto mb-4">
                  <a href='{{url("/admin/product/image/delete/".$images->id)}}' class="delete-img float-right text-center"><i class="far fa-trash-alt text-warning mx-auto"></i></a>
                  <img src='{{url("/img/product/".$images->name)}}' alt="" style="width:100%;height:200px;">
                </div>
              @endforeach
              </div>
                <label for="images" >Tambah Gambar</label>
                <!-- <input type="file" id="gambarImages" name="images[]" onchange="readURL(this);" class="form-control validate" required multiple > -->
                <input id="gambarImages" id="gambarImages" name="images[]" class="btn btn-primary btn-block text-uppercase mb-3 validate" type="file" onchange="previewFiles()" multiple>
<div id="preview" class="row col-md-12"></div>
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block text-uppercase">Edit Product</button>
              </div>
              
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>



@endsection
@section('script')
<script src="{{asset('assets/admin/js/axios.min.js')}}"></script>



<script>

var category = document.getElementById('category')
var sub_category = document.getElementById('sub-category')


category.addEventListener("change", 
    function(){
        subCateg(category.selectedOptions.item('').className)
    }
)

var cekS= String({{$product->single_category_id}})


  if(cekS === ""){
    $('#category').val({{$multicategori->category_id}})
    subCateg(category.selectedOptions.item('').className)
    $('#sub-category').val({{$product->sub_category_id}})
    console.log({{$product->sub_category_id}})
  }else{
        $('#category').val({{$product->single_category_id}})
        $('#sub-category option').remove()
        $('#sub-category').append('<option value="0">tidak ada</option>')
        sub_category.disabled = true
  }


function subCateg(a){
    if(a == "multiple-category"){
        data_subcategory()
        sub_category.disabled = false
    }else{
        $('#sub-category option').remove()
        $('#sub-category').append('<option value="0">tidak ada</option>')

        sub_category.disabled = true
    }
}

function data_subcategory(){
    axios.post('{{ url('/subcategory/getsubcategory') }}', {category_id: $("#category").val()})
        .then(function (response) {
            $('#sub-category option').remove() 
            console.log(response) 
            $.each(response.data, function (id,sub_category) {
                    var sub = $('#sub-category')                        
                    sub.append("<option value='"+sub_category.id+"'>"+sub_category.name+"</option>")
          
            })

        });
}



function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                // $('#img-upload')
                //     .attr('src', e.target.result);
                console.log(e.target.result)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL2(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var idIm = '#'+id
            reader.onload = function (e) {
                $(idIm)
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

// $(document).ready(function() {
//   $(".btn-success").click(function(){ 
//       var html = $(".clone").html();
//       $(".increment").after(html);
//   });
//   $("body").on("click",".btn-danger",function(){ 
//       $(this).parents(".control-group").remove();
//   });
// });

var noclone = 1
function addImage(){
  var idImgClone = 'imgClone'+noclone;
  var namaClone = 'fileImage'+noclone;
  var clone_image = '<div class="col-xl-12 col-lg-12 col-md-12 mx-auto image-multiple"><div class="tm-product-img-dummy mx-auto"><img id="'+idImgClone+'" src="" alt="" class="img-upload"></div><div class="custom-file mt-3 mb-3"><input id="'+namaClone+'" class="input-hide-clone" name="images[]" type="file" style="display:none;" multiple /><input type="button" class="btn btn-primary btn-block mx-auto button-clone" value="UPLOAD PRODUCT IMAGE"/></div></div>'

  if($( ".image-multiple").length == 1 ){
    $(".remove-image-min").attr("onclick", "removeImage()");
  }


  $(clone_image).insertAfter(".image-multiple:last")

  // $(".image-multiple:last").after(clone_image);
  $(".image-multiple:last .button-clone").attr("onclick", "document.getElementById('"+namaClone+"').click()");
  $(".image-multiple:last .input-hide-clone").attr("onchange", "readURL2(this,'"+idImgClone+"');");

  

  noclone++;
}

function removeImage(){
  $( ".image-multiple:last" ).remove()
  noclone--;
  if($( ".image-multiple").length < 2 ){
    $(".remove-image-min").removeAttr("onclick");
  }
}

function previewFiles() {

var preview = document.querySelector('#preview');
var files   = document.querySelector('input[type=file]').files;

function readAndPreview(file) {

  if ( /\.(jpe?g|png|gif)$/i.test(file.name) ) {
    var reader = new FileReader();
    $( "#preview img" ).remove()

    reader.addEventListener("load", function () {
      var image = new Image();
      image.height = 100;
      image.title = file.name;
      image.className = "col-md-4 col-sm-4 mx-auto mb-2"
      image.src = this.result;
      preview.appendChild( image );
    }, false);

    reader.readAsDataURL(file);
  }

}

if (files) {
  [].forEach.call(files, readAndPreview);
}

}


</script>
@endsection