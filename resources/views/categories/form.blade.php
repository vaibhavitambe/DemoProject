{!! Form::open(['route'=>'categories.store']) !!}


        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
            </div>
        @endif


        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            {!! Form::label('Category Name:') !!}
            {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter name']) !!}
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>


        <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
            <label for="select">Select Category:</label>
                <select class="form-control" id="post" name="parent_id">
                    <option value="">Select Category</option>
                    <option value="0">PARENT</option>
                     @foreach($categorys as $category)
                        <option value="{{ $category->id}}">{{ $category->name }}</option>

                    @endforeach
                </select>
            
            <span class="text-danger">{{ $errors->first('parent_id') }}</span>
        </div>

        <div class="form-group">
            <label name="status">Status</label><br>
            Active <input type="radio" name="status" value="active" checked>
            Inactive <input type="radio" name="status" value="inactive"> 
        </div>

        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Add</button>
    </div>


        {!! Form::close() !!}