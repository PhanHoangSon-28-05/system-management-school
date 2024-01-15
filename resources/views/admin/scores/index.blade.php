@extends('admin.layouts.app')
@section('title', 'Score')

@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="">
                    <div class="x_title">
                        <h2>Scores</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="x_panel">
                            <div class="x_content">
                                <div class="accordion" id="accordionExample">
                                    @foreach ($departments as $index => $department)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading{{ $index + 1 }}">
                                                <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse{{ $index + 1 }}"
                                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                                    aria-controls="collapse{{ $index + 1 }}">
                                                    {{ $department->name }}
                                                </button>
                                            </h2>
                                            <div id="collapse{{ $index + 1 }}"
                                                class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                                aria-labelledby="heading{{ $index + 1 }}"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="teacher">
                                                        <div class="page-title">
                                                            <div class="title_left">
                                                            </div>
                                                            <div class="title_right">
                                                                <div
                                                                    class="col-md-5 col-sm-5  form-group pull-right top_search">
                                                                    <div class="input-group">
                                                                        <input type="search" id="filter"
                                                                            onkeyup="searchClass()" class="form-control"
                                                                            placeholder="Search for...">
                                                                        <span class="input-group-btn">
                                                                            <button class="btn btn-default"
                                                                                type="button">Search</button>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="row">
                                                            <div class="x_panel">
                                                                <div class="x_content">
                                                                    <div class="col-md-12 col-sm-12  text-center">
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                    <div id="card-list" class="row" style="margin:auto">
                                                                        @foreach ($department->grades as $grade)
                                                                            <div
                                                                                class="col-md-4 col-sm-4  profile_details search">
                                                                                <form action="ttm" method="post">
                                                                                    {!! csrf_field() !!}
                                                                                    <div class="well profile_view">
                                                                                        <a
                                                                                            href="{{ URL::route('scores.show', $grade->slug) }}">
                                                                                            <div class="col-sm-12">
                                                                                                <h4 class="brief">
                                                                                                    <i>{{ $grade->id }}</i>
                                                                                                </h4>
                                                                                                <div
                                                                                                    class="left col-md-7 col-sm-7">
                                                                                                    <h2>{{ $grade->name }}
                                                                                                    </h2>
                                                                                                    <p><strong>Sum grade:
                                                                                                            {{ $department->grades->count() }}
                                                                                                        </strong>
                                                                                                    </p>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="right col-md-5 col-sm-5 text-center">
                                                                                                    <img src="{{ asset('public/uploads/images.png') }}"
                                                                                                        alt=""
                                                                                                        class="img-circle img-fluid w25">
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                        <div
                                                                                            class=" profile-bottom text-center">
                                                                                            <div class=" col-sm-6 emphasis">
                                                                                            </div>
                                                                                            <div class=" col-sm-6 emphasis">
                                                                                                {{-- buttom --}}
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function searchClass() {
            const input = document.getElementById('filter').value.toUpperCase();
            console.log("Search input:", input);

            const cardContainer = document.getElementById('card-list');
            console.log("Card container:", cardContainer);

            const cards = cardContainer.getElementsByClassName('profile_details');
            console.log("Cards:", cards);

            for (let i = 0; i < cards.length; i++) {
                let title = cards[i].querySelector(".search h2");
                console.log("Title:", title);

                if (title.innerText.toUpperCase().indexOf(input) > -1) {
                    cards[i].style.display = "";
                } else {
                    cards[i].style.display = "none";
                }
            }
        }
    </script>
@endsection
