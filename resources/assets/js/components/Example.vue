<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>
                    <div class="panel-body" @click="sendIt()">

                    </div>

                    <ul>
						<li v-for="user in userss">
							@{{ user }}
						</li>

					</ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {





        mounted() {

        },
       // props: ['users','userTests'],
       props: {
   userss: String
  },
       created: function () {
  		},
       data(){
            return {
                // users:users
            }
        },
        // components:{
        //     // ItemProductView
        // },
        // data() {
        //     // return {
        //     //     list: [],
        //     // };
        // },
        methods: {
        	sendAjax: function() {

        		$.ajax({
		            url: ajax_url + '/api/tests',
		            type: 'POST',
		            data: { job: "job", user: "user" },
		            dataType: 'json',
		        	success: function (data) {
		        		console.log("VALJA")
		        	}
				});
        	},
            sendIt: function() {
            	console.log(JSON.stringify(users));
            	// GET /someUrl?foo=bar
				  this.$http.post(ajax_url + '/api/tests', {
				  	params: {foo: 'bar',
				 },
				  	headers: {'X-CSRF-Token': token}})
				  .then(response => {
				    // success callback
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

    }
</script>
<style type="text/css">

</style>