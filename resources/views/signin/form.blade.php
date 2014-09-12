<div class="row">
    <div class="columns large-12">
        <h3>Sign in to rtoya NOW!</h3>
        <div class="panel">
            {!! Form::open(['route' => 'signin.post']) !!}
            <div class="row">
                <div class="columns large-12">
                    {!! Form::email('email', '', ['placeholder' => 'Email', 'class' => 'radius']) !!}
                </div>
            </div>
            <div class="row">
                <div class="columns large-12">
                    {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'radius']) !!}
                </div>
            </div>
            <div class="row">
                <div class="columns large-6">
                    {!! Form::submit('Go', ['class' => 'button tiny radius']) !!}
                </div>
                <div class="columns large-6">
                    {!! Form::checkbox('remember', '1', false, ['id' => 'frm-remember-me']) !!}
                    {!! Form::label('frm-remember-me', 'Remember me')!!} - {!! HTML::linkRoute('signin.forgotpassword', 'Forgot Password') !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>