@include('rotaStaff.components.header')
                <div class="col-lg-11">
                    <div class="row">
                        <!-- Top Bar Info Section Start Here -->
                        @foreach($rota as $rota_data)
                            @if($rota_data->status == 0 || $rota_data->rota_view == 2)
                             <?php
                                    $period = \carbon\CarbonPeriod::create( date("Y-m-d", strtotime($rota_data->rota_start_date)), date("Y-m-d", strtotime($rota_data->rota_end_date)));

                                    // Iterate over the period
                                    foreach ($period as $date) {
                                        echo $date->format('D j M')."<br>";
                                        ?>
                                            <input type="hidden" value="{{ $date->format('d-m-y') }}" id="shift_date">
                                            <button type="button" id="add_shift_button" class="btn btn-info btn-lg"  data-toggle="modal" data-target="#myModal">Add Shift</button>
                                        <?php
                                    }
                                    
                                    // Convert the period to an array of dates
                                    $dates = $period->toArray();
                                ?>
                               
                                 <br>
                            @endif
                        @endforeach
                             
                        <!-- Main add employees step's start -->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="add-employ">
                                        <h5>Add multiple employees</h5>
                                    </div>
                                    <div class="follow-step">
                                        <ul class="employees-detail d-flex">
                                            <li class="Employees-details detail"><span>Employees details</span> </li>
                                            <li class="Address-details detail" id="bg1"
                                                style="background-color: #fff; color: #999;"><span>Address
                                                    details</span></li>
                                            <li class="Employment-details detail" id="bg2"
                                                style="background-color: #fff; color: #999;"><span>Employment
                                                    details</span></li>
                                            <li class="Employee-setup detail" id="bg3"
                                                style="background-color: #fff; color: #999;"><span>Employee set
                                                    up</span></li>
                                            <li class="done detail" id="bg4"
                                                style="background-color: #fff; color: #999;">
                                                <span>Done</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="row" id="form1">
                                        <div class="col-md-12">
                                            <div class="employees-info">
                                                <div class="heading col-md-12">
                                                    <h5>Basic employee information</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="info col-md-10">
                                                        <p>Add the basic information for your employees. If you get
                                                            stuck at any point have a look at our <a href="#"
                                                                style="text-decoration: none;">support page</a>.</p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="button" id="next1"
                                                            onclick="next({id:'next',form:'form',count:1})"
                                                            class="save-btn">save and continue</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 my-4">
                                            <form onsubmit="event.preventDefault();" class="add-empoly-form">
                                                <div class="form-inline row">
                                                    <div class="form-group">
                                                        <label for="name">Sort By</label>
                                                        <div class="inline">
                                                            <input type="text" id="name" placeholder="First name">
                                                            <span class="search_icon"><i class="fa fa-search"
                                                                    aria-hidden="true"></i></span>
                                                        </div>
                                                        <button id="" onclick="addNewEmploye()" class="add-employ-btn">
                                                            Add new employee</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-12" id="showDiv"></div>
                                        <div class="col-md-12 my-5">
                                            <div class="saved-status">
                                                <div>
                                                    <h5>Saved records (0)</h5>
                                                </div>
                                                <div>
                                                    <p>No employees added, please click the " loyee" button
                                                        above to get started</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Main add employees step's end -->
                            <!-- Top Bar Info Section End Here -->

                            <!-- Right Side Bar Info Start Here -->

                            <!-- Right Side Bar Info end Here -->
                            <!-- Card information start here -->

                            <!-- Card information end here -->
                        </div>
                        <div class="container">
                            <div class="row" id="form2" style="display:none;">
                                <div class="col-md-12">
                                    <div class="address-detail">
                                        <div class="row my-4">
                                            <div class="col-md-12">
                                                <h5>Address details</h5>
                                            </div>
                                            <div class="col-md-9">
                                                <p class="">You can review or add your employee's address details below.
                                                    You can also do this laterfrom their profile page. If you get stuck
                                                    at any point have a look our <a href="#"
                                                        style="text-decoration: none;">support page.</a> </p>
                                            </div>
                                            <div class="col-md-3 d-flex justify-content-around">
                                                <div class="previous"><button type="button" id="back1"
                                                        onclick="back({id:'back',form:'form',count:2})"
                                                        class="previous_btn">Previous step</button></div>
                                                <div class="continue_save">
                                                    <button type="button" class="continue_btn" id="next2"
                                                        onclick="next({id:'next',form:'form',count:2})">Save and
                                                        continue</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 d-flex align-items-center">
                                                <span>Sagar &nbspPawar</span>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="" class="row">
                                                    <div class="form-group col-md-4 my-3">
                                                        <label for="exampleInputEmail1">Address 1</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                    <div class="form-group col-md-4 my-3">
                                                        <label for="exampleInputLastname1">Address 2</label>
                                                        <input type="text" class="form-control"
                                                            id="exampleInputLastname1" placeholder="">
                                                    </div>
                                                    <div class="form-group col-md-4 my-3">
                                                        <label for="staticEmail">Address 3</label>
                                                        <input type="email" placeholder="" class="form-control"
                                                            id="staticEmail" value="">
                                                    </div>
                                                    <div class="form-group col-md-4 my-3">
                                                        <label for="exampleInputEmail1">Town/City</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                    <div class="form-group col-md-4 my-3">
                                                        <label for="exampleInputLastname1">Country</label>
                                                        <input type="text" class="form-control"
                                                            id="exampleInputLastname1" placeholder="">
                                                    </div>
                                                    <div class="form-group col-md-4 my-3">
                                                        <label for="staticEmail">Postcode</label>
                                                        <input type="email" placeholder="" class="form-control"
                                                            id="staticEmail" value="">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-3 d-flex align-items-center justify-content-center">
                                                <button class="save-btn">save</button>
                                                <button class="cancel-btn">cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row" id="form3" style="display:none;">
                                <div class="col-md-12">
                                    <div class="employment-details">
                                        <div class="row my-4">
                                            <div class="col-md-12">
                                                <h5>Employment details</h5>
                                            </div>
                                            <div class="col-md-9">
                                                <p class="">Place of work is the location your employee is based at. If
                                                    you do not know this, select 'No location'. You can edit this later
                                                    from the settings page. All employees must be assigned to a public
                                                    holiday jurisdiction. If you get stuck at any point have a look at
                                                    our <a href="#" style="text-decoration: none;">support page.</a>
                                                </p>
                                                <p>We've imported locations you've previously told us about. They cannot
                                                    be edited but you can assign employees to them at any time.</p>
                                            </div>
                                            <div class="col-md-3 d-flex justify-content-around">
                                                <div class="previous"><button type="button" id="back2"
                                                        onclick="back({id:'back',form:'form',count:3})"
                                                        class="previous_btn">Previous step</button></div>
                                                <div class="continue_save">
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal" class="continue_btn"
                                                        id="next3">Save and continue</button>
                                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                        Working Time Pattrens</h1>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-8">
                                                                            <div class="model-content">
                                                                                <h5 style="font-size: 18px;">First, set
                                                                                    up your fixed employees'
                                                                                    hours of work</h5>
                                                                                <p>Working time patterns are the <b
                                                                                        style="font-weight: 600;">days
                                                                                        and hours that your fixed
                                                                                        employees
                                                                                        work in a one week repeating
                                                                                        pattern.</b> We do not currently
                                                                                    support
                                                                                    multiple week repeating patterns.
                                                                                </p>
                                                                                <p>Note: Always make sure you set up the
                                                                                    working time patterns before adding
                                                                                    employees. If no patterns exist all
                                                                                    new employees will be assigned to
                                                                                    the default 9 to 5 working time
                                                                                    pattern.</p>
                                                                                <h5>What you need to know</h5>
                                                                                <p>Working days and hours for each
                                                                                    pattern (including break times)</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="image">
                                                                                <img src="https://app.brighthr.com/c51d158a811114f29017.png"
                                                                                    alt="brighthr">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="first-btn"
                                                                        data-bs-dismiss="modal">Create working
                                                                        patterns</button>
                                                                    <button type="button" class="second-btn"
                                                                        style="border: none;">I don't
                                                                        want to set up any pattern</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="">
                                            <div class="col-md-12">
                                                <form class="row employees-data">
                                                    <div class="form-group col-md-3">
                                                        <label for="exampleInputEmail1">Name</label>
                                                        <div class="name">
                                                            <span>Sagar &nbsp Pawar</span><span></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="place">Place of work</label>
                                                        <div class="inline">
                                                            <input type="text" class="form-control" id="place"
                                                                placeholder="Grey road">
                                                            <span class="search_icon"><i class="fa fa-search"
                                                                    aria-hidden="true"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="public-holiday">Public holidays observed for</label>
                                                        <div class="inline">
                                                            <input type="text" class="form-control" id="public-holiday"
                                                                placeholder="Northern Ireland">
                                                            <span class="search_icon"><i class="fa fa-search"
                                                                    aria-hidden="true"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <label class="form-check-label">Copy</label>
                                                        <p class="folder-icon"><i class="fa fa-folder-o"
                                                                aria-hidden="true"></i></p>
                                                    </div>
                                                    <div class="col-md-2 d-flex align-items-center">
                                                        <button type="submit" class="save-btn">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
            <a href="#create_shift">Create Shift</a>  <a href="http:// ">Assign Employee</a> <a href="http://">Summery</a>
            <div id="create_shift">
                <form action="" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <h4 class="modal-title">Create New Shift</h4>
                    <p id="shift_allot_date"></p>       
                    <p>Shift times</p><input type="time" name="start_time" value="09:00" id="start_date"> to <input type="time" name="end_time"  value="18:00" id="end_date">
                    <p>Break Duration</p> <input type="number" id="break_time" name="break_time">
                    <p>Add a note</p>  <textarea name="shift_notes" id="shift_notes" placeholder="Add any notes here"></textarea>  
                    <p id="hours">This Shift is </p>
                </form>
            </div>
            <div id="assign_employee">
                 
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="shift_save_btn" class="btn btn-default">Continue</button>
        </div>
      </div>
      
    </div>
  </div>
    @include('rotaStaff.components.footer')
    <script>
        $(document).ready(function(){
            $.ajax({
                url:"{{ url('/get-all-users') }}",    
                type: "get",    
                dataType: 'json',
                success:function(result){
                    console.log(result);
                    for(i = 0; i <= result.length; i++){
                        $('#assign_employee').append(result[i]['name']);
                    }
                   
                }
            });

            $('#add_shift_button').click(function(){
                date = $('#shift_date').val();
                document.getElementById('shift_allot_date').innerHTML = date;
            });
            
            $('#end_date').change(function(){
                var startTime = $('#start_date').val();
                var endTime = $('#end_date').val();
              
                currentDate = new Date()   

                startDate = new Date(currentDate.getTime());
                startDate.setHours(startTime.split(":")[0]);
                startDate.setMinutes(startTime.split(":")[1]);
                startDate.setSeconds(startTime.split(":")[2]);

                endDate = new Date(currentDate.getTime());
                endDate.setHours(endTime.split(":")[0]);
                endDate.setMinutes(endTime.split(":")[1]);
                endDate.setSeconds(endTime.split(":")[2]);


                valid = startDate < currentDate && endDate > currentDate
                $('#hours').append();
            });

            function calculateTime() {
                //get values
                var valuestart = $('#start_date').val();
                var valuestop =$('#end_date').val();

                //create date format          
                var timeStart = new Date("01/01/2007 " + valuestart);
                var timeEnd = new Date("01/01/2007 " + valuestop);

                var difference = timeEnd - timeStart;             

                difference = difference / 60 / 60 / 1000;


                    $("#hours").html("<b>Hour Difference:</b> " + difference)             

                }
                $("#end_date").change(calculateTime);
                calculateTime();

          
            $("#shift_save_btn").click(function(e) {
                e.preventDefault();
                    var start_date = $("#start_date").val(); 
                    var end_date = $("#end_date").val(); 
                    var break_time = $("#break_time").val();
                    var shift_notes = $("#shift_notes").val();
                    var token = "<?=csrf_token()?>";
                    $.ajax({
                        url:"{{ url('/add-shift-data') }}",    //the page containing php script
                        type: "post",    //request type,
                        dataType: 'txt',
                        data: {start_date: start_date, end_date: end_date, break_time: break_time, shift_notes: shift_notes,  _token:token},
                        success:function(result){
                            if(result == 1){
                                console.log('inserted');
                                $('#assign_employee').show();
                            }
                        }
                    });
            });
        });
    </script>