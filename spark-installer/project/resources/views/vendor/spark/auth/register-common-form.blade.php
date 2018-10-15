<form role="form">
    @if (Spark::usesTeams() && Spark::onlyTeamPlans())
        <!-- Team Name -->
        <div class="form-group row" v-if=" ! invitation">
            <label class="col-md-4 col-form-label text-md-right">{{ __('teams.team_name') }}</label>

            <div class="col-md-6">
                <input type="text" class="form-control" name="team" v-model="registerForm.team" :class="{'is-invalid': registerForm.errors.has('team')}" autofocus>

                <span class="invalid-feedback" v-show="registerForm.errors.has('team')">
                    @{{ registerForm.errors.get('team') }}
                </span>
            </div>
        </div>

        @if (Spark::teamsIdentifiedByPath())
            <!-- Team Slug (Only Shown When Using Paths For Teams) -->
            <div class="form-group row" v-if=" ! invitation">
                <label class="col-md-4 col-form-label text-md-right">{{ __('teams.team_slug') }}</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="team_slug" v-model="registerForm.team_slug" :class="{'is-invalid': registerForm.errors.has('team_slug')}" autofocus>

                    <small class="form-text text-muted" v-show="! registerForm.errors.has('team_slug')">
                        {{__('teams.slug_input_explanation')}}
                    </small>

                    <span class="invalid-feedback" v-show="registerForm.errors.has('team_slug')">
                        @{{ registerForm.errors.get('team_slug') }}
                    </span>
                </div>
            </div>
        @endif
    @endif

    <!-- Name -->
    <div class="form-group row">                          
            <label>{{__('Name')}}</label>
            <input type="text" class="form-control" name="name" v-model="registerForm.name" :class="{'is-invalid': registerForm.errors.has('name')}" autofocus>

            <span class="invalid-feedback" v-show="registerForm.errors.has('name')">
                @{{ registerForm.errors.get('name') }}
            </span>
    </div>

    <!-- E-Mail Address -->
    <div class="form-group row">
        <label>{{__('E-Mail Address')}}</label>
        <input type="email" class="form-control" name="email" v-model="registerForm.email" :class="{'is-invalid': registerForm.errors.has('email')}">

        <span class="invalid-feedback" v-show="registerForm.errors.has('email')">
            @{{ registerForm.errors.get('email') }}
        </span>
    </div>

    <!-- Password -->
    <div class="form-group row">
        <label>{{__('Password')}}</label>
        <input type="password" class="form-control" name="password" v-model="registerForm.password" :class="{'is-invalid': registerForm.errors.has('password')}">

        <span class="invalid-feedback" v-show="registerForm.errors.has('password')">
            @{{ registerForm.errors.get('password') }}
        </span>
    </div>

    <!-- Password Confirmation -->
    <div class="form-group row">
        <label>{{__('Confirm Password')}}</label>
        <input type="password" class="form-control" name="password_confirmation" v-model="registerForm.password_confirmation" :class="{'is-invalid': registerForm.errors.has('password_confirmation')}">

        <span class="invalid-feedback" v-show="registerForm.errors.has('password_confirmation')">
            @{{ registerForm.errors.get('password_confirmation') }}
        </span>
    </div>



    <!-- Terms And Conditions -->
    <div v-if=" ! selectedPlan || selectedPlan.price == 0">
        <div class="form-group row">
            <div class="">
                <div class="form-check">
                    <label class="cust-cbox"> {!! __('I Accept :linkOpen The Terms Of Service :linkClose', ['linkOpen' => '<a href="/terms" target="_blank">', 'linkClose' => '</a>']) !!}
                      <input type="checkbox" class="form-check-input" id="terms" :class="{'is-invalid': registerForm.errors.has('terms')}" v-model="registerForm.terms">
                      <span class="checkmark"></span>
                    </label>
                    <div class="invalid-feedback" v-show="registerForm.errors.has('terms')">
                        <strong>@{{ registerForm.errors.get('terms') }}</strong>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-group row mb-0">
            <div class=" lo-btn-bx">
                <button class="btn btn-primary" @click.prevent="register" :disabled="registerForm.busy">
                    <span v-if="registerForm.busy">
                        <i class="fa fa-btn fa-spinner fa-spin"></i> {{__('Registering')}}
                    </span>

                    <span v-else>
                        <i class="fa fa-btn fa-check-circle"></i> {{__('Register')}}
                    </span>
                </button>
            </div>
        </div>
        <p>Already Registerd with us? <a href="/login"> Sign In Here </a></p>
    </div>
</form>
