<div class="box-body">
	<div class="form-group">
            <label for="banner-image">Banner Image</label><br>
            <input type="file" class="form-control" name="image" id="img" placeholder="Choose image">
    </div>

    <div class="form-group">
        <label name="status">Status</label><br>
        Active <input type="radio" name="status" value="active" checked>
        Inactive <input type="radio" name="status" value="inactive"> 
    </div>

    <div class="form-group">
        <label>Title </label>
        <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
    </div>

    <div class="form-group">
        <label>Description </label>
        <input type="textarea" class="form-control" id="des" placeholder="Enter Description" name="description">
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</div>