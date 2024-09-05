{{-- <div class="dashboard_sidebar shadow p-3 mb-5 " >
    <span class="close_icon"><i class="far fa-times" aria-hidden="true"></i></span>
    <a href="dsahboard.html" class="dash_logo"><img src="{{ asset('default/avatar.png') }}" alt="logo"
            class="img-fluid"></a>
    <ul class="dashboard_link">
        @if (auth()->check() && auth()->user()->user_type === 'faculty')

        <li><a @if (Route::currentRouteName() === 'faculty.dashboard') class="active" @endif  href="{{ route('faculty.dashboard',auth()->id()) }}"><i class="fas fa-tachometer"aria-hidden="true"></i>Dashboard</a></li>
        <li><a  @if (Route::currentRouteName() === 'faculty.sentimentAnalysis.index') class="active" @endif href="{{ route('faculty.sentimentAnalysis.index') }}"><i class="far fa-star" aria-hidden="true"></i>View Sentiment</a></li>
        <li><a  @if (Route::currentRouteName() === 'faculty.class-list.index') class="active" @endif href="{{ route('faculty.class-list.index') }}"><i class="fas fa-list-ul" aria-hidden="true"></i>Class List</a></li>
        @else

        <li><a  @if (Route::currentRouteName() === 'user.index.evaluation-history') class="active"  @endif href="{{ route('user.index.evaluation-history') }}"><i class="fas fa-history"></i> Evaluation History</a></li>
        @endif
        <li><a  @if (Route::currentRouteName() === 'user.profile.index') class="active" @endif href="{{ route('user.profile.index') }}"><i class="far fa-user" aria-hidden="true"></i> My Profile</a></li>
        <li>
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}"    onclick="event.preventDefault();
                this.closest('form').submit();"><i class="fa fa-sign-out-alt"></i> Logout</a>
            </form>
        </li>
    </ul>
</div> --}}


<div class="fp__dashboard_menu">
    <div class="dasboard_header">
        <div class="dasboard_header_img">
            <img src="{{ asset('default/girl_1.jpg') }}" alt="user" class="img-fluid w-100">
            <label for="upload"><i class="far fa-camera"></i></label>
            <input type="file" id="upload" hidden>
        </div>
        <h2>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h2>
    </div>
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            @if (auth()->check() && auth()->user()->user_type === 'faculty')
                <a href="{{ route('faculty.dashboard',auth()->id()) }}">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button  @if (Route::currentRouteName() === 'faculty.dashboard') class="nav-link active"  @endif  class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings"
                    type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false"><span><i class="fas fa-chart-pie"></i></span> result Overview</button>
                 </div>
                </a>
                <a href="{{ route('faculty.sentimentAnalysis.index') }}">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button  @if (Route::currentRouteName() === 'faculty.sentimentAnalysis.index') class="nav-link active"  @endif  class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings"
                        type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false"><span><i class="fas fa-laugh-beam"></i></span> Sentiment Analysis</button>
                     </div>
                    </a>
                    <a href="{{ route('faculty.class-list.index') }}">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button  @if (Route::currentRouteName() === 'faculty.class-list.index') class="nav-link active"  @endif  class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings"
                            type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false"><span><i class="fas fa-list-ul" aria-hidden="true"></i></span> Class List</button>
                         </div>
                        </a>
            @else
            <a href="{{ route('user.evaluation.index') }}">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button @if (Route::currentRouteName() === 'user.evaluation.index') class="nav-link active"  @endif  class="nav-link"><span><i class="far fa-edit"></i></span> Evaluation</button>
                </div>
            </a>

            <a   href="{{ route('user.index.evaluation-history') }}">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button @if (Route::currentRouteName() === 'user.index.evaluation-history') class="nav-link active"  @endif class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages"
                    type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false"><span><i
                            class="fas fa-history"></i></span>Evaluation History</button>
                </div>
            </a>
            @endif
            <a href="{{ route('user.profile.index') }}">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button @if (Route::currentRouteName() === 'user.profile.index') class="nav-link active"  @endif class="nav-link" ><span><i
                        class="fas fa-user"></i></span>Parsonal Info </button>
                </div>
            </a>


        <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings"
            type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false"><span><i
                    class="fas fa-user-lock"></i></span> Change Password </button>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-settings" type="submit" role="tab" aria-controls="v-pills-settings"
                    aria-selected="false"><span> <i class="fas fa-sign-out-alt"></i>
                    </span> Logout</button>
            </div>
        </form>
    </div>
</div>




