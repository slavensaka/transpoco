@include('header')
        <div>
            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>
                <div id="app">
					<div v-for="test in tests">
						<div>
							Front page of Website
						</div>
						<a href="{{route('tests.index') }}" title="">CRUD REST TESTS</a>
					</div>
					{{-- <ul @click="sendIt()">
						<li v-for="user in users" >@{{user.name}}</li>
					</ul> --}}
                </div>
            </div>
        </div>
@include('footer')
