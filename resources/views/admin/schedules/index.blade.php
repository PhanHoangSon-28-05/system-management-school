@extends('admin.layouts.app')
@section('title', 'Schedule')

@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="">
                    <div class="x_title">
                        <h2>Schedules</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a type="button" href="{{ URL::route('schedules.create') }}" class="btn btn-secondary">
                                Create
                            </a>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <span class="text-muted font-13 m-b-30">
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                    </span>
                                    {{-- Content --}}
                                    <div id="myBtnContainer-search">
                                        <button class="btn-search active-search" onclick="filterSelection('all')"> Show
                                            all</button>
                                        <button class="btn-search" onclick="filterSelection('cars')"> Cars</button>
                                        <button class="btn-search" onclick="filterSelection('animals')"> Animals</button>
                                        <button class="btn-search" onclick="filterSelection('fruits')"> Fruits</button>
                                        <button class="btn-search" onclick="filterSelection('colors')"> Colors</button>
                                    </div>

                                    <div class="container-search">
                                        <div class="filterDiv cars">
                                            <div class="card">
                                                <img src="https://cly.1cdn.vn/2017/01/28/congly-vn_con-ga.jpg"
                                                    alt="Avatar" style="width:100%">
                                                <div class="container">
                                                    <h4><b>BMW</b></h4>
                                                    <p>Architect & Engineer</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="filterDiv colors fruits">
                                            <div class="card">
                                                <img src="https://cly.1cdn.vn/2017/01/28/congly-vn_con-ga.jpg"
                                                    alt="Avatar" style="width:100%">
                                                <div class="container">
                                                    <h4><b>Orange</b></h4>
                                                    <p>Architect & Engineer</p>
                                                </div>
                                            </div>Orange
                                        </div>
                                        <div class="filterDiv cars">
                                            <div class="card">
                                                <img src="https://cly.1cdn.vn/2017/01/28/congly-vn_con-ga.jpg"
                                                    alt="Avatar" style="width:100%">
                                                <div class="container">
                                                    <h4><b>Volvo</b></h4>
                                                    <p>Architect & Engineer</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="filterDiv colors">
                                            <div class="card">
                                                <img src="https://cly.1cdn.vn/2017/01/28/congly-vn_con-ga.jpg"
                                                    alt="Avatar" style="width:100%">
                                                <div class="container">
                                                    <h4><b>Red</b></h4>
                                                    <p>Architect & Engineer</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="filterDiv cars">Ford</div>
                                        <div class="filterDiv colors">Blue</div>
                                        <div class="filterDiv animals">Cat</div>
                                        <div class="filterDiv animals">Dog</div>
                                        <div class="filterDiv fruits">Melon</div>
                                        <div class="filterDiv fruits animals">Kiwi</div>
                                        <div class="filterDiv fruits">Banana</div>
                                        <div class="filterDiv fruits">Lemon</div>
                                        <div class="filterDiv animals">Cow</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
