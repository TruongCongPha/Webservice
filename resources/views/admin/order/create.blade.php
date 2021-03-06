@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>{{ trans('order.order') }}</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'order.store', 'files' => true]) !!}

                        @include('admin.order.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
