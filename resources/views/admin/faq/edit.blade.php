@extends('admin.layout.master')
@section('content')

<div class="container tm-mt-big tm-mb-big">
    <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
                <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Edit FAQ</h2>
                </div>
            </div>
            <div class="row tm-edit-product-row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <form action="<?= url("/admin/settings/faq/{$faq->id}") ?>" method="post" class="tm-edit-product-form">
                    @method('put')
                    @csrf
                        <div class="form-group mb-3">
                        <label
                            for="question"
                            >Question
                        </label>
                        <input
                            id="question"
                            name="question"
                            type="text"
                            class="form-control validate"
                            value="{{ $faq->question }}"
                            required
                        />
                        </div>
                        <div class="form-group mb-3">
                        <label
                            for="answer"
                            >Answer</label
                        >
                        <textarea
                            class="form-control validate"
                            name="answer"
                            rows="3"
                            style="height: 150px;"
                            required
                        >{{ $faq->answer }}</textarea>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary btn-block text-uppercase">Update FAQ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection
@section('script')

@endsection