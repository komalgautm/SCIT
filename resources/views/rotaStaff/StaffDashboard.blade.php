@include('rotaStaff.components.header')
<div class="col-lg-11">
          <div class="row">
            <!-- Top Bar Info Section Start Here -->
         
            <!-- Top Bar Info Section End Here -->
            <div class="col-lg-8">

              
              <div class="main-shodw-box">
                <div class="row">
                  <div class="col-lg-6 over-title-top">
                    <h2>Overview</h2> </div>
                  <div class="col-lg-6 add-btn-top">
                    <h4><a href="annual-leave.html">+ Add time off</a></h4></div>
                </div>
                <div class="flx-box">
                  <div class="crical-part-info-main">
                    <div class="cricat-up-text">
                      <h3>Mon 25 Jul</h3> </div>
                    <div class="crical-info-prt"> </div>
                    <div class="stock-crical-info">
                      <h2>1</h2></div>
                  </div>
                  <div class="crical-part-info-main">
                    <div class="cricat-up-text">
                      <h3>Mon 25 Jul</h3> </div>
                    <div class="crical-info-prt"> </div>
                    <div class="stock-crical-info">
                      <h2>1</h2></div>
                  </div>
                  <div class="crical-part-info-main">
                    <div class="cricat-up-text">
                      <h3>Mon 25 Jul</h3> </div>
                    <div class="crical-info-prt"> </div>
                    <div class="stock-crical-info">
                      <h2>1</h2></div>
                  </div>
                  <div class="crical-part-info-main">
                    <div class="cricat-up-text">
                      <h3>Mon 25 Jul</h3> </div>
                    <div class="crical-info-prt"> </div>
                    <div class="stock-crical-info">
                      <h2>1</h2></div>
                  </div>
                  <div class="crical-part-info-main">
                    <div class="cricat-up-text">
                      <h3>Mon 25 Jul</h3> </div>
                    <div class="crical-info-prt"> </div>
                    <div class="stock-crical-info">
                      <h2>1</h2></div>
                  </div>
                  <div class="crical-part-info-main">
                    <div class="cricat-up-text">
                      <h3>Mon 25 Jul</h3> </div>
                    <div class="crical-info-prt"> </div>
                    <div class="stock-crical-info">
                      <h2>1</h2></div>
                  </div>
                  <div class="crical-part-info-main">
                    <div class="cricat-up-text">
                      <h3>Mon 25 Jul</h3> </div>
                    <div class="crical-info-prt"> </div>
                    <div class="stock-crical-info">
                      <h2>1</h2></div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="line-hr"></div>
                </div>
                <div class="my-summary-info">
                  <div class="row">
                    <div class="col-lg-12 col-md-12">
                      <h4 class="my-summry-part">My summary</h4> </div>
                    <div class="col-lg-3">
                      <div class="main-white-crical"></div>
                      <div class="main-summery-box-strock">
                        <h2>1</h2> </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                      <form>
                        <div class="from-equal">
                          <div class="from-group">
                            <input type="text" class="first-from" placeholder="Annual Leave"> </div>
                          <div class="from-group">
                            <input type="text" class="secound-from" placeholder="0 Other"> </div>
                        </div>
                        <div class="from-equal">
                          <div class="from-group">
                            <input type="text" class="three-from" placeholder="1 Sickness"> </div>
                          <div class="from-group">
                            <input type="text" class="four-from" placeholder="0 Time off in lieu"> </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Right Side Bar Info Start Here -->
            <div class="col-lg-4 col-md-3">
              <aside class="right-side-info">
                <div class="right-side-info-bar">
                  <h2>My Summary</h2>
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Absence</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Overtime</button>
                    </li>
                  </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="tab-first-infos">
                      <h3><a href="#">Request time off</a></h3>
                      <h4><a href="#">Request time off</a></h4> </div>
                    <div class="main-equal-side">
                      <div class="main-sidebar-crial">
                        <div class="crical-onw-white"></div>
                        <div class="crical-strok"> </div>
                      </div>
                      <div class="crical-content-bar">
                        <h4><strong>-5 hrs 0 mins</strong> remaining</h4>
                        <h4><strong>0 hrs 0 mins</strong> allowance</h4> </div>
                    </div>
                    <p class="next">Next up - No absences coming up</p>
                    <div class="btn-info-sep">
                      <p>You've also taken</p>
                      <div class="ntn-prt">
                        <h5><a href="#">{{ $sickness }} Lateness</a></h5>
                        <h6><a href="#">{{ $lateness }} Sickness</a></h6> </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                     <div class="tab-first-infos">
                      <h3><a href="#">Request time off</a></h3>
                      <h4><a href="#">Request time off</a></h4> </div>
                    <div class="main-equal-side">
                      <div class="main-sidebar-crial">
                        <div class="crical-onw-white"></div>
                        <div class="crical-strok"> </div>
                      </div>
                      <div class="crical-content-bar">
                        <h4><strong>-5 hrs 0 mins</strong> remaining</h4>
                        <h4><strong>0 hrs 0 mins</strong> allowance</h4> </div>
                    </div>
                    <p class="next">Next up - No absences coming up</p>
                    <div class="btn-info-sep">
                      <p>You've also taken</p>
                      <div class="ntn-prt">
                        <h5><a href="#">0 Lateness</a></h5>
                        <h6><a href="#">0 Sickness</a></h6> </div>
                    </div>


                  </div>
                  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                </div>
              </aside>
            </div>
            <!-- Right Side Bar Info end Here -->
            <!-- Card information start here -->
            <div class="row my-3">
              <div class="col-md-4 my-2">
                <div class="card">
                  <div class="detail-area">
                    <div>
                      <h2 class="heading">Payroll</h2>
                    </div>
                    <div>
                      <p class="sub-heading">navigator</p>
                    </div>
                  </div>
                  <div class="detail">
                    <div class="headline">
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="more-headline">
                      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium amet sint deserunt. Non mollitia labore explicabo! <span class="see-more-card"><a href="#" style="text-decoration: none;">See More</a></span></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 my-2">
                <div class="card">
                  <div class="payroll">
                    <div>
                      <h2 class="heading">Turbotalent</h2>
                    </div>
                    <div>
                      <p class="sub-heading">navigator</p>
                    </div>
                  </div>
                  <div class="detail">
                    <div class="headline">
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="more-headline">
                      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium amet sint deserunt. Non mollitia labore explicabo! <span class="see-more-card"><a href="#" style="text-decoration: none;">See More</a></span></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 my-2">
                <div class="card">
                  <div class="turbotalent">
                    <div>
                      <h2 class="heading">backtowork</h2>
                    </div>
                    <div>
                      <p class="sub-heading">navigator</p>
                    </div>
                  </div>
                  <div class="detail">
                    <div class="headline">
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="more-headline">
                      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium amet sint deserunt. Non mollitia labore explicabo! <span class="see-more-card"><a href="#" style="text-decoration: none;">See More</a></span></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 my-2">
                <div class="card">
                  <div class="turbotalent">
                    <div>
                      <h2 class="heading">Turbotalent</h2>
                    </div>
                    <div>
                      <p class="sub-heading">navigator</p>
                    </div>
                  </div>
                  <div class="detail">
                    <div class="headline">
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="more-headline">
                      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium amet sint deserunt. Non mollitia labore explicabo! <span class="see-more-card"><a href="#" style="text-decoration: none;">See More</a></span></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 my-2">
                <div class="card">
                  <div class="detail-area">
                    <div>
                      <h2 class="heading">payroll</h2>
                    </div>
                    <div>
                      <p class="sub-heading">navigator</p>
                    </div>
                  </div>
                  <div class="detail">
                    <div class="headline">
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="more-headline">
                      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium amet sint deserunt. Non mollitia labore explicabo! <span class="see-more-card"><a href="#" style="text-decoration: none;">See More</a></span></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 my-2">
                <div class="card">
                  <div class="backtowork">
                    <div>
                      <h2 class="heading">backtowork</h2>
                    </div>
                    <div>
                      <p class="sub-heading">navigator</p>
                    </div>
                  </div>
                  <div class="detail">
                    <div class="headline">
                      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="more-headline">
                      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium amet sint deserunt. Non mollitia labore explicabo! <span class="see-more-card"><a href="#" style="text-decoration: none;">See More</a></span></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Card information end here -->
          </div>
        </div>
      </div>
    </div>
  </section>
  @include('rotaStaff.components.footer')