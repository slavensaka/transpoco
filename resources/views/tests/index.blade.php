@include('header')
<div class="container">
	<div class="row">
        <div class="col-md-12">
        <h4>SHOWING ALL TESTS</h4>
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
					    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" @click="openTestEdit(test)"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
					    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
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
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
        </div>
    <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
</div>
{{-- END EDIT MODAL --}}


            </div>
        </div>
	</div>
</div>

@include('footer')

{{-- @include('partials.editTestModal') --}}
@include('partials.deleteTestModal')
@include('partials.createTestModal')

<script>
	PNotify.prototype.options.styling = "bootstrap3";

	const test = new Vue({
    el: '#app',
    data: {
    	tests:tests,
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
    	createTest: function() {
    		console.log(JSON.stringify("CREATETEST"));
    		$('#user-edit-modal').modal('show');
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
      		//   	this.$http.post('/data').then((response) => {
	        //     console.log(response);
	        // }, (response) => {
	        //     console.log(response);
	        // });
                // this.$http.post(window.BaseUrl+'/top-product').then(function (response) {
                // this.list = response.data;
            // });
        },
    },
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