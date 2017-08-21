@include('header')
<div class="container content">



	<div id="app">
		<a class="btn icon-btn btn-default" href="{{route('tests.index')}}"><span class="glyphicon btn-glyphicon glyphicon-arrow-left img-circle text-success"></span>Back</a>



		<a class="btn icon-btn btn-success" href="#" data-title="Edit" data-toggle="modal" data-target="#create-question"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-success"></span>New question</a>


		<div class="row">

        <div class="col-md-6 col-md-offset-3">
        <h4 class="text-center">Test name: @{{ test.test_name }}</h4>
        <div></div>
            <div class="testimonials">
            	<div class="active item">
                  <blockquote><p>
						<p class="text-center">About Test Owner</p> @{{owner.about}}
                  </p></blockquote>
                  <div class="carousel-info">
                    <img alt="" :src="owner.user_image" class="pull-left">
                    <div class="pull-left">
                      <span class="user-name">@{{owner.name}}</span>
                      <span class="user-email">@{{owner.email}}</span>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>



		<div class="panel-group" id="accordion">
		    <div v-for="question in questions" @click="showAnswers(question.id)" class="panel panel-default" id="panel1">
		        <div class="panel-heading">
		            <h4 class="panel-title">
		        		<a data-toggle="collapse" :data-target="'#collapse' + question.id" href="#">
				        	@{{ question.question }}
		        		</a>




		        		<button @click="updateQuestion(question)"class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit-question"><span class="glyphicon glyphicon-pencil"></span></button>
		        		<button @click="deleteQuestion(question)" class=" btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete-question"><span class="glyphicon glyphicon-trash" ></span></button>
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

								</tbody>
							</table>
							<div class="clearfix"></div>
				            </div>
		            </div>
		        </div>
		    </div>
		</div>



{{-- EDIT MODAL --}}
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
    	<div class="modal-content">
          	<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        		<h4 class="modal-title custom_align" id="Heading">Edit Answer ID:@{{ activeAnswer.id }}</h4>
      		</div>
	        <div class="modal-body">
		        <div class="form-group">
		          	<label for="answer">Answer:</label>
		        	<input id="answer" v-model="activeAnswer.answer" class="form-control " type="text" :value="activeAnswer.answer" placeholder="Answer">
		        		<h4>New name: @{{activeAnswer.answer}}</h4>
		        </div>
		        {{-- <div class="form-group">
		        	<label for="intro">Intro:</label>
		        	<textarea rows="2" class="form-control" v-model="activeAnswer.correct" placeholder="Correct">@{{ activeAnswer.intro }}</textarea>
	    		</div> --}}

	    		<div class="form-group">
				    <label for="intro">Correct</label>
				    <select class="form-control" id="intro" v-model="activeAnswer.correct">
				      <option  >0</option>
				      <option  >1</option>
				    </select>
			  </div>
	    		{{-- <div class="form-group">
		        	<label for="conclusion">Conclusion:</label>
		        	<textarea rows="2" class="form-control" v-model="activeAnswer.conclusion" placeholder="Conclusion">@{{activeAnswer.conclusion}}</textarea>
	    		</div> --}}
	      	</div>
	        <div class="modal-footer ">
	        	<button type="button" class="btn btn-warning btn-lg" style="width: 100%;" @click="editAnswer(activeAnswer)"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
	        </div>
     	</div>
    	<!-- /.modal-content -->
  	</div>
    <!-- /.modal-dialog -->
</div>
{{-- END EDIT MODAL --}}



{{-- EDIT MODAL --}}
<div class="modal fade" id="edit-question" tabindex="-1" role="dialog" aria-labelledby="edit-question" aria-hidden="true">
    <div class="modal-dialog">
    	<div class="modal-content">
          	<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        		<h4 class="modal-title custom_align" id="Heading">Edit Question ID:@{{ activeQuestion.id }}</h4>
      		</div>
	        <div class="modal-body">
		        <div class="form-group">
		          	<label for="question">Question:</label>
		        	<input id="question" v-model="activeQuestion.question" class="form-control " type="text" :value="activeQuestion.question" placeholder="Question">
		        		<h4>New name: @{{activeQuestion.question}}</h4>
		        </div>

	    		<div class="form-group">
				    <label for="points">Points</label>
				    <select class="form-control" id="points" v-model="activeQuestion.points">
				      <option  >1</option>
				      <option  >2</option>
				      <option  >3</option>
				      <option  >4</option>
				      <option  >5</option>
				      <option  >6</option>
				      <option  >7</option>
				      <option  >8</option>
				      <option  >9</option>
				      <option  >10</option>
				    </select>
			  </div>
	    		{{-- <div class="form-group">
		        	<label for="conclusion">Conclusion:</label>
		        	<textarea rows="2" class="form-control" v-model="activeQuestion.conclusion" placeholder="Conclusion">@{{activeQuestion.conclusion}}</textarea>
	    		</div> --}}
	      	</div>
	        <div class="modal-footer ">
	        	<button type="button" class="btn btn-warning btn-lg" style="width: 100%;" @click="editQuestion(activeQuestion)"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
	        </div>
     	</div>
    	<!-- /.modal-content -->
  	</div>
    <!-- /.modal-dialog -->
