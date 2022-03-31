@extends('layouts.app')

@section('content')

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-changepass-image "></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Alterar senha</h1>
                                    </div>
                                    <div class="panel-body">
                                        @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                        @endif
                                        @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif
                                        @if($errors)
                                        @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">{{ $error }}</div>
                                        @endforeach
                                        @endif
                                        <form class="form-horizontal" method="POST" action="{{ route('changePasswordPost') }}">
                                            {{ csrf_field() }}

                                            <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                                <label for="new-password" class="col-md-4 control-label">Senha atual</label>

                                                <div class="col-md-12">
                                                    <input id="current-password" type="password" class="form-control" name="current-password" required>

                                                    @if ($errors->has('current-password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('current-password') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                                <label for="new-password" class="col-md-4 control-label">Nova senha</label>

                                                <div class="col-md-12">
                                                    <input id="new-password" type="password" class="form-control" name="new-password" required>

                                                    @if ($errors->has('new-password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('new-password') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="new-password-confirm" class="col-md-12 control-label">Confirmar nova senha</label>

                                                <div class="col-md-12">
                                                    <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        Alterar
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
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
</body>

@endsection