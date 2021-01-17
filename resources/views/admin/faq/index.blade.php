@extends('admin.layout.master')
@section('content')

<div class="col-12 tm-block-col mx-auto">
    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
        <h2 class="tm-block-title">FAQ</h2>
        <a href="{{ url('admin/settings/faq/create') }}" class="btn btn-primary">+</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">QUESTION</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $faqs as $faq )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="<?= url("/admin/settings/faq/{$faq->id}") ?>" class="text-warning">{{ $faq->question }}</a></td>
                    <td>

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

                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>

@endsection
@section('script')

@endsection