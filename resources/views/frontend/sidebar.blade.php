 <style>
     .tiktok {
         display: inline-block;
         width: 15px;
         height: auto;
         color: white;
         background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" /></svg>');
     }
 </style>
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
                     {{-- <img src="{{ asset('/frontend') }}/img/logo.png" alt="#" /> --}}
                     {{ $app['name'] }}
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
                             <a href="about.html">ABOUT</a>
                         </li>
                         <li>
                             <a href="detail.html">CATALOG</a>
                         </li>
                         {{-- <li class="dropdown-plus">
                             <a href="blog.html">BLOG</a>
                             <span></span>
                             <ul>
                                 <li><a href="blog.html">Blog</a></li>
                                 <li><a href="blogdetail.html">Blog detail</a></li>
                             </ul>
                         </li> --}}
                         <li>
                             <a href="contact.html">CONTACT</a>
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
                         <a href="tel:+138(095)6526538">{{ $app['phone'] ?? '' }}</a>
                     </li>
                     <li>
                         <a href="mailto:info@opium.com">{{ $app['mail'] ?? '' }}</a>
                     </li>
                 </ul>
                 <div class="empty-space h10-xs fl"></div>
                 <div class="follow">
                     <a class="social" href="https://www.facebook.com/" target="_blank">
                         <i class="fab fa-facebook" aria-hidden="true"></i>
                     </a>
                     <a class="social" href="https://www.instagram.com/" target="_blank">
                         <i class="fab fa-instagram" aria-hidden="true"></i>
                     </a>
                     <a class="social" href="https://www.pinterest.com/" target="_blank">
                         <i class="fab fa-pinterest-p" aria-hidden="true"></i>
                     </a>
                     <a class="social" href="https://www.tiktok.com/" target="_blank">
                         <i class="fab fa-tiktok"></i>
                     </a>
                 </div>
             </div>
         </div>
         <div class="mob-icon"></div>
     </div>
 </header>
