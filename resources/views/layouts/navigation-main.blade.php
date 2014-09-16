<div id="navigation-main">
    <ul>
        @if (Auth::check())
        <li>{!! HTML::linkRoute('dashboard', 'Dashboard') !!}</li>
        <li>{!! HTML::linkRoute('account', 'Account Settings') !!}</li>
        <li>{!! HTML::linkRoute('art', 'Arts') !!}</li>
        <li>{!! HTML::linkRoute('artist.index', 'Artists') !!}</li>
        <li>{!! HTML::linkRoute('signin.signout', 'Sign Out') !!}</li>
        @else
        <li>{!! HTML::linkRoute('art', 'Arts') !!}</li>
        <li>{!! HTML::linkRoute('artist.index', 'Artists') !!}</li>
        <li>{!! HTML::linkRoute('signin', 'Sign In') !!}</li>
        @endif
    </ul>
</div>