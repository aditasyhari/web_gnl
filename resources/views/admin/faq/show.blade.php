@extends('admin.layout.master')

@section('content')

<div class="container tm-mt-big tm-mb-big">
    <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
                <div class="col-12">
                    <a href="{{ url()->previous() }}" class="mr-3">Back</a>
                    <h2 class="tm-block-title d-inline-block">{{ $faq->question }}</h2>
                </div>
            </div>
            <div class="row tm-edit-product-row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    
                    <h5 class="text-white mb-5">{{ $faq->answer }}</h4>

                    <a href="<?= url("/admin/settings/faq/{$faq->id}/edit") ?>" class="tm-product-delete-link" title="Edit"><i class="fas fa-pen text-warning"></i></a>

                    <form action="<?= url("/admin/settings/faq/{$faq->id}") ?>" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                        <a href="#" class="tm-product-delete-link" title="Delete" onclick="clicked()">
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

                </div>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection
@section('script')

@endsection