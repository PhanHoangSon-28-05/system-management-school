@extends('admin.layouts.app')
@section('title', 'Edit Rooms')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="page-title">
                <div class="title_left">
                    <h3>Edit Rooms</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="">
                        <div class="x_content">

                            <!-- start form for validation -->
                            <form method="post" action="{{ route('rooms.update', $room->id) }}" id="demo-form"
                                data-parsley-validate>
                                @csrf
                                @method('PUT')

                                @csrf
                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="name"
                                        style="font-weight: bold; font-size:15px;">Name
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-10 col-sm-6">
                                        <input class="form-control" data-validate-length-range="6" data-validate-words="2"
                                            value="{{ old('name') ?? $room->name }}" name="name" id="name"
                                            type="text" placeholder="name-room" required="required" />
                                        @error('name')
                                            <span class="text-danger">{{ $massage }}</span><br>
                                        @enderror
                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="description"
                                        style="font-weight: bold; font-size:15px;">Description
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-10 col-sm-6">
                                        <textarea class="form-control" type="text" data-validate-length-range="6" data-validate-words="2" name="description"
                                            id="description" required="required">{{ old('description') ?? $room->description }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $massage }}</span><br>
                                        @enderror
                                    </div>
                                </div>

                                <br />
                                <div class="text-center">
                                    @can('update-room')
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    @endcan
                                </div>
                            </form>
                            <!-- end form for validations -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
