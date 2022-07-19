  <!-- ======= Footer ======= -->
  <section class="section-footer">
      <div class="container">
          <div class="row">
              <div class="col-sm-12 col-md-4">
                  <div class="widget-a">
                      <div class="w-header-a">
                          <h3 class="w-title-a text-brand">ABOUT US</h3>
                      </div>
                      <div class="w-body-a">
                          <p class="w-text-a color-text-a">
                              The A Team is a Lahore-Based main authorized dealer of Al Jalil Developers that helps
                              small-budget property investors grow their wealth, build their dream home, and secure
                              their loved ones’ future.
                          </p>
                      </div>
                      <div class="w-footer-a">
                          <ul class="list-unstyled">
                              <li class="color-a">
                                  <span class="color-text-a">Phone .</span> example@gmail.com
                              </li>
                              <li class="color-a">
                                  <span class="color-text-a">Email .</span> +54 356 945234
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
              <div class="col-sm-12 col-md-4 section-md-t3">
                  <div class="widget-a">
                      <div class="w-header-a">
                          <h3 class="w-title-a text-brand">PROJECTS</h3>
                      </div>
                      <div class="w-body-a">
                          <div class="w-body-a">
                              <ul class="list-unstyled">
                                  @php
                                      $navbars = App\Models\Project::take(6)->get();
                                  @endphp
                                  @foreach ($navbars as $navbarItem)
                                  <li class="item-list-a">
                                      <i class="bi bi-chevron-right"></i> <a href="{{ url('projects/' . $navbarItem->id) }}">{{ $navbarItem->name }}</a>
                                  </li>
                                  @endforeach
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-sm-12 col-md-4 section-md-t3">
                  <div class="widget-a">
                      <div class="w-header-a">
                          <h3 class="w-title-a text-brand">Links</h3>
                      </div>
                      <div class="w-body-a">
                          <ul class="list-unstyled">
                              <li class="item-list-a">
                                  <i class="bi bi-chevron-right"></i> <a href="#">Home</a>
                              </li>
                              <li class="item-list-a">
                                  <i class="bi bi-chevron-right"></i> <a href="#">Abouts Us</a>
                              </li>
                              <li class="item-list-a">
                                  <i class="bi bi-chevron-right"></i> <a href="#">Blog</a>
                              </li>
                              <li class="item-list-a">
                                  <i class="bi bi-chevron-right"></i> <a href="#">Media</a>
                              </li>
                              <li class="item-list-a">
                                  <i class="bi bi-chevron-right"></i> <a href="#">Events</a>
                              </li>
                              <li class="item-list-a">
                                  <i class="bi bi-chevron-right"></i> <a href="#">Contact Us</a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <footer>
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <nav class="nav-footer">
                      <ul class="list-inline">
                          <li class="list-inline-item">
                              <a href="#">Home</a>
                          </li>
                          <li class="list-inline-item">
                              <a href="#">About</a>
                          </li>
                          <li class="list-inline-item">
                              <a href="#">Media</a>
                          </li>
                          <li class="list-inline-item">
                              <a href="#">Blog</a>
                          </li>
                          <li class="list-inline-item">
                              <a href="#">Contact</a>
                          </li>
                      </ul>
                  </nav>
                  <div class="socials-a">
                      <ul class="list-inline">
                          <li class="list-inline-item">
                              <a href="#">
                                  <i class="bi bi-facebook" aria-hidden="true"></i>
                              </a>
                          </li>
                          <li class="list-inline-item">
                              <a href="#">
                                  <i class="bi bi-twitter" aria-hidden="true"></i>
                              </a>
                          </li>
                          <li class="list-inline-item">
                              <a href="#">
                                  <i class="bi bi-instagram" aria-hidden="true"></i>
                              </a>
                          </li>
                          <li class="list-inline-item">
                              <a href="#">
                                  <i class="bi bi-linkedin" aria-hidden="true"></i>
                              </a>
                          </li>
                      </ul>
                  </div>
                  <div class="copyright-footer">
                      <p class="copyright color-text-a">
                          &copy; Copyright
                          <span class="color-a">muzaffar&sons</span> All Rights Reserved.
                      </p>
                  </div>
                  <div class="credits">
                      <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
          -->
                      Designed by <a href="#">Shahraan Tech</a>
                  </div>
              </div>
          </div>
      </div>
  </footer><!-- End  Footer -->