</div>
{{-- END EDIT MODAL --}}


{{-- DELETE MODAL --}}
<div class="modal fade" id="delete-question" tabindex="-1" role="dialog" aria-labelledby="edit-question" aria-hidden="true">
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
        <button type="button" class="btn btn-success" @click="removeQuestion()"><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
    </div>
{{-- END DELETE MODAL --}}




{{-- CREATE TEST MODAL --}}
<div class="modal fade" id="create-question" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Create a new question</h4>
      </div>
          <div class="modal-body">
				<div class="form-group">
		          	<label for="question">Question:</label>
		        	<input id="question" v-model="newQuestion.question" class="form-control " type="text" placeholder="Question">
		        		<h4>Name:</h4>
		        </div>
		       {{--  <div class="form-group">
		        	<label for="points">Points:</label>
		        	<textarea rows="2" class="form-control" v-model="newQuestion.points" placeholder="Intro"></textarea>
	    		</div> --}}

	    		<div class="form-group">
				    <label for="points">Points</label>
				    <select class="form-control" id="points" v-model="newQuestion.points">
				      <option  >1</option>
				      <option  >2</option>
				      <option  >3</option>
				      <option  >4</option>
				      <option  >5</option>
				      <option  >6</option>
				      <option  >7</option>
				      <option  >8</option>
				      <option  >9</option>
				      <option  >10</option>
				    </select>
			  </div>

			  <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;" @click="createQuestion($event)"><span class="glyphicon glyphicon-ok-sign" ></span>Create</button>
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






@include('footer')
<script>
	PNotify.prototype.options.styling = "bootstrap3";
	const app = new Vue({
    el: '#app',
    data: {
    	test:test,
    	activeAnswer: {},
    	owner:owner,
    	newQuestion: {},
    	questions: questions,
    	answers: '',
    	activeQuestionId: '',
    	activeQuestion: {},
    	activeDeleteQuestionId: {}
    },
    ready() {

    },
    methods: {
    	updateQuestion: function(question) {
    		this.activeQuestion = JSON.parse(JSON.stringify(question));
    	},
    	deleteQuestion: function(question) {
    		this.activeDeleteQuestionId = question
    			var self = this;


    	},
    	removeQuestion: function() {
    		var self = this;
    		$('#delete-question').modal('hide');


    		this.$http.delete(ajax_url + '/api/questions/'+ this.activeDeleteQuestionId.id, {
	        }).then((response) => {
	            this.updateQuestions()
				// new PNotify({ title: 'Success', text: "Successfully deleted the test", addclass: 'bg-success' });
	   //          self.activeTest = {};
	        });


	        self.activeDeleteQuestionId = {};
    	},

    	createQuestion: function(event) {
    		var self = this;
    		this.newQuestion.test_id = JSON.parse(JSON.stringify(this.test.id));
			this.$http.post(ajax_url + '/api/questions',this.newQuestion)
			.then((response) => {

				$("#create-question").modal('hide');
				this.newQuestions(response.body.lastInsertId)
				new PNotify({title:"Success", text:"Successfully created new test"});
				self.createQuestion = {};
			  }, (response) => {

		    });



    	},

    	newQuestions: function (lastInsertId) {

			this.$http.get('/api/newQuestions/' + this.test.id, function (data) {

			}).then(function (response) {

				this.$set(this, 'questions', response.body)
            }, function (response) {

            }).finally(function () {

            });
		},
    	editQuestion: function(activeQuestion) {
    		var self = this;
            this.$http.patch(ajax_url + '/api/questions/' + this.activeQuestion.id, {
            	activeQuestion: activeQuestion,
            }).then(function (response) {
               	$('#edit-question').modal('hide');
               	questionId = response.data.question.id
               		$("tbody#collapse" + questionId).empty()


               		this.updateQuestions()

                self.activeQuestion = {};
            }, function (response) {
                // toastr.error('Error', 'Error');
            }).finally(function () {
               this.updateQuestion(questionId)
            });
    	},
    	updateQuestions: function() {
    		this.$http.get('/api/fetchQuestions/' + this.test.id, function (data) {
			}).then(function (response) {
				this.$set(this, 'questions', response.body)
            }, function (response) {

            }).finally(function () {
            	this.updateAnswer(questionId)
            });
    	},
    	editAnswer: function(activeAnswer) {
    		var self = this;
            this.$http.patch(ajax_url + '/api/answers/' + this.activeAnswer.id, {
            	activeAnswer: activeAnswer,
            }).then(function (response) {
               	$('#edit').modal('hide');
               	questionId = response.data.question.id
               		$("tbody#collapse" + questionId).empty()




                self.activeAnswer = {};
            }, function (response) {
                // toastr.error('Error', 'Error');
            }).finally(function () {
               this.updateAnswer(questionId)
            });
    	},

    	updateAnswer: function (questionId) {
    		var self = this;

    		this.$http.get(ajax_url + '/api/updateAnswer/' + questionId, {

            }).then(function (response) {
            		answers = response.data.data
						$.each( answers, function( key, answer ) {
			                $("tbody#collapse" + questionId).append('<tr><td>' + answer.id + '</td><td>' + answer.answer + '</td><td>' + answer.correct + '</td><td>' + '<p data-placement="top" data-toggle="tooltip" title="Edit"><button id="' + answer.id + '" class="answer-edit btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button></p>' + '</td><td>' + '<p data-placement="top" data-toggle="tooltip" title="Delete"><button id="' + answer.id + '" class="answer-delete btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></p>' + '</td></tr>');
			            });
            }, function (response) {
            }).finally(function () {
            });
		},
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
			                $("tbody#collapse" + questionId).append('<tr><td>' + answer.id + '</td><td>' + answer.answer + '</td><td>' + answer.correct + '</td><td>' + '<p data-placement="top" data-toggle="tooltip" title="Edit"><button id="' + answer.id + '" class="answer-edit btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button></p>' + '</td><td>' + '<p data-placement="top" data-toggle="tooltip" title="Delete"><button id="' + answer.id + '" class="answer-delete btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></p>' + '</td></tr>');
			            });
			        } else {
			        	$("tbody#collapse" + questionId).append('<tr><td>No answers created for this question</td></tr>');
			        }
	            $("tbody#collapse" + questionId).addClass('active')

				}, response => {

				});
			}
        },

        // deleteAnswer: function(answerId) {
        // 		console.log(JSON.stringify(answerId));
        // }
        // openAnswerEdit: function(answerId){

        // }
    }
});
// window.app = app

