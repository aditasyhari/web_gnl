@extends('user.layout.master')
@section('content')

<div id="accordion" role="tablist" class="container mb-5">
    <h2>FAQ</h2>
    @foreach($faqs as $faq)
    <div class="order-details-confirmation">
        <div class="card">
            <div class="card-header" role="tab" id="heading{{ $faq->id }}">
                <h6 class="mb-0">
                    <a data-toggle="collapse" href="#collapse{{ $faq->id }}" aria-expanded="true" aria-controls="collapse{{ $faq->id }}">{{ $loop->iteration }}. {{ $faq->question }}</a>
                </h6>
            </div>

            <div id="collapse{{ $faq->id }}" class="collapse" role="tabpanel" aria-labelledby="heading{{ $faq->id }}" data-parent="#accordion">
                <div class="card-body">
                    <p>{{ $faq->answer }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>

@endsection