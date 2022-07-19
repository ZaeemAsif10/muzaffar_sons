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
              <ul class="navbar-nav ms-auto">

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
          </div>

      </div>
  </nav>
  <!-- End Header/Navbar -->
