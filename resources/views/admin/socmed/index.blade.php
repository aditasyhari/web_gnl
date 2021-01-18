@extends('admin.layout.master')
@section('content')

<div class="container tm-mt-big tm-mb-big">
    <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
            <div class="col-12">
            <h2 class="tm-block-title d-inline-block">MEDIA SOSIAL</h2>
            </div>
        </div>
        <div class="row tm-edit-product-row">
            <div class="col-xl-12 col-lg-12 col-md-12">
            <form action="{{ url('admin/settings/socmed') }}" class="tm-edit-product-form" method="post">
            @csrf
                <!--  -->
                
                <div class="form-group mb-3">
                    <label
                        for="wa"
                        >Whatsapp
                    </label>
                    <input
                        id="wa"
                        name="wa"
                        type="text"
                        class="form-control validate"
                        placeholder="contoh: +6287869567xxx"
                        required
                        value="{{ $socmed[0]->name }}"
                    />
                </div>

                <div class="form-group mb-3">
                    <label
                        for="ig"
                        >Instagram
                    </label>
                    <input
                        id="ig"
                        name="ig"
                        type="text"
                        class="form-control validate"
                        placeholder="input username instagram tanpa @"
                        required
                        value="{{ $socmed[1]->name }}"
                    />
                </div>

                <div class="form-group mb-3">
                    <label
                        for="fb"
                        >Facebook
                    </label>
                    <input
                        id="fb"
                        name="fb"
                        type="text"
                        class="form-control validate"
                        placeholder="input link facebook"
                        required
                        value="{{ $socmed[2]->name }}"
                    />
                </div>
                
        </div>

            <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block text-uppercase">Save</button>
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