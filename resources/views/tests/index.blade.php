@include('header')
	<div>
	    <div class="content">
	        <div class="title m-b-md">
	            Laravel
	        </div>

	        <div id="app">
	        <button @click="createTest()" type="submit">CREATE TEST</button>
				<div v-for="test in tests">
					<div>
						<a href="#" @click="showTest(test.id)" class="btn btn-default">@{{test.test_name}}</a>

					</div>
				</div>
				{{-- <ul @click="sendIt()">
					<li v-for="user in users" >@{{user.name}}</li>
				</ul> --}}
	        </div>
	    </div>
	</div>
@include('footer')
@include('partials.createTestModal')
<script>
	PNotify.prototype.options.styling = "bootstrap3";

	const test = new Vue({
    el: '#app',
    data: {
    	tests:tests,
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
    }


});
</script>