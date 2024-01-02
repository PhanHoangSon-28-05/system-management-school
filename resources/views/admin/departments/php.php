<div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Student
        </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="student">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Contacts Design</h3>
                        <a type="button" href="{{ URL::route('grades.students-gradeadd-student-deptement') }}" class="btn btn-secondary">
                            ADD
                        </a>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                            <div class="input-group">
                                <input type="search" id="filter" onkeyup="searchProduct()" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Search</button>
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
                                @foreach ($studentgrades as $studentgrade)
                                <div class="col-md-4 col-sm-4  profile_details search">
                                    <form action="ttm" method="post">
                                        {!! csrf_field() !!}
                                        <div class="well profile_view">
                                            <div class="col-sm-12">
                                                <h4 class="brief"><i>{{ $studentgrade->code }}</i>
                                                </h4>
                                                <div class="left col-md-7 col-sm-7">
                                                    <h2>{{ $studentgrade->last_name . ' ' . $studentgrade->first_name }}
                                                    </h2>
                                                    <p><strong>Emai: </strong>
                                                        {{ $studentgrade->email }}
                                                    </p>
                                                    <ul class="list-unstyled">
                                                        <li><i class="fa fa-building"></i> Address:
                                                            {{ $studentgrade->hometown }}
                                                        </li>
                                                        <li><i class="fa fa-phone"></i> Phone #:
                                                            {{ $studentgrade->phone }}
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="right col-md-5 col-sm-5 text-center">
                                                    <img src="{{ asset('public/uploads/students/individual/' . $studentgrade->image_personal) }}" alt="" class="img-circle img-fluid w25">
                                                </div>
                                            </div>
                                            <div class=" profile-bottom text-center">
                                                <div class=" col-sm-6 emphasis">
                                                </div>
                                                <div class=" col-sm-6 emphasis">
                                                    <a class="btn btn-info btn-xs ms-1 pt-2 pb-2 ps-3 pe-3 rounded-3 " href="{{ route('grades.students-gradeedit', [$sluggrade, $studentgrade->id]) }}"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="{{ URL::route('students.show', $studentgrade->id) }}" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-user"> </i> View Profile
                                                    </a>
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