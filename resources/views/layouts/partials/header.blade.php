<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <div class="top-left-part">
            <!-- Logo -->
            <a class="logo" href="{{'home'}}">
                <b>
                    Diametric Data Sys.
                    {{-- <img src="../plugins/images/admin-logo.png" alt="home" class="dark-logo" />
                    <img src="../plugins/images/admin-logo-dark.png" alt="home" class="light-logo" /> --}}
                </b>
                <span class="hidden-xs">
                    {{-- <img src="../plugins/images/admin-text.png" alt="home" class="dark-logo" />
                    <img src="../plugins/images/admin-text-dark.png" alt="home" class="light-logo" /> --}}
                </span> 
            </a>
        </div>
        <!-- /Logo -->
        <!-- Search input and Toggle icon -->
        <ul class="nav navbar-top-links navbar-left">
            <li><a href="javascript:void(0)" class="open-close waves-effect waves-light visible-xs"><i class="ti-close ti-menu"></i></a></li>
            <li class="dropdown">
                <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"> <i class="mdi mdi-gmail"></i>
                    <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                </a>
                <ul class="dropdown-menu mailbox animated bounceInDown">
                    <li>
                        <div class="drop-title">You have 4 new messages</div>
                    </li>
                    <li>
                        <div class="message-center">
                            <a href="#">
                                <div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                <div class="mail-contnet">
                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                </a>
                                <a href="#">
                                    <div class="user-img"> <img src="../plugins/images/users/sonu.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="user-img"> <img src="../plugins/images/users/arijit.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                        </a>
                                        <a href="#">
                                            <div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                                <!-- /.dropdown-messages -->
                            </li>
                            <!-- .Task dropdown -->
                            <li class="dropdown">
                                <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"> <i class="mdi mdi-check-circle"></i>
                                    <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                                </a>
                                <ul class="dropdown-menu dropdown-tasks animated slideInUp">
                                    <li>
                                        <a href="#">
                                            <div>
                                                <p> <strong>Task 1</strong> <span class="pull-right text-muted">40% Complete</span> </p>
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <div>
                                                <p> <strong>Task 2</strong> <span class="pull-right text-muted">20% Complete</span> </p>
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"> <span class="sr-only">20% Complete</span> </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <div>
                                                <p> <strong>Task 3</strong> <span class="pull-right text-muted">60% Complete</span> </p>
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> <span class="sr-only">60% Complete (warning)</span> </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <div>
                                                <p> <strong>Task 4</strong> <span class="pull-right text-muted">80% Complete</span> </p>
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> <span class="sr-only">80% Complete (danger)</span> </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a class="text-center" href="#"> <strong>See All Tasks</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- .Megamenu -->
                            {{-- <li class="mega-dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><span class="hidden-xs">Mega</span> <i class="icon-options-vertical"></i></a>
                            <ul class="dropdown-menu mega-dropdown-menu animated bounceInDown">
                                <li class="col-sm-3">
                                    <ul>
                                        <li class="dropdown-header">Forms Elements</li>
                                        <li><a href="form-basic.html">Basic Forms</a></li>
                                        <li><a href="form-layout.html">Form Layout</a></li>
                                        <li><a href="form-advanced.html">Form Addons</a></li>
                                        <li><a href="form-material-elements.html">Form Material</a></li>
                                        <li><a href="form-float-input.html">Form Float Input</a></li>
                                        <li><a href="form-upload.html">File Upload</a></li>
                                        <li><a href="form-mask.html">Form Mask</a></li>
                                        <li><a href="form-img-cropper.html">Image Cropping</a></li>
                                        <li><a href="form-validation.html">Form Validation</a></li>
                                    </ul>
                                </li>
                                <li class="col-sm-3">
                                    <ul>
                                        <li class="dropdown-header">Advance Forms</li>
                                        <li><a href="form-dropzone.html">File Dropzone</a></li>
                                        <li><a href="form-pickers.html">Form-pickers</a></li>
                                        <li><a href="form-wizard.html">Form-wizards</a></li>
                                        <li><a href="form-typehead.html">Typehead</a></li>
                                        <li><a href="form-xeditable.html">X-editable</a></li>
                                        <li><a href="form-summernote.html">Summernote</a></li>
                                        <li><a href="form-bootstrap-wysihtml5.html">Bootstrap wysihtml5</a></li>
                                        <li><a href="form-tinymce-wysihtml5.html">Tinymce wysihtml5</a></li>
                                    </ul>
                                </li>
                                <li class="col-sm-3">
                                    <ul>
                                        <li class="dropdown-header">Table Example</li>
                                        <li><a href="basic-table.html">Basic Tables</a></li>
                                        <li><a href="table-layouts.html">Table Layouts</a></li>
                                        <li><a href="data-table.html">Data Table</a></li>
                                        <li><a href="bootstrap-tables.html">Bootstrap Tables</a></li>
                                        <li><a href="responsive-tables.html">Responsive Tables</a></li>
                                        <li><a href="editable-tables.html">Editable Tables</a></li>
                                        <li><a href="foo-tables.html">FooTables</a></li>
                                        <li><a href="jsgrid.html">JsGrid Tables</a></li>
                                    </ul>
                                </li>
                                <li class="col-sm-3">
                                    <ul>
                                        <li class="dropdown-header">Charts</li>
                                        <li> <a href="flot.html">Flot Charts</a> </li>
                                        <li><a href="morris-chart.html">Morris Chart</a></li>
                                        <li><a href="chart-js.html">Chart-js</a></li>
                                        <li><a href="peity-chart.html">Peity Charts</a></li>
                                        <li><a href="knob-chart.html">Knob Charts</a></li>
                                        <li><a href="sparkline-chart.html">Sparkline charts</a></li>
                                        <li><a href="extra-charts.html">Extra Charts</a></li>
                                    </ul>
                                </li>
                            </ul> --}}
                        </li>
                        <!-- /.Megamenu -->
                    </ul>
                    <ul class="nav navbar-top-links navbar-right pull-right">
                        <li>
                            <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                                <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> {{-- <img src="../plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"> --}}<b class="hidden-xs">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</b><span class="caret"></span> </a>
                                <ul class="dropdown-menu dropdown-user animated flipInY">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img">{{-- <img src="../plugins/images/users/varun.jpg" alt="user" /> --}}</div>
                                            <div class="u-text">
                                                <h4>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h4>
                                                <p class="text-muted">{{ Auth::user()->email }}</p><a href="{{ url('user/profile') }}" class="btn btn-rounded btn-danger btn-sm">Edit Profile</a></div>
                                            </div>
                                        </li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="{{route('logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                                    </ul>
                                    <!-- /.dropdown-user -->
                                </li>
                                <!-- /.dropdown -->
                            </ul>
                        </div>
                        <!-- /.navbar-header -->
                        <!-- /.navbar-top-links -->
                        <!-- /.navbar-static-side -->
                    </nav>