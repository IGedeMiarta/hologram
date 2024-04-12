<header class="header-style header-style2 header-style3">
    <div class="hamburger-icon3">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="header-content">
        <div class="row">
            <div class="col-xs-6 col-sm-2">
                <a class="logo" href="index.html">
                    <img src="{{ asset($app->logo) }}" alt="#" style="border-radius: 50%;" />
                </a>
            </div>
            <div class="col-xs-6 col-sm-10">
                <div class="hamburger-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="hamburger-icon2">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <nav class="normal-s">
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">HOME</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}">ABOUT</a>
                        </li>
                        {{-- <li>
                            <a href="detail.html">CATALOG</a>
                        </li> --}}
                        {{-- <li class="dropdown-plus">
                             <a href="blog.html">BLOG</a>
                             <span></span>
                             <ul>
                                 <li><a href="blog.html">Blog</a></li>
                                 <li><a href="blogdetail.html">Blog detail</a></li>
                             </ul>
                         </li> --}}
                        <li>
                            <a href="{{ route('contact') }}">CONTACT</a>
                        </li>
                    </ul>
                </nav>
            </div>
            {{-- <div class="section">
                 <p>A small design & technology freelancer based out of Atlanta, GA. Catch up on my latest projects
                     and get in touch.</p>
             </div>
             <div class="category">
                 <span class="small-1">CATEGORY</span>
                 <ul>
                     <li class="active">All</li>
                     <li>Development</li>
                     <li>Illustration</li>
                     <li>Product</li>
                     <li>Typography</li>
                 </ul>
             </div>
             <div class="sort-by">
                 <span class="small-1">SORT BY</span>
                 <ul>
                     <li>Random</li>
                     <li class="active">Popular</li>
                     <li>Rate</li>
                 </ul>
             </div> --}}
            <div class="normal-3 section">
                <ul>
                    <li>
                        <a href="tel:{{ $app->phone }}" target="_blank">{{ $app['phone'] ?? '' }}</a>
                    </li>
                    <li>
                        <a href="mailto:{{ $app->mail }}" target="_blank">{{ $app['mail'] ?? '' }}</a>
                    </li>
                </ul>
                <div class="empty-space h10-xs fl"></div>
                <div class="follow">
                    <a class="social" href="{{ $app->s_fb }}" target="_blank">
                        <i class="fab fa-facebook" aria-hidden="true"></i>
                    </a>
                    <a class="social" href="{{ $app->s_ig }}" target="_blank">
                        <i class="fab fa-instagram" aria-hidden="true"></i>
                    </a>
                    {{-- <a class="social" href="https://www.pinterest.com/" target="_blank">
                         <i class="fab fa-pinterest-p" aria-hidden="true"></i>
                     </a> --}}
                    <a class="social" href="{{ $app->s_tt }}" target="_blank">
                        <i class="fab fa-tiktok"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="mob-icon"></div>
    </div>
</header>
