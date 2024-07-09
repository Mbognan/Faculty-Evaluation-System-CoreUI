<div class="dashboard_sidebar shadow p-3 mb-5 " >
    <span class="close_icon"><i class="far fa-times" aria-hidden="true"></i></span>
    <a href="dsahboard.html" class="dash_logo"><img src="{{ asset('default/avatar.png') }}" alt="logo"
            class="img-fluid"></a>
    <ul class="dashboard_link">
        @if (auth()->check() && auth()->user()->user_type === 'faculty')

        <li><a @if(Route::currentRouteName() === 'faculty.dashboard') class="active" @endif  href="{{ route('faculty.dashboard',auth()->id()) }}"><i class="fas fa-tachometer"aria-hidden="true"></i>Dashboard</a></li>
        <li><a  @if(Route::currentRouteName() === 'faculty.sentimentAnalysis.index') class="active" @endif href="{{ route('faculty.sentimentAnalysis.index') }}"><i class="far fa-star" aria-hidden="true"></i>View Sentiment</a></li>
        <li><a  @if(Route::currentRouteName() === 'faculty.class-list.index') class="active" @endif href="{{ route('faculty.class-list.index') }}"><i class="fas fa-list-ul" aria-hidden="true"></i>Class List</a></li>
        @else

        <li><a  @if(Route::currentRouteName() === 'user.index.evaluation-history') class="active"  @endif href="{{ route('user.index.evaluation-history') }}"><i class="fas fa-history"></i> Evaluation History</a></li>
        @endif
        <li><a  @if(Route::currentRouteName() === 'user.profile.index') class="active" @endif href="{{ route('user.profile.index') }}"><i class="far fa-user" aria-hidden="true"></i> My Profile</a></li>
        <li>
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}"    onclick="event.preventDefault();
                this.closest('form').submit();"><i class="fa fa-sign-out-alt"></i> Logout</a>
            </form>
        </li>
    </ul>
</div>
