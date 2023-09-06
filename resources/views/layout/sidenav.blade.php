<div >
<!-- Sidebar content goes here -->
<ul class="navbar-nav mx-auto ">

@guest
<h3  style=" text-align: center;"> مرحبا بك في موقع ادارة العيادات</h3>
    <li class="nav-item ">
        <a class="nav-link " href="{{route('login')}}">تسجيل الدخول</a>
    </li>
@else
@if (Auth::check())
    @if (Auth::user()->user_type=='1')
        <li class="nav-item ">
            قائمة الطبيب
        </li>
        <li class="nav-item ">
            <a class="nav-link " href="{{route('search.getTodayCustomers') }}">
                البدء في استقبال الحالات  
            </a>
        </li>
        <li class="nav-item collapsible">
            <a class="nav-link me-2" href="{{ route('clinic.create')}}">
                بيانات العيادة
            </a>
        </li>
        <li class="nav-item collapsible" >                 
            <a class="nav-link " href="#">
                إدارة الموظفين 
            </a>
        </li> 
            <ul class="content1">
    
                <li class="nav-item">
                    <a class="nav-link me-2" href="{{ route('users.create')}}">
                        إضافة موظف
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="{{ route('search.searchForClinicEmployee', ['id' => Auth::user()->id]) }}">
                        بيانات الموظفين
                    </a>
                </li>
            </ul>

        <li class="nav-item collapsible" >                 
            <a class="nav-link " href="#">
                تقارير 
            </a>
        </li> 
        <ul class="content1">
            <div >        
                    <a class="nav-link  " href="{{route('search.getTodayMony')}}">
               تكاليف خدمات اليوم
                    </a>
                    <a class="nav-link  " href="{{route('search.getTodayPayments')}}">
                تحصيلات اليوم
                    </a>
            </div>
        </ul>
    @endif
    @if (Auth::user()->user_type=='2')
        <li class="nav-item p-1">
                قائمة السكرتير
        </li>
        <li class="nav-item ">
                <a class="nav-link " href="{{route('search.searchByUserNameForClinic') }}">تقديم الخدمات للمرضى </a>
        </li>
        <li class="nav-item ">
                <a class="nav-link " href="{{route('search.getTodayCustomers') }}">قائمة المرضى لهذا اليوم  </a>
        </li>
    @endif
    @if (Auth::user()->user_type=='3')
        <li class="nav-item ">
                <a class="nav-link " href="{{route('UnderConstruction')}}">شاشة عرض المواعيد</a>
        </li>
    @endif

<li class="nav-item">
    <a class="nav-link me-2" href="{{ route('logout')}}">
        تسجيل خروج
    </a>
</li>

@endif

@endguest
</ul>
</div>
<script >
   var coll = document.getElementsByClassName("collapsible");
   var i;
   
   for (i = 0; i < coll.length; i++) {
     coll[i].addEventListener("click", function() {
       this.classList.toggle("active");
       var content = this.nextElementSibling;
       if (content.style.display === "block") {
         content.style.display = "none";
       } else {
         content.style.display = "block";
       }
     });
   }

    </script>


