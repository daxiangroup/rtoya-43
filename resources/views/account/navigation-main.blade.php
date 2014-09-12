<ul>
    <li>{!! HTML::linkRoute('account.edit.settings', Lang::get('account/links.navigation-main.settings'), [$user->id]) !!}</li>
    <li>{!! HTML::linkRoute('account.edit.password', Lang::get('account/links.navigation-main.password'), [$user->id]) !!}</li>
    <li>{!! HTML::linkRoute('account.edit.social', Lang::get('account/links.navigation-main.social'), [$user->id]) !!}</li>
</ul>