$(document).ready(function(){

	$(document).on('click', 'button.answer-edit', function(e) {
			var self = this;
			 $.ajax({
		            url: ajax_url + '/api/fetchAnswer',
		            type: 'GET',
		            data: { answerId: this.id },
		            dataType: 'json',
		        	success: function (data) {
		        		app.activeAnswer = JSON.parse(JSON.stringify(data.answer[0]));
		        	}
				});
	});

	$(document).on('click', 'button.answer-delete', function(e) {

			var self = this;
			 $.ajax({
		            url: ajax_url + '/api/answers/' + self.id,
		            type: 'DELETE',
		            data: { answerId: this.id,
		            '_method': 'DELETE', },
		            dataType: 'json',
		        	success: function (data) {
		        		questionId = data.question.id
		        		$("tbody#collapse" + questionId).empty()
		        		app.updateAnswer(questionId)
		        	}
				});
	});
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













/***
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
***/

/* Content */
.content {
    padding-top: 30px;
}

/* Testimonials */
.testimonials blockquote {
    background: #f8f8f8 none repeat scroll 0 0;
    border: medium none;
    color: #666;
    display: block;
    font-size: 14px;
    line-height: 20px;
    padding: 15px;
    position: relative;
}
.testimonials blockquote::before {
    width: 0;
    height: 0;
	right: 0;
	bottom: 0;
	content: " ";
	display: block;
	position: absolute;
    border-bottom: 20px solid #fff;
	border-right: 0 solid transparent;
	border-left: 15px solid transparent;
	border-left-style: inset; /*FF fixes*/
	border-bottom-style: inset; /*FF fixes*/
}
.testimonials blockquote::after {
    width: 0;
    height: 0;
    right: 0;
    bottom: 0;
    content: " ";
    display: block;
    position: absolute;
    border-style: solid;
    border-width: 20px 20px 0 0;
    border-color: #e63f0c transparent transparent transparent;
}
.testimonials .carousel-info img {
    border: 1px solid #f5f5f5;
    border-radius: 150px !important;
    height: 75px;
    padding: 3px;
    width: 75px;
}
.testimonials .carousel-info {
    overflow: hidden;
}
.testimonials .carousel-info img {
    margin-right: 15px;
}
.testimonials .carousel-info span {
    display: block;
}
.testimonials span.user-name {
    color: #e6400c;
    font-size: 16px;
    font-weight: 300;
    margin: 23px 0 7px;
}
.testimonials span.user-email {
    color: #656565;
    font-size: 12px;
}







.btn-glyphicon { padding:8px; background:#ffffff; margin-right:4px; }
.icon-btn { padding: 1px 15px 3px 2px; border-radius:50px;}
</style>