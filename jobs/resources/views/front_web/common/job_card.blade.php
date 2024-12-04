{{--<div class="col-lg-4 col-md-6 px-xl-3 mb-40">--}}
{{--    <div class="card py-30">--}}
{{--        <div class="row align-items-center">--}}
{{--            <div class="col-3">--}}
{{--                <img src="{{$job->company->company_url}}" class="card-img" alt="...">--}}
{{--            </div>--}}
{{--            @dd($job->company->location)--}}
{{--            <div class="col-8">--}}
{{--                <div class="card-body p-0">--}}
{{--                    @if(Str::length($job->job_title) < 35)--}}
{{--                        <a href="{{ route('front.job.details',$job->job_id) }}"--}}
{{--                           class="text-secondary primary-link-hover">--}}
{{--                            <h5 class="card-title fs-18 mb-0">--}}
{{--                                {{ html_entity_decode($job->job_title) }}--}}
{{--                            </h5>--}}
{{--                        </a>--}}
{{--                    @else--}}
{{--                        <a href="{{ route('front.job.details',$job->job_id) }}"--}}
{{--                           data-toggle="tooltip" data-placement="bottom" class="hover-color"--}}
{{--                           title="{{ html_entity_decode($job->job_title) }}">--}}
{{--                            <h5 class="card-title fs-18 mb-0">--}}
{{--                                {{ Str::limit(html_entity_decode($job->job_title),30,'...') }}--}}
{{--                            </h5>--}}
{{--                        </a>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @if($job->activeFeatured)--}}
{{--                <div class="col-1 icon position-relative pe-0">--}}
{{--                    <i class="text-primary fa-solid fa-bookmark"></i>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--        <div class="card-desc mt-4">--}}
{{--            <div class="desc d-flex mb-2">--}}
{{--                <i class="fa-solid fa-briefcase text-gray me-3 fs-18"></i>--}}
{{--                <p class="fs-14 text-gray mb-0">{{$job->jobCategory->name}}</p>--}}
{{--            </div>--}}
{{--            @if($job->country_name)--}}
{{--                <div class="desc d-flex">--}}
{{--                    <i class="fa-solid fa-location-dot text-gray me-3 fs-18"></i>--}}
{{--                    @if(Str::length($job->full_location) < 45)--}}
{{--                        <p class="fs-14 text-gray"> {{ $job->full_location }} </p>--}}
{{--                    @else--}}
{{--                        <p class="fs-14 text-gray" data-toggle="tooltip" data-placement="bottom"--}}
{{--                           title="{{$job->full_location}}">--}}
{{--                            {{ Str::limit($job->full_location,45,'...') }}--}}
{{--                        </p>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            <div class="desc d-flex mt-2">--}}
{{--                @foreach($job->jobsSkill->take(1) as $skills)--}}
{{--                    <p class="text text-primary fs-14 mb-0 me-3">{{$skills->name}}</p>--}}
{{--                    @if(count($job->jobsSkill) -1 > 0)--}}
{{--                        <p class="fs-14 text text-primary mb-0">--}}
{{--                            {{'+'.(count($job->jobsSkill) -1)}}</p>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="col-12 px-xl-3 mb-20 ">
    <div class="card py-30  border-left-color">
        <div class="row d-flex justify-content-between">
            <div class="col-lg-1 col-md-2 col-2 mb-md-0 mb-3 job-card-img">
                <img src="{{$job->company->company_url}}" class="card-img" alt="">
            </div>
            <div class="col-lg-10  col-md-9 col-9  d-sm-block d-none">
                <div class="card-body p-0 ps-xl-3">
                    @if(Str::length($job->job_title) < 35)
                        <a href="{{ route('front.job.details',$job->job_id) }}"
                           class="text-secondary primary-link-hover"  title="{{ html_entity_decode($job->job_title) }}">
                            <h5 class="card-title fs-18 mb-0 d-inline-block" >
                                {{ html_entity_decode($job->job_title) }}

                            </h5>
                        </a>
{{--                    <a href="{{ route('front.job.details',$job->job_id) }}" class="text-secondary primary-link-hover">--}}
{{--                        <h5 class="card-title fs-18 mb-0">--}}
{{--                            {{ html_entity_decode($job->job_title) }}--}}
{{--                        </h5>--}}
{{--                    </a>--}}
                    @else
                        <a href="{{ route('front.job.details',$job->job_id) }}"
                           class="text-secondary primary-link-hover"  title="{{ html_entity_decode($job->job_title) }}">
                            <h5 class="card-title fs-18 mb-0 d-inline-block" >
                                {{ Str::limit(html_entity_decode($job->job_title),30,'...') }}
                            </h5>
                        </a>
                       
                    @endif
                        @if(isset($job->jobShift->shift))
                        <span class="text text-primary fs-12 mb-0 me-3">
                                {{$job->jobShift->shift}}
                                </span>
                        @endif
                    <div class="col-xl-12">
                        <div class="card-desc d-flex flex-wrap mt-2 ">

                            <div class="desc d-flex me-4">
                                <i class="fa-solid fa-location-dot text-gray me-3 fs-18"></i>
                                <p class="fs-14 text-gray mb-2">
                                    {{ (!empty($job->full_location)) ? $job->full_location : 'Location Info. not available.'}}</p>
                            </div>
                            <div class="desc d-flex">
                                        <span class="text-gray">
                                            {{$job->currency->currency_icon}}&nbsp</span>
                                <p class="fs-14 text-gray mb-2">
                                    {{ $job->salary_from}} - {{$job->salary_to}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($job->activeFeatured)
                <div class="col-md-1 col-sm-1 col-8 justify-content-end bookmark-icon position-relative pe-0 float-end d-flex">
                    <i class="text-primary fa-solid fa-bookmark"></i>
                </div>
            @else
                <div class="col-md-1 col-sm-1 col-8 bookmark-icon justify-content-end position-relative pe-0 float-end d-flex text-gray">
                    <i class="fa-regular fa-bookmark"></i>
                </div>
            @endif

            <div class=" col-12 d-sm-none d-block">
                <div class="card-body p-0 ps-xl-3">
                    @if(Str::length($job->job_title) < 35)
                        <a href="{{ route('front.job.details',$job->job_id) }}"
                           class="text-secondary primary-link-hover"  title="{{ html_entity_decode($job->job_title) }}">
                            <h5 class="card-title fs-18 mb-0 d-inline-block" >
                                {{ html_entity_decode($job->job_title) }}

                            </h5>
                        </a>
                        {{--                    <a href="{{ route('front.job.details',$job->job_id) }}" class="text-secondary primary-link-hover">--}}
                        {{--                        <h5 class="card-title fs-18 mb-0">--}}
                        {{--                            {{ html_entity_decode($job->job_title) }}--}}
                        {{--                        </h5>--}}
                        {{--                    </a>--}}
                    @else
                        <a href="{{ route('front.job.details',$job->job_id) }}"
                           class="text-secondary primary-link-hover"  title="{{ html_entity_decode($job->job_title) }}">
                            <h5 class="card-title fs-18 mb-0 d-inline-block" >
                                {{ Str::limit(html_entity_decode($job->job_title),30,'...') }}
                            </h5>
                        </a>

                    @endif
                    @if(isset($job->jobShift->shift))
                        <span class="text text-primary fs-12 mb-0 me-3">
                                {{$job->jobShift->shift}}
                                </span>
                    @endif
                    <div class="col-xl-12">
                        <div class="card-desc d-flex flex-wrap mt-2 ">

                            <div class="desc d-flex me-4">
                                <i class="fa-solid fa-location-dot text-gray me-3 fs-18"></i>
                                <p class="fs-14 text-gray mb-2">
                                    {{ (!empty($job->full_location)) ? $job->full_location : 'Location Info. not available.'}}</p>
                            </div>
                            <div class="desc d-flex">
                                        <span class="text-gray">
                                            {{$job->currency->currency_icon}}&nbsp</span>
                                <p class="fs-14 text-gray mb-2">
                                    {{ $job->salary_from}} - {{$job->salary_to}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
   
</div>
{{--<div class="col-lg-12 col-md-6 px-xl-3 mb-40">--}}
{{--    <div class="card  py-30">--}}
{{--        <div class="card-body">--}}
{{--            @if(Str::length($job->job_title) < 35)--}}
{{--                <a href="{{ route('front.job.details',$job->job_id) }}" class="text-secondary primary-link-hover">--}}
{{--                    <h5 class="card-title fs-18 mb-0">--}}
{{--                        {{ html_entity_decode($job->job_title) }}--}}
{{--                    </h5>--}}
{{--                </a>--}}
{{--            @else--}}
{{--                <a href="{{ route('front.job.details',$job->job_id) }}"--}}
{{--                   data-toggle="tooltip" data-placement="bottom" class="hover-color"--}}
{{--                   title="{{ html_entity_decode($job->job_title) }}">--}}
{{--                    <h5 class="card-title fs-18 mb-0">--}}
{{--                        {{ Str::limit(html_entity_decode($job->job_title),30,'...') }}--}}
{{--                    </h5>--}}
{{--                </a>--}}
{{--            @endif--}}
{{--            <div class="mt-2 d-flex flex-wrap align-items-center">--}}
{{--               --}}
{{--                @if(isset($job->jobShift->shift))--}}
{{--            <span class="text text-primary fs-12 mb-0 me-3">--}}
{{--                {{$job->jobShift->shift}}--}}
{{--            </span>--}}
{{--                @endif--}}
{{--                <div class="desc d-flex ">--}}
{{--                                        <span class="text-gray">--}}
{{--                                            {{$job->currency->currency_icon}}&nbsp</span>--}}
{{--                    <span class="fs-14 text-gray">--}}
{{--                    {{ $job->salary_from}} - {{$job->salary_to}}</span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="mt-3 d-flex flex-wrap">--}}
{{--                <div class="col-3">--}}
{{--                    <img src="{{$job->company->company_url}}" class="card-img" alt="...">--}}
{{--                </div>--}}
{{--                <div class="col-8">--}}
{{--                    <p class="mb-0 fs-14">{{$job->company->user->first_name}}</p>--}}
{{--                    <div class="desc d-flex align-items-center">--}}
{{--                        <i class="fa-solid fa-location-dot text-gray me-2 fs-18"></i>--}}
{{--                        @if(Str::length($job->full_location) < 45)--}}
{{--                            <p class="fs-14 text-gray mb-0"> {{ $job->full_location }} </p>--}}
{{--                        @else--}}
{{--                            <p class="fs-14 text-gray mb-0" data-toggle="tooltip" data-placement="bottom"--}}
{{--                               title="{{$job->full_location}}">--}}
{{--                                {{ Str::limit($job->full_location,45,'...') }}--}}
{{--                            </p>--}}
{{--                        @endif--}}
{{--                       --}}
{{--                    </div>--}}
{{--                   --}}
{{--                </div>--}}
{{--                @if($job->activeFeatured)--}}
{{--                    <div class="col-1 icon position-relative pe-0 float-end d-flex align-items-center">--}}
{{--                        <i class="text-primary fa-solid fa-bookmark"></i>--}}
{{--                    </div>--}}
{{--                @else--}}
{{--                    <div class="col-1 icon position-relative pe-0 float-end d-flex align-items-center text-gray">--}}
{{--                        <i class="fa-regular fa-bookmark"></i>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
