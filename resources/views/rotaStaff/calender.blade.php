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