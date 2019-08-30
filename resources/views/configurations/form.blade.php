<div class="box-body">
	<div class="form-group">
        <label for="conf-key">Configuration Key</label>
        <input type="text" class="form-control" id="configkey" placeholder="Enter Configuration Key" name="confkey">
    </div>

    <div class="form-group">
        <label for="conf-value">Configuration value</label>
        <input type="text" class="form-control" id="configvalue" placeholder="Enter Configuration value" name="confvalue">
    </div>

    <div class="form-group">
        <label name="status">Status</label><br>
        Active <input type="radio" name="status" value="active" checked>
        Inactive <input type="radio" name="status" value="inactive"> 
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</div>