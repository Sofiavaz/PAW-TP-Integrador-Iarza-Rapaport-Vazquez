@extends('layouts.app')

@section('content')
<div>
    <div>
        <div>
            <div>
                <div>Dashboard</div>

                <div>
                    @if (session('status'))
                        <div>
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
