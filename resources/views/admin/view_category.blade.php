@extends('layouts.master')

@section('title', 'View Category | CourseIn')

@section('content')
    @if (session()->has('Success_Message'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('Success_Message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <main class="container">
        <h2 class="fw-bold mt-4 mb-2 text-center"><strong>All Category</strong></h2>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
            integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
        <link rel="stylesheet" href="{{ asset('css/admin_view_category.css') }}">
        <div class="col-lg-12 mt-4">
            <div class="row">
                <div class="user-dashboard-info-box table-responsive bg-white shadow-sm">
                    <table class="table manage-candidates-top mb-0">
                        <tbody>
                            @foreach ($categories as $category)
                                <tr class="candidates-list">
                                    <td class="title">
                                        <div class="thumb">
                                            <img class="img-fluid" src="{{ asset('/storage/' . $category['image']) }}"
                                                class="card-img-top" alt="image"
                                                style="height: 10rem; width: 15rem; object-fit: fill">
                                        </div>
                                        <div class="candidate-list-details">
                                            <div class="candidate-list-info">
                                                <div class="candidate-list-title">
                                                    <h5 class="mb-0">
                                                        <strong>{{ $category->name }}</strong>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="candidate-list-info mb-0 d-flex flex-column justify-content-end">
                                            <div class="candidate-list-option d-flex flex-row justify-content-end gap-2">
                                                <div class="">
                                                    <a href="{{ route('categories.edit', $category->id) }}"
                                                        class="btn btn-primary btn-lg active" tabindex="-1" role="button"
                                                        aria-disabled="true">Update</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
