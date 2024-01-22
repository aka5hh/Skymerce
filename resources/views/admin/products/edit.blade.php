@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h3> Edit Products
                        <a href="{{ url('admin/products/') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('admin/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab"
                                    data-bs-toggle="tab"data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">
                                    Home
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seotag-tab" data-bs-toggle="tab"
                                    data-bs-target="#seotag-tab-pane" type="button" role="tab"
                                    aria-controls="seotag-tab-pane" aria-selected="false">
                                    SEO Tags
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                    data-bs-target="#details-tab-pane" type="button" role="tab"
                                    aria-controls="details-tab-pane" aria-selected="false">
                                    Details
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                                    data-bs-target="#image-tab-pane" type="button" role="tab"
                                    aria-controls="image-tab-pane" aria-selected="false">
                                    Product Image
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade border p-5 show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <div class="mb-3">
                                    <label>Select Category</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{$category->id == $product->category_id ?'selected' : ''}}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Product Name</label>
                                    <input type="text" name="name" value="{{$product->name}}" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label>Product Slug</label>
                                    <input type="text" name="slug" value="{{$product->slug}}" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label>Select Brand</label>
                                    <select name="brand" class="form-control">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" {{$brand->id == $product->brand ?'selected' : ''}}> 
                                                {{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Small Descirption (500 words)</label>
                                    <textarea name="small_description"class="form-control" rows="4"> {{$product->small_description}} </textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Descirption</label>
                                    <textarea name="description"  class="form-control" rows="4">{{$product->description}}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade border p-5" id="seotag-tab-pane" role="tabpanel"
                                aria-labelledby="seotag-tab" tabindex="0">
                                <div class="mb-3">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" value="{{$product->meta_title}}" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description"  class="form-control" rows="4">{{$product->meta_description}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control" rows="4">{{$product->meta_keyword}}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade border p-5" id="details-tab-pane" role="tabpanel"
                                aria-labelledby="details-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="original_price">Original Price</label>
                                            <input type="text" name="original_price" value="{{$product->original_price}}" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="selling_price">Selling Price</label>
                                            <input type="text" name="selling_price" value="{{$product->selling_price}}" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="quantity">Quantity</label>
                                            <input type="text" name="quantity" value="{{$product->quantity}}" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Trending</label>
                                            <div class="form-check border p-4">
                                                <input type="checkbox" name="trending" {{$product->trending =='1' ? 'checked' : ''}}
                                                class="form-check-input" style="width: 20px; height: 20px;" />
                                                <label class="form-check-label" for="trending">Mark as Trending</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <div class="form-check border p-4">
                                                <input type="checkbox" name="status" {{$product->status =='1' ? 'checked' : ''}} class="form-check-input"
                                                    style="width: 20px; height: 20px;" />
                                                <label class="form-check-label" for="status">Activate</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade border p-5" id="image-tab-pane" role="tabpanel"
                                aria-labelledby="image-tab" tabindex="0">
                                <div class="mb-3">
                                    <label>Upload Product Images</label>
                                    <input type="file" name="image[]" multiple class="form-control" />
                                </div>
                                <div>
                                    @if ($product->productImages)
                                        @foreach ($product->productImages as $image)
                                            <img src="{{ asset($image->image) }}" style="width: 80px; height: 80px;"
                                                class="me-4 border" alt="img" />
                                        @endforeach
                                    @else
                                        <h5> No Image Found</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
