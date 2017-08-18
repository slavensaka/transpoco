@include('header')

<div id="app">
	<div>@{{owner.name}}</div>
	<div>
		@{{ test.test_name }}
	</div>
	<ul>
		<li id="questions" @click="showAnswers(question.id)"v-for="question in questions">
			@{{ question.question }}
		</li>
	</ul>
</div>

@include('footer')
<script>
	PNotify.prototype.options.styling = "bootstrap3";
	const app = new Vue({
    el: '#app',
    data: {
    	test:test,
    	owner:owner,
    	questions: questions,
    	answers: '',
    },
    ready() {
    	console.log(users)
    },
    methods: {
    	createQuestion: function() {
    			console.log(JSON.stringify("CREATETEST"));
    		$('#user-edit-modal').modal('show');
    	},
    	createAnswer: function() {
    			console.log(JSON.stringify("CREATETEST"));
    		$('#user-edit-modal').modal('show');
    	},
    	showAnswers: function(questionId) {
        	// POST /tests?foo=bar STORE ROUTE
			  this.$http.get(ajax_url + '/api/showAnswers', {
			  	params: {questionId: questionId,
			 },
			 headers: {'X-CSRF-Token': token}})
			  .then(response => {
			    // success callback
			    new PNotify({ title: 'Uspjeh', text: "TEST", addclass: 'bg-success' });
			    	// console.log(JSON.stringify(response.data.success));
			    	// console.log(JSON.stringify(response.data.data));
			    	this.answers = response.data.data;

			    	$.each( this.answers, function( key, name ) {
                            ///-- add the result to the visual page
                            $("#questions").append('<div class="name">' + name.id + '</div>');
                        });
			    	console.log(JSON.stringify(this.answers));

			    // $("#questions").show().html("<p>Pronađeno</p>");
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