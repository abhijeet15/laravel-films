@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create New Film</div>

                <div class="row">
                  <div class="col-md-12" id="post-comment">
      
            <div class="panel  form-row">

                @if(Session::has('success'))
                <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                  Session::forget('success');
                @endphp
                </div>
                @endif

                @if (count($errors) > 0)
                 <div class = "alert alert-danger">
                    <ul>
                          <li>Some error has occured, please correct and re-submit the form...</li>
                    </ul>
                 </div>
                @endif
                        <div class="panel-body" style="width: 90%; margin: 0 auto;">
                            <form id="frmSubmit" action="{{ route( 'films_create' ) }}" method="post" enctype="multipart/form-data" >
                              {{ csrf_field() }}
                              
                              <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="control-label">Name</label>
                                <input type="input" class="form-control" id="name" placeholder="Enter Film Title" name="name" value="{{ old( 'name' ) }}" />
                                @if ($errors->has('name'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                              @endif
                              </div>

                              <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                              <label for="description" class="control-label">Description</label>
                              <textarea class="form-control" id="description" placeholder="Enter description" name="description" rows="3">{{ old( 'description' ) }}</textarea>
                              @if ($errors->has('description'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('description') }}</strong>
                              </span>
                              @endif
                              </div>

                              <div class="form-group {{ $errors->has('release_date') ? ' has-error' : '' }}">
                                <label for="release_date" class="control-label">Release Date</label>
                                <input type="text" class="form-control datepicker" id="release_date" name="release_date" placeholder="Enter Release Date" value="{{ old( 'release_date' ) }}" />
                                @if ($errors->has('release_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('release_date') }}</strong>
                                </span>
                                @endif
                              </div>

                              <div class="form-group {{ $errors->has('rating') ? ' has-error' : '' }}">
                                <label for="rating" class="control-label">Rating</label>
                                <select class="form-control" id="rating" name="rating">
                                  <option>Select Rating</option>
                                  @for( $i = 1; $i <= 5; $i++ )
                                    <option value="{{$i}}" <?php if( old( 'rating' ) == $i ) echo 'selected="selected"' ?>>{{$i}}</option>
                                  @endfor
                                </select>
                                @if ($errors->has('rating'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('rating') }}</strong>
                                </span>
                                @endif
                              </div>

                              <div class="form-group {{ $errors->has('ticket_price') ? ' has-error' : '' }}">
                                <label for="ticket_price" class="control-label">Ticket Price</label>
                                <input type="input" class="form-control" id="ticket_price" placeholder="Enter Ticket Price" name="ticket_price" value="{{ old( 'ticket_price' ) }}">
                                @if ($errors->has('ticket_price'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('ticket_price') }}</strong>
                              </span>
                              @endif
                              </div>

                              <div class="form-group {{ $errors->has('country_id') ? ' has-error' : '' }}">
                                <label for="country_id" class="control-label">County</label>
                                <select class="form-control" id="country_id" name="country_id">
                                  <option>Select country</option>
                                  @foreach( $country_list as $country )
                                    <option value="{{$country->id}}" <?php if( old( 'country_id' ) == $country->id ) echo 'selected="selected"' ?>>{{$country->name}}</option>
                                  @endforeach
                                </select>
                                @if ($errors->has('country_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('country_id') }}</strong>
                                </span>
                                @endif
                              </div>

                              <div class="form-group {{ $errors->has('genre') ? ' has-error' : '' }}">
                                <label for="genre" class="control-label">Genre</label>
                                <select class="form-control" id="genre" name="genre[]" multiple="multiple">
                                  @foreach( $genre_list as $genre )
                                    <option
                                    <?php if( in_array( $genre->id, ( old( 'genre' ) ?? [ ] ) ) ) echo ' selected="selected" '; ?>
                                     value="{{$genre->id}}">{{$genre->name}}</option>
                                  @endforeach
                                </select>
                                @if ($errors->has('genre'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('genre') }}</strong>
                                </span>
                                @endif
                              </div>


                              <div class="form-group {{ $errors->has('photo') ? ' has-error' : '' }}">
                                <label for="photo" class="control-label">Photo</label>
                                <input type="file" class="form-control" id="photo" placeholder="Select image" name="photo" >
                                <p class="help-block">Allowed ext: {{ config( 'app.allowed_image_ext' ) }}</p>
                                @if ($errors->has('photo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('photo') }}</strong>
                                </span>
                                @endif
                              </div>
                            

                              <button type="submit" class="btn btn-default">Submit</button>

                              <a href="{{ route( 'home' ) }}" class="btn btn-danger" role="button">Cancel</a>
                          </form>
                        </div>
                    </div>
                </div>
                
                

               
                
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

@section( 'javascripts' )
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>
  $( function() {
    $( "#release_date" ).datepicker({
  dateFormat: "yy-mm-dd"
});
  } );
  </script>
@endsection