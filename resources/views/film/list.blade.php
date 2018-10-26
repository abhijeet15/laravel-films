@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><em><b>Film Title:</b></em> <a href="{{ '/films/' . $film->slug }}">{{ $film->name }}</a></div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="thumbnail">
                        <a href="{{ "/films/" . $film->slug }}">
                            <img src="{{ url( config( 'app.film_image_path' ) . $film->photo) }}" alt="{{ $film->name }}" title="{{ $film->name }}" style="height:50%">
                        </a>
                        <div class="caption">
                          <p>{{ $film->description }}</p>
                        </div>
                     
                    </div>
                  </div>
                  
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        @if( ! empty( $previous ) )
                            <a href="{{ '/' . $film->slug . '/' . $previous->slug . '/films' }}" class="btn btn-primary btnPrevious pull-left" >Previous</a>
                        @endif

                        @if( ! empty( $next ) )
                            <a href="{{ '/' . $film->slug . '/' . $next->slug . '/films'}}" class="btn btn-primary btnNext pull-right" >Next</a>
                        @endif
                    </div>
                </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
