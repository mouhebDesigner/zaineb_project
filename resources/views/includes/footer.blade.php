<footer id="rs-footer" class="rs-footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                        <img src="http://127.0.0.1:8000/front/logo.png" style="
                            position: relative;
                            right: 80px;
                            width: 100px;
                            heigt: auto;
                        " alt="">
                        
  

                </div>
                
                <div class="col-lg-4 col-md-12 col-sm-12 footer-widget md-mb-50">
                    <h4 class="widget-title">Menu</h4>
                    <ul class="site-map">
                        <li class="">
                            <a href="{{ url('/') }}" class="active">Accueil</a>
                        </li>
                        <li class="">
                            <a href="#formations">Concours</a>
                        </li>
                        <li class="">
                            <a href="#enseignant">A propos</a>
                        </li>
                        <li class="">
                            <a href="{{ url('contact') }}" class="@if(Request::is('contact')) active @endif">Contact</a>
                        </li>
                        <li class="">
                            <a href="{{ asset('front/reglement.pdf') }}" target="_blank" class="@if(Request::is('contact')) active @endif">Règlement</a>
                        </li>
                    </ul>
                </div>
                
                <div class="col-lg-4 col-md-12 col-sm-12 footer-widget">
                    <h4 class="widget-title">Contact</h4>
                    <ul class="address-widget">
                        <li>
                            <i class="flaticon-location"></i>
                            <div class="desc">Gabès, TUNISIE</div>
                        </li>
                        <li>
                            <i class="flaticon-call"></i>
                            <div class="desc">
                                <a href="tel:(123)-456-7890">
                                Tél: (00216) 75 394 229 
                                </a> 
                                <a href="tel:(123)-456-7890">
                                Fax: (00216) 75 394 309
                                </a>
                            </div>
                        </li>
                        <li>
                            <i class="flaticon-email"></i>
                            <div class="desc">
                                <a href="mailto:infoname@gmail.com">ISG@ISG</a> , 
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  
</footer>