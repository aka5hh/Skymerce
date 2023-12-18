@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h3> Edit Category
                        <a href="{{ url('admin/category') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" value="{{$category->name}}" class="form-control" />
                                    @error('name') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="slug">Slug</label>
                                    <input type="text" id="slug" name="slug" value="{{$category->slug}}" class="form-control" />
                                    @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" class="form-control" rows="3">{{$category->description}}</textarea>
                                    @error('description') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="image">Image</label>
                                    <input type="file" id="image" name="image" class="form-control" />
                                    <img src="{{asset('/uploads/category/'.$category->image)}}" width="100px" height="100px">
                                    @error('image') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 form-check">
                                    <input type="checkbox" id="status" name="status" {{$category->status =='1' ? 'checked' : ''}} />
                                    <label class="form-check-label" for="status">Status</label>
                                </div>
                            </div>
                            <div class="col-md-12" style="padding-top: 20px; padding-bottom: 20px;">
                                <h4>SEO Tags</h4>
                            </div>
                            <fieldset class="col-md-12">
                                <div class="mb-3">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" id="meta_title" name="meta_title" value="{{$category->meta_title}}" class="form-control" />
                                    @error('meta_title') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="meta_keyword">Meta Keyword</label>
                                    <textarea id="meta_keyword" name="meta_keyword" class="form-control" rows="3" placeholder="Separate keywords with commas">{{$category->meta_keyword}}</textarea>
                                    @error('meta_keyword') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea id="meta_description" name="meta_description" class="form-control" rows="3" placeholder="A brief description of the category for search engines">{{$category->meta_description}}</textarea>
                                    @error('meta_description') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                            </fieldset>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary float-end text-white">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
