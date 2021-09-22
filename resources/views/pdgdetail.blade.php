@extends('include.master')
@section('content')
<section class="headinner">
    <div class="container">
        <h3>
            @if(!empty($showccdetail->rank))
                {{ $showccdetail->rank }} 
            @endif
            @if(!empty($showccdetail->place))
                {{ $showccdetail->place }} 
            @endif  
            @if(!empty($szccdetail->name))
                {{ $szccdetail->name }} 
            @endif
            @if(!empty($szccdetail->lastname))
                {{ $szccdetail->lastname }} 
            @endif    
        </h3>
        <div class="breadcom"><a href="">Home</a><span> > </span> 
            <a href="">
                @if(!empty($showccdetail->rank))
                {{ $showccdetail->rank }} 
                @endif
                @if(!empty($showccdetail->place))
                    {{ $showccdetail->place }} 
                @endif  
                @if(!empty($szccdetail->name))
                    {{ $szccdetail->name }} 
                @endif
                @if(!empty($szccdetail->lastname))
                    {{ $szccdetail->lastname }} 
                @endif
            </a>
        </div>
    </div>
</section>
<div class="width980">
    <div class="listdetail dtail-main" style="">
            
        <div class="row" style="margin:0px;">
            <div class="col-lg-7 col-sm-6 col-xs-12">
                @if (empty($szccdetail->picture))
                    <img class="heightvid defimg" src="{{asset('pictures/'.$szccdetail->reg1.'.jpg')}}"
                         style="width:100%;">
                @else
                    <img class="heightvid defimg" style="width:100%;"
                         src="{{asset('pictures/'.$szccdetail->picture)}}">
                @endif
            </div>
            <div class="col-lg-5 col-sm-6 col-xs-12">
                <div class="moredetail">
                    <h3 style="text-align: center;">
                        @if(!empty($showccdetail->rank))
                            {{ $showccdetail->rank }} 
                        @endif
                        @if(!empty($showccdetail->place))
                            {{ $showccdetail->place }} 
                        @endif  
                        @if(!empty($szccdetail->name))
                            {{ $szccdetail->name }} 
                        @endif
                        @if(!empty($szccdetail->lastname))
                            {{ $szccdetail->lastname }} 
                        @endif
                        @if ($szccdetail->gender == 'R')
                             &#9794; 
                        @else
                            &#9792;
                        @endif
                    </h3>
                    <br>
                    <div class="clearboth">
                        <div class="table-cell">Category</div>
                        <div class="table-cell">
                            @if (empty($pgd_cat_ccdetail->channel_name))
                                N/A
                            @else
                                {{ $pgd_cat_ccdetail->channel_name }}
                            @endif
                        </div>
                    </div>
                    <div class="clearboth">
                        <div class="table-cell">Reg. No. 1</div>
                        <div class="table-cell">
                            @if (empty($szccdetail->c1))
                                N/A
                            @else
                                {{ $szccdetail->c1 }}
                            @endif
                            @if (empty($szccdetail->reg1))
                               N/A
                            @else
                                {{ $szccdetail->reg1 }}
                            @endif
                        </div>
                    </div>
                    <div class="clearboth">
                        <div class="table-cell">Reg. No. 2</div>
                        <div class="table-cell">
                            @if (empty($szccdetail->c2))
                               N/A
                            @else
                                {{ $szccdetail->c2 }}
                            @endif
                            {{ $szccdetail->reg2 }}</div>
                    </div>

                    <div class="clearboth">


                        <div class="table-cell">DOB</div>
                        <div class="table-cell">
                            @if (empty($szccdetail->dob))
                                N/A
                            @else
                                {{ date('F j, Y', strtotime($szccdetail->dob)) }}
                            @endif
                        </div>
                    </div>

                    <div class="clearboth">
                        <div class="table-cell">Tattoo</div>
                        <div class="table-cell">
                            @if (empty($szccdetail->tattoo_nr))
                                N/A
                            @else
                                {{ $szccdetail->tattoo_nr }}
                            @endif
                        </div>
                    </div>

                    <div class="clearboth">
                        <div class="table-cell">Micro Chip</div>
                        <div class="table-cell">
                            @if (empty($szccdetail->micro_chip))
                                N/A
                            } else {
                                {{ $szccdetail->micro_chip }}
                            @endif
                        </div>
                    </div>

                    <div class="clearboth">
                        <div class="table-cell">Coat Type</div>
                        <div class="table-cell">
                            @if ($szccdetail->coat == 0)
                                Stock Coat (Stockhaar)
                            @elseif ($szccdetail->coat == 1)
                                Long Stock Coat (Langstockhaar)
                            @elseif ($szccdetail->coat == 2)
                                Long Coat (Langhaar)
                            @else {
                                N/A
                            @endif
                        </div>
                    </div>

                    <div class="clearboth">
                        <div class="table-cell">Color</div>
                        <div class="table-cell">
                            @if (empty($szccdetail->color))
                                N/A
                            } else {
                                {{ $szccdetail->color }}
                            @endif
                        </div>
                    </div>

                    <div class="clearboth">
                        <div class="table-cell">Title</div>
                        <div class="table-cell">
                            @if (empty($szccdetail->kz))
                                N/A
                            @else
                                {{ $szccdetail->kz }}
                            @endif
                        </div>
                    </div>

                    <div class="clearboth">
                        <div class="table-cell">Show Rank</div>
                        <div class="table-cell">
                            @if (!empty($showccdetail->rank))
                                {{ $showccdetail->rank }}
                            @endif
                            @if (!empty($showccdetail->place))
                                {{ $showccdetail->place }}
                            @endif
                            @if (!empty($showccdetail->country))
                                {{ '(' . $showccdetail->country . ')' }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="tabings">
                <div class="tabspdg">
                    <div class="">
                        <ul class="pdgnav nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" data-toggle="pill" href="#pedigery1"
                                                    role="tab" aria-controls="pills-flamingo" aria-selected="true">Pedigree</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#VideosNew" role="tab"
                                                    aria-controls="pills-cuckoo" aria-selected="false">Videos</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#PhotosNew" role="tab"
                                                    aria-controls="pills-cuckoo" aria-selected="false">Photos</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#CommentNew" role="tab"
                                                    aria-controls="pills-cuckoo" aria-selected="false">Comments</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#progeny1" role="tab"
                                                    aria-controls="pills-cuckoo" aria-selected="false">Progeny</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#sibling1" role="tab"
                                                    aria-controls="pills-cuckoo" aria-selected="false">Siblings</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#shows1" role="tab"
                                                    aria-controls="pills-cuckoo" aria-selected="false">Shows</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#mating1" role="tab"
                                                    aria-controls="pills-cuckoo" aria-selected="false">Mating</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#Deworming" role="tab"
                                                    aria-controls="pills-cuckoo" aria-selected="false">Deworming</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#Rabies" role="tab"
                                                    aria-controls="pills-cuckoo" aria-selected="false">Rabies</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#Vaccines" role="tab"
                                                    aria-controls="pills-cuckoo" aria-selected="false">Vaccines</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#health" role="tab"
                                                    aria-controls="pills-cuckoo" aria-selected="false">Health</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#Litters" role="tab"
                                                    aria-controls="pills-cuckoo" aria-selected="false">Litters</a></li>
                        </ul>
                        <div class="tab-content">
                            <!--pgd detail tab-->
                            <div role="tabpanel" class="tab-pane show fade in active" id="pedigery1">

                                <div class="">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-xs-12">
                                            <div class="card avilable pdgdetail">
                                                <h3 style="text-align: center;">Genetic Health</h3>
                                                <div class="d-table">
                                                    <div class="clearboth">
                                                        <div class="table-cell">Hips (HD)</div>
                                                        <div class="table-cell">
                                                            @if (empty($szhipccdetail->hips_desc))
                                                                N/A
                                                            @else
                                                                {{ $szhipccdetail->hips_desc }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="clearboth">
                                                        <div class="table-cell">Elbows (ED)</div>
                                                        <div class="table-cell">
                                                            @if (empty($szelccdetail->hips_desc))
                                                                N/A
                                                            @else
                                                                {{ $szelccdetail->hips_desc }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="clearboth">
                                                        <div class="table-cell">Breed Value</div>
                                                        <div class="table-cell">
                                                            @if (empty($szccdetail->hdzw))
                                                                N/A
                                                            @else
                                                                {{ $szccdetail->hdzw }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="clearboth">
                                                        <div class="table-cell">DM</div>
                                                        <div class="table-cell">
                                                            @if (empty($szccdetail->dm))
                                                                N/A
                                                            @elseif ($szccdetail->dm == 1)
                                                                Clear
                                                            @elseif ($szccdetail->dm == 2)
                                                                Normal (N/N)
                                                            @elseif ($szccdetail->dm == 3)
                                                                Carrier (A/N)
                                                            @elseif ($szccdetail->dm == 4)
                                                                At-Risk (A/A)
                                                            @else
                                                                N/A
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="clearboth">
                                                        <div class="table-cell">DNA Profile</div>
                                                        <div class="table-cell">
                                                            @if (empty($szccdetail->dna))
                                                                N/A
                                                            @else 
                                                                {{ utf8_encode($szccdetail->dna) }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-xs-12">
                                            <div class="card avilable pdgdetail">
                                                <h3 style="text-align: center;">Anatomy Data</h3>
                                                <div class="d-table">
                                                    <div class="clearboth">
                                                        <div class="table-cell">Date</div>
                                                        <div class="table-cell">
                                                            @if (empty($szccdetail->height))
                                                                N/A
                                                            @else
                                                                {{ $szccdetail->height }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="clearboth">
                                                        <div class="table-cell">Height/Withers</div>
                                                        <div class="table-cell">
                                                            @if (empty($szccdetail->height_withers))
                                                                N/A
                                                            @else
                                                                {{ $szccdetail->height_withers }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="clearboth">
                                                        <div class="table-cell">Breast Depth</div>
                                                        <div class="table-cell">
                                                            @if (empty($szccdetail->breast_depth))
                                                                N/A
                                                            @else
                                                                {{ $szccdetail->breast_depth }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="clearboth">
                                                        <div class="table-cell">Breast Width</div>
                                                        <div class="table-cell">
                                                            @if (empty($szccdetail->breast_width))
                                                                N/A
                                                            @else
                                                                {{ $szccdetail->breast_width }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="clearboth">
                                                        <div class="table-cell">Weight</div>
                                                        <div class="table-cell">
                                                            @if (empty($szccdetail->weight))
                                                                N/A
                                                            @else
                                                                {{ $szccdetail->weight }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="" style="margin-top:20px;">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-xs-12">
                                            <div class="card avilable pdgdetail">
                                                <h3 style="text-align: center;">Line Breeding</h3>
                                                <div class="d-table">
                                                    

                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
