@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class = "card">
            <div class = "card-header">
                <h3> Add Category
                    <a href = "{{ url('admin/category') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
            <form action="" enctype="multipart/form-data">

                <div class="row">
                <div class="col-md-6 md-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control"/>
                </div>
                <div class="col-md-6 md-3">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control"/>
                </div>
                <div class="col-md-12 md-3">
                    <label>Descrition</label>
                    <textarea type="text" name="descrition" class="form-control" row="3"></textarea>
                </div>
                <div class="col-md-6 md-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control"/>
                </div>
                <div class="col-md-6 md-3">
                    <label>Status</label><br/>
                    <input type="checkbox" name="status" />
                </div>
                <div class="col-md-12 md-3">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title" class="form-control"/>
                </div>
                <div class="col-md-12 md-3">
                    <label>Meta Keyword</label>
                    <textarea type="text" name="meta_keyword" class="form-control" row="3"></textarea>
                </div>
                <div class="col-md-12 md-3">
                    <label>Meta Descrition</label>
                    <textarea type="text" name="meta_descrition" class="form-control" row="3"></textarea>
                </div>
                <div class="col-md-12 md-3">
                    <button type="submit" class="btn btn-primary float-end">Save</button> 
                </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection