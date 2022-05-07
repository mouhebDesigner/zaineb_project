<div class="rs-team style1 inner-style orange-style pt-94 pb-70 md-pt-64 md-pb-40 gray-bg">
    <div class="container">
        <div class="sec-title mb-50 md-mb-30 text-center aos-init aos-animate" data-aos="" data-aos-delay=""
            data-aos-duration="">
            <div class="sub-title orange">Instructeurs</div>
        </div>
        <div class="row">
            @foreach(App\Models\User::where('role', 'jury')->get()->take(6) as $membre)
            <div class="col-lg-4 col-md-6 mb-30">
                <div class="team-item">
                    <div class="team-item"><img src="{{ asset('storage/'.$membre->avatar) }}" alt="Abu Sayed">
                        <div class="content-part">
                            <h4 class="name"><a href="/team/team-single">{{ $membre->nom }} {{ $membre->prenom }}</a></h4><span
                                class="designation">{{ $membre->specialite }}</span>
                            <ul class="social-links">
                                <li style="color: white">
                                    {{ $membre->email }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
