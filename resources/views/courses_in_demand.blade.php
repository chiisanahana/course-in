<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <title>Courses on Demand | CourseIn</title>
</head>

<body>
    @include('layouts.navbar')

    <div class="container pt-3 pb-2 mb-3">
        <p class="fs-3 fw-bold">Courses on Demand</p>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach ($lessons as $lesson)
                <div class="col">
                    <div class="card h-100">
                        <img src="/storage/{{ $lesson->image }}"
                            class="card-img-top" alt="{{ $lesson->lesson_name }}">
                        <div class="card-body">
                            <h5 class="card-title mb-0">{{ $lesson->lesson_name }}</h5>
                            <small class="card-text text-muted">{{ $lesson->course->course_name }}</small>
                            <p class="card-text my-2">{!! $lesson->price !!}</p>
                            <small class="card-text">{{ $lesson->course->address }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-5">
            {{ $lessons->links() }}
        </div>
    </div>
</body>

</html>
