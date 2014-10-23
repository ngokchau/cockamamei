<?php include 'views/partials/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-xs-4 col-xs-offset-4">
            <section ng-controller="SignUpFormCtrl as SignUpForm">
                <form
                    id="signUpForm" name="signUpForm"
                    ng-submit="SignUpForm.signup(signUpForm.$valid)"
                    novalidate
                >
                    <label for="firstname">First Name</label>
                    <input
                        type="text" id="firstname" name="firstname"
                        ng-model="SignUpForm.firstname"
                        ng-pattern="SignUpForm.nameRegex"
                        ng-minlength="2"
                        ng-maxlength="31"
                        required
                    />

                    <label for="lastname">Last Name</label>
                    <input
                        type="text" id="lastname" name="lastname"
                        ng-model="SignUpForm.lastname"
                        ng-pattern="SignUpForm.nameRegex"
                        ng-minlength="2"
                        ng-maxlength="31"
                        required
                    />

                    <label for="email">Email</label>
                    <input
                        type="text" id="email" name="email"
                        ng-model="SignUpForm.email"
                        ng-pattern="SignUpForm.emailRegex"
                        required
                    />

                    <label for="password">Password</label>
                    <input
                        type="password" id="password" name="password"
                        ng-model="SignUpForm.password"
                        required
                    />

                    <label for="passwordConfirm">Password Confirm</label>
                    <input
                        type="password" id="passwordConfirm" name="passwordConfirm"
                        pw-check="password"
                        ng-model="SignUpForm.passwordConfirm"
                        required
                    />

                    <button type="submit">Sign Up</button>
                </form>
            </section>
        </div>
    </div>
</div>

<?php include 'views/partials/footer.php'; ?>