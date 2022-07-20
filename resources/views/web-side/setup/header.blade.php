  <!-- ======= Header/Navbar ======= -->

  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
      <div class="container">
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault"
              aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
              <span></span>
              <span></span>
              <span></span>
          </button>
          <a class="navbar-brand text-brand" href="index.html"><img src="{{ asset('public/assets/sons.jpeg') }}"
                  class="img-fluid" width="50px" alt=""></a>

          <div class="navbar-collapse collapse" id="navbarDefault">
              <ul class="navbar-nav m-auto">
                  <li class="{{ Route::is('/') ? 'active' : '' }} nav-item">
                      <a class="nav-link" href="{{ url('/') }}">Home</a>
                  </li>

                  <li class="{{ Route::is('about') ? 'active' : '' }} nav-item">
                      <a class="nav-link " href="{{ url('about') }}">About</a>
                  </li>

                  <li class="nav-item dropdown">
                      <a class="{{ Route::is('projects') ? 'active' : '' }} nav-link dropdown-toggle" href="#"
                          id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false">Projects</a>
                      <div class="dropdown-menu">
                          @php
                              $navbars = App\Models\Project::all();
                          @endphp
                          @foreach ($navbars as $navbarItem)
                              <a class="dropdown-item"
                                  href="{{ url('projects/' . $navbarItem->id) }}">{{ $navbarItem->name }}</a>
                          @endforeach
                      </div>
                  </li>

                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Media</a>
                      <div class="dropdown-menu">
                          <a class="dropdown-item {{ Route::is('blog') ? 'active' : '' }}"
                              href="{{ url('blog') }}">Blog</a>
                          <a class="dropdown-item {{ Route::is('news') ? 'active' : '' }}"
                              href="{{ url('news') }}">News</a>
                      </div>
                  </li>

                  <li class="{{ Route::is('gallery') ? 'active' : '' }} nav-item">
                      <a class="nav-link " href="{{ url('gallery') }}">Gallery</a>
                  </li>

                  <li class="nav-item dropdown">
                      <a class="{{ Route::is('events') ? 'active' : '' }} nav-link dropdown-toggle" href="#"
                          id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false">Events</a>
                      <div class="dropdown-menu">
                          @php
                              $events = App\Models\Event::all();
                          @endphp
                          @foreach ($events as $event)
                              <a class="dropdown-item"
                                  href="{{ url('events/' . $event->id) }}">{{ $event->name }}</a>
                          @endforeach
                      </div>
                  </li>

                  <li class="{{ Route::is('contact') ? 'active' : '' }} nav-item">
                      <a class="nav-link " href="{{ url('contact') }}">Contact</a>
                  </li>
              </ul>
              <form class="d-flex">
                  <button class="btn btn default book-now" type="button" data-bs-toggle="modal"
                      data-bs-target="#bookNowModal">Book Now</button>
              </form>
          </div>

      </div>
  </nav>
  <!-- End Header/Navbar -->



  <!--Book Now Modal -->
  <div class="modal fade" id="bookNowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form action="{{ url('book-now') }}" method="POST">
                      @csrf
                      <div class="form-group">
                          <input type="text" name="name" class="form-control input"
                              placeholder="Your Name" required="" autocomplete="off">
                      </div>
                      <div class="form-group mt-3">
                          <input type="text" name="email" class="form-control input"
                              placeholder="Email" autocomplete="off">
                      </div>
                      <div class="form-group mt-3">
                          <input type="tel" name="phone" class="form-control input"
                              placeholder="Phone" pattern="\d{11}" required="" autocomplete="off">
                      </div>
                      <div class="form-group">
                          <label for="" class="text-white">Interested In</label>
                          <select name="interest" class="form-control input" required="">
                              <option value="" selected disabled>Select</option>
                              <option value="3 Marla">3 Marla</option>
                              <option value="5 Marla">5 Marla</option>
                              <option value="1 Kanal">1 Kanal</option>
                              <option value="2 Kanal">2 Kanal</option>
                          </select>
                      </div>

                      <button type="submit" class="btn btn-default invest w-100 mt-3">SEND</button>

                  </form>
              </div>
          </div>
      </div>
  </div>

  <!--Book Now Modal -->
