@extends('frontend.app')

@section('content')
    <div class="empty-space h35-xs h90-sm"></div>

    <div class="container-fluid-style2">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                <article>
                    <h1 class="h1">HUBUNGI KAMI</h1>
                    <div class="empty-space h25-xs"></div>
                    <p class="normal-l grey-dark">Jangan ragu untuk menghubungi kami untuk informasi lebih lanjut. Kami siap
                        membantu Anda dalam segala hal terkait produk kami atau kerjasama yang mungkin Anda minati. Silakan
                        hubungi kami melalui informasi kontak di bawah ini.</p>
                </article>
            </div>
        </div>
        <div class="empty-space h155-md h60-xs"></div>
        <div class="contacts">
            <div class="row">
                <div class="col-md-3">
                    <div class="empty-space h0-sm h40-md fl"></div>
                    <div class="section">
                        <p class="biggest">Alamat</p>
                        <div class="empty-space h10-xs"></div>
                        <ul class="normal">
                            <li>
                                <a href="https://maps.app.goo.gl/ZEbULCtJhse2UrW7A" target="_blank">Jl. Jempiring No.32,
                                    Baler Bale Agung,
                                    Kec. Negara, Kabupaten Jembrana, Bali 82218</a>
                            </li>
                            {{-- <li>
                                <a href="https://www.google.com.ua/maps/@40.7573849,-73.9721243,19z">210 Velykogo St. Suite
                                    100 WPB, FL 33401</a>
                            </li> --}}
                        </ul>
                        <div class="empty-space h35-xs"></div>
                        <p class="biggest">Jam Kerja</p>
                        <div class="empty-space h10-xs"></div>
                        <ul class="normal">
                            <li>Buka Setiap Hari Jam 09:00 - 17:00</li>
                        </ul>
                    </div>
                    <div class="empty-space h35-xs h40-md fl"></div>
                </div>
                <div class="col-md-3 pull-right">
                    <div class="empty-space h0-xs h40-md fl"></div>
                    <div class="section">
                        <p class="biggest">Phone</p>
                        <div class="empty-space h10-xs"></div>
                        <ul class="normal">
                            <li><a href="tel:{{ $app->phone }}">+{{ $app->phone }}</a></li>
                        </ul>
                        <div class="empty-space h35-xs"></div>
                        <p class="biggest">E-mail</p>
                        <div class="empty-space h10-xs"></div>
                        <ul class="normal">
                            <li><a href="mailto:{{ $app->mail }}">{{ $app->mail }}</a></li>
                        </ul>
                    </div>
                    <div class="empty-space h0-xs h40-md fl"></div>
                </div>
                <style>
                    .alert {
                        padding: 20px;
                        background-color: #7AA2E3;
                        /* Red */
                        color: white;
                        margin-bottom: 15px;
                    }

                    /* The close button */
                    .closebtn {
                        margin-left: 15px;
                        color: white;
                        font-weight: bold;
                        float: right;
                        font-size: 22px;
                        line-height: 20px;
                        cursor: pointer;
                        transition: 0.3s;
                    }

                    /* When moving the mouse over the close button */
                    .closebtn:hover {
                        color: black;
                    }
                </style>
                <div class="col-md-6">
                    <div class="form-wrapper text-center">
                        <div class="empty-space h50-xs h40-md"></div>
                        <h6 class="h7">Leave a message</h6>
                        <div class="empty-space h30-xs"></div>

                        @if (session('success'))
                            <div class="alert">
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                {!! session('success') !!}
                                {{-- Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel, cum? --}}
                            </div>
                        @endif
                        <form class="contact-form" method="POST" action="{{ route('contact.post') }}">
                            @csrf
                            <div class="input-wrapper">
                                <div class="input-style">
                                    <input id="inputName" name="name" type="text" class="input" required>
                                    <label for="inputName">Name...</label>
                                </div>
                                <div class="input-style">
                                    <input id="inputEmail" name="whatsapp" type="text" class="input" required>
                                    <label for="inputEmail">Nomer Whatsapp</label>
                                </div>
                                <div class="input-style textarea">
                                    <textarea id="inputMessage" name="message" class="input" required></textarea>
                                    <label for="inputMessage">Pesan Anda...</label>
                                </div>
                            </div>
                            <div class="empty-space h20-xs fl"></div>
                            <button class="btn-style1 style2 center-block" type="submit"><span>SUBMIT</span></button>
                        </form>
                        <div class="empty-space h50-xs"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BLOCK "MAP" -->
        <div class="map-wrapper">
            <div id="map-canvas" data-lat="40.722690" data-lng="-73.981735" data-zoom="13">
            </div>
            <div class="addresses-block">
                <a class="marker" data-lat="40.727126" data-lng="-73.984896"
                    data-string="Here is some address or email or phone or something else..."></a>
            </div>
        </div>

    </div>
@endsection
