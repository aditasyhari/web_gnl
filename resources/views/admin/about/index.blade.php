@extends('admin.layout.master')
@section('content')

<div class="container tm-mt-big tm-mb-big">
    <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
            <div class="col-12">
            <h2 class="tm-block-title d-inline-block">Edit About</h2>
            </div>
        </div>
        <div class="row tm-edit-product-row">
            <div class="col-xl-12 col-lg-12 col-md-12">
            <form action="{{url('admin/settings/about')}}" class="tm-edit-product-form" method="post">
            @csrf
                <div class="form-group mb-3">
                <label
                    for="description"
                    >About</label
                >
                <textarea
                    name="desc"
                    class="form-control validate"
                    rows="7"
                    required
                    style="height:100px;"
                >{{ $desc[0]->Desc }}
            </textarea>
            </div>               
                
        </div>

            <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block text-uppercase">Edit About</button>
            </div>
        </form>
        </div>
        </div>
    </div>
    </div>
</div>

@endsection
@section('script')

@endsection