<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <h3 class="modal-title" id="lineModalLabel">My Modal</h3>
      </div>

      <div class="modal-body">
        <!-- content goes here -->


        {{ Form::open(array('url' => 'message')) }}
          <div class="form-group">
            <label for="exampleInputName1">Name</label>
            {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}
          </div>
          <div class="form-group">
            <label for="exampleInputSurname1">Surname</label>
            {!! Form::text('surname', old('surname'), ['class'=>'form-control', 'placeholder'=>'Enter surname']) !!}
          </div>
          <div class="form-group">
            <label for="exampleInputCountry1">Country</label>
            {!! Form::text('country', old('country'), ['class'=>'form-control', 'placeholder'=>'Enter country']) !!}
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            {!! Form::text('email', old('email'), ['name'=>'email', 'class'=>'form-control textarea', 'placeholder'=>'E-mail.']) !!}
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            {!! Form::textarea('msg', old('msg'), ['name'=>'msg', 'rows'=>'8','class'=>'form-control textarea', 'placeholder'=>'Your message.']) !!}
          </div>

          <button type="submit" class="btn btn-default">Send</button>
        
        {!! Form::close() !!}
      </div>

      <div class="modal-footer">
        <div class="btn-group btn-group-justified" role="group" aria-label="group button">
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>