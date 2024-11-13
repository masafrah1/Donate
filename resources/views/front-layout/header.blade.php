  <!-- Spinner Start -->
  <div id="spinner"
      class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
          <span class="sr-only">Loading...</span>
      </div>
  </div>
  <!-- Spinner End -->

  <!-- Topbar Start -->
  <div class="container-fluid topbar bg-light px-5 d-none d-lg-block">
      <div class="row gx-0 align-items-center">
          <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
              <div class="d-flex flex-wrap">
                  <a href="#" class="text-muted small me-4"><i
                          class="fas fa-map-marker-alt text-primary me-2"></i>رام الله- الماصيون</a>
                  <a href="tel:+01234567890" class="text-muted small me-4"><i
                          class="fas fa-phone-alt text-primary me-2"></i>02-2948410</a>
                  <a href="mailto:example@gmail.com" class="text-muted small me-0"><i
                          class="fas fa-envelope text-primary me-2"></i>info@mosd.gov.ps</a>
              </div>
          </div>
          <div class="col-lg-4 text-center text-lg-end">
              <div class="d-inline-flex align-items-center" style="height: 45px;">
                  <a href="/donate"><small class="me-3 text-dark"><i class="fa fa-user text-primary me-2"></i>وزارة
                          التنمية الإجتماعية - أمل المستقبل</small></a>
                  {{-- <a href="#"><small class="me-3 text-dark"><i class="fa fa-sign-in-alt text-primary me-2"></i>Login</small></a>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle text-dark" data-bs-toggle="dropdown"><small><i class="fa fa-home text-primary me-2"></i> My Dashboard</small></a>
                    <div class="dropdown-menu rounded">
                        <a href="#" class="dropdown-item"><i class="fas fa-user-alt me-2"></i> My Profile</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-comment-alt me-2"></i> Inbox</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-bell me-2"></i> Notifications</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-cog me-2"></i> Account Settings</a>
                        <a href="#" class="dropdown-item"><i class="fas fa-power-off me-2"></i> Log Out</a>
                    </div>
                </div> --}}
              </div>
          </div>
      </div>
  </div>
  <!-- Topbar End -->

  <!-- Navbar & Hero Start -->
  <div class="container-fluid position-relative p-0">
      <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0 rtl">
          <a href="/" class="navbar-brand p-0">
              {{-- <h1 class="text-primary"><i class="fas fa-search-dollar me-3"></i>Stocker</h1> --}}
              <img class="" src="{{ asset('images/logo.png') }}" alt="Logo">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
              <span class="fa fa-bars"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
              <div class="navbar-nav ms-auto py-0">
                  <a href="/about" class="nav-item nav-link active">برنامج أمل المستقبل</a>
                  <a href="/projects" class="nav-item nav-link">البرامج والمشاريع</a>
                  <a href="#" class="nav-item nav-link">النداءات</a>
                  <a href="#" class="nav-item nav-link">الحملات</a>
                  <a href="#" class="nav-item nav-link">الشركاء</a>
                  {{-- <a href="#" class="nav-item nav-link">البوابة الموحدة للمساعدات</a> --}}
                  <a href="#" class="nav-item nav-link">تقارير </a>
                  <a href="#" class="nav-item nav-link">تطوع معنا</a>
                  <a href="#" class="nav-item nav-link">قصص نجاح</a>

                  {{-- <div class="nav-item dropdown">
                      <a href="#" class="nav-link" data-bs-toggle="dropdown">
                          <span class="dropdown-toggle">البوابة الموحدة للمساعدات</span>
                      </a>
                      <div class="dropdown-menu m-0">
                          <a href="#" class="dropdown-item">Our Features</a>
                          <a href="#" class="dropdown-item">Our team</a>
                          <a href="#" class="dropdown-item">Testimonial</a>
                          <a href="#" class="dropdown-item">Our offer</a>
                          <a href="#" class="dropdown-item">FAQs</a>
                          <a href="#" class="dropdown-item">404 Page</a>
                      </div>
                  </div> --}}
                  <a href="https://www.mosd.gov.ps/ar/page/contact" class="nav-item nav-link">تواصل معنا</a>
              </div>
              <a href="#donationSection" class=""><img width="200" src="{{ asset('images/donate.gif') }}" alt="تبرع الان" /></a>
          </div>
      </nav>
  </div>
