@include('rotaStaff.components.header')
        
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-12">
                  <ul class="nav nav-tabs calender-Tab nav-fill" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">Calendar</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">Pending requests</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                        type="button" role="tab" aria-controls="contact" aria-selected="false">Mandatory leave</button>
                    </li>
                  </ul>
                  <div class="tab-content tabs-info-content-space-bar" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <div id='calendar'></div>

                    </div>

                    <div class="tab-pane fade content-info-title" id="profile" role="tabpanel"
                      aria-labelledby="profile-tab">
                      <select>
                        <option value="Date raised (Oldest first)">Date raised (Oldest first)</option>
                        <option value="Date raised (Oldest first)">Date raised (Oldest first)</option>
                        <option value="Date raised (Oldest first)">Date raised (Oldest first)</option>
                        <option value="Date raised (Oldest first)">Date raised (Oldest first)</option>
                        <option value="Date raised (Oldest first)">Date raised (Oldest first)</option>
                      </select>

                      <h2>Pending requests (0)</h2>
                      <p>Everything is up to date, have a cuppa!</p>
                      <div class="row">
                        <div class="col-md-6 my-2">
                          <div class="pending_rquest">
                            <div class="parent_div">
                              <div class="d-flex justify-content-between">
                                <div class="d-flex flex-column align-items-center justify-content-center col-md-2 date_of_shift_rota">
                                  <div class="short_name">KG</div>
                                </div>
                                <div class="col-md-10 p-2">
                                  <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                      <a href="./timeline-view.html" class="rota_shift_employee_name">Komal Gautam</a>
                                    </div>
                                    <div>
                                      <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModalUnapproved" class="unapproved_btn">Unapproved</button>
                                    </div>
                                        <!-- Button trigger modal -->                                 
                                  </div>
                                  <div class="d-flex flex-column">
                                    <div class="start_end_date"><strong>Start:&nbsp;</strong>23/12/2020<strong>&nbsp;&nbsp;&nbsp;End:&nbsp;</strong>23/12/1220</div>
                                    <div class="pe-3">Leave for urgent work</div>
                                    <div class="order-1">
                                    </div>
                                </div>
                              </div>
                            </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      @foreach($pending_leave as $pending_leaves)
                        <div>
                          <span>{{ $pending_leaves->name }}</span>
                          <span>{{ $pending_leaves->leave_name }}</span>
                          <span>{{ $pending_leaves->start_date }}</span>
                          <span>{{ $pending_leaves->end_date }}</span>
                          <span>{{ $pending_leaves->user_id }}</span>
                          <span>{{ $pending_leaves->notes }}</span>
                          <span><button>Approve</button></span>

                        </div>
                      @endforeach

                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                      <h3>Mandatory leave</h3>
                      <p>Dates your employees have to take as leave such as shutdown periods, local bank holidays etc.
                        Once set, it will appear on employee profile as Mandatory time off as well as in the calendar.

                      </p>

                    </div>
                  </div>


                </div>
                <!-- Col Md 9 End -->
              </div>
            </div>

          </div>
        </div>
      </div>
  </section>
  <!-- demo -->
  <?php
  // echo "<pre>";
  // print_r($calander[0]['title']);
  ?>
  @include('rotaStaff.components.footer')
  <div class="modal fade unapproved" id="exampleModalUnapproved" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 50vw;">
        <div class="modal-content content-modal">
            <div class="modal-header modal-head">
                <h5 class="modal-title" id="exampleModalLabel"><span>Are you sure you want to approve this leave?</span></h5>
                <button type="button" class=" close-btn" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <p>This will show in the calendar with perticular date. Once approved, the notification will be sent to Komal Gautam.</p>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" class="approve-btn">Approve</button>
            </div>
        </div>
    </div>
</div>
  <script>
     document.addEventListener('DOMContentLoaded', function () {
      var initialLocaleCode = 'en';
      var localeSelectorEl = document.getElementById('locale-selector');
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        initialDate: moment().format('YYYY-MM-DD'),
        locale: initialLocaleCode,
        buttonIcons: false, // show the prev/next text
        weekNumbers: true,
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: <?=$calander?>
      });

      calendar.render();

      // build the locale selector's options
      calendar.getAvailableLocaleCodes().forEach(function (localeCode) {
        var optionEl = document.createElement('option');
        optionEl.value = localeCode;
        optionEl.selected = localeCode == initialLocaleCode;
        optionEl.innerText = localeCode;
        localeSelectorEl.appendChild(optionEl);
      });

      // when the selected option changes, dynamically change the calendar option
      localeSelectorEl.addEventListener('change', function () {
        if (this.value) {
          calendar.setOption('locale', this.value);
        }
      });

    });
  </script>