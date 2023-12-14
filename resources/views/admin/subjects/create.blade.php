@extends('admin.layouts.app')
@section('title', 'Create Subjects')
@section('content')
<div class="right_col" role="main">
    <div class="row">
        <div class="page-title">
            <div class="title_left">
                <h3>Create Subjects</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="">
                    <div class="x_content">

                        <!-- start form for validation -->
                        <form method="post" action="{{ route('subjects.store') }}" id="demo-form" data-parsley-validate>
                            @csrf
                            <div class="field item form-group">
                                <label class="col-form-label col-sm-2 label-align" for="name" style="font-weight: bold; font-size:15px;">Name
                                    <span class="required" style="color: red;">*</span></label>
                                <div class="col-md-10 col-sm-6">
                                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" value="{{ old('name') }}" name="name" id="name" type="text" placeholder="name-subject" required="required" />
                                    @error('name')
                                    <span class="text-danger">{{ $massage }}</span><br>
                                    @enderror
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-sm-2 label-align" for="credit_hours" style="font-weight: bold; font-size:15px;">Credit hours
                                    <span class="required" style="color: red;">*</span></label>
                                <div class="col-md-10 col-sm-6">
                                    <input class="form-control" type="text" data-validate-length-range="6" data-validate-words="2" name="credit_hours" id="credit_hours" required="required"></input>
                                    @error('description')
                                    <span class="text-danger">{{ $massage }}</span><br>
                                    @enderror
                                </div>
                            </div>

                            <div class="field item form-group">
                                <label class="col-form-label col-sm-2 label-align" for="description" style="font-weight: bold; font-size:15px;">Description
                                    <span class="required" style="color: red;">*</span></label>
                                <div class="col-md-10 col-sm-6">
                                    <textarea class="form-control" type="text" data-validate-length-range="6" data-validate-words="2" name="description" id="description" required="required"></textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $massage }}</span><br>
                                    @enderror
                                </div>
                            </div>


                            <br />
                            <button type="submit" class="btn btn-primary">ADD</button>

                        </form>
                        <!-- end form for validations -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection