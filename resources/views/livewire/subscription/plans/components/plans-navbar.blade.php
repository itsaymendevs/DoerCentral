<header class="header">
    <div class="header__builder">



        {{-- logo --}}
        <div class="logo-image">
            <a href="javascript:void(0);" class='logo--wrap'>
                <img src='{{ url("{$storagePath}/profile/{$profile->imageFileDark}") }}' alt="logo" />
            </a>
        </div>




        {{-- menuButton --}}
        <a href="#" class="menu-btn full"><span></span></a>





        {{-- ---------------------------------------- --}}
        {{-- ---------------------------------------- --}}
        {{-- ---------------------------------------- --}}






        {{-- menuOverlay --}}
        <div class="menu-full-overlay">



            {{-- container --}}
            <div class="menu-full-container">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 offset-1">


                            {{-- fullMenu --}}
                            <div class="menu-full">
                                <ul class="menu-full">

                                    {{-- home --}}
                                    <li class="menu-item mb-2">
                                        <a class="splitting-text-anim-2" data-splitting="chars"
                                            href="{{ route('website.plans') }}">Home</a>
                                    </li>



                                    {{-- plans --}}
                                    <li class="menu-item mb-2">
                                        <a class="splitting-text-anim-2" data-splitting="chars"
                                            href="{{ route('website.plans') }}">Plans</a>
                                    </li>


                                    {{-- contact --}}
                                    <li class="menu-item">
                                        <a class="splitting-text-anim-2" data-splitting="chars"
                                            href="{{ route('website.plans') }}">Contact</a>
                                    </li>

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>






            {{-- --------------------------- --}}
            {{-- --------------------------- --}}






            {{-- socials --}}
            <div class="menu-social-links">


                {{-- 1: instagram --}}
                @if ($socials->instagramURL)

                <a href="{{ $socials->instagramURL }}" target="blank" class="scrolla-element-anim-1"
                    title="Instagram">Instagram</a>

                @endif
                {{-- end if --}}



                {{-- 2: Facebook --}}
                @if ($socials->facebookURL)

                <a href="{{ $socials->facebookURL }}" target="blank" class="scrolla-element-anim-1"
                    title="Facebook">Facebook</a>

                @endif
                {{-- end if --}}





                {{-- 3: Twitter --}}
                @if ($socials->twitterURL)

                <a href="{{ $socials->twitterURL }}" target="blank" class="scrolla-element-anim-1"
                    title="X / Twitter">X</a>

                @endif
                {{-- end if --}}





                {{-- 4: tiktok --}}
                @if ($socials->tiktokURL)

                <a href="{{ $socials->tiktokURL }}" target="blank" class="scrolla-element-anim-1"
                    title="TikTok">TikTok</a>

                @endif
                {{-- end if --}}




                {{-- 5: snapChat --}}
                @if ($socials->snapchatURL)

                <a href="{{ $socials->snapchatURL }}" target="blank" class="scrolla-element-anim-1"
                    title="Snapchat">Snapchat</a>

                @endif
                {{-- end if --}}




                {{-- 6: LinkedIn --}}
                @if ($socials->instagramURL)

                <a href="{{ $socials->linkedInURL }}" target="blank" class="scrolla-element-anim-1"
                    title="Linkedin">Linkedin</a>

                @endif
                {{-- end if --}}



            </div>




        </div>
    </div>
</header>