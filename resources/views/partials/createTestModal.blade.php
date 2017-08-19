<div class="modal fade" id="createTest" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Create a new test</h4>
      </div>
          <div class="modal-body">
				<div class="form-group">
		          	<label for="test_name">Test Name:</label>
		        	<input id="test_name" v-model="activeTest.test_name" class="form-control " type="text" :value="activeTest.test_name" placeholder="Test name">
		        		<h4>New name: @{{activeTest.test_name}}</h4>
		        </div>
		        <div class="form-group">
		        	<label for="intro">Intro:</label>
		        	<textarea rows="2" class="form-control" v-model="activeTest.intro" placeholder="Intro">@{{ activeTest.intro }}</textarea>
	    		</div>
	    		<div class="form-group">
		        	<label for="conclusion">Conclusion:</label>
		        	<textarea rows="2" class="form-control" v-model="activeTest.conclusion" placeholder="Conclusion">@{{activeTest.conclusion}}</textarea>
	    		</div>
      {{--  <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div> --}}

      </div>
        {{-- <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div> --}}
        </div>
    <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
    </div>