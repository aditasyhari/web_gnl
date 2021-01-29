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
                <form action='{{url("/admin/product")}}' method="post" class="tm-edit-product-form" enctype="multipart/form-data">
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
                      required
                    />
                  </div>

                  <div class="form-group mb-3">
                    <label
                      for="category"
                      >Category</label>
                    <select
                      class="custom-select tm-select-accounts"
                      id="category"
                      name="category"
                    >
                    @foreach($categories as $category)
                    <option value={{$category->id}} class="multiple-category">{{$category->name}}</option>
                    @endforeach
                    @foreach($singlecategories as $singlecategory)
                    <option value={{$singlecategory->id}}>{{$singlecategory->name}}</option>
                    @endforeach

                    </select>
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
                    ></textarea>
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

              <div class="col-6 form-group">
                <label for="images" >Upload Gambar</label>
                <input type="file" id="gambarImages" name="images[]" onchange="previewFiles()" class="form-control validate btn btn-primary btn-block text-uppercase mb-3" required multiple >
                <div id="preview"></div>
              </div>
              
              <!-- <div class="clone hide">
                <div class="control-group input-group" style="margin-top:10px">
                  <input type="file" name="images[]" class="form-control">
                  <div class="input-group-btn"> 
                    <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                  </div>
                </div>
              </div> -->

              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
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

subCateg(category.selectedOptions.item('').className)
category.addEventListener("change", 
    function(){
        subCateg(category.selectedOptions.item('').className)
    }
)

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