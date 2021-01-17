@extends('user.layout.master')
@section('content')

<div id="accordion" role="tablist" class="container mb-5">
    <h2>About</h2>
    @foreach($tentang as $about)
    <div class="order-details-confirmation">
        <div class="card">
            <div class="card-header" role="tab" id="heading{{ $about->id }}">
                <h6 class="mb-0">
                    <a data-toggle="collapse" href="#collapse{{ $about->id }}" aria-expanded="true" aria-controls="collapse{{ $about->id }}">Tentang Kami</a>
                </h6>
            </div>

            <div id="collapse{{ $about->id }}" class="collapse show" role="tabpanel" aria-labelledby="heading{{ $about->id }}" data-parent="#accordion">
                <div class="card-body">
                    <p>{{ $about->Desc }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>

@endsection