<div class="modal fade" id="user-edit-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-loader" v-show="loadingResponse">

        </div>
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">
                    ×
                </button>
                LOREM CONTENT
                {{-- <h4 v-if="!update" id="myLargeModalLabel"
                    class="modal-title">{{ trans('labels.creating') }}
                    <b>@{{ activeUser.name }}  @{{ activeUser.surname }}</b>
                </h4>
                <h4 v-if="update" id="myLargeModalLabel"
                    class="modal-title">{{ trans('labels.editing') }}
                    <b>@{{ activeUser.name }}  @{{ activeUser.surname }}</b>
                </h4> --}}
            </div>
            <div class="modal-body">
                <form action="#" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="name">
                            NAME
                        </label>

                        <div class="col-sm-9">
                            <input v-model="activeUser.name" type="text" placeholder="{{ trans('labels.name') }}"
                                   id="name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="surname">
                            SURNAME
                        </label>

                        <div class="col-sm-9">
                            <input v-model="activeUser.surname" type="text"
                                   placeholder=",wd,w" id="surname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="name">
                            {{ trans('labels.username') }}
                        </label>

                        <div class="col-sm-9">
                            <input type="text"
                                   id="username" class="form-control">
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <label class="col-sm-2 control-label" for="name">
                            {{ trans('labels.email') }}
                        </label>

                        <div class="col-sm-9">
                            <input v-model="activeUser.email" type="email" placeholder="{{ trans('labels.email') }}"
                                   id="email" class="form-control">
                        </div>
                    </div>
                    <div v-if="!update"  class="form-group">
                        <label class="col-sm-2 control-label" for="name">
                            {{ trans('labels.password') }}
                        </label>

                        <div class="col-sm-9">
                            <input v-model="activeUser.password" type="password" placeholder="{{ trans('labels.password') }}"
                                   id="password" class="form-control">
                        </div>
                    </div>
                    <div v-if="!update"  class="form-group">
                        <label class="col-sm-2 control-label" for="name">
                            {{ trans('labels.confirm_password') }}
                        </label>

                        <div class="col-sm-9">
                            <input v-model="activeUser.confirm_password" type="password" placeholder="{{ trans('labels.confirm_password') }}"
                                   id="confirm_password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="form-field-select-1" class="col-sm-2">
                            Vrsta računa
                        </label>
                        <div class="col-sm-9">
                            <select v-model="activeUser.type" id="form-field-select-1" class="form-control">
                                <option value="user" selected="selected">Korisnik</option>
                                <option value="staff">Osoblje</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group" v-show="activeUser.type == 'staff'">
                        <label class="col-sm-2 control-label" for="sections">
                            {{ trans('labels.sections') }}
                        </label>
                        <div class="col-sm-9">
                            <select multiple id="sections" class="form-control select2" style="height: auto; width: 100%">
                                <option
                                        v-for="section in sections"
                                        value="@{{ section.id }}"
                                >
                                    @{{ section.section_name }}
                                </option>
                            </select>
                        </div> --}}
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">
                    {{ trans('labels.cancel') }}
                </button>
                <button v-if="!update" @click="createUser" class="btn btn-primary" type="button" :disabled="loadingResponse">
                {{ trans('labels.create') }}
                </button>
                <button v-if="update" @click="updateUser" class="btn btn-primary" type="button" :disabled="loadingResponse">
                {{ trans('labels.save') }}
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<!-- end: USER EDIT MODAL -->