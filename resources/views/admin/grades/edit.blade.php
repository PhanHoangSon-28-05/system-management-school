@extends('admin.layouts.app')
@section('title', 'Edit Grade')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="page-title">
                <div class="title_left">
                    <h3>Edit Grade</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="">
                        <div class="x_content">

                            <!-- start form for validation -->
                            <form method="post" action="{{ route('grades.update', $grade->id) }}" id="demo-form"
                                data-parsley-validate>
                                @csrf
                                @method('PUT')

                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="name"
                                        style="font-weight: bold; font-size:15px;">Name
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-10 col-sm-6">

                                        <input class="form-control" type="text" data-validate-length-range="6"
                                            data-validate-words="2" value="{{ old('name') ?? $grade->name }}" name="name"
                                            id="name" required="required" />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror

                                    </div>
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-sm-2 label-align" for="description"
                                        style="font-weight: bold; font-size:15px;">Description
                                        <span class="required" style="color: red;">*</span></label>
                                    <div class="col-md-10 col-sm-6">

                                        <textarea class="form-control" type="text" data-validate-length-range="6" data-validate-words="2" name="description"
                                            id="description" placeholder="...." required="required">{{ old('description') ?? $grade->description }}</textarea>

                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span><br>
                                        @enderror
                                    </div>
                                </div>


                                <br />
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
