@include('rotaStaff.components.header')
    @foreach($rota as $rota_data)
                        <!-- Top Bar Info Section End Here -->
                        <div class="container" id="timeline">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="rota_name">
                                        <p class="breadcrum"> <a href="./rota-planner.html"> <span class="rota-link">
                                            All Rota</span> </a> > {{ $rota_data->rota_name}} </p>
                                        <h3>{{ $rota_data->rota_name}}</h3>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="date-info">
                                            <p>{{ date("D j M", strtotime($rota_data->rota_start_date)) }} - {{ date("D j M", strtotime($rota_data->rota_end_date)) }} | {{ $rota_data->rota_duration }} days | <span id="shift_count1">0</span> staff members</p>
                                        </div>
                                        <div class="shift-patern">
                                            <div class="select-shift">
                                                Show shifts for:
                                                <input type="radio" class="input_custom_btn" id="everyone"
                                                    name="select">
                                                <div class="label">
                                                    <label for="everyone" class="label_custom every">Everyone</label>
                                                </div>
                                                <input type="radio" id="me" class="input_custom_btn" name="select">
                                                <div class="label">
                                                    <label for="me" class="label_custom me">Me</label>
                                                </div>
                                                <input type="radio" id="specific" class="input_custom_btn"
                                                    name="select">
                                                <div class="label">
                                                    <label for="specific" class="label_custom specific">Specific
                                                        people...</label>
                                                </div>
                                            </div>
                                            <div class="select-yes-no">
                                                Show notes:
                                                <input type="radio" class="input_custom_btn" id="yes" name="yes_no">
                                                <div class="label">
                                                    <label for="yes" class="label_custom yes">Yes</label>
                                                </div>
                                                <input type="radio" id="no" class="input_custom_btn" name="yes_no">
                                                <div class="label">
                                                    <label for="no" class="label_custom no">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-none">
                                            <p>Once a shift has been added you can publish this rota.</p>
                                        </div>
                                        <div class="d-flex print_and_publish_button">
                                            <div>
                                                <!-- Button trigger modal -->
                                                @if($rota_data->status === 1)
                                                    <button type="button" onclick="renamedata(<?=$rota_data->id?>,'<?=$rota_data->rota_name?>',<?=$rota_data->status?>)" class="publish_btn" >
                                                        Unpublish
                                                    </button>
                                                @endif
                                                @if($rota_data->status === 0)
                                                    <button type="button" onclick="renamedata(<?=$rota_data->id?>,'<?=$rota_data->rota_name?>',<?=$rota_data->status?>)" class="publish_btn" >
                                                        Publish
                                                    </button>
                                                @endif
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalPublish" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                           <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure you want to    @if($rota_data->status === 1)
                                                                    Publish
                                                                @endif
                                                                @if($rota_data->status === 0)
                                                                    Unpublish
                                                                @endif this rota?</h1>
                                                            <button type="button" class="modal_close_btn" data-bs-dismiss="modal" aria-label="Close"> &#10006; </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="publish_modal">
                                                                <input type="hidden" id="rota_id">
                                                                <input type="hidden" id="rota_status">
                                                                <div class="content_publish_rota">This will show <span id="rota_name_model"></span> to your employees. They will be able to see their shifts and absence conflicts.</div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="cancel_btn" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="publish_btn_footer" id="publish_unpublish_btn">
                                                                @if($rota_data->status === 1)
                                                                    Publish
                                                                @endif
                                                                @if($rota_data->status === 0)
                                                                    Unpublish
                                                                @endif
                                                                </button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="button" class="print_btn" onclick="window.print()">Print rota</button>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center drag-table-link">
                                            <a href="#"><i class="fa fa-clone"></i> Drag and drop view</a>
                                            <a href="#"><i class="fa fa-calendar"></i> Table view</a>
                                        </div>
                                    </div>
                                    <div class="d-flex time-for-shift">
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(161, 169, 179);">
                                            0:00
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(161, 169, 179);">
                                            4:00</div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(161, 169, 179);">
                                            8:00</div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(161, 169, 179);">
                                            12:00</div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(161, 169, 179);">
                                            16:00</div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid #e8eaec; width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(161, 169, 179);">
                                            20:00</div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                        <div class="add-color"
                                            style="border-bottom: 1px solid rgb(232, 234, 236); width: calc(4.16667%); border-left: 1px solid rgb(232, 234, 236);">
                                        </div>
                                    </div>
                                    <div class="accordion" id="accordionPanelsStayOpenExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                                    aria-controls="panelsStayOpen-collapseOne">
                                                    {{ date("D j M Y", strtotime($rota_data->rota_start_date)) }} - {{ date("D j M Y", strtotime($rota_data->rota_end_date)) }}
                                                </button>
                                            </h2>
                                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse"
                                                aria-labelledby="panelsStayOpen-headingOne">
                                                <div class="accordion-body">
                                                    <?php 
                                                        $period = \carbon\CarbonPeriod::create( date("Y-m-d", strtotime($rota_data->rota_start_date)), date("Y-m-d", strtotime($rota_data->rota_end_date)));
                                                        $i = 1;
                                                        foreach ($period as $date) {
                                                    ?>
                                                    <div class="d-flex">
                                                        <div class="date-of-shift">
                                                            <strong>{{$date->format('D j M')}}</strong>
                                                        </div>
                                                        <div class="amount-of-shift">
                                                            <p><span id="shift_count"></span> shifts</p>
                                                        </div>
                                                        <div class="add-shift-btn">
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="modal-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"> Add shift </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog"
                                                                    style="display: block; max-width: 800px;">
                                                                    <div class="modal-content">
                                                                     
                                                                        <div class="modal-body">
                                                                            <div class="container remove-padding M-right"
                                                                                id="multiForm" style="display: block;">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="follow-step">
                                                                                            <ul class="employees-detail d-flex">
                                                                                                <li class="Employees-details detail">
                                                                                                    <span class="s-font">Create shift</span>
                                                                                                </li>
                                                                                                <li class="Address-details detail"
                                                                                                    id="bg1" style="color: rgb(153, 153, 153); background-color: rgb(255, 255, 255);">
                                                                                                    <span class="s-font">Assign
                                                                                                        Employees</span>
                                                                                                </li>
                                                                                                <li class="Employment-details detail"
                                                                                                    id="bg2" style="color: rgb(153, 153, 153); background-color: rgb(255, 255, 255);">
                                                                                                    <span class="s-font">Summary</span>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                        <div class="row" id="form1" style="display: block;">
                                                                                            <div class="col-md-12">
                                                                                                <div class="employees-info">
                                                                                                    <div class="add-margin col-md-12">
                                                                                                        <h4>Create new shift</h4>
                                                                                                        <span class="date-of-weak-shift">Saturday 04 February 2023</span>
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-12"
                                                                                                            id="showDiv">
                                                                                                            <form class="employees-data"
                                                                                                                onsubmit="return validateform()">
                                                                                                                <div class="row">
                                                                                                                    <label for="firstName"
                                                                                                                        class="col-sm-2 col-form-label">Shift time</label>
                                                                                                                        <!-- <div class="col-sm-5"> -->
                                                                                                                        <div class="col-auto">
                                                                                                                            <input type="time"
                                                                                                                                class="col-sm-2 form-control"
                                                                                                                                id="firstName"
                                                                                                                                aria-describedby="emailHelp" value="9:00"
                                                                                                                                placeholder="">
                                                                                                                        </div>
                                                                                                                        <div class="col-auto">
                                                                                                                            <span class="btew-time">to</span>
                                                                                                                        </div>
                                                                                                                        <div class="col-auto">
                                                                                                                            <input type="time"
                                                                                                                            class="col-sm-2 form-control"
                                                                                                                            id="firstName" value="9:00"
                                                                                                                            aria-describedby="emailHelp"
                                                                                                                            placeholder="">
                                                                                                                        </div>
                                                                                                                    <!-- </div> -->
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                    <label for="lastName"
                                                                                                                        class="col-sm-2 col-form-label">Break duration</label>
                                                                                                                    <div class="col-auto">
                                                                                                                        <input type="time"   class="form-control"
                                                                                                                            id="lastName"
                                                                                                                            placeholder="Last name">
                                                                                                                        <p id="lastNamError">
                                                                                                                        </p>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                    <label for="emailAdd" class="col-sm-2 col-form-label">Add a note</label>
                                                                                                                    <div class="col-md-4">
                                                                                                                        <textarea name="" class="form-control" id="" cols="40" rows="5"></textarea>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="row">
                                                                                                                    <p>This shift is <strong>8 hour with no break </strong></p>
                                                                                                                </div>
                                                                                                                <div class="form-group col-md-12 d-flex justify-content-end">
                                                                                                                    <button type="button"
                                                                                                                        id="next1"
                                                                                                                        onclick="next({id:'next',form:'form',count:1})"
                                                                                                                        class="save-btn">Next
                                                                                                                        step</button>
                                                                                                                </div>
                                                                                                            </form>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="container remove-padding">
                                                                                            <div class="row" id="form2" style="display: none;">
                                                                                                <div class="col-md-12">
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-12">
                                                                                                            <h4>Assign employees to Fri 20 Jan, 09:00-17:00</h4>
                                                                                                            <span class="date-of-weak-shift">Find an employee or a team</span>
                                                                                                        </div>
                                                                                                        <div class="col-sm-3 col-md-4">
                                                                                                            <select class="form-select form-control" aria-label="Default select example">
                                                                                                                <option selected="" value="1">Search by name
                                                                                                                </option>
                                                                                                                <option value="2">Search by
                                                                                                                    group</option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="col-sm-3 col-md-4">
                                                                                                            <input type="text" class="form-control" placeholder="Enter name">
                                                                                                        </div>
                                                                                                        <div class="col-md-4 d-flex justify-content-end">
                                                                                                            <button type="button" class="select-employee">Select
                                                                                                                all</button>
                                                                                                            <button type="button" class="select-employee">Deselect
                                                                                                                all</button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row employee-name my-4">
                                                                                                        <div class="col-md-6">
                                                                                                            <input type="checkbox" class="custom_checkbox" id="select_checkbox_1">
                                                                                                            <label for="select_checkbox_1" class="name">
                                                                                                                <p>Adam Woods</p>
                                                                                                                <p class="select_tick">
                                                                                                                    <span class="right_tick"><i class="fa fa-check" aria-hidden="true"></i></span>
                                                                                                                </p>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                            <input type="checkbox" class="custom_checkbox" id="select_checkbox_2">
                                                                                                            <label for="select_checkbox_2" class="name">
                                                                                                                <p>Adam Woods</p>
                                                                                                                <p class="select_tick">
                                                                                                                    <span class="right_tick"><i class="fa fa-check" aria-hidden="true"></i></span>
                                                                                                                </p>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                            <input type="checkbox" class="custom_checkbox" id="select_checkbox_3">
                                                                                                            <label for="select_checkbox_3" class="name">
                                                                                                                <p>Adam Woods</p>
                                                                                                                <p class="select_tick">
                                                                                                                    <span class="right_tick"><i class="fa fa-check" aria-hidden="true"></i></span>
                                                                                                                </p>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                            <input type="checkbox" class="custom_checkbox" id="select_checkbox_4">
                                                                                                            <label for="select_checkbox_4" class="name">
                                                                                                                <p>Adam Woods</p>
                                                                                                                <p class="select_tick">
                                                                                                                    <span class="right_tick"><i class="fa fa-check" aria-hidden="true"></i></span>
                                                                                                                </p>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                            <input type="checkbox" class="custom_checkbox" id="select_checkbox_5">
                                                                                                            <label for="select_checkbox_5" class="name">
                                                                                                                <p>Adam Woods</p>
                                                                                                                <p class="select_tick">
                                                                                                                    <span class="right_tick"><i class="fa fa-check" aria-hidden="true"></i></span>
                                                                                                                </p>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                        <div class="col-md-6">
                                                                                                            <input type="checkbox" class="custom_checkbox" id="select_checkbox_6">
                                                                                                            <label for="select_checkbox_6" class="name">
                                                                                                                <p>Adam Woods</p>
                                                                                                                <p class="select_tick">
                                                                                                                    <span class="right_tick"><i class="fa fa-check" aria-hidden="true"></i></span>
                                                                                                                </p>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <p>This shift has<strong> 1 employee </strong>working <strong>8 hrs</strong></p>
                                                                                                    </div>
                                                                                                    <div class="address-detail">
                                                                                                        <div class="row my-2">
                                                                                                            <div class="col-md-12 d-flex justify-content-end">
                                                                                                                <div class="previous m-2">
                                                                                                                    <button type="button"
                                                                                                                        id="back1"
                                                                                                                        onclick="back({id:'back',form:'form',count:2})"
                                                                                                                        class="previous_btn">Back</button>
                                                                                                                </div>
                                                                                                                <div class="continue_save m-2">
                                                                                                                    <button type="button"
                                                                                                                        class="continue_btn"
                                                                                                                        id="next2"
                                                                                                                        onclick="next({id:'next',form:'form',count:2})">Next
                                                                                                                        step
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="row">
                                                                                                            <form
                                                                                                                action=""
                                                                                                                class="row contract-detaial"
                                                                                                                style="display: none;">
                                                                                                                <div
                                                                                                                    class="form-group col-md-2">
                                                                                                                    <label
                                                                                                                        for="exampleInputEmail1">Name</label>
                                                                                                                    <div
                                                                                                                        class="name">
                                                                                                                        <span>Sagar
                                                                                                                            &nbsp;
                                                                                                                            Pawar</span>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="form-group col-md-2 my-3">
                                                                                                                    <label
                                                                                                                        for="exampleInputEmail1">Entitlement
                                                                                                                        unit
                                                                                                                        in</label>
                                                                                                                    <input
                                                                                                                        type="text"
                                                                                                                        class="form-control"
                                                                                                                        id="exampleInputEmail1"
                                                                                                                        aria-describedby="emailHelp"
                                                                                                                        placeholder="">
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="form-group col-md-2 my-3">
                                                                                                                    <label
                                                                                                                        for="exampleInputLastname1"
                                                                                                                        style="margin-bottom: 20px;">Full
                                                                                                                        time
                                                                                                                        annual
                                                                                                                        leave
                                                                                                                        entitlement
                                                                                                                        equivalent</label>
                                                                                                                    <input
                                                                                                                        type="text"
                                                                                                                        class="form-control"
                                                                                                                        id="exampleInputLastname1"
                                                                                                                        placeholder="">
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="form-group col-md-2 my-3">
                                                                                                                    <label
                                                                                                                        for="staticEmail">Leave
                                                                                                                        year
                                                                                                                        start
                                                                                                                        date</label>
                                                                                                                    <input
                                                                                                                        type="email"
                                                                                                                        placeholder=""
                                                                                                                        class="form-control"
                                                                                                                        id="staticEmail"
                                                                                                                        value="">
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="form-group col-md-1">
                                                                                                                    <label
                                                                                                                        class="form-check-label">Copy</label>
                                                                                                                    <p
                                                                                                                        class="folder-icon">
                                                                                                                        <i class="fa fa-folder-o"
                                                                                                                            aria-hidden="true"></i>
                                                                                                                    </p>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="col-md-2 d-flex align-items-center justify-content-center">
                                                                                                                    <button
                                                                                                                        class="save-btn">save</button>
                                                                                                                    <button
                                                                                                                        class="cancel-btn">cancel</button>
                                                                                                                </div>
                                                                                                            </form>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="container remove-padding">
                                                                                            <div class="row" id="form3"
                                                                                                style="display: none;">
                                                                                                <div class="col-md-12">
                                                                                                    <div class="employment-details">
                                                                                                        <div class="row my-2">
                                                                                                            <div class="col-md-12">
                                                                                                                <h4>Shift summary</h4>
                                                                                                                <p>Shift will be created for <strong> Fri 20 Jan, 09:00-17:00.</strong></p>
                                                                                                            </div>
                                                                                                            <div class="col-md-12 d-flex justify-content-end">
                                                                                                                <div class="previous m-2">
                                                                                                                    <button type="button"
                                                                                                                        id="back2"
                                                                                                                        onclick="back({id:'back',form:'form',count:3})"
                                                                                                                        class="previous_btn">Back</button>
                                                                                                                </div>
                                                                                                                <div class="continue_save m-2   ">
                                                                                                                    <button type="button"
                                                                                                                        class="continue_btn"
                                                                                                                        id="next4"
                                                                                                                        onclick="next({id:'next',form:'form',count:3})">Add shift</button>
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
                                                                        </div>
                                                                        <div class="modal-footer justify-content-start">
                                                                            <button type="button"
                                                                                class="btn-footer-modal"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                        $rota_shift = App\RotaShift::where('rota_id', $rota_data->id)->where('rota_day_date', $date->format('Y-m-d'))->where('status', 1)->get();
                                                        $userdata = array();
                                                        foreach($rota_shift as $rota_shifts){
                                                            $shift_id = $rota_shifts->id;
                                                            $shift_start = $rota_shifts->shift_start_time;
                                                            $shift_end = $rota_shifts->shift_end_time;
                                                            $list_emp = App\RotaAssignEmployee::where('rota_id', $rota_data->id)->where('shift_id', $shift_id)->where('status', 1)->get();
                                                            foreach($list_emp as $emp_ids){
                                                                $userdata[] = App\User::where('id', $emp_ids->emp_id)->get();
                                                            }
                                                        }
                                                        foreach($userdata as $user_data){
                                                    ?>
                                                    <div class="w_full">
                                                        <div class="hour_box" style="width: calc(4.16667%);">
                                                        </div>
                                                        <div class="hour_box" style="width: calc(4.16667%);">
                                                        </div>
                                                        <div class="hour_box" style="width: calc(4.16667%);">
                                                        </div>
                                                        <div class="hour_box" style="width: calc(4.16667%);">
                                                        </div>
                                                        <div class="hour_box" style="width: calc(4.16667%);">
                                                        </div>
                                                        <div class="hour_box" style="width: calc(4.16667%);">
                                                        </div>
                                                        <div class="hour_box" style="width: calc(4.16667%);">
                                                        </div>
                                                        <div class="hour_box" style="width: calc(4.16667%);">
                                                        </div>
                                                        <div class="hour_box" style="width: calc(4.16667%);">
                                                        </div>
                                                        <div class="hour_box" style="width: calc(4.16667%);">
                                                        </div>
                                                        <div class="hour_box" style="width: calc(4.16667%);">
                                                        </div>
                                                        <div class="hour_box" style="width: calc(4.16667%);">
                                                        </div>
                                                        <div class="hour_box" style="width: calc(4.16667%);">
                                                        </div>
                                                        <div class="hour_box" style="width: calc(4.16667%);">
                                                        </div>
                                                        <div class="hour_box" style="width: calc(4.16667%);">
                                                        </div>
                                                        <div class="hour_box" style="width: calc(4.16667%);">
                                                        </div>
                                                        <div class="hour_box" style="width: calc(4.16667%);">
                                                        </div>
                                                        <div class="hour_box" style="width: calc(4.16667%);">
                                                        </div>
                                                        <div class="hour_box" style="width: calc(4.16667%);">
                                                        </div>
                                                        <div class="hour_box" style="width: calc(4.16667%);">
                                                        </div>
                                                        <div class="hour_box" style="width: calc(4.16667%);">
                                                        </div>
                                                        <div class="hour_box" style="width: calc(4.16667%);">
                                                        </div>
                                                        <div class="hour_box" style="width: calc(4.16667%);">
                                                        </div>
                                                        <div class="hour_box" style="width: calc(4.16667%);">
                                                        </div>
                                                        <!-- Button shift modal -->
                                                        <button type="button" class="shift_timing_btn" data-bs-toggle="modal" data-bs-target="#exampleModalShiftModal" style="sdisplay: none;" data-testid="Shift card" style="width: 33.3333%; left: 37.5%;">
                                                            <div class="d-flex align-items-center">
                                                                <div class="">
                                                                    <div class="name_of_member">
                                                                        <div class="">
                                                                            <?php 
                                                                                $str = str_split($user_data[0]['name']); echo strtoupper($str[0]); 
                                                                                $whatIWant = substr($user_data[0]['name'], strpos($user_data[0]['name'], " ") + 1);    
                                                                                $str1 =  str_split($whatIWant); echo strtoupper($str1[0]);
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="name_of_person">{{ $user_data[0]['name'] }}</div>
                                                                        <div class="shift_timeing_duration">{{ $shift_start }} - {{ $shift_end }}</div>
                                                                    </div>
                                                                    <div class=""></div>
                                                                </div>
                                                            </div>
                                                        </button>
                                                        
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModalShiftModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Shift details</h1>
                                                                <button type="button" class="btn_close" data-bs-dismiss="modal" aria-label="Close">&#10006;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container remove-padding M-right" id="multiForm" style="display: block;">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="row" id="form1" style="display: block;">
                                                                                    <div class="col-md-12">
                                                                                        <div class="employees-info">
                                                                                            <div class="row">
                                                                                                <div class="col-md-12" id="showDiv">
                                                                                                    <form class="employees-data" onsubmit="return validateform()">
                                                                                                        <div class="row my-2">
                                                                                                            <label for="assign_work" class="col-sm-3 col-form-label">Assigned worker</label>
                                                                                                            <div class="col-sm-4">
                                                                                                                <select name="" id="" class="form-select form-control">
                                                                                                                    <option value="person_name1">Jack</option>
                                                                                                                    <option value="person_name2">Jack</option>
                                                                                                                    <option value="person_name3">Jack</option>
                                                                                                                    <option value="person_name4">Jack</option>
                                                                                                                    <option value="person_name5">Jack</option>
                                                                                                                    <option value="person_name6">Jack</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row my-2">
                                                                                                            <label for="date_of_shift" class="col-sm-3 col-form-label">Shift day</label>
                                                                                                            <div class="col-md-4">
                                                                                                                <input type="date" class="form-control" id="date_of_shift">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row my-2">
                                                                                                            <label for="firstName" class="col-sm-3 col-form-label">Shift time</label>
                                                                                                                <!-- <div class="col-sm-5"> -->
                                                                                                                <div class="col-auto">
                                                                                                                    <input type="time" class="col-sm-2 form-control" id="firstName" aria-describedby="emailHelp" value="9:00" placeholder="">
                                                                                                                </div>
                                                                                                                <div class="col-auto">
                                                                                                                    <span class="btew-time">to</span>
                                                                                                                </div>
                                                                                                                <div class="col-auto">
                                                                                                                    <input type="time" class="col-sm-2 form-control" id="firstName" value="9:00" aria-describedby="emailHelp" placeholder="">
                                                                                                                </div>
                                                                                                            <!-- </div> -->
                                                                                                        </div>
                                                                                                        <div class="row my-2">
                                                                                                            <label for="lastName" class="col-sm-3 col-form-label">Break duration</label>
                                                                                                            <div class="col-auto">
                                                                                                                <input type="time" class="form-control" id="lastName" placeholder="Last name">
                                                                                                                <p id="lastNamError">
                                                                                                                </p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <label for="emailAdd" class="col-sm-12">Add a note</label>
                                                                                                            <div class="col-md-12">
                                                                                                                <textarea name="" class="form-control" id="" cols="40" rows="3"></textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <small class="my-2">Notes are visible to everyone</small>
                                                                                                            <div class="d-flex col-md-4 align-items-center my-3">
                                                                                                                <b>On this day</b>
                                                                                                            </div>
                                                                                                            <div class="col-md-4 my-3" style="opacity: 0.7; font-weight: 500;">No event on this day</div>
                                                                                                            <p>This shift is <strong>8 hour with no break </strong></p>
                                                                                                        </div>
                                                                                                        <div class="form-group col-md-12 d-flex justify-content-end">
                                                                                                            <button type="button" class="delete_modal_btn">Delete</button>
                                                                                                            <button type="button" id="next1" onclick="next({id:'next',form:'form',count:1})" class="save-btn">Update shift</button>
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
                                                                <div class="modal-footer justify-content-start">
                                                                    <button type="button" class="close_modal_btn" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php  }   }  //$dates = $period->toArray();?>
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
            @endforeach
        </div>
    </section>
    @include('rotaStaff.components.footer')
    <script>
             function renamedata(id,name, status){
            $('#rota_name_model').text(name);
            $('#rota_id').val(id);
            $('#rota_status').val(status);
            $('#exampleModalPublish').modal('show');    
        }
        $(document).ready(function(){
            $('#publish_unpublish_btn').on('click', function(){
                var rota_id = $('#rota_id').val();
                var rota_status = $('#rota_status').val();
                var token = "<?=csrf_token()?>";
                $.ajax({
                    url:"{{ url('/publish_unpublish_rota') }}",    
                    type: "post",    
                    dataType: 'text',
                    data: {rota_id: rota_id, rota_status: rota_status, _token:token},
                    success:function(result){
                        console.log(result);
                        location.reload();
                    }
                });
            });
        });
    </script>