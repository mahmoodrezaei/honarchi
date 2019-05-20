@php
    unset($categories[0])       
@endphp
<section class="container-fluid header bg-f5 py-3 d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-12 mainmenu-area text-right">
                <ul class="mainmenu ">
                    @foreach ($categories as $category)
                    @if (!$category->hasParent())
                    <li class="menu-items">
                    <a class="clr-26 fs-18 px-2" href="category/{{ $category->slug }}">{{ $category->name }}</a>
                    @if ($category->hasChildren())
                            <div class="sub-menu container" style="background : url(images/accessory/mm-01.png) #fff ;background-repeat: no-repeat;background-position: left bottom;background-size: contain;" >
                                <div class="row">
                                    <div class="col-9 sub-col">
                                        <div class="sub-items ">
                                            <ul class="row px-3">
                                                @foreach ($category->children as $child)
                                                    <li class="col-3 sub-menu-list">
                                                            <ul>
                                                                <li>
                                                                    <h6 class="sub-menu-title">
                                                                        <i class="fal fa-atom"></i>
                                                                        {{ $child->name }}
                                                                    </h6>
                                                                </li>
                                                                @foreach ($child->children as $childOfChild)
                                                                <li>
                                                                <a href="category/{{ $childOfChild->slug }}">
                                                                        {{ $childOfChild->name }}
                                                                    </a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                @endforeach
                                            </ul>     
                                        </div>
                                    </div>
                                    <div class="col-3 sub-col">
                                        <div class="sub-mod">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </li>
                    @endif
                    @endforeach
                    <a class="p-2 p-md-0 float-left" href="#">
                        <i class="clr-red fs-25 fal fa-gift" data-toggle="tooltip" data-placement="bottom" title="دنبال خرید کادویی ؟ "></i>
                    </a>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid header bg-f5 py-3 px-2 d-block d-lg-none">
    <div class="mainmenu-mobile">
        <div class="owl-carousel owl-theme">
            @foreach ($categories as $category)
                @if (!$category->hasParent())
                    <div class="item">
                        <a class="btn btn-primary btn-round" href="category/{{ $category->slug }}">{{ $category->name }}</a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>