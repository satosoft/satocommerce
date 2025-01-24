
<div id="header_sticky">

  <div class="overlay"></div>

  <header class="mainheader">
    <!--	START HEADER TOP	-->
    @if(!Auth::guard('customer')->check() && config('settingConfig.config_signup_discount_status') == 1)
      @php
         $discountArr = config('settingConfig.config_signup_discount_text');
         //dd($discountArr);
         $discountTxt = json_decode($discountArr,true);
         if(array_key_exists(session()->get('currentLanguage'),$discountTxt)){
           $discountTxt = $discountTxt[session()->get('currentLanguage')] ? $discountTxt[session()->get('currentLanguage')] : '' ;
         }
         else {
           $discountTxt = '';
         }
      @endphp
    <!--
      <div class="signup_discount d-flex justify-content-center sm-d-none">
        <span class="text-white signupoffertxt">{!! str_replace('_DISCOUNT_ ','<b>'.config('settingConfig.config_signup_discount').'%</b>',$discountTxt) !!} <button class="buttong-18"><a href="{{route('customer.getregister')}}" >  <u><b>{{ __('common')['sign_up_now'] }}</b></u>  </a> </button> </span>

        <button class="buttong-18"><a href="{{route('customer.getlogin')}}" >  <u><b>{{ __('common')['sign_in'] }}</b></u>  </a> </button> 
      

      <div class="col-lg-2  d-flex justify-content-end">
            <div class="language-box ">
              @php $langFlag = session()->get('language_flag'); @endphp
              <img src="{{ url(config('constant.file_path.language')."/$langFlag") }}" alt="" class="language-img">
              <span class="language-txt">{{session()->get('language_name')}}
                <a class="btn language-toggle" >
                  <i class="fa fa-solid fa-caret-down"></i>
                </a>
              </span>
            </div>
            <ul class="language-menu d-none">
               @foreach($commonData['languages'] as $lang)
                 <li data-languageid="{{$lang->id}}" data-language="{{$lang->code}}"  class="langBtn">
                   <a href="javascript:void(0);">{{$lang->language_name}}</a>
                 </li>
               @endforeach
            </ul>
      </div>
    </div>

    -->
    <div class="signup_discount d-flex justify-content-center sm-d-none">
    <span class="text-white signupoffertxt">{!! str_replace('_DISCOUNT_ ','<b>'.config('settingConfig.config_signup_discount').'%</b>',$discountTxt) !!}  </span>
    </div>

        <div class="signup_discount d-flex justify-content-center sm-d-none">


        <button class="buttong-18"><a href="{{route('customer.getregister')}}" >  <b>{{ __('common')['sign_up_now'] }}</b>  </a> </button>

        <button class="buttong-18"><a href="{{route('customer.getlogin')}}" >  <b>{{ __('common')['sign_in'] }}</b>  </a> </button> 
      

      <div class="col-lg-2  d-flex justify-content-end">
            <div class="language-box">
              @php $langFlag = session()->get('language_flag'); @endphp
              <img src="{{ url(config('constant.file_path.language')."/$langFlag") }}" alt="" class="language-img">
              <span class="language-txt">{{session()->get('language_name')}}
                <a class="btn language-toggle" >
                  <i class="fa fa-solid fa-caret-down"></i>
                </a>
              </span>
            </div>
            <ul class="language-menu d-none">
               @foreach($commonData['languages'] as $lang)
                 <li data-languageid="{{$lang->id}}" data-language="{{$lang->code}}"  class="langBtn">
                   <a href="javascript:void(0);">{{$lang->language_name}}</a>
                 </li>
               @endforeach
            </ul>
      </div>
    </div>

         <!--
      <div>
          <a class="e-cart"  @if(Auth::guard('customer')->check())  href="{{route('user-dashboard')}}" @else href="{{route('customer.getlogin')}}"  @endif >
                      <div class="cart-bar">
                          <span><img src="{{asset('frontend')}}/images/account.png" alt="" title="" height="20" width="20" /> </span>
                      </div>

                  <span class="menu-icon-text">{{ __('common')['account'] }}</span>
                  </a>
      </div>
        -->
      
    @else
      <div class="signup_discount d-flex justify-content-center sm-d-none">
        <span class="text-white signupoffertxt">  <a href="{{route('contact_us')}}" > <u><b> {{ __('common')['need_help']}}</b></u>  </a> </span>
      </div>
    @endif
    <!--	Ends HEADER TOP	-->
    <div class="@if(config('settingConfig.config_layout') == 'fullwidthlayout') container-fluid mx-5 mx-sm-0 @else otrixcontainer @endif desktop-header">
      <!-- <div class="head-center"> -->
        <div class="head-center row mt-3 mb-3">
        <div class="col-lg-3 logo-left">
          <a href="{{url('/')}}" class="disblock">
            <img src="{{asset('uploads')}}/store/{{config('settingConfig.config_store_image')}}" alt="Logo" class="logo">
          </a>
        </div>
        <!-- <div class="  col-12 col-md-10 col-lg-8 mx-auto d-flex justify-content-center"> -->
          <div class="col-md-10 col-lg-6 mx-auto d-flex1 justify-content-center text-center">
          <form action="{{url('search-product')}}" method="get" class="expanding-search-form ">
            <input class="search-input"  id="global-search" name="search"  type="search" placeholder="{{ __('common')['search_product'] }}" onkeyup="searchData(this.value)">
            <input type="hidden" name="search_category" class="searchCat" value="">
            <div class="search-dropdown ">

              <!--<a class="button dropdown-toggle" type="button">  -->

              <a class="button btn btn-secondary dropdown-toggle" href="#" role="button" type="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="toggle-active">{{ __('common')['select_category'] }}  &nbsp&nbsp</span>
                <i class="fa fa-solid fa-caret-down"></i>
              </a>
               <ul class="dropdown-menu ">
                <li class="menu-active"><a href="#">{{ __('common')['select_category'] }}</a></li>
                @foreach($commonData['categories'] as $key=>$parent)
                  <li onclick="setSearchCategory('{{$parent->category_id}}')"><a href="#">{{$parent->categoryDescription?->name}}</a></li>
                @endforeach
              </ul>
            </div>
            <label class="search-label" for="global-search">
          		    <span class="sr-only">Global Search</span>
            </label>
            <button class="button search-button" type="submit">
          		    <span class="fa  fa-search">
          			      <span class="sr-only">Search</span>
          		    </span>
            </button>

          </form>
          <div id="searchData">

          </div>
        </div>
        <!-- <div class="d-flex justify-content-center "> -->
          <div class="col-lg-3 d-flex justify-content-end">            
            <a class="e-cart"  @if(Auth::guard('customer')->check())  href="{{route('user-dashboard')}}" @else href="{{route('customer.getlogin')}}"  @endif >
                  <div class="cart-bar">
                      <span><img src="{{asset('frontend')}}/images/account.png" alt="" title="" height="20" width="20" /> </span>
                  </div>

              <span class="menu-icon-text">{{ __('common')['account'] }}</span>
              </a>
        
            <a href="{{ route('get.wishlist')}}"  class="e-cart mx-3">
              <div  class="cart-bar " >
                  <span class="cart-count wishlist-count">{{$commonData['wishlistCount']}}</span>
                  <span><img src="{{asset('frontend')}}/images/heart.png" alt="" title="" height="20" width="20" /> </span>
              </div>
              <span class="menu-icon-text">{{ __('account')['label_wishlist'] }}</span>
            </a>

            <a href="{{ route('shopping.cart')}}"  class="e-cart">
                <div class="cart-bar">
                    <span class="cart-count basket-count">{{$commonData['cartCount']}}</span>
                    <span><img src="{{asset('frontend')}}/images/cart.png" alt="" title="" height="20" width="20" /> </span>
                </div>
                <span class="menu-icon-text">{{ __('common')['your_cart'] }}</span>
            </a>
          </div>
      </div>
    </div>
    <!-- Mobile menu start here -->
      @include('frontend.layouts.mobileHeader')
    <!-- Mobile menu end here -->
  </header>
