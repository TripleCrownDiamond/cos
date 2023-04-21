<div>
    <div class="">
        <div class="row">
            <div class="col-12" >
                <h3>
                    Bienvenu sur votre tableau de bord, <span class="text-success" > {{ userFullName() }}</span>... 
                </h3>
                <h5> {{ welcomeText() }} {{ getAgency() }}</h5>

                @can('partners')

                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="card">
                            <div class="card-statistic-4">
                                <div class="align-items-center justify-content-between">
                                <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Balance</h5>
                                        @if (auth()->user()->balance == 0)
                                            <h2 class="col-red mb-3 font-18"> {{ auth()->user()->balance }} FCFA </h2>
                                        @else
                                            <h2 class="col-green mb-3 font-18"> {{ auth()->user()->balance }} FCFA </h2>
                                        @endif
                                    
                                    </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="assets/img/banner/4.png" alt="">
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        
                        </div>
                    </div>
                    
                @endcan

               
            </div>
        </div>
    </div>
</div>
