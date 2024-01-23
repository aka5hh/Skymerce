@extends('layouts.admin')

@section('title', 'Slider')


@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3> Slider List
                        <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary btn-sm text-white float-end">Add
                            Add Slider</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($slider as $slider)
                                <tr>
                                    <td>{{ $slider->id }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td>
                                        <img src="{{ asset($slider->image) }}" alt="Slider Image" width="70px" />
                                    </td>
                                    <td>{{ $slider->status == '1' ? 'Visible' : 'Hidden' }}</td>
                                    <td>
                                        <a href="{{ url('admin/sliders/' . $slider->id . '/edit') }}"
                                            class="btn btn-success">Edit</a>
                                        <a class="btn btn-danger" href="#" id="Delete" data-bs-toggle="modal" data-bs-target="#DeleteModal"
                                            data-id="{{ $slider->id }}">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No Sliders Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- delete modal code -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ url('admin/sliders/' . $slider->id . '/delete') }}" method="GET">
                @csrf
                <div class="modal-content modal_content">
                    <div class="modal-header modal_header">
                        <h4 class="modal-title modal_title" id="DeleteModalLabel"><i class="fab fa-gg-circle"></i>Confirm
                            Message</h4>
                    </div>
                    <div class="modal-body modal_body">
                        Do you want to delete this slider ?
                        <input type="hidden" name="modal_id" id="modal_id" />
                    </div>
                    <div class="modal-footer modal_footer">
                        <button type="submit" class="btn btn-sm btn-success">Confirm</button>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
