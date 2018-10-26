@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><em><b><a href="{{ route( 'home' ) }}">Home</a> >></b></em> {{ $film->name }}</div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="{{ "/films/" . $film[ 'data' ][ 0 ][ 'slug' ] }}">
                            <img src="{{ url( config( 'app.film_image_path' ) . $film->photo) }}" alt="{{ $film->name }}" title="{{ $film->name }}" style="width:100%">
                        </a>
                        <div class="caption">
                          <p>Rating: 
                            {!! show_star_rating($film->rating) !!}
                            
                            </p>

                            <p>Genre: 
                            {!! implode( ", ", array_pluck( $film->genres, "name" ) ) !!}
                            
                            </p>
                        </div>
                     
                    </div>
                  </div>

                  <div class="col-md-8">
                    <div class="thumbnail">
                        <div class="caption">
                            <p>{{ $film->description }}</p>
                            <hr />
                            <p>
                                Release On: {{ $film->release_date }}<br />
                                Ticket Price: Rs. {{ $film->ticket_price }}<br />
                                Country: {{ $film->country->name }}<br />
                            </p>
                        </div>
                     
                    </div>
                  </div>
                
                @if( count( $film->comments ) > 0 )
                <div class="col-md-12">
                      <h2 class="page-header">Comments</h2>
                        <section class="comment-list">
                          <!-- First Comment -->
                          @foreach( $film->comments as $comment )
                          <article class="row">
                            <div class="col-md-11 col-sm-11" style="margin-left:25px;margin-right:3px;">
                              <div class="panel panel-default arrow left">
                                <div class="panel-body">
                                  <header class="text-left">
                                    <div class="comment-user pull-left"><i class="fa fa-user"></i> {{ $comment->name }}&nbsp; | &nbsp;</div> 
                                    <span class="comment-date pull-left"><i class="fa fa-clock-o"></i> {{ date( "M d, Y", strtotime( $comment->created_at ) ) }}</span>
                                  </header>
                                  <div style="clear:both;"></div>
                                  <div class="comment-post">
                                    <p>{{ $comment->comment }}</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </article>
                          @endforeach
                        </section>
                </div>
                @endif

               
                @if ( Auth::guest( ) )
                    <p style="text-align: center;">To post comments,  <a href="{{ route('login') }}">click here to login</a>!</p>
                @else
                    @include( 'film.addcomment' );
                @endif
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
