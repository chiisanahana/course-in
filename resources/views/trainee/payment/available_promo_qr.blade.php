<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CourseIn - Available Promo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
</head>

<body>
    @if (!$promos)
        Sorry, promo is not available currently.
    @else
        <h2 class="mt-4 container">Available Promo</h2>
        @foreach ($promos as $promo)
            <div class="container p-0">
                <div class="card text-black bg-light">
                    <h5 class="card-header"><strong>CODE: {{ $promo->code }}</strong></h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $promo->discount * 100 }}% OFF
                            valid for
                            @if ($promo->apply_all == true)
                                all lessons
                            @else
                                {{ $lesson->lesson_name }}
                            @endif
                        </h5>
                        <div class="d-flex justify-content-end">
                            <a href="{{route('qr-payment', [$lesson->id, $promo->code])}}" class="btn btn-primary">Apply Promo</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif


    <script src="{{ asset('js/payment.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>

</html>