</div>

<!-- desktop categories -->
<div class="@if(config('settingConfig.config_layout') == 'fullwidthlayout') container-fluid mx-5 mx-sm-0 @else otrixcontainer @endif desktop-header">
<div class="head-center row mt-3 mb-3">
<div class="menu-container">
<ul class="nav-menu-lg">
  @foreach($commonData['categories'] as $parent)
    <li>
      <a href="javascript:void(0);" href2="{{-- route('category.products', ['id' => $parent->category_id]) --}}" 
              onclick="toggleMegaMenu(this)">
        {{ mb_strtoupper($parent->categoryDescription?->name,'UTF-8') }}
      </a>

      @if($parent->children && is_array($parent->children))
        <div class="mega-menu-lg" style="display: none;">
          <ul>
            @foreach($parent->children as $child)
              <li>
                <a href="{{ route('category.products', ['id' => $child->category_id]) }}">
                  {{ $child->categoryDescription?->name }}
                </a>
              </li>
            @endforeach
          </ul>
        </div>
      @endif
    </li>
  @endforeach
</ul>
</div>
</div>
</div>
<!-- END desktop categories -->


<script type="text/javascript">
function closeSearchForm() {
   var element = document.getElementById("mobile-search-form");
   element.classList.toggle("d-none");
}

function showSearchForm() {
   var element = document.getElementById("mobile-search-form");
   element.classList.toggle("d-none");
}
/*
function handleCategoryClick(event, element) {
    // Prevent default link navigation if needed
    event.preventDefault();

    // Highlight the clicked link (toggle active class)
    const links = document.querySelectorAll('.nav-menu-lg a');
    links.forEach(link => link.classList.remove('active')); // Remove 'active' from all links
    element.classList.add('active'); // Add 'active' to the clicked link

    // Optional: Redirect to the link's href (uncomment if needed)
    // window.location.href = element.getAttribute('href');
  }*/

  function toggleMegaMenu(element) {
    // Find the mega menu div within the parent <li>
    const megaMenu = element.nextElementSibling;

    if (megaMenu && megaMenu.classList.contains('mega-menu-lg')) {
      // Toggle the display of the mega menu
      if (megaMenu.style.display === 'block') {
        megaMenu.style.display = 'none'; // Hide if already visible
      } else {
        // Hide all other open menus (optional for only one open at a time)
        document.querySelectorAll('.mega-menu-lg').forEach(menu => {
          menu.style.display = 'none';
        });

        megaMenu.style.display = 'block'; // Show the clicked menu
      }
    }
  }

  document.addEventListener('click', function (event) {
  const megaMenus = document.querySelectorAll('.mega-menu-lg');
  
  megaMenus.forEach(menu => {
    // Check if the click happened outside the menu and its parent link
    if (!menu.contains(event.target) && !event.target.closest('.nav-menu-lg > li > a')) {
      menu.style.display = 'none'; // Hide the menu
      }
    });
  });
  
</script>
