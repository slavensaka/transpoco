@include('header')
<div class="container">
	<div class="row">
        <div class="col-md-12">
        <h4>SHOWING ALL TESTS  <button class="btn btn-primary btn-xs" data-title="New test" data-toggle="modal" data-target="#createTest" >NEW TEST</button></h4>

        <div id="app">
        <div class="table-responsive">
            <table id="mytable" class="table table-bordred table-striped">
	           <thead>
		           	<th><input type="checkbox" id="checkall" /></th>
		           	<th>Test Id</th>
		           	<th>Tests Identity</th>
		           	<th>Test Name</th>
		            <th>Intro</th>
		            <th>Conclusion</th>
		            <th>Created At</th>
		           	<th>Edit</th>
	                <th>Delete</th>
	            </thead>
    			<tbody>
    				<tr v-for="test in tests">
					    <td><input type="checkbox" class="checkthis" /></td>
					    <td @click="showTest(test.id)">@{{test.id}}</td>
					    <td @click="showTest(test.id)"><img :src="test.intro_image" alt="test.test_name"></td>
					    <td @click="showTest(test.id)">@{{test.test_name}}</td>
					    <td @click="showTest(test.id)">@{{test.intro}}</td>
					    <td @click="showTest(test.id)">@{{test.conclusion}}</td>
					    <td @click="showTest(test.id)">@{{test.created_at}}</td>
					    <td>
					    	<p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" @click="openTestEdit(test)"><span class="glyphicon glyphicon-pencil"></span></button></p>
					    </td>
					    <td>
					    	<p data-placement="top" data-toggle="tooltip" title="Delete">
					    		<button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" @click="openTestEdit(test)"><span class="glyphicon glyphicon-trash"></span></button></p>
					    </td>
					</tr>

				</tbody>
			</table>
			<div class="clearfix"></div>
            </div>

		{{-- EDIT MODAL --}}
		<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Test ID:@{{ activeTest.id }}</h4>
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
      	</div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;" @click="editTest(activeTest)"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
        </div>
    <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
</div>
{{-- END EDIT MODAL --}}


{{-- DELETE MODAL --}}
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">

       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" @click="deleteTest(activeTest)"><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
    </div>
{{-- END DELETE MODAL --}}

{{-- CREATE TEST MODAL --}}
<div class="modal fade" id="createTest" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Create a new test</h4>
      </div>
          <div class="modal-body">
				<div class="form-group">
		          	<label for="test_name">Test Name:</label>
		        	<input id="test_name" v-model="newTest.test_name" class="form-control " type="text" placeholder="Test name">
		        		<h4>Name: @{{activeTest.test_name}}</h4>
		        </div>
		        <div class="form-group">
		        	<label for="intro">Intro:</label>
		        	<textarea rows="2" class="form-control" v-model="newTest.intro" placeholder="Intro"></textarea>
	    		</div>
	    		<div class="form-group">
		        	<label for="conclusion">Conclusion:</label>
		        	<textarea rows="2" class="form-control" v-model="newTest.conclusion" placeholder="Conclusion"></textarea>
	    		</div>


	    		<div class="form-group">
				    <label for="name">Assign To User</label>
				    <select class="form-control" id="name" v-model="newTest.user_id">
				      <option  :value="user.id" v-for="user in users">@{{user.name}}</option>
				    </select>
			  </div>

			  <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;" @click="createTest($event)"><span class="glyphicon glyphicon-ok-sign" ></span>Create</button>
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
{{-- END CREATE TEST MODAL --}}




            </div>
        </div>
	</div>
</div>

@include('footer')

{{-- @include('partials.editTestModal') --}}
{{-- @include('partials.deleteTestModal') --}}
@include('partials.createTestModal')

<script>
	PNotify.prototype.options.styling = "bootstrap3";

	const test = new Vue({
    el: '#app',
    data: {

    	users:users,
    	tests:tests,
    	newTest: {},
    	activeTest: {},
    	// users:users,
    	// userTests: userTests,
    },
    ready() {
    	console.log(users)
    },
    methods: {
    	showTest: function(testId){
    			window.location.href = "{{URL::to('api/tests')}}"+ '/'+ testId
    	},
    	openTestEdit: function (test) {

            // this.update = true;
            this.activeTest = JSON.parse(JSON.stringify(test));
            // $('#sections').val(_.flatMap(this.activeUser.sections, function (val) {
            //     return val.id;
            // }));
            // $('#user-edit-modal').modal('show');
            // Vue.nextTick(function () {
                // $('#sections').select2();
            // });
        },
        fetchTest: function () {

			this.$http.get('/api/fetchTests', function (data) {

			}).then(function (response) {
				this.$set(this, 'tests', response.body)
            }, function (response) {

            }).finally(function () {

            });
		},
        editTest: function(activeTest) {
        	var self = this;
            // self.loadingResponse = true;
            this.$http.patch(ajax_url + '/api/tests/' + this.activeTest.id, {
            	activeTest: activeTest,
            }).then(function (response) {
               	$('#edit').modal('hide');
                // toastr.success(Lang.get('messages.user_updated'), Lang.get('messages.success'));
                // self.$refs[self.activeUser.type].refresh();
                	// console.log(JSON.stringify(activeTest));
                	// Vue.delete(this.tests, activeTest.id-1);
                	// this.tests.push(activeTest);
                	this.fetchTest()
                // this.$set(this,'tests', this.tests)
                	// console.log(JSON.stringify(this.tests));

                self.activeTest = {};
            }, function (response) {
                // toastr.error('Error', 'Error');
            }).finally(function () {
                // self.loadingResponse = false;
            });
        },
    	createTest: function(event) {
    		var self = this;
    		this.newTest.intro_image = 'https://lorempixel.com/100/100/?62058'; // Example image

			this.$http.post(ajax_url + '/api/tests',this.newTest).then((response) => {
				$("#createTest").modal('hide');
				this.fetchTest()
				new PNotify({title:"Success", text:"Successfully created new test"});
				 self.createTest = {};
			  }, (response) => {

		    });



    	},
    	sendIt: function() {
        	console.log(JSON.stringify(users));
        	// POST /tests?foo=bar STORE ROUTE
			  this.$http.post(ajax_url + '/api/tests', {
			  	params: {foo: 'bar',
			 },
			 headers: {'X-CSRF-Token': token}})
			  .then(response => {
			    // success callback
			    new PNotify({ title: 'Uspjeh', text: "TEST", addclass: 'bg-success' });
			    console.log("THEN RESPONSE");
			  }, response => {
			    // error callback
			    console.log("ERROR RESPONSE");
			  });
        },
        deleteTest: function(test){
        	var self = this;
        	$('#delete').modal('hide');
	        this.$http.delete(ajax_url + '/api/tests/'+test.id, {
	        }).then((response) => {
	            this.fetchTest()
				new PNotify({ title: 'Success', text: "Successfully deleted the test", addclass: 'bg-success' });
	            self.activeTest = {};
	        });
	    },

    },
    change: function () {
             console.log(this.selection)
        }
    // events: {

    // },


});


$(document).ready(function(){
$("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });

    $("[data-toggle=tooltip]").tooltip();
});

</script>