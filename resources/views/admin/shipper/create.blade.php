@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>{{ trans('shipper.shipper') }}</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'shipper.store', 'files' => true]) !!}

                        @include('admin.shipper.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
