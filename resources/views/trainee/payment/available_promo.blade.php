<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CourseIn - Available Promo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="{{asset('css/payment.css')}}">
</head>
<body>
    @foreach ($promos as $promo)
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">{{$promo->code}}</h5>
                <form action="/validate-promo" method="POST">
                    @csrf
                    <input type="hidden" name="lesson_id" value="{{$promo->lesson_id}}">
                    <input type="hidden" name="promo_id" value="{{$promo->id}}">
                    <button type="submit">Apply</button>
                </form>
            </div>
        </div>
    @endforeach

    <script src="{{asset('js/payment.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
</body>
</html>