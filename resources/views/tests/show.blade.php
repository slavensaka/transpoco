@include('header')

<div id="app">
	<div>@{{owner.name}}</div>
	<div>@{{ test.test_name }}</div>

	<div class="panel-group" id="accordion">
	    <div v-for="question in questions" @click="showAnswers(question.id)" class="panel panel-default" id="panel1">
	        <div class="panel-heading">
	            <h4 class="panel-title">
	        		<a data-toggle="collapse" :data-target="'#collapse' + question.id" href="#">
			        	@{{ question.question }}
	        		</a>
	      		</h4>
	        </div>

	        <div :id="'collapse' + question.id" class="panel-collapse collapse">
	            <div class="panel-body">

					<div class="table-responsive">
			            <table id="mytable" class="table table-bordred table-striped">
				           <thead>
					           	<th>Answer Id</th>
					           	<th>Answer</th>
					           	<th>Correct</th>
					           	<th>Edit</th>
				                <th>Delete</th>
				            </thead>
			    			<tbody :id="'collapse' + question.id">


								   {{--  <td>
								    	<p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" @click="openTestEdit(test)"><span class="glyphicon glyphicon-pencil"></span></button></p>
								    </td>
								    <td>
								    	<p data-placement="top" data-toggle="tooltip" title="Delete">
								    	<button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" @click="openTestEdit(test)"><span class="glyphicon glyphicon-trash"></span></button></p>
								    </td> --}}




							</tbody>
						</table>
						<div class="clearfix"></div>
			            </div>




	            </div>
	        </div>
	    </div>
	</div>

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

    },
    methods: {
    	showAnswers: function(questionId) {
    		if(!$("tbody#collapse" + questionId).hasClass('active')){
				this.$http.get(ajax_url + '/api/showAnswers', {
				  	params: {questionId: questionId,
				},
				headers: {'X-CSRF-Token': token}})
				.then(response => {
					this.answers = response.data.data;
					if(this.answers.length != 0 ){
						$.each( this.answers, function( key, answer ) {
			                $("tbody#collapse" + questionId).append('<tr><td>' + answer.id + '</td><td>' + answer.answer + '</td><td>' + answer.correct + '</td></tr>');
			            });
			        } else {
			        	$("tbody#collapse" + questionId).append('<tr><td>Empty</td></tr>');
			        }
	            $("tbody#collapse" + questionId).addClass('active')

				}, response => {

				});
			}
        },
    }
});
</script>
<style>
	.panel-heading a:after {
    font-family:'Glyphicons Halflings';
    content:"\e114";
    float: right;
    color: grey;
}
.panel-heading a.collapsed:after {
    content:"\e080";
}
</style>