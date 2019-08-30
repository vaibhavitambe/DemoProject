<div class="box-body">
                <div class="form-group">
                  <label for="first-name">First Name </label>
                  <input type="text" class="form-control" id="fname" placeholder="Enter first tname" name="firstname">
                </div>
                <div class="form-group">
                  <label for="first-name">Last Name </label>
                  <input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lastname">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Confirm Password</label>
                  <input type="password" class="form-control" id="exampleInputconPassword1" placeholder="Confirm Password" name="conpass">
                </div>
                
                <div class="form-group">
                  <label name="status">Status</label><br>
                     Active <input type="radio" name="status" value="active" checked>
                    Inactive <input type="radio" name="status" value="inactive"> 
                </div>
                
                <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" name ="role">
                  <option value="">Select a Role</option>
                  @foreach ($roles as $role)
                    <option value="{{ $role->name }}" name="role">{{ $role->name }}</option>
                  @endforeach
                </select>

                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Save</button>
                </div>
                
      </div>
</div>