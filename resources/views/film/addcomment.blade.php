<div class="col-md-12" id="post-comment">
			
            <div class="panel  form-row">
                <h2 class="page-header">Add Comment</h2>
            	

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
                    <form method="POST" action="#post-comment" class="form-horizontal">
                    	{{ csrf_field() }}
						<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
						<input type="hidden" name="film_id" value="{{ $film->id }}" />

						<div class="form-group">
						<label for="Name">Name</label>
						<input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{ Auth::user()->name }}" readonly="readonly" >
						</div>

						<div class="form-group {{ $errors->has('comment') ? ' has-error' : '' }}">
						<label for="comment" class="control-label">Comment</label>
						<textarea class="form-control" id="comment" placeholder="Enter you commets" name="comment" rows="3"></textarea>
						@if ($errors->has('comment'))
						<span class="help-block">
						    <strong>{{ $errors->first('comment') }}</strong>
						</span>
						@endif
						</div>
						
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
                </div>
            </div>
        </div>