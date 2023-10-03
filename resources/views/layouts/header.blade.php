 


<nav class="main-header navbar navbar-expand-lg navbar-white navbar-light">
    <div class="container">
        <a href="#" class="brand-link">
            <img src="{{ asset('dist/img/navigatu.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Navigatu</span>
        </a>

        <!-- Toggler/collapsible Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <!-- Your navigation items here -->

                @if(Auth::user()->user_type == 1)
                <li class="nav-item">
                    <a href="{{ url('admin/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard')active @endif">
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/admin/list')}}" class="nav-link @if(Request::segment(2) == 'admin')active @endif">
                        <p>Admin</p>
                    </a>
                </li>
 <li class="nav-item">
   <a href="{{ url('admin/team/list')}}" class="nav-link @if(Request::segment(2) == 'team')active @endif">
    
     <p>
       Teams
     </p>
   </a>
 </li>

 <li class="nav-item">
   <a href="{{ url('admin/student/list')}}" class="nav-link @if(Request::segment(2) == 'student')active @endif">
     
     <p>
     Incubatees
     </p>
   </a>
 </li>

 <li class="nav-item">
   <a href="{{ url('admin/submission/list')}}" class="nav-link @if(Request::segment(2) == 'submission')active @endif">
    
     <p>
      Submission
     </p>
   </a>
 </li>

 <li class="nav-item">
   <a href="{{ url('admin/competitions/list')}}" class="nav-link @if(Request::segment(2) == 'competitions')active @endif">
    
     <p>
       Competitions
     </p>
   </a>
 </li>


 <li class="nav-item">
   <a href="{{ url('admin/grants/list')}}" class="nav-link @if(Request::segment(2) == 'grants')active @endif">
    
     <p>
       Grants
     </p>
   </a>
 </li>




 @elseif(Auth::user()->user_type == 3)
                <li class="nav-item">
                    <a href="{{ url('teacher/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard')active @endif">
                        <p>Dashboard</p>
                    </a>
                </li>

 <li class="nav-item">
   <a href="{{ url('teacher/team/list')}}" class="nav-link @if(Request::segment(2) == 'team')active @endif">
    
     <p>
       Teams
     </p>
   </a>
 </li>


 <li class="nav-item">
   <a href="{{ url('teacher/student/list')}}" class="nav-link @if(Request::segment(2) == 'student')active @endif">
     
     <p>
     Incubatees
     </p>
   </a>
 </li>

 <li class="nav-item">
   <a href="{{ url('teacher/submission/list')}}" class="nav-link @if(Request::segment(2) == 'submission')active @endif">
    
     <p>
      Submission
     </p>
   </a>
 </li>

 


 <li class="nav-item">
   <a href="{{ url('teacher/competitions/list')}}" class="nav-link @if(Request::segment(2) == 'competitions')active @endif">
    
     <p>
       Competitions
     </p>
   </a>
 </li>

 <li class="nav-item">
   <a href="{{ url('teacher/grants/list')}}" class="nav-link @if(Request::segment(2) == 'grants')active @endif">
    
     <p>
       Grants
     </p>
   </a>
 </li>

@elseif(Auth::user()->user_type == 2)

<!--<li class="nav-item">
   <a href="{{ url('student/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
     
     <p>
       Dashboard
       
     </p>
   </a>
 </li>  -->


 

 

 <li class="nav-item">
 <a href="{{ url('student/competitions/list')}}" class="nav-link @if(Request::segment(2) == 'competitions') active @endif">
 
     <p>
        Competitions
     
     </p>
   </a>
 </li>

 <li class="nav-item">
 <a href="{{ url('student/grants/list')}}" class="nav-link @if(Request::segment(2) == 'grants') active @endif">
 
     <p>
        Grants
     
     </p>
   </a>
 </li>

 <li class="nav-item">
 <a href="{{  url('student/submission/list')}}" class="nav-link @if(Request::segment(2) == 'submission') active @endif">
 
     <p>
        Submission
     
     </p>
   </a>
 </li>

 <li class="nav-item">
 <a href="{{ url('student/team/show')}}" class="nav-link @if(Request::segment(2) == 'team') active @endif">
 
     <p>
        My Team 
     
     </p>
   </a>
 </li>

       @endif  
       </ul>
       <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img style="height: 40px; width: 40px;" src="{{  Auth::user()->getProfileDirect() }}" class="img-circle elevation-2" alt="{{ Auth::user()->name }}">
                        {{ Auth::user()->name }} {{ Auth::user()->last_name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ url(Auth::user()->user_type == 1 ? 'admin/myaccount' : (Auth::user()->user_type == 2 ? 'student/myaccount' : 'teacher/myaccount')) }}">My Account</a>
                        <a class="dropdown-item" href="{{ url(Auth::user()->user_type == 1 ? 'admin/change_password' : (Auth::user()->user_type == 2 ? 'student/change_password' : 'teacher/change_password')) }}">Change Password</a>
                        <a class="dropdown-item" href="{{ url('logout')}}">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
