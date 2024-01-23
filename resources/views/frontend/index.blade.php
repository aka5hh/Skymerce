@extends('layouts.app')

@section('title', 'Skymerce')

@section('content')

    <div id="carousel" class="carousel slide">

        @php
            $first = true;
        @endphp

        <div class="carousel-indicators">
            @foreach ($sliders as $key => $slider)
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="{{ $key }}"
                    class="{{ $first ? 'active' : '' }}" aria-current="{{ $first ? 'true' : 'false' }}">
                </button>
                @php
                    $first = false;
                @endphp
            @endforeach
        </div>

        <div class="carousel-inner">
            @foreach ($sliders as $key => $slider)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ $slider->image }}" class="d-block w-100" style="height: 552px;">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="custom-carousel-content">
                            <h1>
                                {!! $slider->title !!}
                            </h1>
                            <p>
                                {!! $slider->description !!}
                            </p>
                            <div>
                                <a href="#" class="btn btn-slider">
                                    Get Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" data-bs-target="#carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" data-bs-target="#carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>

@endsection
